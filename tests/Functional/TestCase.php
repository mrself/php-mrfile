<?php declare(strict_types=1);

namespace Mrself\File\Tests\Functional;

use Composer\Autoload\ClassLoader;
use Mrself\Container\Registry\ContainerRegistry;
use Mrself\File\FileProvider;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function getRootDir(): string
    {
        $reflectionClass = new \ReflectionClass(ClassLoader::class);
        return dirname($reflectionClass->getFileName(), 3);
    }

    protected function getFilesDir(): string
    {
        return $this->getRootDir() . '/tests/files';
    }

    protected function clearFilesDir()
    {
        array_map('unlink', glob($this->getFilesDir() . '/**'));
    }

    protected function setUp()
    {
        ContainerRegistry::reset();
        (new FileProvider())->register();
        if (is_dir($this->getFilesDir())) {
            $this->clearFilesDir();
        } else {
            mkdir($this->getFilesDir());
        }
    }
}
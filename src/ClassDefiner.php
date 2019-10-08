<?php declare(strict_types=1);

namespace Mrself\File;

use Mrself\File\Exception\InvalidPathLocallyException;
use Mrself\Options\WithOptionsTrait;

class ClassDefiner
{
    use WithOptionsTrait;

    public function parse($source)
    {
        if (is_array($source)) {
            return $this->parseArraySource($source);
        }

        if (strpos($source, '//') === false) {
            if (file_exists($source)) {
                return LocalFile::class;
            } else {
                throw new InvalidPathLocallyException($source);
            }
        } else {
            return $this->defineClass($source);
        }
    }

    protected function parseArraySource(array $source)
    {
        if (isset($source['type'])) {
            $class = static::getTypesMap()[$source['type']];
            unset($source['type']);
            return $class;
        } else {
            $class = $source['class'];
            unset($source['class']);
            return $class;
        }
    }

    protected static function getTypesMap(): array
    {
        return [
            'ftp' => FtpFile::class,
            'http' => HttpFile::class,
            'local' => LocalFile::class
        ];
    }

    protected function defineClass(string $source)
    {
        [$schema] = explode('://', $source, 2);
        return static::getTypesMap()[$schema];
    }
}
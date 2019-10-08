<?php declare(strict_types=1);

namespace Mrself\File;

use Mrself\File\Exception\InvalidPathLocallyException;
use Mrself\Options\WithOptionsTrait;

class ClassDefiner
{
    use WithOptionsTrait;

    public function parse(&$source)
    {
        if (is_array($source)) {
            $class = $source['class'];
            unset($source['class']);
            return $class;
        }

        if (strpos('//', $source) === false) {
            if (file_exists($source)) {
                return LocalFile::class;
            } else {
                throw new InvalidPathLocallyException($source);
            }
        } else {
            return $this->defineClass($source);
        }
    }

    protected function defineClass(string $source)
    {
        // @todo
    }
}
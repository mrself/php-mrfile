<?php declare(strict_types=1);

namespace Mrself\File;

use Mrself\File\Exception\InvalidPathLocallyException;
use Mrself\Options\WithOptionsTrait;

class SourceParser
{
    use WithOptionsTrait;

    public function parse($source): Source
    {
        if (is_string($source)) {
            return $this->parseStringSource($source);
        } else {
            return Source::make($source);
        }
    }

    protected function parseStringSource(string $source)
    {
        if (strpos('//', $source) === false) {
            if (file_exists($source)) {
                return $this->makeStringSource($source);
            } else {
                throw new InvalidPathLocallyException($source);
            }
        } else {
            return Source::make([
                'class' => $this->defineClass($source),
                'path' => $source
            ]);
        }
    }

    protected function defineClass(string $source)
    {

    }

    protected function makeStringSource($source)
    {
        return Source::make([
            'class' => LocalFile::class,
            'path' => $source
        ]);
    }
}
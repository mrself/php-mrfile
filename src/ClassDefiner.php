<?php declare(strict_types=1);

namespace Mrself\File;

use Mrself\File\Exception\InvalidPathLocallyException;
use Mrself\Options\WithOptionsTrait;

class ClassDefiner
{
    use WithOptionsTrait;

    /**
     * @param array|string $source
     * @return string
     * @throws InvalidPathLocallyException
     */
    public function parse($source): string
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

    protected function parseArraySource(array $source): string
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
            'local' => LocalFile::class,
            's3' => S3File::class,
            'dropbox' => DropboxFile::class
        ];
    }

    protected function defineClass(string $source): string
    {
        [$schema] = explode('://', $source, 2);
        return static::getTypesMap()[$schema];
    }
}
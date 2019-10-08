<?php declare(strict_types=1);

namespace Mrself\File;

interface FileInterface
{
    /**
     * @return static
     */
    public static function make();

    public function save($options, string $localPath);
}
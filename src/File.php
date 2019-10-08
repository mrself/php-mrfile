<?php declare(strict_types=1);

namespace Mrself\File;

class File extends AbstractFile implements FileInterface
{
    public function save($remotePath, string $localPath)
    {
        $remotePath = SourceParser::make()->parse($remotePath);
        return $remotePath->getClass()::make()->save($remotePath, $localPath);
    }
}
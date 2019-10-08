<?php declare(strict_types=1);

namespace Mrself\File;

class LocalFile extends AbstractFile implements FileInterface
{
    public function save(Source $remotePath, string $localPath)
    {
        $content = file_get_contents($remotePath->getPath());
        file_put_contents($localPath, $content);
    }

}
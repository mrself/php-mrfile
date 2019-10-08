<?php declare(strict_types=1);

namespace Mrself\File;

class LocalFile extends AbstractFile implements FileInterface
{
    /**
     * @param LocalFileOptions $remotePath
     * @param string $localPath
     */
    public function save($remotePath, string $localPath)
    {
        $content = file_get_contents($remotePath->getPath());
        file_put_contents($localPath, $content);
    }

}
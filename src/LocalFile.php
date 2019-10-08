<?php declare(strict_types=1);

namespace Mrself\File;

use Mrself\File\Options\LocalFileOptions;

class LocalFile extends AbstractFile implements FileInterface
{
    /**
     * @param LocalFileOptions $options
     * @param string $localPath
     */
    public function save($options, string $localPath)
    {
        $content = file_get_contents($options->getPath());
        file_put_contents($localPath, $content);
    }

}
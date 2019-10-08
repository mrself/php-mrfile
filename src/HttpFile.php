<?php declare(strict_types=1);

namespace Mrself\File;

use Mrself\File\Exception\FileException;
use Mrself\File\Options\HttpFileOptions;

class HttpFile extends AbstractFile implements FileInterface
{
    /**
     * @param HttpFileOptions $options
     * @param string $localPath
     * @throws FileException
     */
    public function save($options, string $localPath)
    {
        $content = file_get_contents($options->getUrl());
        if (!$content) {
            throw new FileException('Can not get file via http by url "' . $options->getUrl() . '"');
        }
        file_put_contents($localPath, $content);
    }
}
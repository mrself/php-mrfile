<?php declare(strict_types=1);

namespace Mrself\File;

use Kunnu\Dropbox\Dropbox;
use Mrself\File\Options\DropboxFileOptions;
use Mrself\Options\Annotation\Option;

class DropboxFile extends AbstractFile implements FileInterface
{
    /**
     * @Option()
     * @var Dropbox
     */
    protected $dropboxClient;

    /**
     * @param DropboxFileOptions $options
     * @param string $localPath
     * @throws \Kunnu\Dropbox\Exceptions\DropboxClientException
     */
    public function save($options, string $localPath)
    {
        $this->dropboxClient->download($options->getPath(), $localPath);
    }
}
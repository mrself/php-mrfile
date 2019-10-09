<?php declare(strict_types=1);

namespace Mrself\File;

use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;
use Mrself\File\Options\DropboxFileOptions;
use Mrself\Options\Annotation\Option;

class DropboxFile extends AbstractFile implements FileInterface
{
    /**
     * @Option(required=false)
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
        if ($this->dropboxClient) {
            $client = $this->dropboxClient;
        } else {
            $client = new DropboxApp(
                $options->getClientId(),
                $options->getSecret(),
                $options->getToken()
            );
        }

        $client->download($options->getPath(), $localPath);
    }
}
<?php declare(strict_types=1);

namespace Mrself\File;

use FtpClient\FtpClient;
use Mrself\File\Options\FtpFileOptions;
use Mrself\Options\Annotation\Option;

class FtpFile extends AbstractFile implements FileInterface
{
    /**
     * @Option()
     * @var FtpClient
     */
    protected $ftpClient;

    /**
     * @param FtpFileOptions $options
     * @param string $localPath
     * @throws \FtpClient\FtpException
     */
    public function save($options, string $localPath)
    {
        $this->ftpClient->connect($options->getHost());
        $this->ftpClient->login($options->getUser(), $options->getPass());
        $this->ftpClient->get($localPath, $options->getUrl(), FTP_BINARY);
    }
}
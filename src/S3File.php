<?php declare(strict_types=1);

namespace Mrself\File;

use Aws\S3\S3Client;
use GuzzleHttp\Psr7\Stream;
use Mrself\File\Options\S3FileOptions;
use Mrself\Options\Annotation\Option;

class S3File extends AbstractFile implements FileInterface
{
    /**
     * @Option()
     * @var S3Client
     */
    protected $s3Client;

    /**
     * @param S3FileOptions $options
     * @param string $localPath
     */
    public function save($options, string $localPath)
    {
        if ($this->s3Client) {
            $client = $this->s3Client;
        } else {
            $client = new S3Client([
                'version' => $options->getVersion(),
                'region' => $options->getRegion(),
                'credentials' => $options->getCredentials()
            ]);
        }

        $result = $client->getObject([
            'Bucket' => $options->getBucket(),
            'Key' => $options->getKey()
        ]);
        /** @var Stream $stream */
        $stream = $result['Body'];
        file_put_contents($localPath, $stream->getContents());
    }
}
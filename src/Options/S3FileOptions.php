<?php declare(strict_types=1);

namespace Mrself\File\Options;

use Mrself\Options\Annotation\Option;

class S3FileOptions extends AbstractFileOptions
{
    /**
     * @Option()
     * @var string
     */
    protected $bucket;

    /**
     * @Option()
     * @var string
     */
    protected $key;

    /**
     * @return string
     */
    public function getBucket(): ?string
    {
        return $this->bucket;
    }

    /**
     * @return string
     */
    public function getKey(): ?string
    {
        return $this->key;
    }
}
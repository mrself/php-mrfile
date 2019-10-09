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
     * @Option()
     * @var string
     */
    protected $version;

    /**
     * @Option()
     * @var string
     */
    protected $region;

    /**
     * @Option()
     * @var array
     */
    protected $credentials;

    /**
     * @return string
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * @return array
     */
    public function getCredentials(): ?array
    {
        return $this->credentials;
    }

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
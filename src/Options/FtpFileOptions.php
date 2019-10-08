<?php declare(strict_types=1);

namespace Mrself\File\Options;

use Mrself\Options\Annotation\Option;

class FtpFileOptions extends AbstractFileOptions
{
    /**
     * @Option()
     * @var string
     */
    protected $user;

    /**
     * @Option()
     * @var string
     */
    protected $pass;

    /**
     * @var string
     */
    protected $host;

    /**
     * @var string
     */
    protected $url;

    /**
     * @return string
     */
    public function getUser(): ?string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPass(): ?string
    {
        return $this->pass;
    }

    /**
     * @return string
     */
    public function getHost(): ?string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    protected function onInit()
    {
        [$this->host, $this->url] = explode('/', $this->path, 2);
    }
}
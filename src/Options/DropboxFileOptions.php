<?php declare(strict_types=1);

namespace Mrself\File\Options;

use Mrself\Options\Annotation\Option;

class DropboxFileOptions extends AbstractFileOptions
{
    /**
     * @Option()
     * @var string
     */
    protected $clientId;

    /**
     * @Option()
     * @var string
     */
    protected $secret;

    /**
     * @Option()
     * @var string
     */
    protected $token;

    /**
     * @return string
     */
    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }

    /**
     * @return string
     */
    public function getToken(): ?string
    {
        return $this->token;
    }
}
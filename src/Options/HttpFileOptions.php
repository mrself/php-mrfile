<?php declare(strict_types=1);

namespace Mrself\File\Options;

use Mrself\Options\Annotation\Option;

class HttpFileOptions extends AbstractFileOptions
{
    /**
     * @Option()
     * @var string
     */
    protected $url;

    /**
     * @return string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
}
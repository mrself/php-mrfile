<?php declare(strict_types=1);

namespace Mrself\File\Exception;

class InvalidPathLocallyException extends FileException
{
    /**
     * @var string
     */
    private $source;

    public function __construct(string $source)
    {
        $this->source = $source;
        parent::__construct("Source file does not exist locally: '$source'");
    }

    /**
     * @return string
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
}
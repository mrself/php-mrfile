<?php declare(strict_types=1);

namespace Mrself\File;

use Mrself\Options\Annotation\Option;
use Mrself\Options\WithOptionsTrait;

class Source
{
    use WithOptionsTrait;

    /**
     * @Option()
     * @var FileInterface|string
     */
    private $class;

    /**
     * @Option()
     * @var string
     */
    private $path;

    /**
     * @return FileInterface|string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param FileInterface $class
     */
    public function setClass(?FileInterface $class): void
    {
        $this->class = $class;
    }

    /**
     * @return string
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(?string $path): void
    {
        $this->path = $path;
    }
}
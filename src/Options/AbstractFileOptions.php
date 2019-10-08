<?php declare(strict_types=1);

namespace Mrself\File\Options;

use Mrself\Options\Annotation\Option;
use Mrself\Options\WithOptionsTrait;

class AbstractFileOptions
{
    use WithOptionsTrait {
        make as parentMake;
    }

    /**
     * @Option()
     * @var string
     */
    protected $path;

    public static function make($options = [])
    {
        if (is_string($options)) {
            $options = ['path' => $options];
        }
        return static::parentMake($options);
    }

    public function build()
    {
        return $this;
    }

    /**
     * @return string
     */
    public function getPath(): ?string
    {
        return $this->path;
    }
}
<?php declare(strict_types=1);

namespace Mrself\File;

use Mrself\File\Options\AbstractFileOptions;
use Mrself\Options\WithOptionsTrait;

class File
{
    use WithOptionsTrait;

    /**
     * @param $source
     * @param string $localPath
     * @return mixed|void
     * @throws Exception\InvalidPathLocallyException
     */
    public function save($source, string $localPath)
    {
        $class = ClassDefiner::make()->parse($source);
        if (is_array($source)) {
            unset($source['type'], $source['class']);
        }
        /** @var AbstractFileOptions $optionsClass */
        $optionsClass = $class . 'Options';
        $optionsClass = str_replace('File\\', 'File\\Options\\', $optionsClass);
        $options = $optionsClass::make($source)->build();
        /** @var FileInterface $class */
        return $class::make()->save($options, $localPath);
    }
}
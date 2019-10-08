<?php declare(strict_types=1);

namespace Mrself\File;

use Mrself\File\Options\AbstractFileOptions;
use Mrself\Options\WithOptionsTrait;

class File
{
    use WithOptionsTrait;

    public function save($remotePath, string $localPath)
    {
        $class = ClassDefiner::make()->parse($remotePath);
        if (is_array($remotePath)) {
            unset($remotePath['type'], $remotePath['class']);
        }
        /** @var AbstractFileOptions $optionsClass */
        $optionsClass = $class . 'Options';
        $optionsClass = str_replace('File\\', 'File\\Options\\', $optionsClass);
        $options = $optionsClass::make($remotePath)->build();
        /** @var FileInterface $class */
        return $class::make()
            ->save($options, $localPath);
    }
}
<?php declare(strict_types=1);

namespace Mrself\File\Tests\Functional\LocalFile;

use Mrself\File\File;
use Mrself\File\LocalFile;
use Mrself\File\Tests\Functional\TestCase;

class SaveTest extends TestCase
{
    public function testItSavesFileLocallyIfSourceIsStringPath()
    {
        $remotePath = $this->getFilesDir() . '/file';
        file_put_contents($remotePath, 'a');
        $localPath = $this->getFilesDir() . '/file2';

        File::make()->save($remotePath, $localPath);

        $this->assertEquals('a', file_get_contents($localPath));
    }

    public function testItSavesFileLocallyIfSourceIsArray()
    {
        $remotePath = $this->getFilesDir() . '/file';
        file_put_contents($remotePath, 'a');
        $localPath = $this->getFilesDir() . '/file2';

        $remoteSource = [
            'path' => $remotePath,
            'class' => LocalFile::class
        ];
        File::make()->save($remoteSource, $localPath);

        $this->assertEquals('a', file_get_contents($localPath));
    }

    /**
     * @expectedException \Mrself\File\Exception\InvalidPathLocallyException
     */
    public function testItThrowsExceptionIfRemotePathDoesNotExist()
    {
        $localPath = $this->getFilesDir() . '/file2';

        File::make()->save('abc', $localPath);
    }
}
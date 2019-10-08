<?php declare(strict_types=1);

namespace Mrself\File\Tests;

use Mrself\File\ClassDefiner;
use Mrself\File\FtpFile;
use Mrself\File\HttpFile;
use Mrself\File\Tests\Functional\TestCase;

class ParseTest extends TestCase
{
    public function testParseReturnsHttpClassIfUrlIsHttp()
    {
        $class = ClassDefiner::make()->parse('http://site.com');
        $this->assertEquals(HttpFile::class, $class);
    }

    public function testParseReturnsFtpClassIfUrlIsFtp()
    {
        $class = ClassDefiner::make()->parse('ftp://site.com');
        $this->assertEquals(FtpFile::class, $class);
    }
}
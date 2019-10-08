<?php declare(strict_types=1);

namespace Mrself\File;

use FtpClient\FtpClient;
use Mrself\Container\Container;
use Mrself\Container\Registry\ContainerRegistry;

class FileProvider
{
    public function register()
    {
        $container = Container::make();
        ContainerRegistry::add('Mrself\\File', $container);
        $container->set(FtpClient::class, new FtpClient());
    }
}
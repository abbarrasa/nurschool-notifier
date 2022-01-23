<?php

namespace Nurschool\Notifier\Mailer\Infrastructure\Symfony;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class ConfigBuilder
{
    public function loadConfig(ContainerBuilder $containerBuilder)
    {
        $loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__.'/../../config/packages'));
        $loader->load('nurschool_mailer.yaml');
    }
}
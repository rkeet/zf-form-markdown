<?php

namespace Keet\Markdown;

final class Module
{
    public function getConfig(): array
    {
        $config = [];

        $path = __DIR__
            . DIRECTORY_SEPARATOR . '..'
            . DIRECTORY_SEPARATOR . 'config'
            . DIRECTORY_SEPARATOR . '*.php';

        foreach (glob($path) as $filename) {
            $config = array_merge_recursive($config, include $filename);
        }

        return $config;
    }

    public function getAutoloaderConfig(): array
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . DIRECTORY_SEPARATOR . 'src',
                ],
            ],
        ];
    }
}

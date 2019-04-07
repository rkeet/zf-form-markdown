<?php

namespace Keet\Markdown;

use AssetManager\Cache\FilePathCache;

return [
    'asset_manager' => [
        'resolver_configs' => [
            'collections' => [
                'assets/js/showdown.js'         => [
                    'showdown/showdown.js',
                    'markdown-options.js',
                    'markdown-activation.js',
                ],
                'assets/js/showdown.js.map'     => [
                    'showdown/showdown.js.map',
                ],
                'assets/js/showdown.min.js'     => [
                    'showdown/showdown.min.js',
                    'markdown-options.js',
                    'markdown-activation.js',
                ],
                'assets/js/showdown.min.js.map' => [
                    'showdown/showdown.min.js.map',
                ],
            ],
            'paths'       => [
                __DIR__ . '/../assets',
            ],
        ],
        'caching'          => [
            'default' => [
                'cache'   => FilePathCache::class,
                'options' => [
                    'dir' => 'public',
                ],
            ],
        ],
    ],
];

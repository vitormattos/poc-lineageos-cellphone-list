<?php

use Symfony\Component\Yaml\Yaml;

return [
    'production' => false,
    'baseUrl' => '',
    'collections' => [
        'device' => [
            'extends' => '_layouts.device',
            'path' => 'device/{codename}',
            'items' => function() {
                $devices = [];
                foreach (glob(__DIR__.'/lineage_wiki/_data/devices/*.yml') as $filename) {
                    $service = Yaml::parseFile($filename)+[];
                    $devices[] = $service;
                }
                return collect($devices);
            },
            'isSelected' => function ($post, $current_page) {
                return $post->getPath() == $current_page->getPath();
            }
        ]
    ],
];

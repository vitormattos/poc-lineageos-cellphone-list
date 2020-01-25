<?php

use Symfony\Component\Yaml\Yaml;

return [
    'production' => false,
    'baseUrl' => getenv('BASE_URL'),
    'collections' => [
        'device' => [
            'extends' => '_layouts.device',
            'path' => 'device/{codename}',
            'items' => function() {
                $devices = [];
                foreach (glob(__DIR__.'/lineage_wiki/_data/devices/*.yml') as $filename) {
                    $service = Yaml::parseFile($filename)+[];
                    if (is_numeric($service['release']) && $service['release'] > 10000) {
                        $service['orderBy'] = date('Y-m-d', $service['release']);
                    } elseif (is_array($service['release'])) {
                        foreach ($service['release'][0] as $release) {
                            if (is_numeric($release)) {
                                $service['orderBy'] = date('Y-m-d', $release);
                            } else {
                                $service['orderBy'] = $release;
                            }
                        };
                    } else {
                        $service['orderBy'] = $service['release'];
                    }
                    $service['singleRelease'] = $service['orderBy'];
                    $service['filename'] = $service['codename'];
                    $devices[] = $service;
                }
                return collect($devices);
            },
            'sort' => '-orderBy'
        ]
    ],
];

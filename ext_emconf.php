<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Username',
    'description' => 'Login provider to login with username only.',
    'category' => 'services',
    'author' => 'Oliver Bartsch',
    'author_email' => 'bo@cedev.de',
    'author_company' => '',
    'state' => 'stable',
    'version' => '0.1.1',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-13.4.99',
        ],
        'conflicts' => [],
        'suggests' => []
    ],
    'autoload' => [
        'psr-4' => [
            'Bo\\Username\\' => 'Classes/',
        ]
    ]
];

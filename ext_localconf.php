<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['backend']['loginProviders'][1739006907] = [
    'provider' => \Bo\Username\Backend\UsernameLoginProvider::class,
    'sorting' => 40,
    'icon-class' => 'fa-key',
    'iconIdentifier' => 'actions-key',
    'label' => 'LLL:EXT:username/Resources/Private/Language/locallang.xlf:provider.title',
];

ExtensionManagementUtility::addService(
    'sv',
    'auth',
    \Bo\Username\Backend\UsernameAuthService::class,
    [
        'title' => 'Username BE authentication',
        'description' => 'Authenticates a TYPO3 CMS backend user with username only',
        'subtype' => 'authUserBE,getUserBE',
        'available' => true,
        'priority' => 100,
        'quality' => 50,
        'os' => '',
        'exec' => '',
        'className' => \Bo\Username\Backend\UsernameAuthService::class,
    ]
);

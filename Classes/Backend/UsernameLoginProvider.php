<?php

declare(strict_types=1);

/*
 * This file is part of TYPO3 CMS-based extension "username" by Oliver Bartsch.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 */

namespace Bo\Username\Backend;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Backend\Controller\LoginController;
use TYPO3\CMS\Backend\LoginProvider\LoginProviderInterface;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\View\ViewInterface;
use TYPO3\CMS\Fluid\View\StandaloneView;

class UsernameLoginProvider implements LoginProviderInterface
{
    public function modifyView(ServerRequestInterface $request, ViewInterface $view): string
    {
        $view->getRenderingContext()->getTemplatePaths()->setTemplateRootPaths(['EXT:username/Resources/Private/Templates']);
        if ($request->getAttribute('normalizedParams')->isHttps()) {
            $username = $request->getParsedBody()['u'] ?? $request->getQueryParams()['u'] ?? null;
            $view->assignMultiple(['presetUsername' => $username]);
        }
        return 'UsernameLogin';
    }

    public function render(StandaloneView $view, PageRenderer $pageRenderer, LoginController $loginController): void
    {
        $templateNameAndPath = 'EXT:username/Resources/Private/Templates/UsernameLogin.html';
        $view->setTemplatePathAndFilename(GeneralUtility::getFileAbsFileName($templateNameAndPath));
        $request = $loginController->getCurrentRequest();
        if ($request->getAttribute('normalizedParams')->isHttps()) {
            $username = $request->getParsedBody()['u'] ?? $request->getQueryParams()['u'] ?? null;
            $view->assignMultiple(['presetUsername' => $username]);
        }
    }
}

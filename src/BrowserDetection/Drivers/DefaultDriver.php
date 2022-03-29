<?php

declare(strict_types = 1);

namespace Uc\Detection\BrowserDetection\Drivers;

use hisorange\BrowserDetect\Parser;

/**
 * DefaultDriver is Adapter for detecting browser.
 *
 * @package Uc\Detection\BrowserDetection\Drivers
 */
class DefaultDriver implements BrowserDetectionDriverInterface
{
    /**
     * Browser's vendor like Chrome, Firefox, Opera.
     *
     * @return string
     */
    public function browserFamily() : string
    {
        return Parser::browserFamily();
    }

    /**
     * Is this a chrome browser.
     *
     * @return bool
     */
    public function isChrome() : bool
    {
        return Parser::isChrome();
    }

    /**
     * Is this a firefox browser.
     *
     * @return bool
     */
    public function isFirefox() : bool
    {
        return Parser::isFirefox();
    }

    /**
     * Is this an opera browser.
     *
     * @return bool
     */
    public function isOpera() : bool
    {
        return Parser::isOpera();
    }

    /**
     * Is this a safari browser.
     *
     * @return bool
     */
    public function isSafari() : bool
    {
        return Parser::isSafari();
    }

    /**
     * Checks if the browser is an some kind of Internet Explorer (or Trident).
     *
     * @return bool
     */
    public function isIE() : bool
    {
        return Parser::isIE();
    }

    /**
     * Is this a microsoft edge browser.
     *
     * @return bool
     */
    public function isEdge() : bool
    {
        return Parser::isEdge();
    }

    /**
     * Check for browsers rendered inside applications like android webview.
     *
     * @return bool
     */
    public function isInApp() : bool
    {
        return Parser::isInApp();
    }
}

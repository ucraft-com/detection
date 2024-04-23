<?php

declare(strict_types=1);

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
     * Type of the device: [Mobile, Tablet, Desktop, and Bot]
     *
     * @return string
     */
    public function deviceType(): string
    {
        return Parser::deviceType();
    }

    /**
     * Browser's human friendly name like Firefox 3.6, Chrome 42.
     *
     * @return string
     */
    public function browserName(): string
    {
        return Parser::browserName();
    }

    /**
     * Browser's human friendly version string.
     *
     * @return string
     */
    public function browserVersion(): string
    {
        return Parser::browserVersion();
    }

    /**
     * Browser's engine like: Blink, WebKit, Gecko.
     *
     * @return string
     */
    public function browserEngine(): string
    {
        return Parser::browserEngine();
    }

    /**
     * Browser's vendor like Chrome, Firefox, Opera.
     *
     * @return string
     */
    public function browserFamily(): string
    {
        return Parser::browserFamily();
    }

    /**
     * Is this a chrome browser.
     *
     * @return bool
     */
    public function isChrome(): bool
    {
        return Parser::isChrome();
    }

    /**
     * Is this a firefox browser.
     *
     * @return bool
     */
    public function isFirefox(): bool
    {
        return Parser::isFirefox();
    }

    /**
     * Is this an opera browser.
     *
     * @return bool
     */
    public function isOpera(): bool
    {
        return Parser::isOpera();
    }

    /**
     * Is this a safari browser.
     *
     * @return bool
     */
    public function isSafari(): bool
    {
        return Parser::isSafari();
    }

    /**
     * Checks if the browser is an some kind of Internet Explorer (or Trident).
     *
     * @return bool
     */
    public function isIE(): bool
    {
        return Parser::isIE();
    }

    /**
     * Is this a microsoft edge browser.
     *
     * @return bool
     */
    public function isEdge(): bool
    {
        return Parser::isEdge();
    }

    /**
     * Check for browsers rendered inside applications like android webview.
     *
     * @return bool
     */
    public function isInApp(): bool
    {
        return Parser::isInApp();
    }

    /**
     * Is this a desktop computer.
     *
     * @return bool
     */
    public function isDesktop(): bool
    {
        return Parser::isDesktop();
    }

    /**
     * Is this a mobile device.
     *
     * @return bool
     */
    public function isMobile(): bool
    {
        return Parser::isMobile();
    }

    /**
     * Is this a tablet device.
     *
     * @return bool
     */
    public function isTablet(): bool
    {
        return Parser::isTablet();
    }

    /**
     * Is this a crawler / bot.
     *
     * @return bool
     */
    public function isBot(): bool
    {
        return Parser::isBot();
    }
}

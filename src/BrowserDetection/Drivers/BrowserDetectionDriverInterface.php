<?php

declare(strict_types=1);

namespace Uc\Detection\BrowserDetection\Drivers;

/**
 * BrowserDetectionDriverInterface defines driver methods to detect browser type.
 *
 * @package Uc\Detection\BrowserDetection\Drivers
 */
interface BrowserDetectionDriverInterface
{
    /**
     * Type of the device: [Mobile, Tablet, Desktop, and Bot]
     *
     * @return string
     */
    public function deviceType(): string;

    /**
     * Browser's human friendly name like Firefox 3.6, Chrome 42.
     *
     * @return string
     */
    public function browserName(): string;

    /**
     * Browser's human friendly version string.
     *
     * @return string
     */
    public function browserVersion(): string;

    /**
     * Browser's engine like: Blink, WebKit, Gecko.
     *
     * @return string
     */
    public function browserEngine(): string;

    /**
     * Browser's vendor like Chrome, Firefox, Opera.
     *
     * @return string
     */
    public function browserFamily(): string;

    /**
     * Is this a Chrome browser.
     *
     * @return bool
     */
    public function isChrome(): bool;

    /**
     * Is this a Firefox browser.
     *
     * @return bool
     */
    public function isFirefox(): bool;

    /**
     * Is this an Opera browser.
     *
     * @return bool
     */
    public function isOpera(): bool;

    /**
     * Is this a Safari browser.
     *
     * @return bool
     */
    public function isSafari(): bool;

    /**
     * Checks if the browser is a some version of Internet Explorer (or Trident).
     *
     * @return bool
     */
    public function isIE(): bool;

    /**
     * Is this a Microsoft Edge browser.
     *
     * @return bool
     */
    public function isEdge(): bool;

    /**
     * Check for browsers rendered inside applications like android webview.
     *
     * @return bool
     */
    public function isInApp(): bool;
}

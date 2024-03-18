<?php

declare(strict_types=1);

namespace Uc\Detection\BrowserDetection;

use Uc\Detection\BrowserDetection\Drivers\BrowserDetectionDriverInterface;

use function strtolower;

/**
 * Browser Detector methods used to detect browser type.
 *
 * @package Uc\Detection\BrowserDetection
 */
class Detector
{
    /**
     * @var \Uc\Detection\BrowserDetection\Drivers\BrowserDetectionDriverInterface
     */
    protected BrowserDetectionDriverInterface $driver;

    public function __construct(BrowserDetectionDriverInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * Type of the device: [Mobile, Tablet, Desktop, and Bot]
     *
     * @return string
     */
    public function deviceType(): string
    {
        return strtolower($this->driver->deviceType());
    }

    /**
     * Browser's human friendly name like Firefox 3.6, Chrome 42.
     *
     * @return string
     */
    public function browserName(): string
    {
        return strtolower($this->driver->browserName());
    }

    /**
     * Browser's human friendly version string.
     *
     * @return string
     */
    public function browserVersion(): string
    {
        return strtolower($this->driver->browserVersion());
    }

    /**
     * Browser's engine like: Blink, WebKit, Gecko.
     *
     * @return string
     */
    public function browserEngine(): string
    {
        return strtolower($this->driver->browserEngine());
    }

    /**
     * Browser's vendor like Chrome, Firefox, Opera.
     *
     * @return string
     */
    public function browserFamily(): string
    {
        return strtolower($this->driver->browserFamily());
    }

    /**
     * Is this a Chrome browser.
     *
     * @return bool
     */
    public function isChrome(): bool
    {
        return $this->driver->isChrome();
    }

    /**
     * Is this a firefox browser.
     *
     * @return bool
     */
    public function isFirefox(): bool
    {
        return $this->driver->isFirefox();
    }

    /**
     * Is this an opera browser.
     *
     * @return bool
     */
    public function isOpera(): bool
    {
        return $this->driver->isOpera();
    }

    /**
     * Is this a safari browser.
     *
     * @return bool
     */
    public function isSafari(): bool
    {
        return $this->driver->isSafari();
    }

    /**
     * Checks if the browser is an some kind of Internet Explorer (or Trident).
     *
     * @return bool
     */
    public function isIE(): bool
    {
        return $this->driver->isIE();
    }

    /**
     * Is this a microsoft edge browser.
     *
     * @return bool
     */
    public function isEdge(): bool
    {
        return $this->driver->isEdge();
    }

    /**
     * Check for browsers rendered inside applications like android webview.
     *
     * @return bool
     */
    public function isInApp(): bool
    {
        return $this->driver->isInApp();
    }
}

<?php

declare(strict_types = 1);

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
     * Browser's vendor like Chrome, Firefox, Opera.
     *
     * @return string
     */
    public function browserFamily() : string
    {
        return strtolower($this->driver->browserFamily());
    }

    /**
     * Is this a chrome browser.
     *
     * @return bool
     */
    public function isChrome() : bool
    {
        return $this->driver->isChrome();
    }

    /**
     * Is this a firefox browser.
     *
     * @return bool
     */
    public function isFirefox() : bool
    {
        return $this->driver->isFirefox();
    }

    /**
     * Is this an opera browser.
     *
     * @return bool
     */
    public function isOpera() : bool
    {
        return $this->driver->isOpera();
    }

    /**
     * Is this a safari browser.
     *
     * @return bool
     */
    public function isSafari() : bool
    {
        return $this->driver->isSafari();
    }

    /**
     * Checks if the browser is an some kind of Internet Explorer (or Trident).
     *
     * @return bool
     */
    public function isIE() : bool
    {
        return $this->driver->isIE();
    }

    /**
     * Is this a microsoft edge browser.
     *
     * @return bool
     */
    public function isEdge() : bool
    {
        return $this->driver->isEdge();
    }

    /**
     * Check for browsers rendered inside applications like android webview.
     *
     * @return bool
     */
    public function isInApp() : bool
    {
        return $this->driver->isInApp();
    }
}

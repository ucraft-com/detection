<?php

declare(strict_types=1);

namespace Uc\Detection\OperatingSystemDetection\Drivers;

use hisorange\BrowserDetect\Parser;

use function stripos;

/**
 * DefaultDriver is Adapter for detecting operating system.
 *
 * @package Uc\Detection\OperatingSystemDetection\Drivers
 */
class DefaultDriver implements OperatingSystemDetectionDriverInterface
{
    /**
     * Operating system's human friendly name like Windows XP, Mac 10.
     *
     * @return string
     */
    public function platformName(): string
    {
        return Parser::platformName();
    }

    /**
     * Operating system's vendor like Linux, Windows, Mac.
     *
     * @return string
     */
    public function platformFamily(): string
    {
        return Parser::platformFamily();
    }

    /**
     * Operating system's human friendly version like XP, Vista, 10.
     *
     * @return string
     */
    public function platformVersion(): string
    {
        return Parser::platformVersion();;
    }

    /**
     * Is this a windows operating system.
     *
     * @return bool
     */
    public function isWindows(): bool
    {
        return Parser::isWindows();
    }

    /**
     * Is this a linux based operating system.
     *
     * @return bool
     */
    public function isLinux(): bool
    {
        return Parser::isLinux();
    }

    /**
     * Is this an Mac based operating system.
     *
     * @return bool
     */
    public function isMac(): bool
    {
        return false !== stripos(Parser::platformFamily(), 'mac');
    }

    /**
     * Is this an IOS based operating system.
     *
     * @return bool
     */
    public function isIos(): bool
    {
        return false !== stripos(Parser::platformFamily(), 'ios');
    }

    /**
     * Is this an Android operating system.
     *
     * @return bool
     */
    public function isAndroid(): bool
    {
        return Parser::isAndroid();
    }
}

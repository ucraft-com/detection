<?php

declare(strict_types=1);

namespace Uc\Detection\OperatingSystemDetection\Drivers;

/**
 * OperatingSystemDetectionDriverInterface defines driver methods to detect OS type.
 *
 * @package Uc\Detection\OperatingSystemDetection\Drivers
 */
interface OperatingSystemDetectionDriverInterface
{
    /**
     * Operating system's human friendly name like Windows XP, Mac 10.
     *
     * @return string
     */
    public function platformName(): string;

    /**
     * Operating system's vendor like Linux, Windows, Mac.
     *
     * @return string
     */
    public function platformFamily(): string;

    /**
     * Operating system's human friendly version like XP, Vista, 10.
     *
     * @return string
     */
    public function platformVersion(): string;

    /**
     * Is this a windows operating system.
     *
     * @return bool
     */
    public function isWindows(): bool;

    /**
     * Is this a linux based operating system.
     *
     * @return bool
     */
    public function isLinux(): bool;

    /**
     * Is this a Mac based operating system.
     *
     * @return bool
     */
    public function isMac(): bool;

    /**
     * Is this an IOS based operating system.
     *
     * @return bool
     */
    public function isIos(): bool;

    /**
     * Is this an Android operating system.
     *
     * @return bool
     */
    public function isAndroid(): bool;
}

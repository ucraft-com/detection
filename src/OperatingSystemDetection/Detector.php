<?php

declare(strict_types=1);

namespace Uc\Detection\OperatingSystemDetection;

use Uc\Detection\OperatingSystemDetection\Drivers\OperatingSystemDetectionDriverInterface;

use function strtolower;

/**
 * Operating System Detector methods used to detect OS type.
 *
 * @package Uc\Detection\OperatingSystemDetection
 */
class Detector
{
    /**
     * @var \Uc\Detection\OperatingSystemDetection\Drivers\OperatingSystemDetectionDriverInterface
     */
    protected OperatingSystemDetectionDriverInterface $driver;

    public function __construct(OperatingSystemDetectionDriverInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * Operating system's human friendly name like Windows XP, Mac 10.
     *
     * @return string
     */
    public function platformName(): string
    {
        return strtolower($this->driver->platformName());
    }

    /**
     * Operating system's vendor like Linux, Windows, Mac.
     *
     * @return string
     */
    public function platformFamily(): string
    {
        return strtolower($this->driver->platformFamily());
    }

    /**
     * Operating system's human friendly version like XP, Vista, 10.
     *
     * @return string
     */
    public function platformVersion(): string
    {
        return strtolower($this->driver->platformVersion());
    }

    /**
     * Is this a windows operating system.
     *
     * @return bool
     */
    public function isWindows(): bool
    {
        return $this->driver->isWindows();
    }

    /**
     * Is this a linux based operating system.
     *
     * @return bool
     */
    public function isLinux(): bool
    {
        return $this->driver->isLinux();
    }

    /**
     * Is this an Mac based operating system.
     *
     * @return bool
     */
    public function isMac(): bool
    {
        return $this->driver->isMac();
    }

    /**
     * Is this an IOS based operating system.
     *
     * @return bool
     */
    public function isIos(): bool
    {
        return $this->driver->isIos();
    }

    /**
     * Is this an Android operating system.
     *
     * @return bool
     */
    public function isAndroid(): bool
    {
        return $this->driver->isAndroid();
    }
}

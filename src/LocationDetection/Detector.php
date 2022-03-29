<?php

declare(strict_types = 1);

namespace Uc\Detection\LocationDetection;

use Uc\Detection\LocationDetection\Drivers\LocationDetectionDriverInterface;

/**
 * Detector methods used to detect location info.
 *
 * @package Uc\Detection\LocationDetection
 */
class Detector
{
    /**
     * @var \Uc\Detection\LocationDetection\Drivers\LocationDetectionDriverInterface
     */
    protected LocationDetectionDriverInterface $driver;

    /**
     * @param \Uc\Detection\LocationDetection\Drivers\LocationDetectionDriverInterface $driver
     */
    public function __construct(LocationDetectionDriverInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * @return string
     */
    public function city() : string
    {
        return $this->driver->city();
    }

    /**
     * @return string
     */
    public function country() : string
    {
        return $this->driver->country();
    }

    /**
     * @return string
     */
    public function countryCode() : string
    {
        return $this->driver->countryCode();
    }

    /**
     * @return string
     */
    public function regionCode() : string
    {
        return $this->driver->regionCode();
    }

    /**
     * @return string
     */
    public function region() : string
    {
        return $this->driver->region();
    }

    /**
     * @return string
     */
    public function zipCode() : string
    {
        return $this->driver->zipCode();
    }

    /**
     * @return string|null
     */
    public function latitude() : ?string
    {
        return $this->driver->latitude();
    }

    /**
     * @return string|null
     */
    public function longitude() : ?string
    {
        return $this->driver->longitude();
    }
}

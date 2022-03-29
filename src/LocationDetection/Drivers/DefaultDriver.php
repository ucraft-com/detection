<?php

declare(strict_types = 1);

namespace Uc\Detection\LocationDetection\Drivers;

use Torann\GeoIP\Location;

use function geoip;

/**
 * DefaultDriver is Adapter for detecting location info.
 *
 * @package Uc\Detection\LocationDetection\Drivers
 */
class DefaultDriver implements LocationDetectionDriverInterface
{
    /**
     * @var \Torann\GeoIP\Location
     */
    protected Location $locationInfo;

    /**
     * DefaultDriver constructor.
     *
     * @param string $ip
     *
     * @throws \Exception
     */
    public function __construct(string $ip)
    {
        $this->locationInfo = geoip($ip);
    }

    /**
     * @return string
     */
    public function city() : string
    {
        return $this->locationInfo->city;
    }

    /**
     * @return string
     */
    public function country() : string
    {
        return $this->locationInfo->country;
    }

    /**
     * @return string
     */
    public function countryCode() : string
    {
        return $this->locationInfo->iso_code;
    }

    /**
     * @return string
     */
    public function regionCode() : string
    {
        return $this->locationInfo->state;
    }

    /**
     * @return string
     */
    public function region() : string
    {
        return $this->locationInfo->state_name;
    }

    /**
     * @return string
     */
    public function zipCode() : string
    {
        return $this->locationInfo->postal_code;
    }

    /**
     * @return string|null
     */
    public function latitude() : ?string
    {
        return (string) $this->locationInfo->lat;
    }

    /**
     * @return string|null
     */
    public function longitude() : ?string
    {
        return (string) $this->locationInfo->lon;
    }
}

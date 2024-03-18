<?php

declare(strict_types=1);

namespace Uc\Detection\LocationDetection\Drivers;

use Illuminate\Http\Request;

/**
 * XHTTPHeadersBasedDriver is Adapter for detecting location info.
 * Detection works based on the HTTP headers of the current request.
 *
 * @package Uc\Detection\LocationDetection\Drivers
 */
class XHTTPHeadersBasedDriver implements LocationDetectionDriverInterface
{
    public function __construct(
        protected Request $request
    ) {
    }

    /**
     * @return string
     */
    public function city(): string
    {
        return $this->request->header('X-Geoip-City', '');
    }

    /**
     * @return string
     */
    public function country(): string
    {
        return $this->request->header('X-Geoip-Country-Name', '');
    }

    /**
     * @return string
     */
    public function countryCode(): string
    {
        return $this->request->header('X-Geoip-Country-Code', '');
    }

    /**
     * @return string
     */
    public function regionCode(): string
    {
        return $this->request->header('X-Geoip-Region-Code', '');
    }

    /**
     * @return string
     */
    public function region(): string
    {
        return $this->request->header('X-Geoip-Region-Name', '');
    }

    /**
     * @return string
     */
    public function zipCode(): string
    {
        return $this->request->header('X-Geoip-Postal-Code', '');
    }

    /**
     * @return string|null
     */
    public function latitude(): ?string
    {
        return $this->request->header('X-Geoip-Latitude');
    }

    /**
     * @return string|null
     */
    public function longitude(): ?string
    {
        return $this->request->header('X-Geoip-Longitude');
    }
}

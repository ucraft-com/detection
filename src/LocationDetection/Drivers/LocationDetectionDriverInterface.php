<?php

declare(strict_types = 1);

namespace Uc\Detection\LocationDetection\Drivers;

/**
 * Interface LocationDetectionDriverInterface defines driver methods to detect OS type.
 *
 * @package Uc\Detection\LocationDetection\Drivers
 */
interface LocationDetectionDriverInterface
{
    /**
     * @return string
     */
    public function city() : string;

    /**
     * @return string
     */
    public function country() : string;

    /**
     * @return string
     */
    public function countryCode() : string;

    /**
     * @return string
     */
    public function regionCode() : string;

    /**
     * @return string
     */
    public function region() : string;

    /**
     * @return string
     */
    public function zipCode() : string;

    /**
     * @return string|null
     */
    public function latitude() : ?string;

    /**
     * @return string|null
     */
    public function longitude() : ?string;
}

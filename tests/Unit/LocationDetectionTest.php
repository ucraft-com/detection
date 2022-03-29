<?php

declare(strict_types = 1);

namespace Uc\Detection\Tests\Unit;

use Torann\GeoIP\GeoIPServiceProvider;
use Uc\Detection\LocationDetection\Detector;
use Uc\Detection\LocationDetection\Drivers\DefaultDriver;
use Uc\Detection\Tests\TestCase;

class LocationDetectionTest extends TestCase
{
    public function setUp() : void
    {
        parent::setUp();

        $this->app->register(GeoIPServiceProvider::class);
    }

    public function testCountry_ReturnsUnitedStates() : void
    {
        $detector = $this->getDetectorInstance();

        $this->assertEquals('United States', $detector->country());
    }

    public function testCity_ReturnsMiami() : void
    {
        $detector = $this->getDetectorInstance();

        $this->assertEquals('Miami', $detector->city());
    }

    public function testCountryCode_ReturnsUS() : void
    {
        $detector = $this->getDetectorInstance();

        $this->assertEquals('US', $detector->countryCode());
    }

    public function testRegion_ReturnsFlorida() : void
    {
        $detector = $this->getDetectorInstance();

        $this->assertEquals('Florida', $detector->region());
    }

    public function testRegionCode_ReturnsFL() : void
    {
        $detector = $this->getDetectorInstance();

        $this->assertEquals('FL', $detector->regionCode());
    }

    public function testLatitude_ReturnsLocationLatitude() : void
    {
        $detector = $this->getDetectorInstance();

        $this->assertStringStartsWith('25.', $detector->latitude());
    }

    public function testLongitude_ReturnsLocationLongitude() : void
    {
        $detector = $this->getDetectorInstance();

        $this->assertStringStartsWith('-80.', $detector->longitude());
    }

    protected function getDetectorInstance() : Detector
    {
        return new Detector(new DefaultDriver('162.254.206.227'));
    }
}

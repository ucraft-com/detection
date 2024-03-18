<?php

declare(strict_types=1);

namespace Uc\Detection\Tests\Unit;

use Illuminate\Http\Request;
use Uc\Detection\LocationDetection\Detector;
use Uc\Detection\LocationDetection\Drivers\XHTTPHeadersBasedDriver;
use Uc\Detection\Tests\TestCase;

class LocationDetectionWithXDriverTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        $_SERVER['HTTP_X_GEOIP_CITY'] = 'Yerevan';
        $_SERVER['HTTP_X_GEOIP_COUNTRY_NAME'] = 'Armenia';
        $_SERVER['HTTP_X_GEOIP_COUNTRY_CODE'] = 'AM';
        $_SERVER['HTTP_X_GEOIP_REGION_NAME'] = 'Yerevan';
        $_SERVER['HTTP_X_GEOIP_REGION_CODE'] = 'ER';
        $_SERVER['HTTP_X_GEOIP_LONGITUDE'] = 44.50990;
        $_SERVER['HTTP_X_GEOIP_LATITUDE'] = 40.18170;
    }

    public function testCountry_ReturnsRightCountry() : void
    {
        $detector = $this->getDetectorInstance();

        $this->assertEquals('Armenia', $detector->country());
    }

    public function testCity_ReturnsRightCity() : void
    {
        $detector = $this->getDetectorInstance();

        $this->assertEquals('Yerevan', $detector->city());
    }

    public function testCountryCode_ReturnsRightCountryCode() : void
    {
        $detector = $this->getDetectorInstance();

        $this->assertEquals('AM', $detector->countryCode());
    }

    public function testRegion_ReturnsRightRegion() : void
    {
        $detector = $this->getDetectorInstance();

        $this->assertEquals('Yerevan', $detector->region());
    }

    public function testRegionCode_ReturnsRightRegionCode() : void
    {
        $detector = $this->getDetectorInstance();

        $this->assertEquals('ER', $detector->regionCode());
    }

    public function testLatitude_ReturnsLocationLatitude() : void
    {
        $detector = $this->getDetectorInstance();

        $this->assertStringStartsWith('40.', (string)$detector->latitude());
    }

    public function testLongitude_ReturnsLocationLongitude() : void
    {
        $detector = $this->getDetectorInstance();

        $this->assertStringStartsWith('44.', $detector->longitude());
    }

    protected function getDetectorInstance(): Detector
    {
        return new Detector(new XHTTPHeadersBasedDriver(Request::capture()));
    }
}

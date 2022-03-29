<?php

declare(strict_types = 1);

namespace Uc\Detection\Tests\Unit;

use Uc\Detection\OperatingSystemDetection\Detector;
use Uc\Detection\OperatingSystemDetection\Drivers\DefaultDriver;
use Uc\Detection\Tests\TestCase;

class OperatingSystemDetectionTest extends TestCase
{
    public function testPlatformFamily_ReturnsPlatformFamilyName() : void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36';

        $osDetector = $this->getDetectorInstance();

        $this->assertEquals('gnu/linux', $osDetector->platformFamily());
    }

    public function testPlatformFamily_WhenUserAgentIsEmpty_ReturnsPlatformFamilyName() : void
    {
        $_SERVER['HTTP_USER_AGENT'] = '';

        $osDetector = $this->getDetectorInstance();

        $this->assertEquals('unknown', $osDetector->platformFamily());
    }

    public function testIsWindows_ReturnsTrue() : void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (Windows NT 5.1; rv:11.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36';

        $osDetector = $this->getDetectorInstance();

        $this->assertTrue($osDetector->isWindows());
    }

    public function testIsMac_ReturnsTrue() : void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_3) AppleWebKit/534.55.3 (KHTML, like Gecko) Version/5.1.5 Safari/534.55.3';

        $osDetector = $this->getDetectorInstance();

        $this->assertTrue($osDetector->isMac());
    }

    public function testIsIos_ReturnsTrue() : void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_2 like Mac OS X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36';

        $osDetector = $this->getDetectorInstance();

        $this->assertTrue($osDetector->isIos());
    }

    public function testIsAndroid_ReturnsTrue() : void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (Android 2.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36';

        $osDetector = $this->getDetectorInstance();

        $this->assertTrue($osDetector->isAndroid());
    }

    public function testIsLinux_ReturnsTrue() : void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36';

        $osDetector = $this->getDetectorInstance();

        $this->assertTrue($osDetector->isLinux());
    }

    /**
     * Get os detector instance for testing environment.
     *
     * @return \Uc\Detection\OperatingSystemDetection\Detector
     */
    protected function getDetectorInstance() : Detector
    {
        return new Detector(new DefaultDriver());
    }
}

<?php

declare(strict_types=1);

namespace Uc\Detection\Tests\Unit;

use Uc\Detection\BrowserDetection\Detector;
use Uc\Detection\BrowserDetection\Drivers\DefaultDriver;
use Uc\Detection\Tests\TestCase;

class BrowserDetectionTest extends TestCase
{
    public function testDeviceType_ReturnsDesktop(): void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36';

        $browserDetector = $this->getDetectorInstance();

        $this->assertEquals('desktop', $browserDetector->deviceType());
    }

    public function testDeviceType_ReturnsMobile(): void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36';

        $browserDetector = $this->getDetectorInstance();

        $this->assertEquals('mobile', $browserDetector->deviceType());
    }

    public function testBrowserFamily_ReturnsBrowserFamilyName(): void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36';

        $browserDetector = $this->getDetectorInstance();

        $this->assertEquals('chrome', $browserDetector->browserFamily());
    }

    public function testBrowserName_ReturnsBrowserName(): void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36';

        $browserDetector = $this->getDetectorInstance();

        $this->assertEquals('chrome 91.0.4472', $browserDetector->browserName());
    }

    public function testBrowserVersion_ReturnsBrowserVersion():void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36';

        $browserDetector = $this->getDetectorInstance();

        $this->assertEquals('91.0.4472', $browserDetector->browserVersion());
    }

    public function testBrowserEngine_ReturnsBrowserEngine(): void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36';

        $browserDetector = $this->getDetectorInstance();

        $this->assertEquals('blink', $browserDetector->browserEngine());
    }

    public function testBrowserFamily_WhenUserAgentIsEmpty_ReturnsUnknown(): void
    {
        $_SERVER['HTTP_USER_AGENT'] = '';

        $browserDetector = $this->getDetectorInstance();

        $this->assertEquals('unknown', $browserDetector->browserFamily());
    }

    public function testIsChrome_ReturnsTrue(): void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36';

        $browserDetector = $this->getDetectorInstance();

        $this->assertTrue($browserDetector->isChrome());
    }

    public function testIsFirefox_ReturnsTrue(): void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Firefox/64.0';

        $browserDetector = $this->getDetectorInstance();

        $this->assertTrue($browserDetector->isFirefox());
    }

    public function testIsOpera_ReturnsTrue(): void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Opera/9.80 (X11; Linux x86_64) Presto/2.12.388 Version/12.16';

        $browserDetector = $this->getDetectorInstance();

        $this->assertTrue($browserDetector->isOpera());
    }

    public function testIsSafari_ReturnsTrue(): void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.75.14 (KHTML, like Gecko) Version/7.0.3 Safari/7046A194A';

        $browserDetector = $this->getDetectorInstance();

        $this->assertTrue($browserDetector->isSafari());
    }

    public function testIsEdge_ReturnsTrue(): void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36 Edge/14.14931';

        $browserDetector = $this->getDetectorInstance();

        $this->assertTrue($browserDetector->isEdge());
    }

    public function testIsIE_ReturnsTrue(): void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (compatible, MSIE 11, Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko';

        $browserDetector = $this->getDetectorInstance();

        $this->assertTrue($browserDetector->isIE());
    }

    public function testIsInApp_WhenUsingDesktop_ReturnsFalse(): void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36';

        $browserDetector = $this->getDetectorInstance();

        $this->assertFalse($browserDetector->isInApp());
    }

    public function testIsInApp_ReturnsTrue(): void
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (iPhone; CPU iPhone OS 8_2 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Mobile/12D508 [FBAN/FBIOS;FBAV/27.0.0.10.12;FBBV/8291884;FBDV/iPhone7,1;FBMD/iPhone;FBSN/iPhone OS;FBSV/8.2;FBSS/3; FBCR/vodafoneIE;FBID/phone;FBLC/en_US;FBOP/5]';

        $browserDetector = $this->getDetectorInstance();

        $this->assertTrue($browserDetector->isInApp());
    }

    /**
     * Get browser detector instance for testing environment.
     *
     * @return \Uc\Detection\BrowserDetection\Detector
     */
    protected function getDetectorInstance(): Detector
    {
        return new Detector(new DefaultDriver());
    }
}

<?php

declare(strict_types = 1);

namespace Uc\Detection;

use Illuminate\Foundation\Application;
use Uc\Detection\OperatingSystemDetection\Detector as OperatingSystemDetector;
use Uc\Detection\OperatingSystemDetection\Drivers\DefaultDriver as OperatingSystemDefaultDriver;
use Uc\Detection\OperatingSystemDetection\Drivers\OperatingSystemDetectionDriverInterface;

use Uc\Detection\BrowserDetection\Detector as BrowserDetector;
use Uc\Detection\BrowserDetection\Drivers\BrowserDetectionDriverInterface;
use Uc\Detection\BrowserDetection\Drivers\DefaultDriver as BrowserDefaultDriver;

use Uc\Detection\LocationDetection\Detector as LocationDetector;
use Uc\Detection\LocationDetection\Drivers\DefaultDriver as LocationDefaultDriver;
use Uc\Detection\LocationDetection\Drivers\LocationDetectionDriverInterface;

use Illuminate\Support\ServiceProvider;

class DetectionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(OperatingSystemDetectionDriverInterface::class, function () {
            return new OperatingSystemDefaultDriver();
        });

        $this->app->singleton(OperatingSystemDetector::class, function () {
            return new OperatingSystemDetector(
                $this->app->get(OperatingSystemDetectionDriverInterface::class)
            );
        });

        $this->app->bind(BrowserDetectionDriverInterface::class, function () {
            return new BrowserDefaultDriver();
        });

        $this->app->singleton(BrowserDetector::class, function () {
            return new BrowserDetector($this->app->get(BrowserDetectionDriverInterface::class));
        });

        $this->app->bind(LocationDetectionDriverInterface::class, function (Application $app) {
            return new LocationDefaultDriver((string) $app['request']->ip());
        });

        $this->app->singleton(LocationDetector::class, function () {
            return new LocationDetector(
                $this->app->get(LocationDetectionDriverInterface::class)
            );
        });
    }
}

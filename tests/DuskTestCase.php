<?php

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        static::startChromeDriver();


    }



    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $options = (new ChromeOptions)->addArguments([
            '--disable-gpu',
            '--headless',
            '--window-size=1920,1080',
        ]);

        return RemoteWebDriver::create(
            'http://localhost:9515', DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
        );
    }

    protected function captureFailuresFor($browsers)
    {
        $browsers->each(function (Browser $browser, $key) {
          $body = $browser->driver->findElement(WebDriverBy::tagName('body'));
            if (!empty($body)) {
                $currentSize = $body->getSize();
                $size = new WebDriverDimension($currentSize->getWidth(), $currentSize->getHeight());
                $browser->driver->manage()->window()->setSize($size);
            }
            $browser->screenshot('failure-'.$this->getName().'-'.$key);
        });
    }
}

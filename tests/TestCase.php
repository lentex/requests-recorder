<?php

namespace Lentex\RequestsRecorder\Tests;

use Lentex\RequestsRecorder\RequestsRecorderServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            RequestsRecorderServiceProvider::class,
        ];
    }
}

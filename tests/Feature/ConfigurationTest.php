<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    public function testConfiG()
    {
        $firstName = config('contoh.author.first');
        $lastName = config('contoh.author.last');
        $email = config('contoh.email');
        $web = config('contoh.web');

        self::assertEquals('sugeng', $firstName);
        self::assertEquals('Itgenic', $lastName);
        self::assertEquals('sugeng.wanantara@gmail.com', $email);
        self::assertEquals('https://itgenic.co.id', $web);
    }
}

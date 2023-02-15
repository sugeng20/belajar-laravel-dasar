<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    public function testResponse()
    {
        $this->get('/response/hello')
            ->assertStatus(200)
            ->assertSeeText('hello response');
    }

    public function testHeader()
    {
        $this->get('/response/header')
            ->assertStatus(200)
            ->assertSeeText('Sugeng', 'Itgenic')
            ->assertHeader('Content-Type', 'application/json')
            ->assertHeader('Author', 'Sugeng Itgenic')
            ->assertHeader('App', 'Belajar Laravel Dasar');
    }

    public function testView()
    {
        $this->get('/response/type/view')
            ->assertSeeText('Hello Sugeng');
    }

    public function testJson()
    {
        $this->get('/response/type/json')
            ->assertJson([
                'firstName' => 'Sugeng',
                'lastName' => 'Itgenic'
            ]);
    }

    public function testFile()
    {
        $this->get('response/type/file')
            ->assertHeader('Content-Type', 'image/png');
    }

    public function download()
    {
        $this->get('/response/type/download')
            ->assertDownload('sugeng.png');
    }


}

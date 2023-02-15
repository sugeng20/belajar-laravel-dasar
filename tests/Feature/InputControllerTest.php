<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testInput()
    {
        $this->get('/input/hello?name=Sugeng')
            ->assertSeeText('Hello Sugeng');

        $this->post('/input/hello', ['name' => 'Sugeng'])
            ->assertSeeText('Hello Sugeng');
    }

    public function testInputNested()
    {
        $this->post('/input/hello/first', [
            'name' => [
                'first' => 'Sugeng',
                'last'  => 'Itgenic'
            ]
        ])->assertSeeText('Hello Sugeng');
    }

    public function testInputAll()
    {
        $this->post('/input/hello/input', [
            'name' => [
                'first' => 'Sugeng',
                'last'  => 'Itgenic'
            ]
        ])->assertSeeText('name')->assertSeeText('first')
        ->assertSeeText('last')->assertSeeText('Sugeng')
        ->assertSeeText('Itgenic');
    }

    public function testInputArrat()
    {
        $this->post('/input/hello/array', [
            'products' => [
                [
                    'name' => 'Apple Mac Book Pro',
                    'price' => 300000000,
                ],
                [
                    'name' => 'Samsung Galaxy S10',
                    'price' => 150000000,
                ]
            ]
        ])->assertSeeText('Apple Mac Book Pro')
        ->assertSeeText('Samsung Galaxy S10');
    }

    public function testInputType()
    {
        $this->post('/input/type', [
            'name' => 'Sugeng',
            'married' => 'false',
            'birth_date' => '2001-11-20'
        ])->assertSeeText('Sugeng')->assertSeeText('false')
            ->assertSeeText('2001-11-20');
    }

    public function testFilterOnly()
    {
        $this->post('/input/filter/only', [
            'name' => [
                'first' => 'Sugeng',
                'middle' => 'Bae',
                'last' => 'Jeh'
            ]
        ])->assertSeeText('Sugeng')->assertSeeText('Jeh')
            ->assertDontSeeText('Bae');
    }

    public function testFilterExcept()
    {
        $this->post('/input/filter/except', [
            'username' => 'sugengdaily',
            'password' => 'adakamuakuada',
            'admin' => 'true'
        ])->assertSeeText('sugengdaily')->assertSeeText('adakamuakuada')
            ->assertDontSeeText('admin');
    }

    public function testFilterMerge()
    {
        $this->post('/input/filter/merge', [
            'username' => 'sugengdaily',
            'password' => 'adakamuakuada',
            'admin' => 'true'
        ])->assertSeeText('sugengdaily')->assertSeeText('adakamuakuada')
            ->assertSeeText('admin')->assertSeeText('false');
    }
    
}

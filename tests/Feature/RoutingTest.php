<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testGet()
    {
        $this->get('/itgenic')
            ->assertStatus(200)
            ->assertSeeText('Hello Itgenic');
    }

    public function testRedirect()
    {
        $this->get('/youtube')
            ->assertRedirect('/itgenic');
    }

    public function testFallback()
    {
        $this->get('/tidakada')
            ->assertSeeText('404 by sugeng');
    }

    public function testRouteParameter()
    {
        $this->get('products/1')
            ->assertSeeText('Product 1');
        
        $this->get('products/2')
            ->assertSeeText('Product 2');

        $this->get('products/1/items/XXX')
            ->assertSeeText('Product 1, Item XXX');

        $this->get('products/2/items/YYY')
            ->assertSeeText('Product 2, Item YYY');
    }

    public function testRouteParameterRegex()
    {
        $this->get('categories/1')
            ->assertSeeText('Category 1');

        $this->get('categories/salah')
            ->assertSeeText('404 by sugeng');
    }

    public function testRouteParameterOptional()
    {
        $this->get('users/sugeng')
            ->assertSeeText('User sugeng');

        $this->get('users')
            ->assertSeeText('User 404');
    }

    public function testRouteParameterConflict()
    {
        $this->get('conflicts/geng')
            ->assertSeeText('Conflict geng');

        $this->get('conflicts/sugeng')
            ->assertSeeText('Conflict sugeng oke');
    }

    public function testNamedRoute()
    {
        $this->get('/produk-redirect/12345')
            ->assertRedirect('/products/12345');
    }
}

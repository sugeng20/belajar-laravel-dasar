<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    public function testView()
    {
        $this->get('/hello')
            ->assertSeeText('Hello Sugeng');

        $this->get('/hello-again')
            ->assertSeeText('Hello Sugeng');
    }

    public function testNested()
    {
        $this->get('/hello-world')
            ->assertSeeText('World Sugeng');
    }

    public function testTemplate()
    {
        $this->view('hello.world', ['name' => 'Sugeng'])
            ->assertSeeText('World Sugeng');
    }
}

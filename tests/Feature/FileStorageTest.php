<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileStorageTest extends TestCase
{
    public function testStorage()
    {
        $fileSystem = Storage::disk('local');

        $fileSystem->put('file.text', 'Sugeng bae jeh');

        $content = $fileSystem->get('file.text');

        self::assertEquals('Sugeng bae jeh', $content);
    }

    public function testPublic()
    {
        $fileSystem = Storage::disk('public');

        $fileSystem->put('file.text', 'Sugeng bae jeh');

        $content = $fileSystem->get('file.text');

        self::assertEquals('Sugeng bae jeh', $content);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class FileControllerTest extends TestCase
{
    public function testUpload()
    {
        $picture = UploadedFile::fake()->image('sugeng.png');

        $this->post('/file/upload', [
            'pictures' => $picture
        ])->assertSeeText('OK sugeng.png');
    }
}

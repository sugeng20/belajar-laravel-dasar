<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request) :string
    {
        $picture = $request->file('pictures');

        $picture->storePubliclyAs('pictures', $picture->getClientOriginalName(), 'public');

        return "OK " . $picture->getClientOriginalName();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function denoiseImage(Request $request)
    {
        $file = $request->file('image_file');
        $path = $file->store('images');

        $name = basename($path);

        $result = Process::run("python3 ");

        dd($name);
    }
}

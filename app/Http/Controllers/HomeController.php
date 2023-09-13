<?php

namespace App\Http\Controllers;

use App\Enums\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $viewData = ['filters' => Filter::all()];

        $data = Session::get('data');

        if ($data) {
            $pathInfo = pathinfo($data['image']);
            $originalImage = '/storage/' . $data['image'];
            $denoisedImage = '/storage/' . ($pathInfo['filename'] . '-denoised.' . $pathInfo['extension']);

            $viewData['showPreview'] = true;
            $viewData['filterType'] = Filter::from($data['filter_type'])->name();
            $viewData['kernel'] = $data['kernel'];
            $viewData['originalImage'] = $originalImage;
            $viewData['denoisedImage'] = $denoisedImage;
        }

        return view('welcome', $viewData);
    }

    public function denoiseImage(Request $request)
    {
        $request->validate([
            'image_file' => 'required|file|max:2048',
        ], [
            'image_file' => 'File is not valid or not allowed size. Maximum allowed size is 2MB.',
        ]);

        $data = $request->all();

        $path = $request->file('image_file')->store('public');

        $pathInfo = pathinfo($path);

        $originalImage = Storage::path("/public/{$pathInfo['basename']}");
        $savePath = Storage::path("/public/{$pathInfo['filename']}-denoised.{$pathInfo['extension']}");
        $index = base_path('scripts/index.py');

        Process::run("python3 {$index} {$originalImage} {$savePath} --filter_type={$data['filter_type']} --blur_ksize={$data['kernel']}");

        return back()->with(['data' => [
            'image' => pathinfo($originalImage)['basename'],
            'filter_type' => $data['filter_type'],
            'kernel' => $data['kernel'],
        ]]);
    }
}

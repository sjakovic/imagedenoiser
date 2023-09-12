<?php

namespace App\Http\Controllers;

use App\Enums\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = ['filters' => Filter::all()];

        $data = Session::get('data');

        if ($data) {
            $pathInfo = pathinfo($data['image']);
            $originalImage = '/storage/' . $data['image'];
            $denoisedImage = '/storage/' . ($pathInfo['filename'] . '-denoised.' . $pathInfo['extension']);

            $viewData['showPreview'] = true;
            $viewData['filterType'] = $data['filter_type'];
            $viewData['kernel'] = $data['kernel'];
            $viewData['originalImage'] = $originalImage;
            $viewData['denoisedImage'] = $denoisedImage;
        }

        return view('welcome', $viewData);
    }

    public function denoiseImage(Request $request)
    {
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

<?php

namespace App\Http\Controllers\VueJs;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(): View
    {
        $metaData = json_decode(File::get(resource_path('data/meta/index.json')), true);
        return view('vuejs/index', [
            'metaData' => $metaData
        ]);
    }

    public function todo(): View
    {
        $metaData = json_decode(File::get(resource_path('data/meta/todo.json')), true);
        return view('vuejs/index', [
            'metaData' => $metaData
        ]);
    }

    public function notFound(): View
    {
        $metaData = json_decode(File::get(resource_path('data/meta/notfound.json')), true);        
        return view('vuejs/index', [
            'metaData' => $metaData
        ]);
    }
}

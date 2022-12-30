<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadStoreRequest;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller {
    
    public function index()
    {
        return view('pages.uploads.index');
    }

    public function show($slug)
    {
        return view('pages.uploads.show', [
            'slug' => $slug,
        ]);
    }

    public function store(UploadStoreRequest $request) 
    {        
        $slug = substr(md5(time()), 0, 15);
        $extension = $request->upload->extension();
        $name = $slug . '.' . $extension;

        $store = Storage::disk('s3')->putFileAs('uploads', $request->upload, $name);        
        
        $upload = Upload::create([
            'slug' => $slug,
            'extension' => $extension,
            'user_id' => auth()->user()->id,
        ]);
        
        return response()->json([
            'data' => [
                'link' => env('APP_URL') . 'uploads/' . $upload->slug,
            ]
        ]);
    }
}

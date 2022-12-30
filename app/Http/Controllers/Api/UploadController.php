<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UploadStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Services\UploadService;
use App\Models\Upload;

class UploadController extends Controller {
    
    public function getUploads(UploadService $service)
    {
        $uploads = $service->getUploads();

        return response()->json([
            'data' => $uploads,
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

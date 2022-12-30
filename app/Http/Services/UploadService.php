<?php 

namespace App\Services;

class UploadService {
    public function getUploads() 
    {
        $uploads = 
            auth()
            ->user()
            ->uploads()
            ->latest()
            ->get()
            ->map(function($upload) {
                return [
                    'slug' => $upload->slug,
                    'created_at' => $upload->created_at,
                    'url' => $upload->url(),
                ];
            });

        $dates = [];
        foreach ($uploads as $upload) {
            $date = $upload['created_at']->format('F Y');
            $dates[$date][] = $upload;
        }

        return dates;
    }
}
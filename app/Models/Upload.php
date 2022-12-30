<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'extension',
        'user_id',
    ];

    protected $cast = [
        'created_at' => 'datetime',
    ];

    protected $DEFAULT_IMAGE_URL = 'https://via.placeholder.com/150';

    /**
     * Get the user that owns the upload.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the url for the upload attribute.
     */
    public function url()
    {
        if (Storage::disk('s3')->exists('uploads/' . $this->slug . '.' . $this->extension)) {
            return Storage::disk('s3')->temporaryUrl('uploads/' . $this->slug . '.' . $this->extension, now()->addMinutes(5));
        }

        return $this->DEFAULT_IMAGE_URL;
    }
}

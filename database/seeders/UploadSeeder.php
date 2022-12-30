<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Upload;

class UploadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 25; $i++) {
            sleep(1);

            // Create an upload with a created_at between now and 8 months ago and random day and time
            $upload = Upload::create([
                'slug' => substr(md5(time()), 0, 15),
                'extension' => 'jpg',
                'user_id' => 2,
                'created_at' => now()->subMonths(rand(0, 8))->subDays(rand(0, 30))->subHours(rand(0, 23))->subMinutes(rand(0, 59))->subSeconds(rand(0, 59)),
            ]);
        }
    }
}

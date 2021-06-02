<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        config()->set('seeding', true);

        $this->preparePhotoDirectory();

        $this->call([
            PhotoSeeder::class,
            UserSeeder::class,
            CustomerSeeder::class
        ]);

        config()->set('seeding', false);
    }

    protected function preparePhotoDirectory(): void
    {
        $filepath = public_path('storage/photos/testing');

        if (!File::exists($filepath)) {
            File::makeDirectory($filepath);
        } else {
            File::cleanDirectory($filepath);
        }
    }
}

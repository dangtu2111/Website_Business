<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name'          => 'BLOG',
                'slug'          => 'blog',
                'iframe'        => null,
                'icon'          => null,
                'cover_image'   => 'http://127.0.0.1:8000/storage/photos/1/cover_1728639357_6826272568245068.jpg',
                'description'   => null,
                'sort_order'    => 0,
                'status'        => true,
                'require_login' => false,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'name'          => 'Sự kiện',
                'slug'          => 'su-kien',
                'iframe'        => null,
                'icon'          => null,
                'cover_image'   => 'http://127.0.0.1:8000/storage/photos/1/cover_1728639357_6826272568245068.jpg',
                'description'   => null,
                'sort_order'    => 0,
                'status'        => true,
                'require_login' => false,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'name'          => 'Chung',
                'slug'          => 'chung',
                'iframe'        => null,
                'icon'          => null,
                'cover_image'   => 'http://127.0.0.1:8000/storage/photos/1/cover_1728639357_6826272568245068.jpg',
                'description'   => null,
                'sort_order'    => 0,
                'status'        => true,
                'require_login' => false,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'name'          => 'Tin tức',
                'slug'          => 'tin-tuc',
                'iframe'        => null,
                'icon'          => null,
                'cover_image'   => 'http://127.0.0.1:8000/storage/photos/1/cover_1728639357_6826272568245068.jpg',
                'description'   => null,
                'sort_order'    => 0,
                'status'        => true,
                'require_login' => false,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
        ]);
    }
}

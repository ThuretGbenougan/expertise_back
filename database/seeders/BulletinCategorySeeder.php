<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BulletinCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ["Conseil du jour", "Ma semaine financière"];

        foreach ($data as $key => $value) {
            DB::table('bulletin_categories')->insert([
                'title' => $value,
                'slug' => Str::slug($value),
            ]);
        }
    }
}

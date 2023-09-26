<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'=>'アニメ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('categories')->insert([
            'name'=>'漫画',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

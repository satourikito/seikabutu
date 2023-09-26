<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'おはよう', // タイトルをランダムな文字列で生成
            'body' => 'こんにちは',  // 本文をランダムな文字列で生成
            'category_id' => 1,         // カテゴリーIDを適切な値に設定
            'user_id' => 1,             // ユーザーIDを適切な値に設定
            'created_at' =>  new DateTime(),
            'updated_at' =>  new DateTime(),
            ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $following_data=[
            ['user_id'=>1,'following_user_id'=>3],
            ['user_id'=>2,'following_user_id'=>3],
            ['user_id'=>3,'following_user_id'=>1],
        ];
        
        foreach($followig_data as $following_values){
            $following= new \App\Following();
            $following->user_id=$following_values['user_id'];
            $following->following_user_id=$following_values['following_user_id'];
            $following->save();
        }
    }
}

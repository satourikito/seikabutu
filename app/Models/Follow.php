<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;
    
    protected $fillable = ['followed_user_id', 'user_id'];
    
    // public function user()
    // {
    //     return $this->belongsToMany(User::class,);
    // }
    
    // public $timestamps = false;//followsテーブルにtimestampsがないので
    
    public function user()
    {
        return $this->belongsTo(User::class, 'followed_user_id');
    }

    public function followingUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}

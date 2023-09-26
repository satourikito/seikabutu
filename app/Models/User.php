<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Like;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'category_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // User.php モデルファイル
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function category()
    {
        return $this->hasOne(Category::class);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    
    // 自分 (繋ぎ元) がフォローしているユーザー (繋ぎ先) をリレーション
    // 自分 -> 自分がフォローしているユーザー
    public function followings(){
        return $this->belongsToMany(User::class, 'follows', 'follower_user_id', 'followee_user_id');
    }
    
    // 自分 (繋ぎ先) をフォローしているユーザー = フォロワー (繋ぎ元) をリレーション
    // フォロワー -> 自分
    public function followers(){
        return $this->belongsToMany(User::class, 'follows', 'followee_user_id', 'follower_user_id');
        
    }

}

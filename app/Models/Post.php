<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'user_id',
        
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // Post.php モデルファイル
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function is_liked_by_auth_user()
    {
        $id = \Auth::id();
        //likersを空の配列として定義
        $likers = array();
        //foreachでlikesリレーションを用いて$likeに$thisとlikesテーブルの情報を格納
        foreach($this->likes as $like) {
            //array_pushで配列likersに＄like($thisと関連するikesテーブルの情報、今回は＄postとlikeテーブル)のuser_idを取得
            array_push($likers, $like->user_id);
        }
        
        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
    
}
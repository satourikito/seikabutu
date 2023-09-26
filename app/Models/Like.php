<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    
    // モデルに関連するテーブル名を指定
    protected $table = 'likes';

    // モデルのプライマリキーを指定（デフォルトは'id'ですが、変更が必要な場合に設定）
    protected $primaryKey = 'id';

    // モデルのフィールドの設定（'user_id'と'post_id'が外部キーであることを指定）
    protected $fillable = [
        'user_id',
        'post_id',
    ];

    // 他のモデルとのリレーションを定義
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

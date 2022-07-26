<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'user_id',
        'content'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'article_categories');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'article_id');
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

}

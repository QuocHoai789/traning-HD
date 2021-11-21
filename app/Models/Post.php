<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    public function category(){
       return $this->belongsToMany('App\Models\Category', 'category_post', 'post_id', 'category_id');
    }

    public function author(){
        return $this->belongsTo('App\Models\Admin', 'author_id');
    }
    public function user(){
        return $this->belongsToMany('App\Models\User', 'user_post', 'post_id', 'user_id');
     }
     
}

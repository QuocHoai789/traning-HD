<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts';

    public function category(){
       return $this->belongsToMany('App\Models\Categories', 'category_post', 'post_id', 'category_id');
    }

    public function author(){
        return $this->belongsTo('App\Models\Admin', 'author_id');
    }
}

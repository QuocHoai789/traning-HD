<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
class Category extends Model
{
    use HasFactory;

    use NodeTrait;

    protected $fillable = [
        'name',
        
    ];
    public function post(){
        return $this->belongsToMany('App\Models\Post', 'category_post', 'category_id', 'post_id');
    }
    
}

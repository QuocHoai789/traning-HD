<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
class Categories extends Model
{
    use HasFactory;

    use NodeTrait;

    protected $fillable = [
        'name',
        
    ];
    public function post(){
        return $this->belongsToMany('App\Models\Posts', 'category_post', 'category_id', 'post_id');
    }
    
}

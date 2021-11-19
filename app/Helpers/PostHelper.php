<?php

use App\Models\Post;
 
function getTitle($id){
    
    $post = Post::find($id);
    return $post->title;

}

?>
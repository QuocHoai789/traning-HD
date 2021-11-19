<?php

use App\Models\Posts;
 
function getTitle($id){
    
    $post = Posts::find($id);
    return $post->title;

}

?>
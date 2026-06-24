<?php

use App\Models\Blog;
use App\Models\Template;
use Illuminate\Support\Facades\DB;

function get_cat_names($ids){
    $output = '';
    $each = explode(',', $ids);
    foreach ($each as $key => $value) {
        $cat_data = DB::table('categories')->where('id', $value)->first();
        if($cat_data !== null){
            $output .= $cat_data->name.' , ';
        }
    }
    return $output;
}


function get_cat_names_admin($ids){
    $output = '';
    $each = explode(',', $ids);
    foreach ($each as $key => $value) {
        $cat_data = DB::table('categories')->where('id', $value)->first();
        if($cat_data !== null){
            $output .= $cat_data->name.' <br> ';
        }
    }
    return $output;
}


function get_writter($by){ 
    $cat_data = DB::table('users')->where('id', $by)->first(); 
    return $cat_data == null ? ' Unkown Writter' : $cat_data->name;
}

 

function get_blog_cat($ids){ 
    $output = '';
    $each = explode(',', $ids);
    foreach ($each as $key => $value) {
        $cat_data = DB::table('categories')->where('id', $value)->first();
        if($cat_data !== null){
            $output .= '<li class="d-block">'.$cat_data->name.'</li>';
        }
    }
    return $output;
}
 

function get_blog_cat_front_end($ids){ 
    $output = '';
    $each = explode(',', $ids);
    foreach ($each as $key => $value) {
        $cat_data = DB::table('categories')->where('id', $value)->first();
        if($cat_data !== null){
            $output .= $cat_data->name.' | ';
        }
    }
    return $output;
}



function get_profile_image($user_id){
    $image_path = 'front/images/user.png';
    $cat_data = DB::table('users')->where('id', $user_id)->first(); 
    if($cat_data !== null){
        if($cat_data->photo !== null){
            $image_path = 'storage/'.$cat_data->photo;
        }
    }
    return $image_path;
}

function get_last_position(){
    $max = Blog::max('position'); 
    return $max !== null ? $max+1 : 1;
}

function create_link($link){
    return strtolower(str_replace(' ','-',str_replace('-','_',$link)));
}

function reverse_link($link){
    return strtolower(str_replace('_','-',str_replace('-',' ', $link)));
}

function slogan(){
    return 'Sprint Learn & Earn';
}

function make_blog_url($blog_id){
    $find_blog = Blog::join('categories', 'categories.id', 'blogs.cat_id')
    ->where('blogs.id', $blog_id)->select('blogs.slug', 'categories.name as category')->first();
    if(isset($find_blog->category) && !empty($find_blog->category)){
        $category = $find_blog->category;
    }else{
        $category = '';
    }
    if(isset($find_blog->slug) && !empty($find_blog->slug)){
        $slug = $find_blog->slug;
    }else{
        $slug = '';
    }
    $url = strtolower(urlencode($category.'/'.$slug));
    return $url;
}

function make_template_url($temp_id){
    $find_temp = Template::join('categories', 'categories.id', 'templates.cat_id')
    ->where('templates.id', $temp_id)->select('templates.slug', 'categories.name as category')->first();
    
    if(isset($find_temp->category) && !empty($find_temp->category)){
        $category = $find_temp->category;
    }else{
        $category = '';
    }
    if(isset($find_temp->slug) && !empty($find_temp->slug)){
        $slug = $find_temp->slug;
    }else{
        $slug = '';
    }
    $url = strtolower(urlencode($category.'/'.$slug));
    return $url;
}
?>
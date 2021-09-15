<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'post_title','post_desc','post_content','post_keywords','post_status',
        'post_images','post_meta_desc','category_post_id','post_slug'
    ]; 

    protected $primaryKey = 'post_id';
    protected $table = 'tbl_post';
}

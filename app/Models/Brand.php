<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'brand_name','brand_slug'
    ]; 

    protected $primaryKey = 'brand_id';
    protected $table = 'tbl_brand';
}

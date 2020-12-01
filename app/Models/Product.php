<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'category',
        'sub_category',
        'child_sub_category',
        'description',
        'keyword',
        'image',
        'price',
        'viewpage',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','short_description', 'content', 'author', 'featured_image', 'image_in_content'
    ];
    use HasFactory;
}

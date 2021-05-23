<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // required field for post pic
    protected $fillable = ['title', 'created_by', 'description', 'st_email', 'is_active', 'name'];
    protected $table = 'posts';
}

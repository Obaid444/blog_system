<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;   // ✅ add this

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   use HasFactory;   // ✅ enable factories
   protected $fillable = ['title', 'content'];
}

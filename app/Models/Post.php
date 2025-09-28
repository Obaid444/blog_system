<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;   // ✅ add this

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   use HasFactory;   // ✅ enable factories
   protected $fillable = [
      'title',
       'content',
       'user_id',
       'category_id'
   ];


   public function user(){
      return $this->belongsTo(User::class);
   }

   public function comments(){
      return $this->hasMany(\App\Models\Comment::class)
      ->latest();
   }
   public function category(){
      return $this->belongsTo(category::class);
   }
}

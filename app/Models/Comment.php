<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;  // allows factories (for testing/seeding)
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'post_id',
        'user_id',
        'content',
    ];

   public function post(){
    return $this->belongsTo(Post::class);
   }
   public function user(){
    return $this->belongsTo(User::class);
   }


}

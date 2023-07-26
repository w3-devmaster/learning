<?php

namespace App\Models;

use App\Traits\HasImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory,HasImages;

    protected $fillable = ['user_id','title','content'];

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }
}

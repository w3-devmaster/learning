<?php

namespace App\Models;

use App\Traits\HasImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory,HasImages;

    protected $fillable = ['user_id','firstname','lastname','nickname','gender','address','phone'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

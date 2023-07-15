<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name','description','amount','price','image'];

    public function images() {
        return $this->morphMany(Gallery::class,'model');
    }
}

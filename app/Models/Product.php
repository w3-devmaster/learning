<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['product_name','description','amount','price','image'];

    public function images() {
        return $this->morphMany(Gallery::class,'model');
    }

    public function scopeLow($query) {
        return $query->where('amount','<',15);
    }

    public function scopeOut($query) {
        return $query->where('amount',0);
    }

    public function scopePrice($query,$price,$operator) {
        return $query->where('price',$operator,$price)->orderBy('price');
    }
}

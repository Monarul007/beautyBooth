<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'price'];

    public function categories() {
        return $this->belongsToMany(ProductCategory::class, 'product_categories', 'product_id', 'category_id');
    }

    public function reviews() {
        return $this->hasMany(ProductReview::class, 'product_id');
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class, 'product_id');
    }
}

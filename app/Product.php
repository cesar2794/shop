<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    // $product->category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // $product->images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage = $this->images()->where('featured', true)->first();
        if (!$featuredImage) {
            $featuredImage = $this->images()->first();
        }

        if ($featuredImage) {
            return $featuredImage->url;
        }
        
        // Default
        return '/images/products/default.png';
    }

    public function getCategoryNameAttribute()
    {
        if($this->category)
            return $this->category->name;
        
        return 'General';
    }
}

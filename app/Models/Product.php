<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'formulated_for',
        'key_ingredients',
        'key_benefits',
        'recommended_use',
        'how_to_apply',
        'price',
        'image_path',
        'is_published',
    ];

    protected static function booted(): void
    {
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name) . '-' . Str::random(6);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class);
    }
}
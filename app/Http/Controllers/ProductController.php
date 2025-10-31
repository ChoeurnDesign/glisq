<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display all published products with rating averages and counts.
     */
    public function index()
    {
        $products = Product::query()
            ->where('is_published', true)
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->latest('id')
            ->get([
                'id',
                'name',
                'slug',
                'price',
                'image_path',
                'description',
                'formulated_for',
                'key_ingredients',
                'key_benefits',
                'recommended_use',
                'how_to_apply',
            ]);

        return Inertia::render('Products/Index', [
            'products' => $products,
        ]);
    }

    /**
     * Show product details (with reviews and full product info).
     */
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)
            ->where('is_published', true)
            ->with([
                'reviews' => fn($q) => $q->with('user')->latest(), // 👈 include reviewer info
            ])
            ->firstOrFail([
                'id',
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
            ]);

        return Inertia::render('Products/Show', [
            'product' => $product,
            'reviews' => $product->reviews,
        ]);
    }
}
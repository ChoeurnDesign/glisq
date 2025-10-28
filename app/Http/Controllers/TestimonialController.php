<?php

namespace App\Http\Controllers;

use App\Models\Review;

class TestimonialController extends Controller
{
    public function index()
    {
        // Get latest 5 reviews with 5 stars
        $reviews = Review::with(['product:id,name,slug', 'user:id,name'])
            ->where('rating', 5)
            ->latest()
            ->take(5)
            ->get();

        return inertia('Testimonials', [
            'reviews' => $reviews,
        ]);
    }
}
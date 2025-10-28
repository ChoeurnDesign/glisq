<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index()
    {
        return Product::where('is_published', true)
            ->get(['id','name','slug','price','image_path','description', 'key_benefits']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required','price'=>'required|numeric','description'=>'nullable',
            'slug'=>'nullable|unique:products,slug','is_published'=>'boolean'
        ]);
        return Product::create($data + ['is_published' => $request->boolean('is_published')]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'=>'required','price'=>'required|numeric','description'=>'nullable',
            'slug'=>'nullable|unique:products,slug,'.$product->id,'is_published'=>'boolean'
        ]);
        $product->update($data + ['is_published' => $request->boolean('is_published')]);
        return $product->refresh();
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->noContent();
    }
}
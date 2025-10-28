<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class AdminProductController extends Controller
{
    public function index(): Response
    {
        $products = Product::latest('id')->paginate(12);
        return Inertia::render('Admin/Products/Index', ['products' => $products]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Products/Form');
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }
        Product::create($data);

        return to_route('admin.products.index')->with('success', 'Product created.');
    }

    public function edit($id): Response
    {
        $product = Product::findOrFail($id);
        return Inertia::render('Admin/Products/Form', ['product' => $product]);
    }

    public function update(ProductRequest $request, $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($product->image_path) Storage::disk('public')->delete($product->image_path);
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return to_route('admin.products.index')->with('success', 'Product updated.');
    }

    public function destroy($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        if ($product->image_path) Storage::disk('public')->delete($product->image_path);
        $product->delete();

        return back()->with('success', 'Product deleted.');
    }
}
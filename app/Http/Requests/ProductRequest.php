<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        $routeParam = $this->route('product');
        $productId = $routeParam instanceof Product ? $routeParam->id : (is_numeric($routeParam) ? (int)$routeParam : null);

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('products', 'slug')->ignore($productId)],
            'description' => ['nullable', 'string'],
            'formulated_for' => ['nullable', 'string'],
            'key_ingredients' => ['nullable', 'string'],
            'key_benefits' => ['nullable', 'string'],
            'recommended_use' => ['nullable', 'string'],
            'how_to_apply' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'is_published' => ['sometimes', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_published' => filter_var($this->input('is_published'), FILTER_VALIDATE_BOOLEAN),
        ]);
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    //
    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::with([
            'colors', 'sizes', 'reviews'
        ])->latest()->get())
            ->additional([
                'colors' => Color::has('products')->get(),
                'sizes' => Size::has('products')->get(),
            ]);
    }

    public function show(Product $product): ProductResource
    {
        return ProductResource::make($product->load(['colors', 'sizes', 'reviews']));
    }

    public function filterProductsByColor(Color $color): AnonymousResourceCollection
    {
        return ProductResource::collection(
            $color->products()->with([
                'colors', 'sizes', 'reviews'
            ])->latest()->get()
        )->additional([
            'colors' => Color::has('products')->get(),
            'sizes' => Size::has('products')->get(),
        ]);
    }

    public function filterProductsBySize(Size $size): AnonymousResourceCollection
    {
        return ProductResource::collection(
            $size->products()->with([
                'colors', 'sizes', 'reviews'
            ])->latest()->get()
        )->additional([
            'colors' => Color::has('products')->get(),
            'sizes' => Size::has('products')->get(),
        ]);
    }

    public function findProductsByTerm($searchTerm): AnonymousResourceCollection
    {
        return ProductResource::collection(
            Product::where('name', 'LIKE', '%' . $searchTerm . '%')
                ->with(['colors', 'sizes', 'reviews'])->latest()->get()
        )->additional([
            'colors' => Color::has('products')->get(),
            'sizes' => Size::has('products')->get(),
        ]);
    }
}

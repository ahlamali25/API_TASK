<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    public function store(Request $request)
    {
        
        $product = Product::create($request->all());
        $product->tags()->sync($request->tags);
        return new ProductResource($product, 201);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function update(Request $request, Product $product)
    {
      
       
       
        $product->update($request->all());
        $product->tags()->sync($request->tags);
        return new ProductResource($product, 200);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 204);
    }
}
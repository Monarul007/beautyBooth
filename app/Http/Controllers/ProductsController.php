<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function get_products(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        if(!$category){
            return response()->json(['message' => 'Category not found'], 404);
        }

        $products = $category->products()->with(['reviews'])->withCount('orderDetails');
        switch ($request->sort) {
            case 'best_sell':
                $products = $products->orderBy('order_details_count', 'desc');
                break;
            case 'top_rated':
                $products = $products->withAvg('reviews', 'rating')->orderByDesc('reviews_avg_rating');
                break;
            case 'price_high_to_low':
                $products = $products->orderBy('price', 'desc');
                break;
            case 'price_low_to_high':
                $products = $products->orderBy('price', 'asc');
                break;
            default:
                break;
        }

        $products = $products->paginate(10);

        return response()->json($products);
    }
}

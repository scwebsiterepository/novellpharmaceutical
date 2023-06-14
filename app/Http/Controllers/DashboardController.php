<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // mengambil data category
        $categories = Category::all();


        if ($request->category) {
            $products = Product::with('category')->whereHas('category', function ($query) use ($request) {
                $query->where('name', $request->category);
            })->get();
        } else if ($request->min && $request->max) {
            $products = Product::where('price', '>=', $request->min)->where('price', '<=', $request->max)->get();
        } else {
            // mengambil 8 data produk secara acak
            $products = Product::inRandomOrder()->limit(20)->get();
        }

        return view('dashboard', compact('products', 'categories'));
    }

    public function search(Request $request) 
    {
        if ($request->has('search'))
        {
            $products = Product::where('name', 'LIKE', '%' .$request->search.'%')->get();
        }
        else
        {
            $products = Product::all();
        }

        return view('dashboard', ['products' => $products]);
    }
}

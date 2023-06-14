<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        // mengambil data category
        $categories = Category::where('name','Anak-Anak')->get();


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
}

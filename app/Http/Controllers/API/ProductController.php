<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar dari produk',
            'data' => $products
         ], 200);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if ($product){ 
            return response()->json([
                'success' => true,
                'message' => 'Daftar dari produk berdasarkan id',
                'data' => $product
             ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemuka',
                'data' => $product
             ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required|string|min:3',
            'price' => 'required|integer',
            'sale_price' => 'required|integer',
            'brand' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak valid',
                'data' => $validator->errors()
            ], 422);
        }

        $product = Product::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'brands' => $request->brand,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan',
            'data' => $product
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'category' => 'required',
            'name' => 'required|string|min:3',
            'price' => 'required|integer',
            'sale_price' => 'required|integer',
            'brand' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Data yang dikirim tidak valid',
                'data' => $validator->errors()
            ], 422);
        }

        $product = Product::find($id);

        if ($product) {
            $product = $product->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'brands' => $request->brand,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil diupdate',
                'data' => Product::find($id)
            ], 200);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan',
                'data' => ''
            ], 404);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();

            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil dihapus',
                'data' => null
            ], 200);

        } else {

            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan',
                'data' => ''
            ], 404);
        }
    }
}

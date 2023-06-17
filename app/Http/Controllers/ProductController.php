<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        // $products = [
        //     [
        //         "id" => "29c3a6be-c042-4efd-a199-7d45b99fdcc2",
        //         "category" => "cellphone",
        //         "name" => "Apple iPhone 11 64GB Black",
        //         "price" => 8900000,
        //         "sale_price" => 7249000,
        //         "brands" => "Apple",
        //         "rating" => 4
        //     ],
        //     [
        //         "id" => "105aea64-0b01-4883-b536-9889f06498d7",
        //         "category" => "cellphone",
        //         "name" => "Samsung Galaxy A14 5G 6/128GB",
        //         "price" => 2900000,
        //         "sale_price" => 0,
        //         "brands" => "Samsung",
        //         "rating" => 4
        //     ],
        //     [
        //         "id" => "bb2d6c9e-4a86-485c-bde6-2a83c2b30dd5",
        //         "category" => "tablet",
        //         "name" => "Apple iPad (Gen 9) Wi-Fi 64GB",
        //         "price" => 6299000,
        //         "sale_price" => 5699000,
        //         "brands" => "Apple",
        //         "rating" => 5
        //     ],
        //     [
        //         "id" => "c2209c46-99b1-4cf5-a1cb-243c4d6ff3bb",
        //         "category" => "wearable",
        //         "name" => "Apple Watch Series 7 45mm",
        //         "price" => 8499000,
        //         "sale_price" => 0,
        //         "brands" => "Apple",
        //         "rating" => 3
        //     ],
        //     [
        //         "id" => "8fc7a400-d1e4-4fa1-926a-2ecfdc3266d4",
        //         "category" => "laptop",
        //         "name" => "ASUS VIVOBOOK M1403QA",
        //         "price" => 8998000,
        //         "sale_price" => 8398000,
        //         "brands" => "Asus",
        //         "rating" => 4
        //     ],
        //     [
        //         "id" => "976448e1-8e60-48a3-b379-1d1e6973c268",
        //         "category" => "accessories",
        //         "name" => "Logitech K380 Keyboard Wireless Bluetooth",
        //         "price" => 599000,
        //         "sale_price" => 465000,
        //         "brands" => "Logitech",
        //         "rating" => 4
        //     ],
        //     [
        //         "id" => "5f6f1894-f66b-438e-9e12-964273a76f3d",
        //         "category" => "laptop",
        //         "name" => "Lenovo V14 G2 AMD Ryzen 3",
        //         "price" => 7999000,
        //         "sale_price" => 6667000,
        //         "brands" => "Lenovo",
        //         "rating" => 5
        //     ],
        //     [
        //         "id" => "f73bf72e-73c9-4f33-b5f3-9746a4cf6112",
        //         "category" => "wearable",
        //         "name" => "Samsung Galaxy Watch5 44mm",
        //         "price" => 3999000,
        //         "sale_price" => 3709000,
        //         "brands" => "Samsung",
        //         "rating" => 4
        //     ],
        //     [
        //         "id" => "68f00d3c-cf44-46e6-816c-57fdc82f9eae",
        //         "category" => "tablet",
        //         "name" => "Samsung Galaxy Tab A7 Lite 3/32GB",
        //         "price" => 2499000,
        //         "sale_price" => 2229000,
        //         "brands" => "Samsung",
        //         "rating" => 5
        //     ],
        //     [
        //         "id" => "bf572054-0d4b-4ada-abe8-01021daac303",
        //         "category" => "accessories",
        //         "name" => "Baseus Bowie WM05 True Wireless Bluetooth",
        //         "price" => 1489000,
        //         "sale_price" => 499000,
        //         "brands" => "Baseus",
        //         "rating" => 5
        //     ]
        // ];

        $products = Product::with('category')->get();
        return view ('product.index', ['products' => $products]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|min:3',
            'description' => 'required|string',
            'price' => 'required|integer',
            'brand' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // ubah nama file
        $imageName = time() . '.' . $request->image->extension();

        // simpan file ke folder public/product
        // Storage::putFileAs('public/product', $request->image, $imageName);

        $product = Product::create([
            'category_id' => $request->category,
            'image' => $imageName,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'brands' => $request->brand,
        ]);

        if($request->hasFile('image')) {
            $request->file('image')->move('gambarproduk/',$request->file('image')->getClientOriginalName());
            $product->image = $request->file('image')->getClientOriginalName();
            $product->save();
        }

        return redirect()->route('product.index');
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->with('category')->first();

        $related = Product::where('category_id', $product->category->id)->inRandomOrder()->limit(4)->get();

        if ($product) {
            return view('product.show', compact('product', 'related'));
        } else {
            abort(404);
        }

    }
    
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('product.create', compact('brands', 'categories'));
    }

    public function edit($id)
    {
        // ambil data product berdasarkan id
        $product = Product::where('id', $id)->with('category')->first();

        // ambil data brand dan category sebagai isian di pilihan (select)
        $brands = Brand::all();
        $categories = Category::all();

        // tampilkan view edit dan passing data product
        return view('product.edit', compact('product', 'brands', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // cek jika user mengupload gambar di form
        if ($request->hasFile('image')) {
            // ambil nama file gambar lama dari database
            $old_image = Product::find($id)->image;

            // hapus file gambar lama dari folder slider
            Storage::delete('public/product/'.$old_image);

            // ubah nama file
            $imageName = time() . '.' . $request->image->extension();

            // simpan file ke folder public/product
            Storage::putFileAs('public/product', $request->image, $imageName);

            // update data product
            Product::where('id', $id)->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'brands' => $request->brand,
                'image' => $imageName,
            ]);

        } else {
            // update data product tanpa menyertakan file gambar
            Product::where('id', $id)->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'brands' => $request->brand,
            ]);
        }

        // redirect ke halaman product.index
        return redirect()->route('product.index');
    }
    
    public function destroy($id)
    {
        // ambil data product berdasarkan id
        $product = Product::find($id);

        // hapus data product
        $product->delete();

        // redirect ke halaman product.index
        return redirect()->route('product.index');
    }
}

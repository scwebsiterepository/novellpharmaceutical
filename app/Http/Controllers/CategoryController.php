<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        //Validasi
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        //masukkan data ke database
        $category = Category::create([
            'name' => $request->name
        ]);

        //kembali ke halaman index sesudah masukkan data
        return redirect()->route('category.index');
    }
    
    public function create()
    {
        return view ('category.create');
    }

    public function edit($id)
    {
       //ambil data berdasarkan category
       $category = Category::find($id);

       //tampilkan view edit dan passing data
       return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
         //ambil data category berdasarkan id
        $category = Category::find($id);

        //update data category
        $category -> update([
            'name' => $request->name
        ]);

        //kembali ke halaman index
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        //ambil data berdasarkan id
        $category = Category::find($id);

        //hapus data
        $category -> delete();

        //redisrect ke halaman index
        return redirect()->route('category.index');
    }
}

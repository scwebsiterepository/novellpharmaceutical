<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();

        return view('slider.index', compact('statuses'));
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
        $status = Status::create([
            'name' => $request->name
        ]);

        //kembali ke halaman index sesudah masukkan data
        return redirect()->route('slider.index');
    }
    
    // public function create()
    // {
    //     return view ('category.create');
    // }

    public function edit($id)
    {
       //ambil data berdasarkan category
       $status = Status::find($id);

       //tampilkan view edit dan passing data
       return view('status.edit', compact('status'));
    }

    public function update(Request $request, $id)
    {
         //ambil data category berdasarkan id
        $status = Status::find($id);

        //update data category
        $status -> update([
            'name' => $request->name
        ]);

        //kembali ke halaman index
        return redirect()->route('status.edit');
    }

    public function destroy($id)
    {
        //ambil data berdasarkan id
        $status = Status::find($id);

        //hapus data
        $status -> delete();

        //redisrect ke halaman index
        return redirect()->route('slider.index');
    }
}

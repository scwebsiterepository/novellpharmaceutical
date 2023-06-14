<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        // load data dari table sliders
        $sliders = Slider::all();

        // load data dari table status
        // $status =  Status::all();

        // passing data sliders ke view slider.index
        return view('admin.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        // ubah nama file gambar dengan angka random
        $imageName = time().'.'.$request->image->extension(); // 1685433155.jpg

        // upload file gambar ke folder slider
        Storage::putFileAs('public/slider', $request->file('image'), $imageName);

        // insert data ke table sliders
        $slider = Slider::create([
            'title' => $request->title,
            'caption' => $request->caption,
            'image' => $imageName,
            'status' => $request->status,
        ]);

        // alihkan halaman ke halaman slider.index
        return redirect()->route('admin.index');
    }
    
    // public function create()
    // {       
    //     // menampilkan halaman create
    //     return view('slider.create');
    // }

    public function edit(Request $request, $id)
    {
        // cari data berdasarkan id menggunakan find()
        // find() merupakan fungsi eloquent untuk mencari data berdasarkan primary key
        $slider = Slider::find($id);

        // load view edit.blade.php dan passing data slider
        return view('admin.status', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        // cek jika user mengupload gambar di form
        if ($request->hasFile('image')) {
            // ambil nama file gambar lama dari database
            $old_image = Slider::find($id)->image;

            // hapus file gambar lama dari folder slider
            Storage::delete('public/slider/'.$old_image);

            // FILE BARU //
            // ubah nama file gambar baru dengan angka random
            $imageName = time().'.'.$request->image->extension();

            // upload file gambar ke folder slider
            Storage::putFileAs('public/slider', $request->file('image'), $imageName);

            // update data sliders
            Slider::where('id', $id)->update([
                'title' => $request->title,
                'caption' => $request->caption,
                'image' => $imageName,
                'status' => $request->status,
            ]);
        } else {
            // hanya update status 
            Slider::where('id', $id)->update([
                'status' => $request->status,
            ]);
        }


        // alihkan halaman ke halaman sliders
        return redirect()->route('admin.index');
    }

    public function destroy($id)
    {
        // cari data berdasarkan id menggunakan find()
        // find() merupakan fungsi eloquent untuk mencari data berdasarkan primary key
        $slider = Slider::find($id);

        // hapus file gambar dari folder slider
        Storage::delete('public/slider/'.$slider->image);

        // hapus data dari table sliders
        $slider->delete();

        // alihkan halaman ke halaman sliders
        return redirect()->route('admin.index');
    }
}

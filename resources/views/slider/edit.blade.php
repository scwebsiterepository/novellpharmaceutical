@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Edit Slider</h1>

            <div class="card mb-4">
                <div class="card-body">

                    <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" value="{{ $slider->title }}" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="caption" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="caption" value="{{ $slider->caption }}" name="caption" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Slider</label>
                            <input class="form-control" type="file" name="image" id="image" accept=".jpg, .jpeg, .png., .webp">
                        </div>
                        
                        <!-- <div class="mb-3">
                            <label for="brand" class="form-label">Status</label>
                            <select class="form-select" aria-label="status" id="status" name="status">
                                <option selected disabled>- Pilih Status -</option>    
                                <option value="Diterima">Terima</option>
                                <option value="Ditolak">Tolak</option>
                                <option value="Menunggu">Menunggu</option>
                            </select>
                        </div> -->
                        
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <a href="{{ route('slider.index') }}" class="btn btn-secondary">Batal</a>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
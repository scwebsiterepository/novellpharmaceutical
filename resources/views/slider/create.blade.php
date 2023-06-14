@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Create Slider</h1>

            <div class="card mb-4">
                <div class="card-body">

                    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="caption" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="caption" name="caption" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Slider</label>
                            <input class="form-control" type="file" name="image" id="image" accept=".jpg, .jpeg, .png., .webp">
                        </div>

                        <div class="mb-3">
                            <input class="form-control" type="hidden" name="status" value="Menunggu">
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <a href="{{ route('slider.index') }}" class="btn btn-secondary">Batal</a>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
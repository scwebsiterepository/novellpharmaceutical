@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Masukkan Kategori Baru</h1>

            <div class="card mb-4">
                <div class="card-body">

                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old ('name') }}" name="name" required>
                            @error('name')
                                <small class="text-danger">Masukkan Minimal Tiga Karakter</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <a href="{{ route('category.index') }}" class="btn btn-secondary">Batal</a>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
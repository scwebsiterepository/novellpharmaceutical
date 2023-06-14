@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Edit Kategori</h1>

            <div class="card mb-4">
                <div class="card-body">

                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" value="{{ $category->name }}" name="name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <a href="{{ route('category.index') }}" class="btn btn-secondary">Batal</a>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
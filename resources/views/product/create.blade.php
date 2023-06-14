@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Masukkan Produk Baru</h1>

            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <select class="form-select @error('category') is-invalid @enderror" aria-label="category" id="category" name="category">
                                <option selected disabled>- Pilih Kategori -</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category') == $cat->id ? 'selected' : '' }} >{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old ('name') }}" name="name" required>
                            @error('name')
                                <small class="text-danger">Nama Produk Minimal Tiga Karakter</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" value="{{ old ('description') }}" name="description" required>
                            @error('description')
                                <small class="text-danger">Tambahkan Deskripsi Produk</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ old ('price') }}" name="price" required>
                            @error('price')
                                <small class="text-danger">Masukkan Angka</small>
                            @enderror
                        </div>

                        <!-- <div class="mb-3">
                            <label for="sale-price" class="form-label">Harga Potongan</label>
                            <input type="text" class="form-control @error('sale_price') is-invalid @enderror" id="sale-price" value="{{ old ('sale_price') }}" name="sale_price" required>
                            @error('sale_price')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div> -->

                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand</label>
                            <select class="form-select @error('brand') is-invalid @enderror" aria-label="brand" id="brand" name="brand">
                                <option selected disabled>- Pilih Brand -</option>
                                @foreach ($brands as $brand)
                                     <option value="{{ $brand->name }}" {{ old('brand') == $brand->name ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Produk</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" accept=".jpg, .jpeg, .png., .webp">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <a href="{{ route('product.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
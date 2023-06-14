@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Permintaan Persetujuan</h1>

            <div class="card mb-4">
                <div class="card-body">

                    <form action="{{ route('admin.update', $slider->id) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="brand" class="form-label">Status</label>
                            <select class="form-select" aria-label="status" id="status" name="status">
                                <option selected disabled>- Pilih Status -</option>    
                                <option value="Diterima">Terima</option>
                                <option value="Ditolak">Tolak</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Batal</a>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
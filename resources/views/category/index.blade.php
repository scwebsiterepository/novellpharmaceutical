<!-- Category -->

@extends('layouts.main')

@section('content')
<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Kategori Barang</h1>

                            <a class="btn btn-success mb-2" href="{{route('category.create')}}" role="button"> Tambahkan Data </a>

                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="dataTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Id</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$category['id']}}</td>
                                            <td>{{$category['name']}}</td>
                                            <td>
                                                <form onsubmit="return confirm('Apakah anda yakin? ');" action="{{ route('category.destroy', $category->id) }}" method="POST">
                                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
</main>
@endsection()

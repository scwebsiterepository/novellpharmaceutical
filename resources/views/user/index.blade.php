<!-- User -->

@extends('layouts.main')

@section('content')
<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Daftar Pengguna</h1>
                        
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="dataTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Avatar</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Telepon</th>
                                            <th>Posisi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{asset('img/user.png')}}" alt="avatar" style="max-width: 30px">
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>
                                                    <span class="badge  {{ $user->role->name == 'admin' ? 'bg-success' : 'bg-info' }} ">{{ $user->role->name }}</span>
                                                </td>
                                                <td>
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
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

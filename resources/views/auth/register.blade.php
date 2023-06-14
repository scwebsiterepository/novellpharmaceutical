<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <style>
        body {
            background:  #019267;
            /* background: linear-gradient(to right, #0062E6, #33AEFF); */
        }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
        }

        .btn-google {
            color: white !important;
            background-color: #ea4335;
        }

        .btn-facebook {
            color: white !important;
            background-color: #3b5998;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

                @if (Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <strong>Oops!</strong> Data tidak lengkap. Akun anda gagal dibuat.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Buat Akun Baru</h5>
                        <form action="{{ route('register.store') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput" name="name">
                                <label for="floatingInput">Nama</label>
                                @error('name')
                                <small class="text-danger">Masukkan nama anda</small>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="floatingInput" name="phone">
                                <label for="floatingInput">Telepon</label>
                                @error('phone')
                                <small class="text-danger">Masukkan nomor telepon</small>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" name="email">
                                <label for="floatingInput">Alamat Email</label>
                                @error('email')
                                <small class="text-danger">Masukkan email anda</small>
                                @enderror
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password">
                                <label for="floatingPassword">Kata Sandi</label>
                                @error('password')
                                <small class="text-danger">Masukkan password anda</small>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
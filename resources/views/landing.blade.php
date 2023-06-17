<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Novell Pharmaceutical</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('img/icon_mini.png')}}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/landing.css')}}" rel="stylesheet" />
    </head>
    <body>

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-success bg-success">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-light" href="#!"><strong>NOVELL</strong> PHARMACEUTICAL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link text-light btn btn-success" aria-current="page" href="#carouselExampleIndicators">Beranda</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light btn btn-success" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produk</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item " href="#temukankategori">Kategori</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#produkbaru">Segera Hadir</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link text-light btn btn-success" href="#tempaltemo_footer">Hubungi</a></li>
                    </ul>
                        <form class="d-flex">
                        <a href="{{route('login')}}" class="btn btn-success">
                            <i class="bi-person-fill me-1 "></i>
                            Masuk
                        </a>
                        </form>
                </button>
                </div>
            </div>
        </nav>
        <!-- End Navigation -->

        <!-- Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($sliders as $slider)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->iteration - 1 }}" class="{{ $loop->first ? 'active' : '' }}"
                        aria-current="{{ $loop->first ? 'true' : '' }}" aria-label="Slide 1"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="3000">
                        <img src="{{ asset('gambarslider/' . $slider->image) }}" class="d-block w-100" alt="{{ $slider->image }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slider->title }}</h5>
                            <p>{{ $slider->caption }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
                <button class="carousel-control-prev" type="button-dark" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
        </div>
        <!-- End Carousel -->

        <!-- Start Categories of The Month -->
        <section class="container py-5" id="temukankategori">
            <div class="row text-center pt-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Temukan Kategori</h1>
                    Temukan obat-obatan berkualitas tinggi untuk perawatan kesehatan yang optimal di Apotik <strong>Novell Pharmaceutical</strong> berdasarkan Kategori.
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 p-5 mt-3">
                    <a href="#"><img src="{{asset('img/category_img_05.jpg')}}" class="rounded-circle img-fluid border"></a>
                    <h3 class="text-center mt-3 mb-3">Kategori Anak-Anak</h3>
                    <p class="text-center"><a class="btn btn-success" href="{{route('dashboard')}}">Tersedia</a></p>
                </div>
                <div class="col-12 col-md-4 p-5 mt-3">
                    <a href="#"><img src="{{asset('img/category_img_06.jpg')}}" class="rounded-circle img-fluid border"></a>
                    <h3 class="h3 text-center mt-3 mb-3">Kategori Dewasa</h3>
                    <p class="text-center"><a class="btn btn-success" href="{{route('dashboard')}}">Tersedia</a></p>
                </div>
                <div class="col-12 col-md-4 p-5 mt-3">
                    <a href="#"><img src="{{asset('img/category_img_07.jpg')}}" class="rounded-circle img-fluid border"></a>
                    <h3 class="h3 text-center mt-3 mb-3">Kategori Orang Tua</h3>
                    <p class="text-center"><a class="btn btn-success" href="{{route('dashboard')}}">Tersedia</a></p>
                </div>
            </div>
        </section>
        <!-- End Categories of The Month -->

        <!-- Start Featured Product -->
        <section class="bg-light" id="produkbaru">
            <div class="container py-5">
                <div class="row text-center py-3">
                    <div class="col-lg-6 m-auto mb-3">
                        <h1 class="h1">Segera Hadir</h1>
                        Ada yang spesial sedang dalam perjalanan ke <strong>Novell Pharmaceutical</strong>.
                        <br>
                        Tunggu produk terbaru yang akan segera hadir.
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                                <img src="{{asset('img/feature_prod_01.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li>
                                        <i class="text-warning bi-star-fill"></i>
                                        <i class="text-warning bi-star-fill"></i>
                                        <i class="text-warning bi-star-fill"></i>
                                        <i class="text-warning bi-star-fill"></i>
                                        <i class="text-muted bi-star-fill"></i>

                                    </li>
                                    <li class="text-muted text-right">Rp 50.500</li>
                                </ul>
                                <h2>Egoji Gummy</h2>
                                <br>
                                Egoji gummy merupakan suplemen Multivitamin plus Gojiberry, dengan bentuk gummy Dinosaurus yang enak. Komposisi Lengkap Vitamin A, B kompleks, C, D, E dan Zinc untuk memenuhi kebutuhan nutrisi di masa pertumbuhan.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                                <img src="{{asset('img/feature_prod_02.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li>
                                    <i class="text-warning bi-star-fill"></i>
                                    <i class="text-warning bi-star-fill"></i>
                                    <i class="text-warning bi-star-fill"></i>
                                    <i class="text-warning bi-star-fill"></i>
                                    <i class="text-muted bi-star-fill"></i>
                                    </li>
                                    <li class="text-muted text-right">Rp 360.000</li>
                                </ul>
                                <h2>Nutrafor White Beauty</h2>
                                <br>
                                Nutrafor White Beauty Coffee adalah Suplemen kesehatan kulit, rambut dan kuku Bentuk Kopi dengan Kolagen, Glutathione, Vitamin C, Vitamin E yang kaya antioksidan dan rasa yg enak.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">

                            <img src="{{asset('img/feature_prod_03.jpg')}}" class="card-img-top" alt="...">

                        <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li>
                                        <i class="text-warning bi-star-fill"></i>
                                        <i class="text-warning bi-star-fill"></i>
                                        <i class="text-warning bi-star-fill"></i>
                                        <i class="text-warning bi-star-fill"></i>
                                        <i class="text-warning bi-star-fill"></i>
                                    </li>
                                    <li class="text-muted text-right">Rp 190.000</li>
                                </ul>
                                <h2>iSlim - Weight Control Meal Replacement - Vanilla Latte</h2>
                                <br>
                                I slim Minuman pengganti sarapan dan makan malam yang di formulasikan untuk diet kontrol badan. Mengandung Protein, Kalsium, Serat,10 Vitamin dan 6 Mineral yang tinggi dengan jumlah kalori yang terkontrol (200kkal/saji).
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Featured Product -->

    <!-- Start Footer -->
    <footer class="bg-success" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light logo">Novell Pharmaceutical</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Jakarta Barat
                        </li>
                        <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                            0838-9245-8651
                        </li>
                        <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                            novellpharma@gmail.com
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-center text-light">
                            Copyright &copy; 2023 Novell Pharmaceutical
                            | Develop by <strong >Anisa Sri Rani</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!-- <script src="js/scripts.js"></script> -->
    </body>
</html>

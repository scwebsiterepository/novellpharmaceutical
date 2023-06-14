<nav class="sb-sidenav accordion sb-sidenav-dark bg-success" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu Utama</div>
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Beranda
                            </a>

                            @if (Auth::user()->role->name == 'Admin')
                            <a class="nav-link" href="{{ route('admin.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                                Slider (Admin)
                            </a>
                            @endif

                            @if (Auth::user()->role->name == 'Staff' || 'Admin')
                            <a class="nav-link" href="{{ route('slider.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                                Slider (Staff)
                            </a>
                            @endif

                           

                            @if (Auth::user()->role->name != 'User')
                            <div class="sb-sidenav-menu-heading">Konten</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Produk
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('category.index') }}">Kategori</a>
                                    <a class="nav-link" href="{{ route('product.index') }}">Daftar Produk</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pengguna
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('role.index') }}">Posisi</a>
                                    <a class="nav-link" href="{{ route('user.index') }}">Daftar Pengguna</a>
                                </nav>
                            </div>
                            @endif
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Kategori
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne1" data-bs-parent="#sidenavAccordion1">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('perkategori.anak') }}">Anak-Anak</a>
                                    <a class="nav-link" href="{{ route('product.index') }}">Dewasa</a>
                                    <a class="nav-link" href="{{ route('product.index') }}">Orang Tua</a>
                                </nav>
                            </div> -->
                            

                        </div>
                        </div>
                        <div class="sb-sidenav-footer bg-success">
                            <div class="small">Masuk sebagai:</div>
                            {{ Auth::user()->name }} ({{ Auth::user()->role->name }})
                        </div>
</nav>
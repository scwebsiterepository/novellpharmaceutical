<!-- Navbar-->
<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 bg-success">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf 
                                <button type="submit" class="dropdown-item">Keluar</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid ">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="{{ asset('web') }}/img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="/">home</a></li>
                                        <li><a href="/about">about</a></li>
                                        <li><a href="/membership">membership</a></li>
                                        <li><a href="gallery.html">gallery</a></li>
                                        <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">

                                                <li><a href="elements.html">elements</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">blog</a></li>
                                                <li><a href="single-blog.html">single-blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                @if(Auth::check())
                                    <div class="dropdown">
                                        <button class="boxed-btn3 dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-user"></i> {{ Auth::user()->nama }}
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="#">Profile</a></li>
                                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                        </ul>
                                    </div>
                                @else
                                    <button type="button" class="boxed-btn3" data-bs-toggle="modal" data-bs-target="#loginModal">
                                        Join Us
                                    </button>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->

<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <div class="app-brand justify-content-center">
                    <span class="app-brand-text demo text-body fw-bolder">No Limit Gym</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 class="mb-2">Selamat datang di No Limit Gym</h4>
                <p class="mb-4">Bergabung sekarang untuk mengakses semua layanan No Limit Gym</p>

                <form id="loginForm" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="loginUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="loginUsername" name="username" placeholder="Enter your username" required autofocus />
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Enter your password" required />
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Ingat Saya</label>
                        </div>
                        <button type="button" class="text-danger border-0 bg-transparent" 
                                data-bs-toggle="modal" data-bs-target="#registerModal" 
                                data-bs-dismiss="modal">
                            Daftar
                        </button>
                    </div>
                    <button type="submit" class="boxed-btn3 w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Register -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <div class="app-brand justify-content-center">
                    <span class="app-brand-text demo text-body fw-bolder">No Limit Gym</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 class="mb-2">Bergabung dengan No Limit Gym</h4>
                <p class="mb-4">Daftar sekarang untuk mengakses semua layanan kami</p>

                <form id="registerForm" action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="registerNama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="registerNama" name="nama" placeholder="Enter your name" required />
                    </div>
                    <div class="mb-3">
                        <label for="registerUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="registerUsername" name="username" placeholder="Enter your username" required />
                    </div>
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="registerEmail" name="email" placeholder="Enter your email" required />
                    </div>
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Enter password" required />
                    </div>
                    <div class="mb-3">
                        <label for="registerPasswordConfirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="registerPasswordConfirmation" name="password_confirmation" placeholder="Confirm password" required />
                    </div>
                    <div id="passwordError" class="text-danger" style="display: none;">Password dan konfirmasi password tidak sesuai.</div>
                    <div class="mb-3 text-end">
                        <button type="button" class="text-danger border-0 bg-transparent"
                                data-bs-toggle="modal" data-bs-target="#loginModal" 
                                data-bs-dismiss="modal">
                            Sudah punya akun? Login
                        </button>
                    </div>
                    <button type="submit" class="boxed-btn3 w-100">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function validatePasswords(event) {
        var password = document.getElementById('registerPassword').value;
        var confirmPassword = document.getElementById('registerPasswordConfirmation').value;
        var errorDiv = document.getElementById('passwordError');

        if (password !== confirmPassword) {
            event.preventDefault(); // Mencegah form dari pengiriman
            errorDiv.style.display = 'block'; // Tampilkan pesan kesalahan
        } else {
            errorDiv.style.display = 'none'; // Sembunyikan pesan kesalahan jika sesuai
        }
    }

    document.getElementById('registerForm').addEventListener('submit', validatePasswords);
</script>
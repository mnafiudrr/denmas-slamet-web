<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.ico') }}">
    <title>
        Hapus Akun | Denmas Slamet Admin
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('/assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid pe-0">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('root') }}">
                            Denmas Slamet Admin
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                            </ul>
                            <li class="nav-item d-flex align-items-center">
                              <a class="btn btn-round btn-sm mb-0 btn-outline-primary me-2" target="_blank" href="">Mobile App Project</a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                              <a href="https://play.google.com/store/apps/details?id=com.fiufiu.denmasslamet" target="_blank" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark">Mobile App Download</a>
                            </li>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                              <h1>Tata Cara Penghapusan Akun aplikasi <a href="https://play.google.com/store/apps/details?id=com.fiufiu.denmasslamet">DENMAS SLAMET</a></h1>
                              <ol>
                                  <li>Pastikan anda memiliki akun <a href="https://play.google.com/store/apps/details?id=com.fiufiu.denmasslamet">Denmas Slamet</a> di Playstore (<a href="https://play.google.com/store/apps/details?id=com.fiufiu.denmasslamet">https://play.google.com/store/apps/details?id=com.fiufiu.denmasslamet</a>).</li>
                                  <li>Buka halaman <a href="{{ route('delete-account') }}">{{ route('delete-account') }}</a> di browser Anda.</li>
                                  <li>Masukkan username dan password akun Anda.</li>
                                  <li>Masukkan alasan penghapusan akun Anda.</li>
                                  <li>Klik tombol "Kirim Permintaan".</li>
                                  <li>Anda akan menerima pesan bahwa permintaan hapus akun Anda berhasil diajukan.</li>
                                  <li>Silahkan menunggu proses penghapusan permanen akun Anda oleh admin.</li>
                              </ol>
                          
                              <h2>Formulir Permintaan Hapus Akun</h2>
                              <form role="form" method="POST" action="{{ route('delete-account') }}">
                                @csrf
                                <label>Username</label>
                                <div class="mb-3">
                                  <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="username" aria-label="username" aria-describedby="email-addon">
                                  <p class="text-sm mx-auto text-danger">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                  </p>
                                </div>
                                <label>Password</label>
                                <div class="mb-3">
                                  <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                  <p class="text-sm mx-auto text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                  </p>
                                </div>
                                <label>Alasan Hapus Akun</label>
                                <div class="mb-3">
                                  <textarea name="delete_reason" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="text-center">
                                  <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Kirim Permintaan</button>
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4 mx-auto text-center">
                    {{-- <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Company
          </a> --}}
                    {{-- <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Team
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Products
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Blog
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Pricing
          </a> --}}
                </div>
                <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Privacy Policy
                    </a>
                    {{-- <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-dribbble"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-twitter"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-instagram"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-pinterest"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-github"></span>
          </a> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Soft by Yuruu Project.
                    </p>
                </div>
            </div>
        </div>
        <input type="hidden" id="error-message" value="">
    </footer>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('/assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: '{{ session('error') }}',
                    // showConfirmButton: false,
                });
            @endif
        });
    </script>
</body>

</html>

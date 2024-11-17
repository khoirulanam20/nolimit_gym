<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>gym</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('web') }}/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('web') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('web') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('web') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('web') }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('web') }}/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('web') }}/css/gijgo.css">
    <link rel="stylesheet" href="{{ asset('web') }}/css/nice-select.css">
    <link rel="stylesheet" href="{{ asset('web') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('web') }}/css/slicknav.css">

    <link rel="stylesheet" href="{{ asset('web') }}/css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->

    <!-- Tambahkan SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    @include('template_web.navbar')

    @yield('content')

    @include('template_web.footer')


    <!-- JS here -->
    <script src="{{ asset('web') }}/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="{{ asset('web') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('web') }}/js/popper.min.js"></script>
    <script src="{{ asset('web') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('web') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('web') }}/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('web') }}/js/ajax-form.js"></script>
    <script src="{{ asset('web') }}/js/waypoints.min.js"></script>
    <script src="{{ asset('web') }}/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('web') }}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('web') }}/js/scrollIt.js"></script>
    <script src="{{ asset('web') }}/js/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('web') }}/js/wow.min.js"></script>
    <script src="{{ asset('web') }}/js/nice-select.min.js"></script>
    <script src="{{ asset('web') }}/js/jquery.slicknav.min.js"></script>
    <script src="{{ asset('web') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('web') }}/js/plugins.js"></script>
    <script src="{{ asset('web') }}/js/gijgo.min.js"></script>



    <!--contact js-->
    <script src="{{ asset('web') }}/js/contact.js"></script>
    <script src="{{ asset('web') }}/js/jquery.ajaxchimp.min.js"></script>
    <script src="{{ asset('web') }}/js/jquery.form.js"></script>
    <script src="{{ asset('web') }}/js/jquery.validate.min.js"></script>
    <script src="{{ asset('web') }}/js/mail-script.js"></script>

    <!-- Tambahkan Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


    <script src="{{ asset('web') }}/js/main.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Test if modal trigger works
            document.querySelector('[data-bs-target="#loginModal"]').addEventListener('click', function() {
                console.log('Modal trigger clicked');
            });

            // Initialize all modals
            var modals = document.querySelectorAll('.modal');
            modals.forEach(function(modal) {
                new bootstrap.Modal(modal);
            });

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: '{{ session('success') }}',
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}',
                });
            @endif
        });
    </script>

    <style>
        .modal {
            display: none;
        }

        .modal.show {
            display: block;
        }

        .modal-backdrop {
            z-index: 1040;
        }

        .modal {
            z-index: 1050;
        }
    </style>

</body>

</html>

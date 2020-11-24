@yield('header')
<style>
    ul.navbar-nav > li > a {
        margin: 19px 0 !important;
        padding: 0 !important;
    }

    .header-two .logo {
        padding: 11px 0 !important;
    }

    .logo > a > img {
        height: 64px;
    }

    i.fa.fa-mobile {
        color: #FFB600;
        font-size: 21px;
        margin-right: 3px;
    }

    i.fa.fa-map-marker {
        color: #FFB600;
    }

    #form-login {
        width: 100%;
        margin: auto 75px;
        background-color: #cccccc;
        padding: 10px 21px 10px 21px;
        border-radius: 7px;
        opacity: 0.9;
    }

    .carousel-inner > p > a {
        margin: auto 44%;
    }
    table {
        color: black;
    }
</style>

<body>
@include('sweet::alert')
<section id="main-container" class="main-container">
         @if(Route::current()->getName() == 'home' || Route::current()->getName() == 'showCandidatAdd' || Route::current()->getName() == 'home.page' )

    @endif

    <!-- <div class="container-fluid"> -->
        @yield('content')
    <!-- </div> -->
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

@if (Session::has('sweet_alert.alert'))
    <script>
        swal({
            text: "{!! Session::get('sweet_alert.text') !!}",
            title: "{!! Session::get('sweet_alert.title') !!}",
            timer: {!! Session::get('sweet_alert.timer') !!},
            icon: "{!! Session::get('sweet_alert.type') !!}",

            // more options
        });
    </script>
@endif
@yield('footer')
@yield('scripts')

</body>


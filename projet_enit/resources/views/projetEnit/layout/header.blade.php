<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" >

<!-- CSS
================================================== -->

<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Bootstrap -->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<!-- Template styles-->
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<!-- Responsive styles-->
<link rel="stylesheet" href="{{asset('css/responsive.css')}}">
<!-- FontAwesome -->
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
<!-- Animation -->
<link rel="stylesheet" href="{{asset('css/animate.css')}}">
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
<!-- Colorbox -->
<link rel="stylesheet" href="{{asset('css/colorbox.css')}}">
<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
<style>
    ul.navbar-nav > li {
        float: inherit !important;
    }

    ul.dropdown-menu {
        margin-top: -49px !important;
        min-width: 0;
    }

    body {
        font-family: sans-serif !important;
    }

</style>
<div class="body-inner">
    <header id="header" class="header-two">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <div class="logo">
                        <a href="{{Request::root(). '/' . config('app.locale'). '/'}}">
                            <img src="{{asset('images/etapLogo.png')}}" alt="">
                        </a>
                    </div><!-- logo end -->
                </div><!-- Navbar header end -->

                <nav class="site-navigation navigation pull-right">
                    <div class="site-nav-inner">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="collapse navbar-collapse navbar-responsive-collapse">
                            <ul class="nav navbar-nav">


                                <li>
                                    <a href="{{Request::root(). '/' . config('app.locale'). '/'}}">{{ __('traduction.Acceuil') }}</a>
                                </li>

                                @if (Auth::guest())
                                    <li>
                                        <a href="{{Request::root(). '/' . config('app.locale'). '/login'}}">
                                            | {{ __('traduction.Se Connecter') }} </a>
                                    </li>
                                @else
                                    <li><a href="{{route('logout')}}">{{ __('traduction.Se Déconnecter') }}</a></li>

                                    <li>
                                        <a href="{{Request::root(). '/' . config('app.locale'). '/candidate/register/complete'}}">
                                            {{ __('traduction.ficheinscription') }}

                                        </a></li>

                                @endif
                                <li>
                                    <a href="{{Request::root(). '/' . config('app.locale'). '/contact'}}">{{ __('traduction.Contact') }}</a>
                                </li>
                                {{--    @foreach (config('app.available_locales') as $locale)

                                        <li class="nav-item">
                                            <a class="nav-link"
                                               href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                               @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
                                        </li>
                                        @endforeach--}}

                                {{--   <li>
                                       <a href="{{Request::root(). '/' . 'fr'}}"><img src="{{asset('images/fr.png')}}"
                                                                                      style="height:18px;"></a>
                                   </li>
                                   <li>
                                       <a href="{{Request::root(). '/' .'ar'}}"><img src="{{asset('images/tn.png')}}"
                                                                                     style="height:18px" ;></a>
                                   </li>--}}
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true" aria-expanded="false">
                                        @if(config('app.locale') == 'fr')Français
                                        @else
                                            آلعربية
                                        @endif
                                        <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{Request::root(). '/' .str_replace(explode('/', Request::path())[0], 'fr', Request::path())}}">Français
                                            </a></li>
                                        <li>
                                            <a href="{{Request::root(). '/' .str_replace(explode('/', Request::path())[0], 'ar', Request::path())}}">آلعربية </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                            <!--/ Nav ul end -->
                        </div>
                        <!--/ Collapse end -->

                    </div><!-- Site Navbar inner end -->

                </nav>
                <!--/ Navigation end -->

            </div><!-- Row end -->
        </div><!-- Container end -->
    </header>
    <div id="top-bar" class="top-bar">
        <div class="container">
            <div class="row">

                <center>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top-social ">
                    <ul class="unstyled">

                        <i class="fa fa-mobile"></i>
                        <li class="telephone" style="font-family:sans-serif;">+216 71 874 700 </li>
                        <li class="telephone" style="font-family:sans-serif;">+216 70 014 400</li>


                    </ul>
                </div>
                </center>


                <!--/ Top info end -->

                <!--/ Top social end -->
            </div>
            <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

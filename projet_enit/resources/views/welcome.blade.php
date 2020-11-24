@extends('projetEnit.layout')


@section('header')
    @include('projetEnit.layout.header')
@endsection


@section('content')


    <div id="main-slide" class="carousel slide" data-ride="carousel">


        <div class="carousel-inner" style="margin-top : 150px">

            <p>
                @if ($date_cloture->date_cloture >= $current_date)
                    <a href="{{Request::root(). '/' . config('app.locale'). '/inscription'}}"
                       class="btn btn-primary">{{ __('traduction.Inscription') }}</a>
                @else
                    <a href="{{Request::root(). '/' . config('app.locale'). '/candidate/result'}}"
                       class="btn btn-primary">{{ __('traduction.consulter') }}</a>
                @endif

            </p>

            
 

        </div>
    </div>



@endsection

@section('footer')
    @include('projetEnit.layout.footer')
@endsection



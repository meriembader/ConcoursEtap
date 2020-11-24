@extends('projetEnit.layout')


@section('header')
    @include('projetEnit.layout.header')
@endsection


@section('content')
    <style>
        iframe#iframepdf {
            width: 100%;
            height: 600px;
        }
    </style>
    <div class="container" style="margin-bottom : 30px">
        <div class="row">
            <div class="text-center">

                @if ($date_cloture->date_cloture >= $current_date)
                    <a href="{{Request::root(). '/' .'fr'. '/inscription'}}"
                       class="btn btn-primary" style="width : 120px">S'inscrire</a>
                    <a href="{{Request::root(). '/' .'ar'. '/inscription'}}"
                       class="btn btn-primary" style="width : 120px">التسجيل</a>

                @elseif( $date_pub->date_cloture >= $current_date)
                    <a href="{{Request::root(). '/' .'fr'. '/candidate/result'}}"
                       class="btn btn-primary" style="width : 120px">Consulter</a>
                    <a href="{{Request::root(). '/' .'ar'. '/candidate/result'}}"
                       class="btn btn-primary" style="width : 120px">النتائج</a>
                @else
                    <a href="{{Request::root(). '/' .'fr'. '/candidate/result'}}"
                       class="btn btn-primary" style="width : 120px">Consulter</a>
                    <a href="{{Request::root(). '/' .'ar'. '/candidate/result'}}"
                       class="btn btn-primary" style="width : 120px">النتائج</a>
                @endif


            </div>
            <br>

        </div>
        <iframe id="iframepdf" src="{{asset('pdf/concours-etap.pdf')}}#zoom=100"></iframe>
    </div>

    <div class="row">
        <div class="text-center">

            @if ($date_cloture->date_cloture >= $current_date)
                <a href="{{Request::root(). '/' .'fr'. '/inscription'}}"
                   class="btn btn-primary" style="width : 120px">S'inscrire</a>
                <a href="{{Request::root(). '/' .'ar'. '/inscription'}}"
                   class="btn btn-primary" style="width : 120px">التسجيل</a>

            @elseif( $date_pub->date_cloture >= $current_date)
                <a href="{{Request::root(). '/' .'fr'. '/candidate/result'}}"
                   class="btn btn-primary" style="width : 120px">Consulter</a>
                <a href="{{Request::root(). '/' .'ar'. '/candidate/result'}}"
                   class="btn btn-primary" style="width : 120px">النتائج</a>
            @else
                <a href="{{Request::root(). '/' .'fr'. '/candidate/result'}}"
                   class="btn btn-primary" style="width : 120px">Consulter</a>
                <a href="{{Request::root(). '/' .'ar'. '/candidate/result'}}"
                   class="btn btn-primary" style="width : 120px">النتائج</a>
            @endif


        </div>
        <br>

    </div>
@endsection

@section('footer')
    @include('projetEnit.layout.footer')
@endsection


@section('scripts')

    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="bootstrap-3.4.1-dist/js/bootstrap.js"></script>
    <script src="script.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

@endsection

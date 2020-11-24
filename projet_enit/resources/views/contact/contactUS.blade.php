@extends('projetEnit.layout')


@section('header')
    @include('projetEnit.layout.header')
@endsection


@section('content')
    @if(config('app.locale') == 'ar')
        <style>
            ::-webkit-input-placeholder { text-align:right; }

            label {
                float: right;
            }
        </style>
    @endif
<style>
    .captcha {
        margin: 0 auto;
        width: 300px;
        height: 115px;
    }

    .captcha label {
        float: left;
        font-size: 22px;
        font-family: 'primelight';
        font-size: 20px;
        line-height: 30px;
        margin-right: 10px;
    }


    .captcha img {

        height: 90px;
    }
    button#refresh {
        height: 43px;
    }
</style>
    <div class="container">
        <img src="{{asset('images/slider-main/ncontacter.png')}}" style=" max-width: 100%;height: auto; "
             alt="Responsive image">
    </div>
    <br>
    <div class="container">
        <center>
            <h3>{{__('traduction.Contactez-nous')}}</h3>
            <h6>{{__('traduction.aide')}}</h6><br/>
        </center>

        @if (Session::has ('flash_message'))
            <div class="alert alert-success" role="alert">{{Session::get('flash_message')}}</div>
        @endif

    <form action="{{ route ('handleContactAdd')}}" method="POST" id="contact" autocomplete="off">
            {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">

                <div class="form-group ">
                    <label for="exampleFormControlInput1"
                            style="color : black"><b>{{__('traduction.nom et prenom')}}</b></label>
                    <input type="text" class="form-control" id="name"
                            placeholder="{{__('traduction.nom et prenom')}}" name="name" required="" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1"
                            style="color : black"><b>{{__('traduction.Votre E-mail')}}</b></label>
                    <input type="email" class="form-control" id="email" placeholder="nom@example.com" name="email" required="" value="{{old('email')}}">
                    @if ($errors->first('email'))
                        <span
                            style="color: red"> {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" style="color : black"><b>{{__('traduction.Votre message')}}</b></label>
                    <textarea class="form-control" id="message" rows="4" name="message"required="" >{{old('message')}}</textarea>
                </div>
                <br>

                <center>
                <div>
                    <div class="captcha">
                        <span>{!! captcha_img() !!}</span>
                        <div class="input-group">
                            <input  type="text" class="form-control" placeholder="Entrez code"
                                    name="captcha" id="fresh">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-success" id="refresh"><i
                                        class="fa fa-refresh"></i>
                                </button>
                            </div>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                    <br>
                    @if ($errors->first('captcha'))
                        <span
                            style="color: red"> {{ $errors->first('captcha') }}
                        </span>
                    @endif
                    <br>
                    <br>
                    <div id="captcha"></div>
                    <button type="submit"  class="btn btn-primary submit">{{__('traduction.Envoyer')}}</button>
                </div>
                </center>
                <br>
            </div> 

            <div class="col-md-6" style="margin-top : 50px">
            <center>

            <a style="font-size:30px; color : black" >

                
                
                <p style="font-size:25px"> 
                <i class="fas fa fa-phone"> </i>
                <b> {{__('traduction.appel')}} </b> <br><br>          
                +216 71 874 700 /+216 70 014 400
                </p>

            </a>
            </center>
            


            </div>  


        </div>

    </form>
    </div>
@endsection

@section('footer')
    @include('projetEnit.layout.footer')
@endsection


@section('scripts')
    <script src="{{asset('js/jquery1.11.3.js')}}"></script>
    <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">

    <script src="{{asset('js/moments.js')}}"></script>
    <script src="{{asset('js/jqueryui.js')}}"></script>

    <script>
        $(document).ready(function () {
                $('.submit').hide();
        });

        $('#name, #email, #message,#fresh').bind('keyup', function() {
            if(allFilled()){
                $('.submit').show();
            } else {
                $('.submit').hide();
            }

        });

        function allFilled() {
            var filled = true;
            $('body input').each(function() {
                if($(this).val() == '' || $('textarea[name="message"]').val() == '') {
                    filled = false;
                }
            });
            return filled;
        }


    </script>


    <script>
        $('#refresh').on('click', function () {
            refreshCaptcha()
        });

        function refreshCaptcha(){
            $.ajax({
                type: 'GET',
                url: '{{route('captcha')}}',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        }

    </script>
@endsection

@extends('projetEnit.layout')


@section('header')
    @include('projetEnit.layout.header')
@endsection


@section('content')
    @if(config('app.locale') == 'ar')
        <style>
            .callforpassword {
                display: flex;
                flex-direction: row-reverse;
            }

            .callforpassword > span {
                float: right;
            }

            .this {
                display: flex;
                flex-direction: row-reverse;
            }

            label.col-md-4.col-form-label.text-md-right {
                text-align: right;
            }

        </style>
    @endif
    <style>



        .captcha img {
            width: 100%;
            height: 90px;
        }
        button#refresh {
            height: 43px;
        }
    </style>
    <div class="container">
        <form method="post" action="{{route('handleResetPassword')}}" autocomplete="off">
        {{csrf_field()}}
            <div class="form-group row this">
                <label style="color :black"
                       class="col-md-4 col-form-label text-md-right"><b>{{__('traduction.CIN')}}</b></label>
                <div class="col-md-6">
                    <input type="text" class="form-control"
                           name="email"
                           value="{{ old('email') }}" required>
                    <div class="captcha">
                        <span>{!! captcha_img() !!}</span>
                        <div class="input-group">
                            <input  type="text" class="form-control" placeholder="Entrez code"
                                    name="captcha" id="fresh"required>
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

                    <div id="captcha"></div>
                    <div class="form-group row">
                        <div class="text-center">
                            <button type="submit" class="btn btn-block btn-success">{{__('traduction.checkpassword')}}</button>
                        </div>
                    </div>
                </div>
            </div>






        </form>
        <div class="form-group row">
            <p class="callforpassword" style="color: black;">&nbsp; &nbsp;{{__('traduction.callforpassword')}}&nbsp;
                &nbsp; <span>+216 71 874 700 /
                    +216 70 014 400</span></p>
        </div>
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

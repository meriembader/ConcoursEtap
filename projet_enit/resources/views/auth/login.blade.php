@extends('projetEnit.layout')


@section('header')
    @include('projetEnit.layout.header')
@endsection


@section('content')
    @if(config('app.locale') == 'ar')
        <style>
            .form-group.row {
                display: flex;
                flex-direction: row-reverse;
                margin-right: 43px;
            }

            label.col-md-4.col-form-label.text-md-right {
                text-align: right;
            }

            label.col-sm-4.col-form-label.text-md-right {
                text-align: right;
            }

            .form-check {
                float: right;
            }
        </style>
    @endif
    <div class="container">
        <div class="row ">
            <div class="col-md-10">
                <div class="card">
                    <center>
                        <h3 class="m-0 font-weight-bold text-black">{{__('traduction.identifier')}}</h3>
                    </center>
                    <br>

                    <div class="card-body">
                        <form method="POST" action="{{ route('handle.login', config('app.locale')) }}"
                              aria-label="{{ __('Login') }}"
                            >
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="email"
                                       class="col-sm-4 col-form-label text-md-right">{{ __('traduction.CIN') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" value="{{old('email')}}"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('traduction.Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" value="{{ old('password') }}"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                        {{ __('traduction.Remember Me') }}

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-12">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-primary">
                                            <b>{{ __('traduction.Login') }}</b>
                                        </button> <br />
                                        <a href="{{Request::root(). '/' . config('app.locale'). '/reset/password'}}"
                                           style="color: blue;">{{ __('traduction.reset') }}</a>
                                    </div>
                                </div>
                       
                    </div>
                </div>
                             </form>
            </div>
        </div>
    @endsection

    @section('footer')
        @include('projetEnit.layout.footer')
    @endsection


    @section('scripts')

        <!--  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> -->
@endsection

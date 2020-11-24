@extends('projetEnit.layout')


@section('header')
    @include('projetEnit.layout.header')
@endsection


@section('content')
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond&display=swap" rel="stylesheet">
    <link href="https://necolas.github.io/normalize.css/8.0.1/normalize.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link type="text/css" rel="stylesheet" src="css/jquery-ui.min.css">
    <link type="text/css" rel="stylesheet" src="css/jquery-ui.structure.min.css">
    <link type="text/css" rel="stylesheet" src="css/jquery-ui.theme.min.css">
    @if(config('app.locale') == 'ar')
        <style>

            .panel-body {
                /* display: flex;
                flex-direction: row-reverse; */


            }

            .form-group.row {
                display: flex;
                flex-direction: row-reverse;
                margin-right: 43px;
            }

            input#agree_sec, input#agree {
                margin-left: 0;
                /* position: unset; */
                float: right;
                padding: 8px 7px;
            }

            .checkbox > label {
                float: right;

            }

            .label {
                display: flex;
                flex-direction: row-reverse;

            }

            .h6 {
                display: flex;
                justify-content: flex-end;
                font-size: 16px;
            }
            p.bhm {
                display: flex;
                flex-direction: row-reverse;
            }
            .righ {
                display: flex;
                flex-direction: row-reverse;

            }
            .form-control{
                direction: rtl;

            }
        </style>
    @endif

    <style>
        body {
            font-family: 'Cormorant Garamond', serif;

        }
        em {
            font-style: normal;
        }
        button, input, optgroup, select, textarea {
            margin: 0;
            /* font: inherit; */
            color: black;
        }

        .form-control {
            box-shadow: none;
            border: 1px solid #dadada;
            padding: 5px 20px;
            height: 44px;
            background: none;
            color: black;
            font-size: 14px;
            border-radius: 0;
        }

        .panel-default > .panel-heading {
            /* background: none; */
            background-color: #cccccc;
            border-radius: 0;
            position: relative;
            padding: 6px 20px;
        }

        .box {
            padding: 50px;
        / / margin: 20 px;
            border: 1px dashed #1708dd;
        }

        .hr-line-dashed {
            border-top: 2px dashed #e7eaec;
            color: #ffffff;
            background-color: #ffffff;
            height: 1px;
            margin: 20px 0;
        }

        .help-block {
            display: block;
            margin-top: 5px;
            margin-bottom: 10px;
            color: red;
        }

        button.btn.btn-default.input-lg {
            margin-top: -9px;
            /* margin-bottom: 3px; */
            height: 45px;
        }
        button#refresh {
            height: 43px;
        }
        #pswd_info {
            position: absolute;
            /*  bottom:-75px;
              bottom: -115px\9; /* IE Specific */
            /* right:55px;
             width:250px;*/
            z-index: 1;
            padding: 15px;
            background: #fefefe;
            font-size: .875em;
            border-radius: 5px;
            box-shadow: 0 1px 3px #ccc;
            border: 1px solid #ddd;
        }

        #pswd_info h4 {
            margin: 0 0 10px 0;
            padding: 0;
            font-weight: normal;
        }

        #pswd_info::before {
            content: "\25B2";
            position: absolute;
            top: -12px;
            left: 45%;
            font-size: 14px;
            line-height: 14px;
            color: #ddd;
            text-shadow: none;
            display: block;
        }

        .invalid {
            background: url(../images/invalid.png) no-repeat 0 50%;
            padding-left: 22px;
            line-height: 24px;
            color: #ec3f41;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type=number] {
            -moz-appearance:textfield;
        }
        .valid {
            background: url(../images/valid.png) no-repeat 0 50%;
            padding-left: 22px;
            line-height: 24px;
            color: #3a7d34;
        }

        #pswd_info {
            display: none;
        }

        #pswd_info ul, li {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -35px;
            position: relative;
            z-index: 2;
            color: black;
        }

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
        .help-block{
            color: red;
            font-weight: bold;
            font-size: 15px;
        }
        .has-error .checkbox, .has-error .checkbox-inline, .has-error .control-label, .has-error .help-block, .has-error .radio, .has-error .radio-inline, .has-error.checkbox label, .has-error.checkbox-inline label, .has-error.radio label, .has-error.radio-inline label {
            color: red;
        }
        .text-danger {
            color: red;
        }
        .alert-danger {
            color: red;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
        .form-group.row.test {
            margin-top: 63px;
        }
    </style>
    <script>
        $(document).ready(function () {

            $('input[name=password]').keyup(function () {
                // keyup code here
            }).focus(function () {
                $('#pswd_info').show();
            }).blur(function () {
                $('#pswd_info').hide();
            });
        });
    </script>
    <body lang="en">
    <h3 class="box-slide-sub-title text-center"
        style="color : #204184 ;padding-bottom: 15px ">{{ __('traduction.Inscription') }}</h3>
    <div class="container-fluid">

        <div class="col-md-10 col-md-offset-1">


        <form name="my-form" id="signupForm"  class="js-validation" autocomplete="off">
            {{csrf_field()}}
            <input type="hidden" name="p_ref" value="" id="p_ref">

            <p style="color : red" class="bhm">{{__('traduction.champs')}}</p>
            <div class="row">
                <div class="panel panel-default ">
                    <div class="panel panel-heading">
                        <label style="color: #204184;" class="righ"><b> {{__('traduction.Les données E-mail')}}</b></label>


                    </div>
                    <div class="panel-body ">
                        <div class="form-group row" >

                            <label for="full_name"
                                   class="col-md-2 col-form-label text-md-right"><b>{{ __('traduction.nom du poste') }} *</b></label>
                            <div class="col-md-10 panel-width">
                                <select name="poste" id="my_select" class="form-control " tabindex="0" style="margin-left: -14px;"
                                        @if ($errors->first('poste')) style="border-color: red;" @endif>
                                    <option value="">{{ __('traduction.Choisir le poste') }} </option>

                                    @foreach($posts as $poste)
                                        @if (Request::old('poste') == $poste->id)
                                            <option value="{{ $poste->id }}" selected>{{ $poste->postname }}</option>
                                        @else
                                            <option value="{{ $poste->id }}" @if($poste->id == $post_id) selected
                                                    @endif id="{{$poste->reference}}"
                                                    data-reference="{{$poste->reference}}">
                                                {{ $poste->reference }}
                                                -- @if (Config::get('app.locale') == 'fr'){{ $poste->postname}}@else{{ $poste->postname_AR}}@endif
                                            </option>                                        @endif

                                    @endforeach
                                </select>
                                @if ($errors->first('poste'))
                                    <span style="color: red"> {{ $errors->first('poste') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="disabled_input">
            <div class="row">
                <div class="panel panel-default ">
                    <div class="panel panel-heading">
                        <label style="color: #204184;" class="righ"><b> {{__('traduction.Les données du mot de passe')}}</b></label>

                    </div>
                    <label class="righ">{{__('traduction.guideauthentification')}}</label>

                    <div class="panel-body righ">


                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="cin"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.CIN')}} *</b></label>

                                <div class="col-md-6">
                                    <input type="number" id="cin" class="form-control" name="cin" max="99999999"
                                           value="{{ old('cin') }}"
                                           oninput="maxLengthCheck(this)"
                                           placeholder="{{ __('traduction.Ajouter votre numéro CIN') }} "
                                           onkeypress="return isNumberKey(event)"
                                           tabindex="1"
                                           @if ($errors->first('cin')) style="border-color: red;" @endif>
                                    @if ($errors->first('cin'))
                                        <span style="color: red"> {{ $errors->first('cin') }}</span>
                                    @endif
                                </div>
                                <script>
                                    function maxLengthCheck(object) {
                                        if (object.value.length > object.max.length)
                                            object.value = object.value.slice(0, object.max.length)
                                    }
                                    function isNumberKey(evt){
                                        var charCode = (evt.which) ? evt.which : event.keyCode
                                        if (charCode > 31 && (charCode < 48 || charCode > 57))
                                            return false;
                                        return true;
                                    }
                                </script>
                            </div>
                            <div class="form-group row test">
                                <label for="cin"
                                       class="col-md-6 col-form-label text-md-right"><b>{!! __('traduction.Confirmer CIN') !!} *</b></label>
                                <div class="col-md-6">
                                    <input type="text" id="confirm_cin" class="form-control" name="confirm_cin"
                                           max="99999999"
                                           onkeypress="return isNumberKey(event)"
                                           oninput="maxLengthCheck(this)"
                                           value="{{ old('confirm_cin') }}"
                                           tabindex="2"
                                           placeholder="{{ __('traduction.Confirmer votre numéro CIN') }}"

                                           @if ($errors->first('ciconfirm_cinn')) style="border-color: red;" @endif
                                           >
                                    @if ($errors->first('confirm_cin'))
                                        <span
                                            style="color: red"> {{ $errors->first('confirm_cin') }}</span>
                                    @endif
                                </div>
                            </div>


                        </div>


                        <div class="col-md-6">

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.password')}} *</b></label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control"
                                           placeholder="{{__('traduction.Ajouter votre mot de passe')}}"
                                           title="{{__('traduction.conditions')}}"
                                           name="password" value="{{ old('password') }}"
                                           @if ($errors->first('password')) style="border-color: red;"
                                           @endif style="margin-bottom: 8px;"
                                           tabindex="3">
                                    <span toggle="#password" class="fa fa-eye field-icon toggle-password"></span>
                                    @if ($errors->first('password'))
                                        <span
                                            style="color: red"> {{ $errors->first('password') }}</span>
                                    @endif
                                    <div class="progress progress-striped active">
                                        <div id="jak_pstrength" class="progress-bar" role="progressbar"
                                             aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 0%;"></div>
                                    </div>
                                    <div id="pswd_info">
                                        <strong style="color: #000;">{{__('traduction.exigences')}}</strong>
                                        <ul>
                                            <li id="letter" class="invalid">
                                                <strong>{{__('traduction.caractères')}}
                                                </strong></li>
                                            <li id="capital" class="invalid">
                                                <strong>{{__('traduction.lettres')}}</strong></li>
                                            <li id="number" class="invalid">
                                                <strong>{{__('traduction.chiffre')}}
                                                </strong></li>
                                            <li id="length" class="invalid">
                                                <strong>{{__('traduction.spécial')}}
                                                </strong></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Confirm-password"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.Confirmé Mot de passe')}} *</b></label>
                                <div class="col-md-6">
                                    <input type="password" id="confirm_password" class="form-control"
                                           name="confirm_password" value="{{ old('confirm_password') }}"
                                           placeholder="{{__('traduction.Vérifier votre mot de passe')}}"
                                           @if ($errors->first('confirm_password')) style="border-color: red;" @endif
                                           tabindex="4">
                                    @if ($errors->first('confirm_password'))
                                        <span
                                            style="color: red"> {{ $errors->first('confirm_password') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row ">
                <div class="panel panel-default ">
                    <div class="panel panel-heading">

                        <label style="color: #204184;" class="righ"><b>{{ __('traduction.Les données personnelles') }}</b></label>

                    </div>
                    <label class="righ">{{ __('traduction.guidedonnée') }}</label>

                    <div class="panel-body righ">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="last_name"
                                       class="col-md-6 col-form-label text-md-right"><b>{{ __('traduction.Nom') }} *</b></label>
                                <div class="col-md-6">
                                    <input type="text" id="last_name" class="form-control" name="last_name"
                                           value="{{ old('last_name') }}"
                                           placeholder="{{ __('traduction.Ajouter Votre Nom') }}"
                                           @if ($errors->first('last_name')) style="border-color: red;" @endif
                                           tabindex="4">
                                    @if ($errors->first('last_name'))
                                        <span
                                            style="color: red"> {{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="first_name"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.Prénom')}} *</b></label>
                                <div class="col-md-6">
                                    <input type="text" id="first_name" class="form-control"
                                           name="first_name" value="{{ old('first_name') }}"
                                           tabindex="5"
                                           placeholder="{{ __('traduction.Ajouter Votre Prenom') }}"
                                           @if ($errors->first('first_name')) style="border-color: red;" @endif>
                                    @if ($errors->first('first_name'))
                                        <span
                                            style="color: red"> {{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.Date de Naissance')}} *</b>
                                </label>
                                <div class="col-md-6">

                                    <input type="text" name="dob" id="dob" class="form-control" value="{{ old('dob') }}"
                                           style="color: black"placeholder="Jour/Mois/Année"
                                           tabindex="6"
                                           @if ($errors->first('birthday')) style="border-color: red;" @endif />
                                    @if ($errors->first('birthday'))
                                        <span
                                            style="color: red"> {{ $errors->first('birthday') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label style="color :black"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.Lieu de naissance')}}
                                    </b></label>
                                <div class="col-md-6">
                                    <input type="text" id="place_of_birth" class="form-control" name="place_of_birth"
                                           value="{{ old('place_of_birth') }}"
                                           tabindex="7"
                                           placeholder="{{ __('traduction.Ajouter le lieu de naissance') }}"
                                           @if ($errors->has('place_of_birth')) style="border-color:red;" @endif>
                                    @if ($errors->first('place_of_birth'))
                                        <span style="color: red"> {{ $errors->first('place_of_birth') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row" >
                                    <label for="Email" class="col-md-6 col-form-label text-md-right"><b> {{__('traduction.emailadress')}}</b>
                                    </label>
                                <div class="col-md-6 form-check ">
                                    <input class="form-check-input" type="radio" id="inlineRadio1"
                                           name="mail"
                                           @if ($errors->first('preparatory_study')) style="border-color: red"
                                           @endif
                                           value="yes">
                                    <label class="form-check-label"
                                           style="color : black">{{__('traduction.oui')}}</label>
                                    <input class="form-check-input" type="radio" id="inlineRadio2"
                                           name="mail" checked
                                           @if ($errors->first('preparatory_study')) style="border-color: red"
                                           @endif
                                           value="no">
                                    <label class="form-check-label"
                                           style="color : black">{{__('traduction.Non')}}</label>
                                </div>
                            </div>

                            <div id="show_email">

                                <div class="form-group row">
                                    <label for="Email" class="col-md-6 col-form-label text-md-right">
                                        <b> {{__('traduction.adresseemail')}}</b>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="email" id="email" class="form-control" name="email"
                                               value="{{ old('email') }}"
                                               placeholder="{{__('traduction.Ajouter votre adresse E-mail')}}"
                                               @if ($errors->first('email')) style="border-color: red;" @endif>
                                        @if ($errors->first('email'))
                                            <span style="color: red"> {{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Email"
                                           class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.Confirmez votre adresse email')}}</b></label>
                                    <div class="col-md-6">
                                        <input type="email" id="email" class="form-control"
                                               name="confirm_email" value="{{ old('confirm_email') }}"
                                               placeholder="{{__('traduction.Confirmer votre adresse E-mail')}}"
                                               @if ($errors->first('confirm_email')) style="border-color: red;" @endif>
                                        @if ($errors->first('confirm_email'))
                                            <span
                                                style="color: red"> {{ $errors->first('confirm_email') }}</span>
                                        @endif
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="col-md-6">


                            <div class="form-group row">
                                <label style="color :black"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.addresse habitat')}} *</b></label>
                                <div class="col-md-6">
                                    <textarea type="text" id="addresse" class="form-control" name="addresse"
                                              value="{{ old('addresse') }}" rows="5" cols="33"
                                              tabindex="8"

                                              @if ($errors->has('addresse')) style="border-color:red;" @endif>{{ old('addresse') }}</textarea>
                                    @if ($errors->first('addresse'))
                                        <span style="color: red"> {{ $errors->first('addresse') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="mobile_phone" class="col-md-6 col-form-label text-md-right">
                                    <b> {{__('traduction.Numéro du Téléphone')}} *</b>
                                </label>
                                <div class="col-md-6">
                                    <input type="number" id="mobile_phone" class="form-control"
                                           onkeypress="return restrictAlphabets(event)"
                                           tabindex="9"

                                           name="mobile_phone" value="{{ old('mobile_phone') }}"
                                           placeholder="{{ __('traduction.Ajouter votre numéro du télephone') }}"

                                           @if ($errors->first('mobile_phone')) style="border-color: red;" @endif >
                                    <script type="text/javascript">
                                        /*code: 48-57 Numbers
                                          8  - Backspace,
                                          35 - home key, 36 - End key
                                          37-40: Arrow keys, 46 - Delete key*/
                                        function restrictAlphabets(e){
                                            var x=e.which||e.keycode;
                                            if((x>=48 && x<=57) || x==8 ||
                                                (x>=35 && x<=40)|| x==46)
                                                return true;
                                            else
                                                return false;
                                        }

                                        $('#mobile_phone').on('paste', function (event) {
                                         if (event.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
                                           event.preventDefault();
                                         }
                                        });


                                    </script>
                                    @if ($errors->first('mobile_phone'))
                                        <span
                                            style="color: red"> {{ $errors->first('mobile_phone') }}
                                        </span>
                                    @endif
                                </div>
                            </div>




                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="panel panel-default ">
                    <div class="panel panel-heading">
                        <label style="color: #204184;" class="righ"><b>{{__('traduction.Les données relatives')}}</b></label>

                    </div>
                    <label class="righ">{{__('traduction.guidedip')}}</label>

                    <div class="panel-body righ">
                        <div class="col-md-6">

                            <div class="form-group row" id="niveau_etude">
                                <label style="color :black"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.niveau etude')}} *</b></label>
                                <input type="hidden" id="diplome_id">
                                <div class="col-md-6 level_studies">
                                    <select name="level_studies" id="level_studies" class="form-control "
                                            @if ($errors->first('nivau')) style="border-color: red" @endif>

                                    </select>
                                    @if ($errors->first('level_studies'))
                                        <span style="color: red"> {{ $errors->first('level_studies') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row" id="dip_elem">
                                <label style="color :black"
                                       class="col-md-6 col-form-label "><b>{{__('traduction.diplome')}} *</b></label>
                                <input type="hidden" id="diplome_id">
                                <div class="col-md-6">
                                    <select name="diploma" id="diploma" class="form-control"
                                            @if ($errors->first('diploma')) style="border-color: red" @endif>
                                    </select>
                                    @if ($errors->first('diploma'))
                                        <span
                                            style="color: red"> {{ $errors->first('diploma') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row" id="moy_bac">
                                <label style="color :black"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.moyen bac')}}
                                        <span class="etoile">*</span></b></label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="Bachelor_degree"
                                           id="Bachelor_degree"
                                           min="0"
                                           step="0.01"
                                           placeholder="{{__('traduction.Saisir votre moyenne du BaccaLauréat')}}"
                                           max="20" step="0.1"
                                           value="{{ old('Bachelor_degree') }}"
                                           @if ($errors->has('Bachelor_degree')) style="border-color:red;" @endif>
                                    @if ($errors->first('Bachelor_degree'))
                                        <span style="color: red"> {{ $errors->first('Bachelor_degree') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row" id="etude_prep">
                                <label style="color :black"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.etude prepa')}} *</b></label>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline" style="float: left;">
                                        <input class="form-check-input" type="radio" id="inlineRadio1"
                                               name="preparatory_study"
                                               @if ($errors->first('preparatory_study')) style="border-color: red"
                                               @endif
                                               value="yes">
                                        <label class="form-check-label"
                                               style="color : black">{{__('traduction.oui')}}</label>
                                        <input class="form-check-input" type="radio" id="inlineRadio2"
                                               name="preparatory_study" checked
                                               @if ($errors->first('preparatory_study')) style="border-color: red"
                                               @endif
                                               value="no">
                                        <label class="form-check-label"
                                               style="color : black">{{__('traduction.Non')}}</label>
                                    </div>
                                    @if ($errors->first('preparatory_study'))
                                        <span style="color: red"> {{ $errors->first('preparatory_study') }}</span>
                                    @endif
                                </div>
                            </div>




                            <div class="form-group row" id="bureau_emploi">
                                <label style="color :black"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.bureau')}} *</b></label>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline" style="float: left;">
                                        <input class="form-check-input" type="radio" id="inlineRadio1"
                                               name="bureau"
                                               @if ($errors->first('bureau')) style="border-color: red"
                                               @endif
                                               value="yes" checked>
                                        <label class="form-check-label"
                                               style="color : black">{{__('traduction.oui')}}</label>
                                        <input class="form-check-input" type="radio" id="inlineRadio2"
                                               name="bureau"
                                               @if ($errors->first('bureau')) style="border-color: red"
                                               @endif
                                               value="no">
                                        <label class="form-check-label"
                                               style="color : black">{{__('traduction.Non')}}</label>
                                    </div>
                                    @if ($errors->first('bureau'))
                                        <span style="color: red"> {{ $errors->first('bureau') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row permis">
                                <label style="color :black"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.permis')}} *</b></label>
                                <div class="col-md-6">

                                    <input type="text" id="date_of_obtaining_a_driving_license" style="color: black"

                                           id="date_of_obtaining_a_driving_license_v"
                                           name="date_of_obtaining_a_driving_license" value="" class="form-control"
                                            placeholder="Jour/Mois/Année"
                                           @if ($errors->first('date_of_obtaining_a_driving_license')) style="border-color: red;" @endif >
                                    @if ($errors->first('date_of_obtaining_a_driving_license'))
                                        <span
                                            style="color: red"> {{ $errors->first('date_of_obtaining_a_driving_license') }}</span>
                                    @endif


                                </div>
                            </div>


                        </div>
                        <div class="col-md-6">


                            <div class="form-group row " id="dip_m">
                                <div class="col-md-6">
                                    <label for="Email" class=" col-form-label text-md-right">
                                        <b> {{__('traduction.dip_m')}}</b>
                                    </label>
                                </div>
                                <div class="col-md-6 form-check ">
                                    <input class="form-check-input" type="radio" id="inlineRadio3"
                                           name="dip_m"checked
                                           @if ($errors->first('dip_m')) style="border-color: red"
                                           @endif
                                           value="yes">
                                    <label class="form-check-label"
                                           style="color : black">{{__('traduction.oui')}}</label>
                                    <input class="form-check-input" type="radio" id="inlineRadio4"
                                           name="dip_m"
                                           @if ($errors->first('dip_m')) style="border-color: red"
                                           @endif
                                           value="no">
                                    <label class="form-check-label"
                                           style="color : black">{{__('traduction.Non')}}</label>
                                </div>
                            </div>




                            <div class="form-group row" id="ann_pfe">
                                <label style="color :black" class="col-md-6 col-form-label text-md-right"><b>
                                        {{__('traduction.without pfe')}}<span class="etoile"> *</span></b></label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="last_year_degree_without_pfe"
                                           id="last_year_degree_without_pfe"
                                           min="0"
                                           max="20"
                                           step="0.01"
                                           value="{{ old('last_year_degree_without_pfe') }}"
                                           placeholder="{{__('traduction.Saisir votre moyenne de dernière année sans PFE')}}"
                                           @if ($errors->has('last_year_degree_without_pfe')) style="border-color:red;" @endif>
                                    @if ($errors->first('last_year_degree_without_pfe'))
                                        <span
                                            style="color: red"> {{ $errors->first('last_year_degree_without_pfe') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row" id="note_pfe_avec_pfe">
                                <label style="color :black"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.note_pfe_avec_pfe')}}</b></label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="note_pfe_avec_pfe"
                                           id="note_pfe_avec_pfe_v"
                                           min="0"
                                           step="0.01"
                                           placeholder="{{__('traduction.note_pfe_avec_pfe')}}"
                                           max="20" step="0.1"
                                           value="{{ old('note_pfe_avec_pfe') }}"
                                           @if ($errors->has('note_pfe_avec_pfe')) style="border-color:red;" @endif>
                                    @if ($errors->first('note_pfe_avec_pfe'))
                                        <span style="color: red"> {{ $errors->first('note_pfe_avec_pfe') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row" id="note_pfe">
                                <label style="color :black" class="col-md-6 col-form-label text-md-right"><b>
                                        {{__('traduction.note_pfe')}}</b></label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="note_pfe" id="pfe_note"
                                           min="0"
                                           max="20"
                                           step="0.01"
                                           data-inputmask="'alias': 'date'"
                                           value="{{ old('note_pfe') }}"
                                           placeholder="{{__('traduction.note_pfe')}}"
                                           @if ($errors->has('last_year_degree_without_pfe')) style="border-color:red;" @endif>
                                    @if ($errors->first('last_year_degree_without_pfe'))
                                        <span
                                            style="color: red"> {{ $errors->first('last_year_degree_without_pfe') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hr-line-dashed"></div>


            <div class="row">
                @if (Config::get('app.locale') == 'fr')
                    <div class="form-group row ">
                        <div class=" ">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="agree" name="agree" value="agree" style="width: 20px;height: 20px">
                                    <b>{{__('traduction.certification')}}</b>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="agree_sec" name="agree_sec" value="agree" style="width: 20px;height: 20px">
                                    <b>{{__('traduction.infoexacte')}}</b>
                                </label>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="form-group row ">
                        <div class="pull-right">
                            <div class="checkbox">
                                <label class="">
                                <b>{{__('traduction.certification')}}</b>
                                    <input type="checkbox" class="" id="agree" name="agree" value="agree" style="width: 20px;height: 20px">
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                <b>{{__('traduction.infoexacte')}}</b>
                                    <input type="checkbox" id="agree_sec" name="agree_sec" value="agree" style="width: 20px;height: 20px">
                                </label>
                            </div>
                        </div>
                    </div>
                @endif
                <div id="error_form"></div>
                <br>
                <center>

                    <div class="captcha">
                        <span>{!! captcha_img() !!}</span>
                        <div class="input-group">
                            <input  type="text" class="form-control" placeholder="Entrez code"
                                   name="captcha">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-success" id="refresh"><i
                                        class="fa fa-refresh"></i>
                                </button>
                            </div>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->



                    <br>
                    <br>
                    <br>
                    <div id="captcha"></div>
                    <button type="button" id="submit" class="slider btn btn-primary" style="width : 120px">{{__('traduction.Valider')}}</button>
                    <div id='loader'><img src="{{asset('images/spinner.gif')}}"/></div>
                </center>
            </div>
            </div>
        </form>
        </div>

    </div>




</body>

@endsection

@section('footer')
    @include('projetEnit.layout.footer')
@endsection
@section('scripts')



    <script>
        var locale = '{{ config('app.locale') }}';
    </script>


    <script src="{{asset('js/jquery1.11.3.js')}}"></script>
    <script src="{{asset('js/validatorjs.js')}}"></script>
    <script src="{{asset('js/jasny-bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/localization/messages_fr.js" />

    <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">

    <script src="{{asset('js/moments.js')}}"></script>
    <script src="{{asset('js/jqueryui.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


<script>
    $(document).on('click', '#submit', function (e) {
        $(".parsley-errors-list").remove();
        $("#error_form").remove();

        $("input, select").css('border-color','');
        $("input, select").removeClass("parsley-error");
        e.preventDefault();
        if ($('.js-validation').valid()) {
            var formData;
            formData = $('#signupForm').serialize();
            var validator = $(".js-validation").validate();
            $.ajax({
                url: '{{route('handleCandidatAdd',Config('app.locale'))}}',
                type: 'POST',
                data: formData,
                dataType: 'JSON',
                success: function (response) {
                    if (response.errors) {
                        $.each(response.errors, function (index, value) {
                            $('#'+index).css('border-color', 'red');
                            $('#' + index).addClass('parsley-error');
                            $("<ul class='parsley-errors-list text-danger' id='parsley-id-9842'><li class='print-error text-danger' style='font-weight: bold;font-size: 15px;'>" + value + "</li></ul>").insertAfter('#' + index);
                            $("#error_form").append("<li class='alert alert-danger'>"+index + ":" +  value+"</li>")
                        });
                        refreshCaptcha()

                    }
                    else{
                        window.location.href = (response.url);
                    }


                }
            });
        }});
</script>

    <script>
        $(document).ready(function () {
            $('#loader').hide();
            jQuery.ajaxSetup({
                beforeSend: function() {
                    $('#loader').show();
                },
                complete: function(){
                    $('#loader').hide();
                },
                success: function() {}
            });

            $.validator.addMethod("existuser", function (value, element) {
                var exist = function (){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var tmp = null;
                    $.ajax({
                        async: false,
                        type: 'POST',
                        global: false,
                        url: "{{route('get_user')}}" ,
                        data: {user_id: value },
                        success: function (response) {
                            tmp = response;
                        }
                    });
                    return tmp
                }();
                if (exist < 1) {
                  $("#error_form").empty();
                    return true;

                }else{
                  $("#error_form").empty();
                  $("#error_form").append("<li class='alert alert-danger'>Candidature enregestrée avec le même CIN</li>");
                }
            });

            $.validator.addMethod("minAge", function (value, element, min) {
                var min_age = min;


                var convert_date = function (){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                    var tmp = null;
                    $.ajax({
                        async: false,
                        type: 'POST',
                        global: false,
                        url: "{{route('get_age')}}" ,
                    data: {date: value },
                    success: function (response) {
                        tmp = response;
                    }
                });
                return tmp
                }();
                var current_date ='01/01/2020';
                var today = new Date(current_date);
                var birthDate = new Date(convert_date);

                var age = today.getFullYear() - birthDate.getFullYear();
                if (age >= min_age) {
                    return true;
                }
                });
            $.validator.addMethod("maxAge", function (value, element, min) {
                var max_age = min;
                var convert_date = function (){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var tmp = null;
                    $.ajax({
                        async: false,
                        type: 'POST',
                        global: false,
                        url: "{{route('get_age')}}" ,
                        data: {date: value },
                        success: function (response) {
                            tmp = response;
                        }
                    });
                    return tmp
                }();
                var current_date ='01/01/2020';

                var today = new Date(current_date);

                var birthDate = new Date(convert_date);
                var age = today.getFullYear() - birthDate.getFullYear();

                if (age > 40  &&  age  <= 45   ) {
                    Swal.fire(
                        'Attention !',
                        'Vous devez étre inscrit au bureau d\'emploi.',
                        'success'
                    )
                    $("#error_form").append("<li class='alert alert-danger'>Vous devez étre inscrit au bureau d'emploi</li>")


                    $('#bureau_emploi').show();
                    return true;

                }else if (age  < max_age)
                {
                    return true;

                }
            });
            $.validator.addMethod("maxAge_without_alert", function (value, element, min) {
                var max_age = min;
                var convert_date = function (){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var tmp = null;
                    $.ajax({
                        async: false,
                        type: 'POST',
                        global: false,
                        url: "{{route('get_age')}}" ,
                        data: {date: value },
                        success: function (response) {
                            tmp = response;
                        }
                    });
                    return tmp
                }();
                var current_date ='01/01/2020';

                var today = new Date(current_date);

                var birthDate = new Date(convert_date);
                var age = today.getFullYear() - birthDate.getFullYear();

                 if (age  < max_age)
                {
                    return true;

                }
            });

            $.validator.addMethod("pwcheckL", function(value) {
                return  /[a-z]/.test(value) // has a lowercase letter
            });

            $.validator.addMethod("pwcheckD", function(value) {
                return  /\d/.test(value) // has a lowercase letter
            });

            $.validator.addMethod("pwcheckC", function(value) {
                return   /[A-Z]/.test(value) // has a lowercase letter
            });

            $.validator.addMethod("pwcheckS", function(value) {
                return    /.[!,@,#,$,%,^,&,*,?,_,~,\-,(,),+]/.test(value) // has a lowercase letter
            });

            $("#signupForm").validate({

              focusInvalid: false,
                  invalidHandler: function(form, validator) {

                      if (!validator.numberOfInvalids())
                          return;

                      $('html, body').animate({
                          scrollTop: $(validator.errorList[0].element).offset().top
                      }, 2000);

                  },
                lang: 'fr',

                rules: {

                    poste: {
                        required: true,
                    },
                    last_name: "required",
                    first_name: "required",
                    cin: {
                        required: true,
                        minlength: 8,
                        maxlength: 8,
                        existuser: true,
                    },
                    confirm_cin: {
                        required: true,
                        minlength: 8,
                        maxlength: 8,
                        equalTo: "#cin"
                    },
                    // birthday: "required",
                    addresse: "required",
                    mobile_phone: {
                      required: true,
                      number: true,
                    },


                    password: {
                        required: true,
                        pwcheckD:true,
                        pwcheckL:true,
                        pwcheckC:true,
                        pwcheckS:true,
                        minlength: 8
                    },
                    confirm_password: {
                        required: true,
                        pwcheckD:true,
                        pwcheckL:true,
                        pwcheckC:true,
                        pwcheckS:true,
                        minlength: 8,
                        equalTo: "#password"
                    },

                    diploma: {
                        min: 1,
                        required: true,
                    },

                    email: {
                        email: true
                    },
                    confirm_email: {
                        email: true,
                        equalTo: '#email',
                    },
                    agree: "required",
                    agree_sec: "required"
                },
                messages: {
                    dob: {
                        required:"{{__('traduction.ajoutbirthay')}}",
                        minAge: "{{__('traduction.minage')}}",
                        maxAge: "{{__('traduction.maxage')}}",
                    },
                    poste: "{{__('traduction.selectposte')}}",
                    birthday:"{{__('traduction.ajoutbirthay')}}",
                    mobile_phone: "{{__('traduction.Ajouter votre numéro du télephone')}}",
                    addresse: "{{__('traduction.Ajouter votre Adresse')}}",
                    cin: {
                        required: "{{__('traduction.Ajouter votre numéro CIN')}}",
                        minlength: "{{__('traduction.testCIN')}}",
                        maxlength: "{{__('traduction.testCIN')}}",
                        existuser: "{{__('traduction.exist')}}",
                    },
                    confirm_cin: {
                        required: "{{__('traduction.Ajouter votre numéro CIN')}}",
                        minlength: "{{__('traduction.testCIN')}}",
                        maxlength: "{{__('traduction.testCIN')}}",
                        equalTo: "{{__('traduction.equalCIN')}}"

                    },
                    first_name: "{{__('traduction.Ajouter Votre Prenom')}}",
                    last_name:"{{__('traduction.Ajouter Votre Nom')}}" ,
                    confirm_email: {
                        equalTo: "{{__('traduction.equalmail')}}"
                    },
                    password: {
                        required: "{{__('traduction.Ajouter votre mot de passe')}}",
                        minlength: "{{__('traduction.caractères')}}",
                        pwcheckD:"{{__('traduction.chiffre')}}",
                        pwcheckL:"{{__('traduction.lettremin')}}",
                        pwcheckC:"{{__('traduction.lettremaj')}}",
                        pwcheckS:"{{__('traduction.spécial')}}",
                    },
                    diploma: {
                        min: "{{__('traduction.Choisir votre diplôme')}}",
                    },
                    confirm_password: {
                        required: "{{__('traduction.Ajouter votre mot de passe')}}",
                        minlength: "{{__('traduction.caractères')}}",
                        equalTo: "{{__('traduction.equalpass')}}",
                        pwcheckD:"{{__('traduction.chiffre')}}",
                        pwcheckL:"{{__('traduction.lettremaj')}}",
                        pwcheckC:"{{__('traduction.lettremin')}}",
                        pwcheckS:"{{__('traduction.spécial')}}",
                    },
                    email: "{{__('traduction.mailvalide')}}",
                    agree: "{{__('traduction.certification')}}",
                    agree_sec: "{{__('traduction.infoexacte')}}",
                },

                errorElement: "em",
                errorPlacement: function (error, element) {
                    // Add the `help-block` class to the error element
                    error.addClass("help-block ");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },

                highlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-md-6").addClass("has-error").removeClass("has-success");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-md-6").addClass("has-success").removeClass("has-error");
                },

            });


            $("#disabled_input :input").prop("disabled", true);

            function passwordStrength(password) {

                var desc = [{'width': '0px'}, {'width': '20%'}, {'width': '40%'},{'width': '60%'}, {'width': '80%'}, {'width': '100%'}];

                var descClass = ['', 'progress-bar-warning', 'progress-bar-info', 'progress-bar-danger', 'progress-bar-success', 'progress-bar-success'];

                var score = 0;

                //if password bigger than 6 give 1 point
                //  if (password.length > 7) score++;

                //if password has both lower and uppercase characters give 1 point
                if ((password.match(/[a-z]/)) && (password.match(/[A-Z]/))) score=score+2;

                //if password has at least one number give 1 point
                if (password.match(/[0-9]/)) score++;

                //if password has at least one special caracther give 1 point
                if (password.match(/.[+,!,@,#,$,%,^,&,*,?,_,~,\-,(,)]/)) score++;

                //if password bigger than 12 give another 1 point
                if (password.length > 8) score++;
                // display indicator
                $("#jak_pstrength").removeClass(descClass[score - 1 ]).addClass(descClass[score]).css(desc[score]);
            }

            jQuery(document).ready(function () {
                jQuery("#oldpass").focus();
                jQuery("#password").keyup(function () {
                    passwordStrength(jQuery(this).val());
                });
            });

$(function(){


    $('#dob').datepicker({
        changeMonth: true,
        changeYear: true,
        altField: "#dob",
        closeText: 'Fermer',
        prevText: 'Précédent',
        nextText: 'Suivant',
        currentText: 'Aujourd\'hui',
        monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
        dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
        dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
        dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
        weekHeader: 'Sem.',
        dateFormat:'dd/mm/yy',
        yearRange: '1950:2025',
    }).on('change', function(ev) {
        $(this).valid();
    });

});

            $('#date_of_obtaining_a_driving_license').datepicker({
                changeMonth: true,
                changeYear: true,
                altField: "#date_of_obtaining_a_driving_license",
                closeText: 'Fermer',
                prevText: 'Précédent',
                nextText: 'Suivant',
                currentText: 'Aujourd\'hui',
                monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
                monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
                dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
                dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
                dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
                weekHeader: 'Sem.',
                dateFormat:'dd/mm/yy',
                yearRange: '1950:2025',
                maxDate:new Date(),
            });

            $('#show_email').hide();
            $('#niveau_etude').hide();
            $('.permis').hide();
            $('#dip_m').hide();
            $('#dip_elem').hide();
            $('input[name="mail"]').click(function () {
                if ($(this).attr("value") == "no") {
                    $("#show_email").hide('slow');
                }
                if ($(this).attr("value") == "yes") {
                    $("#show_email").show('slow');

                }
            });



            $(".toggle-password").click(function () {

                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });


            $('body').on('click', '#show_pass', function () {
                $('#password').attr('type', 'text');

            });
            /*CIN INPUT*/
            var cin = document.getElementById("cin")

            cin.addEventListener("keydown", function (e) {
                // prevent: "e", "=", ",", "-", "."
                if ([69, 187, 188, 189, 190, 110, 109, 108, 107].includes(e.keyCode)) {
                    e.preventDefault();
                }
            });

        });
    </script>

    <script>
        $("#diploma").change(function () {
            var id = $("#diploma").val();
            $( "#dob" ).rules( "remove" );

            switch (id) {

                case '32':
                    $('.etoile').hide();
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    break;
                case '30':
                    $('.etoile').show();
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    $('input[name="dob"]').rules("add", {
                        maxAge: 45,
                        minAge: 18,
                        messages: {
                            maxAge: "{{__('traduction.maxagec')}}",
                            minAge: "{{__('traduction.minage')}}",

                        }
                    });
                    break;
                case '29':
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    $('input[name="dob"]').rules("add", {
                        maxAge: 40,
                        minAge: 18,
                        messages: {
                            maxAge: "{{__('traduction.maxage')}}",
                            minAge: "{{__('traduction.minage')}}",

                        }
                    });
                    break;
                case '39':
                case '40':
                    $('#moy_bac').hide();
                    $('#ann_pfe').show();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    $('input[name="dob"]').rules("add", {
                        maxAge: 40,
                        minAge: 18,
                        messages: {
                            maxAge: "{{__('traduction.maxage')}}",
                            minAge: "{{__('traduction.minage')}}",

                        }
                    });
                    break;


                case '13':
                case '15':
                case '17':
                case '19':
                case '21':
                case '23':
                case '25':
                case '27':
                case '37':
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#note_pfe_avec_pfe').hide();
                    $('#note_pfe').hide();
                    $('input[name="dob"]').rules("add", {
                        maxAge: 45,
                        minAge: 18,
                        messages: {
                            maxAge: "{{__('traduction.maxagec')}}",
                            minAge: "{{__('traduction.minage')}}",

                        }
                    });
                    break;
                default:

            }



        });
    </script>
    <script>


        $('#cin, #confirm_cin, #password,#confirm_password,#last_name,#first_name,#addresse,#mobile_phone,#Bachelor_degree,#last_year_degree_without_pfe,#note_pfe_avec_pfe,#note_pfe,#last_year_degree_without_pfe').bind('keyup', function() {
            if(allFilled()){
                $('#submit').prop("disabled", false);
            } else {
                $('#submit').prop("disabled", true);
            }

        });

        function allFilled() {
            var filled = true;
            $('body input').each(function() {
                if( $('input[name="cin"]').val() == '' ||
                    $('input[name="confirm_cin"]').val() == '' ||
                    $('input[name="password"]').val() == '' ||
                    $('input[name="confirm_password"]').val() == '' ||
                    $('input[name="last_name"]').val() == '' ||
                    $('input[name="first_name"]').val() == '' ||
                    $('input[name="addresse"]').val() == '' ||
                    $('input[name="mobile_phone"]').val() == ''


                ) {
                    filled = false;
                }
            });
            return filled;
        }


    </script>

    <script>
    $('input[name="bureau"]').click(function () {

        if ($(this).attr("value") == "no") {
            $("#submit").hide();
            $("#error_form").show();

        }

        if ($(this).attr("value") == "yes") {
            $("input[id*=dob]").rules("remove");
            $("#error_form").hide();
            $("input[id*=dob]").rules("add",{
                required: true,
                minAge: 16,
                maxAge: 45,
                messages : {
                    required: "{{__('traduction.ajoutbirthay')}}",
                    minAge: "{{__('traduction.minage')}}",
                    maxAge: "{{__('traduction.maxagec')}}",
                }
            });
            $("#submit").show();

        }
    });
</script>
    <script>

        $('#my_select').on('change', function (e) {
            $("#disabled_input :input").prop("disabled", false);
            $('#submit').prop("disabled", true);

            var dip_id = e.target.value;
            $.ajax({
                type: 'GET',
                url: "{{url('/json-diplomes')}}/" + dip_id,
                success: function (data) {
                    console.log(data);
                    $('#diploma').empty();
                    if (locale == 'fr') {
                        $html = '<option value=" "> {{__('traduction.Choisir votre diplôme')}} </option>';
                        $.each(data, function (index, codesObj) {
                            $html += '<option value="' + codesObj.id + '" >' + codesObj.titre + '</option>';

                        })
                        $('#diploma').append($html);
                    } else {
                        $html = '<option value=" "> {{__('traduction.Choisir votre diplôme')}} </option>';
                        $.each(data, function (index, codesObj) {
                            $html += '<option value="' + codesObj.id + '" >' + codesObj.titre_AR + '</option>';

                        })
                        $('#diploma').append($html);

                    }
                }

            });

            var form = $( "#signupForm" ).validate({
                lang: 'fr'  // or whatever language option you have.
            });
            form.resetForm();

            var id_post = $("#my_select option:selected").data('reference');
            $('#p_ref').val(id_post);

            switch (id_post)
            {

                case 'C01/2019':
                case 'C02/1/2019':
                case 'C03/2019':
                case 'C04/1/2019':
                case 'C04/2/2019':
                case 'C04/3/2019':
                    $('.permis').hide();
                    $('#dip_m').hide();
                    $('#etude_prep').show();
                    $('#bureau_emploi').hide();
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#dip_elem').show();
                    $('#niveau_etude').hide();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    $("input[id*=dob]").rules("add",{
                        required: true,
                        minAge: 18,
                        maxAge: 40,
                        messages : {
                            required: "{{__('traduction.ajoutbirthay')}}",
                            minAge: "{{__('traduction.minage')}}",
                            maxAge: "{{__('traduction.maxage')}}",
                        }
                    });
                    $("input[id*=pfe_note]").rules("add",{
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",

                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[id*=last_year_degree_without_pfe]").rules("add",{
                        required : true,
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[id*=note_pfe_avec_pfe_v]").rules("add", {
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[id*=Bachelor_degree]").rules("add", {
                        required : true,
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[name=preparatory_study]").rules("add", {
                        required : true,
                        messages : { required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[name=bureau]").rules("add", {
                        required : true,
                        messages : { required : "{{__('traduction.oblig')}}" }
                    }) ;

                    break;
                case 'C02/2/2019':
                case 'C05/2/2019':
                case 'C06/1/2019':
                case 'C05/1/2019':
                case 'C06/2/2019':
                case 'C06/3/2019':
                case 'C06/4/2019':
                case 'C06/5/2019':
                case 'C06/6/2019':
                case 'C06/7/2019':
                case 'C06/8/2019':
                case 'C06/9/2019':
                    $('.permis').hide();
                    $('#dip_m').hide();
                    $('#etude_prep').hide();
                    $('#bureau_emploi').hide();
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#dip_elem').show();
                    $('#niveau_etude').hide();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    $("input[id*=dob]").rules("add",{
                        required: true,
                        minAge: 18,
                        maxAge: 40,
                        messages : {
                            required: "{{__('traduction.ajoutbirthay')}}",
                            minAge: "{{__('traduction.minage')}}",
                            maxAge: "{{__('traduction.maxage')}}",
                        }
                    });
                    $("input[id*=pfe_note]").rules("add",{
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[id*=last_year_degree_without_pfe]").rules("add",{
                        required : true,
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[id*=note_pfe_avec_pfe_v]").rules("add", {
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[id*=Bachelor_degree]").rules("add", {
                        required : true,
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;

                    break;

                case 'C07/2019':

                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#dip_elem').show();
                    $('#etude_prep').hide();
                    $('#bureau_emploi').hide();
                    $('#note_pfe_avec_pfe').show();
                    $('#niveau_etude').hide();
                    $('#note_pfe').show();
                    $('.permis').hide();
                    $('#dip_m').hide();
                    $("input[id*=pfe_note]").rules("add",{
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[id*=last_year_degree_without_pfe]").rules("add",{
                        required : true,
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[id*=note_pfe_avec_pfe_v]").rules("add", {
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[id*=Bachelor_degree]").rules("add", {
                        required : true,
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[name=preparatory_study]").rules("add", {
                        required : true,
                        messages : { required : "{{__('traduction.oblig')}}" }
                    }) ;

                    $('input[name="bureau"]').click(function () {
                        if ($(this).attr("value") == "no") {
                            $("input[id*=dob]").rules("add",{
                                required: true,
                                minAge: 16,
                                maxAge: 40,
                                messages : {
                                    required: "{{__('traduction.ajoutbirthay')}}",
                                    minAge: "{{__('traduction.minage')}}",
                                    maxAge: "{{__('traduction.maxage')}}",
                                }
                            });
                        }
                        if ($(this).attr("value") == "yes") {
                            $("input[id*=dob]").rules("remove");
                            $("input[id*=dob]").rules("add",{
                                required: true,
                                minAge: 18,
                                maxAge: 45,
                                messages : {
                                    required: "{{__('traduction.ajoutbirthay')}}",
                                    minAge: "{{__('traduction.minage')}}",
                                    maxAge: "{{__('traduction.maxagec')}}",
                                }
                            });
                        }
                    });




                    break;
                case 'C08/2019':
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#dip_elem').show();
                    $('#etude_prep').hide();
                    $('#bureau_emploi').hide();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    $('#niveau_etude').hide();
                    $('.permis').hide();
                    $('#dip_m').hide();
                    $("input[id*=dob]").rules("add",{
                        required: true,
                        minAge: 18,
                        maxAge: 40,
                        messages : {
                            required: "{{__('traduction.ajoutbirthay')}}",
                            minAge: "{{__('traduction.minage')}}",
                            maxAge: "{{__('traduction.maxage')}}",
                        }
                    });
                    $("input[id*=pfe_note]").rules("add",{
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[id*=last_year_degree_without_pfe]").rules("add",{
                        required : true,
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[id*=note_pfe_avec_pfe_v]").rules("add", {
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[id*=Bachelor_degree]").rules("add", {
                        required : true,
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[name=preparatory_study]").rules("add", {
                        required : true,
                        messages : { required : "{{__('traduction.oblig')}}" }
                    }) ;
                    break;

                case 'C09/2019':
                    $('#etude_prep').hide();
                    $('#bureau_emploi').hide();
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#dip_elem').show();
                    $('#niveau_etude').hide();
                    $('.permis').hide();
                    $('#dip_m').hide();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    $("input[id*=pfe_note]").rules("add",{
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[id*=last_year_degree_without_pfe]").rules("add",{
                        required : true,
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[id*=note_pfe_avec_pfe_v]").rules("add", {
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[id*=Bachelor_degree]").rules("add", {
                        required : true,
                        number:true,
                        messages : {
                            number:"{{__('traduction.chiffredécimal')}}",
                            step:"{{__('traduction.chiffredécimal')}}",
                            required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $("input[name=preparatory_study]").rules("add", {
                        required : true,
                        messages : { required : "{{__('traduction.oblig')}}" }
                    }) ;

                    $('input[name="bureau"]').click(function () {
                        if ($(this).attr("value") == "no") {
                            $("input[id*=dob]").rules("add",{
                                required: true,
                                minAge: 18,
                                maxAge: 40,
                                messages : {
                                    required: "{{__('traduction.ajoutbirthay')}}",
                                    minAge: "{{__('traduction.minage')}}",
                                    maxAge: "{{__('traduction.maxage')}}",
                                }
                            });
                        }
                        if ($(this).attr("value") == "yes") {
                            $("input[id*=dob]").rules("remove");
                            $("input[id*=dob]").rules("add",{
                                required: true,
                                minAge: 18,
                                maxAge: 45,
                                messages : {
                                    required: "{{__('traduction.ajoutbirthay')}}",
                                    minAge: "{{__('traduction.minage')}}",
                                    maxAge: "{{__('traduction.maxagec')}}",
                                }
                            });
                        }
                    });
                    break;

                case 'C10/2019':
                    $('#etude_prep').hide();
                    $('#bureau_emploi').hide();
                    $('#moy_bac').hide();
                    $('#ann_pfe').show();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    $('#dip_elem').show();
                    $('#niveau_etude').hide();
                    $('.permis').hide();
                    $('#dip_m').hide();
                    $("input[id*=dob]").rules("add",{
                        required: true,
                        minAge: 18,
                        maxAge_without_alert: 40,
                        messages : {
                            required: "{{__('traduction.ajoutbirthay')}}",
                            minAge: "{{__('traduction.minagec')}}",
                            maxAge_without_alert: "{{__('traduction.maxage')}}",
                        }
                    });
                    break;

                case 'C11/2019':
                    $('#etude_prep').hide();
                    $('#bureau_emploi').hide();
                    $('#moy_bac').hide();
                    $('#ann_pfe').hide();
                    $('#dip_elem').hide();
                    $('#niveau_etude').show();
                    $('.permis').show();
                    $('#dip_m').show();
                    $('#note_pfe_avec_pfe').hide();
                    $('#note_pfe').hide();
                    $("input[id*=date_of_obtaining_a_driving_license]").rules("add",{
                        required : true,
                        messages : { required : "{{__('traduction.oblig')}}" }
                    }) ;
                    $('input[name="dip_m"]').click(function () {
                        if ($(this).attr("value") == "no") {
                            $("#submit").hide();
                        }
                        if ($(this).attr("value") == "yes") {
                            $("#submit").show();

                        }
                    });
                    $("input[id*=dob]").rules("add",{
                        required: true,
                        minAge: 18,
                        maxAge_without_alert: 40,
                        messages : {
                            required: "{{__('traduction.ajoutbirthay')}}",
                            minAge: "{{__('traduction.minagec')}}",
                            maxAge_without_alert: "{{__('traduction.maxage')}}",
                        }
                    });
                    break;

                case 'C12/2019':
                case 'C13/2019':
                    $('.permis').hide();
                    $('#dip_m').hide();
                    $('#etude_prep').hide();
                    $('#bureau_emploi').hide();
                    $('#moy_bac').hide();
                    $('#ann_pfe').hide();
                    $('#note_pfe_avec_pfe').hide();
                    $('#note_pfe').hide();
                    $('#dip_elem').hide();
                    $('#niveau_etude').show();

                    $("input[id*=dob]").rules("add",{
                        required: true,
                        minAge: 25,
                        maxAge_without_alert: 40,
                        messages : {
                            required: "{{__('traduction.ajoutbirthay')}}",
                            minAge: "{{__('traduction.minagec')}}",
                            maxAge_without_alert: "{{__('traduction.maxage')}}",
                        }
                    });


                    break;

                default:

            }
        });

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

    <script>
        $('#my_select').on('change', function (e) {

            var dip_id = e.target.value;
            $.ajax({
                type: 'GET',
                url: "{{url('/json-diplomes')}}/" + dip_id,
                success: function (data) {
                    console.log(data);
                    $('#level_studies').empty();
                    if (locale == 'fr') {
                        $html = '<option value=" "> {{__('traduction.Choisir votre niveau')}} </option>';
                        $.each(data, function (index, codesObj) {
                            $html += '<option value="' + codesObj.id + '" >' + codesObj.titre + '</option>';

                        })
                        $('#level_studies').append($html);
                    } else {
                        $html = '<option value=" "> {{__('traduction.Choisir votre niveau')}} </option>';
                        $.each(data, function (index, codesObj) {
                            $html += '<option value="' + codesObj.id + '" >' + codesObj.titre_AR + '</option>';

                        })
                        $('#level_studies').append($html);

                    }
                }

            });
        });

    </script>

@endsection

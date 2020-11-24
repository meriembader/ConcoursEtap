@extends('projetEnit.layout')


@section('header')
    @include('projetEnit.layout.header')
@endsection


@section('content')
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond&display=swap" rel="stylesheet">
    <link href="https://necolas.github.io/normalize.css/8.0.1/normalize.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link type="text/css" rel="stylesheet" src="css/jquery-ui.min.css">
    <link type="text/css" rel="stylesheet" src="css/jquery-ui.structure.min.css">
    <link type="text/css" rel="stylesheet" src="css/jquery-ui.theme.min.css">
    @if($res == 1)
        <style>
            form#signupForm {
                pointer-events: none;
            }
        </style>
    @endif

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

            h5 {
                display: flex;
                justify-content: flex-end;
                font-size: 17px;
            }

            .label {
                display: flex;
                flex-direction: row-reverse;

            }

            .righ {
                display: flex;
                flex-direction: row-reverse;
            }

            p.bhm {
                display: flex;
                flex-direction: row-reverse;
            }
        </style>
    @endif

    <style>

        body {
            font-family: 'Cormorant Garamond', serif;

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

        #pswd_info {
            position: absolute;

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
            -moz-appearance: textfield;
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

        .captcha label {
            float: left;
            font-size: 22px;
            font-family: 'primelight';
            font-size: 20px;
            line-height: 30px;
            margin-right: 10px;
        }

        button#refresh {
            height: 43px;
        }

        .captcha {
            margin: 0 auto;
            width: 300px;
            height: 115px;
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
    </style>
    <script>
        $(document).ready(function () {

            $('input[type=password]').keyup(function () {
                // keyup code here
            }).focus(function () {
                $('#pswd_info').show();
            }).blur(function () {
                $('#pswd_info').hide();
            });
        });
    </script>

    <center>
        <h3 style="color :black">{{__('traduction.ficheinscription')}}</h3><br>
        {{--<p style="color :black">{{__('traduction.fiche_modif')}}</p>--}}


    </center>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <p>
            @if($res == 1)
                @if( $current_date <= $date_prevesoire)
                    <p class="text-center bg-info" style="
                    font-size: 27px;
                    letter-spacing: 2.4px;
                    word-spacing: 0.2px;
                    color: #000000;
                    font-weight: 700;
                    text-decoration: none solid rgb(68, 68, 68);
                    font-style: normal;
                    font-variant: small-caps;
                    text-transform: uppercase;">Votre dossier est en cours de traitement</p>

                @else

                    <p class="text-center bg-info" style="color:black">
                        @isset($data)
                            <?=
                            str_replace(array('%poste%', '%rang%', '%score%', '%sis%', '%nom_prenom%'), array($candidat->poste, '...', $candidat->score_1, ' Rue Béchir Salem Belkhira Campus universitaire FARHAT HACHED EL Manar ', $candidat->first_name), $data->msg);
                            ?>
                        @endisset
                    </p>
                @endif
            @elseif($res == 0)
                @if(config('app.locale') == 'fr')
                    <div class="alert alert-success">
                        Votre inscription est confirmée sous le numéro {{$candidat->id_dossier}}, vous pouvez modifier votre candidature avant la clôture du concours en cliquant sur le lien "Fiche d'inscription"
                        en haut de la page ou encore en vous connectant à votre espace personnel en utilisant votre CIN en tant qu'identifiant et le mot de passe que vous avez choisi.
                    </div>
                @else
                    <div class="alert alert-success ar" style="text-align: right;">


                        تم تأكيد تسجيلك
                        يمكنك تعديل المعلومات الخاصة بك في أي وقت قبل
                        إغلاق
                        . المناظرة ، يمكنك الاتصال بحسابك في أي وقت باستخدام ب.ت.و
                        <br>
                        {{$candidat->id_dossier}}: معرف ملفك<br>

                    </div>
                    @endif
                    @endif
                    </p>
        </div>
        <div class="col-md-2">
            @if (Config::get('app.locale') == 'fr')
                <a href="{{route ('generateficheinscription', $candidat->cin )}}"
                   style="color: black; font-size: 25px; margin-bottom : 40px"
                   class="pull-left"
                   target="_blank"> <i class="fa fa-print"></i>
                    {{__('traduction.imprimer')}}
                </a>
            @else
                <a href="{{route ('generateficheinscription_AR', $candidat->cin )}}"
                   style="color: black; font-size: 25px; margin-bottom : 40px"
                   class="pull-left"
                   target="_blank"> <i class="fa fa-print"></i>
                    {{__('traduction.imprimer')}}
                </a>

            @endif
        </div>

    </div>
    <div class="container-fluid">
      <div class="col-md-10 col-md-offset-1">
        <form name="my-form" id="signupForm" class="js-validation">
            {{csrf_field()}}
            <input type="hidden" value="{{$candidat->id}}" name="c_id">

            <input type="hidden" name="p_ref" value="{{$candidat->post->reference}}" id="p_ref">
            <input type="hidden" name="candidat_iddd" value="{{$candidat->id}}" id="p_ref">
            <p style="color : red" class="bhm ">{{__('traduction.champs')}}</p>

            <div class="row">
                <div class="panel panel-default ">
                    <div class="panel panel-heading">
                        <h5 style="color: #204184;"> {{__('traduction.Les données E-mail')}}</h5>

                    </div>
                    <div class="panel-body">
                        <div class="form-group row" >
                            <label for="full_name"
                                   class="col-md-2 col-form-label text-md-right"><b>{{ __('traduction.nom du poste') }}
                                    *</b></label>
                            <div class="col-md-10 panel-width" style="margin-left: -14px;">
                                <select name="poste" id="my_select" class="form-control"
                                        @if ($errors->first('poste')) style="border-color: red;" @endif>
                                    <option value="">{{ __('traduction.Choisir le poste') }} </option>
                                    @foreach($postes as $poste)
                                        <option value="{{ $poste->id }}"
                                                @if($poste->id == $candidat->post->id) selected
                                                @endif id="{{$poste->reference}}"
                                                data-reference="{{$poste->reference}}">
                                            {{ $poste->reference }}
                                            -- @if (Config::get('app.locale') == 'fr'){{ $poste->postname}}@else{{ $poste->postname_AR}}@endif
                                        </option>
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


            <div class="row">
                <div class="panel panel-default ">
                    <div class="panel panel-heading">
                        <h5 style="color: #204184;"> {{__('traduction.Les données du mot de passe')}} </h5>

                    </div>
                    <label class="righ">{{__('traduction.guideauthentification')}} </label>

                    <div class="panel-body righ">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="cin"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.CIN')}}
                                        *</b></label>
                                <div class="col-md-6">
                                    <input type="number" id="cin" class="form-control" name="cin" maxlength="8"
                                           value="{{ $candidat->cin  }}"
                                           placeholder="{{ __('traduction.Ajouter votre numéro CIN') }}"
                                           title="{{ __('traduction.testCIN') }}" disabled
                                           oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"

                                           @if ($errors->first('cin')) style="border-color: red;" @endif>
                                    @if ($errors->first('cin'))
                                        <span style="color: red"> {{ $errors->first('cin') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cin"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.Confirmer CIN')}}
                                        *</b></label>
                                <div class="col-md-6">
                                    <input type="hidden" value="{{ $candidat->cin }}" name="cin">
                                    <input type="number" id="confirm_cin" class="form-control" name="confirm_cin"
                                           maxlength="8"
                                           value="{{ $candidat->cin }}"
                                           placeholder="{{ __('traduction.Confirmer votre numéro CIN') }}" disabled
                                           oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"

                                           @if ($errors->first('ciconfirm_cinn')) style="border-color: red;" @endif>
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
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.password')}}
                                    </b></label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control"
                                           placeholder="{{__('traduction.Ajouter votre mot de passe')}}"
                                           title="{{__('traduction.conditions')}}"
                                           name="password" value="{{ old('password') }}"
                                           @if ($errors->first('password')) style="border-color: red;"
                                           @endif style="margin-bottom: 8px;">
                                    <span toggle="#password" class="fa fa-eye field-icon toggle-password"></span>
                                    @if ($errors->first('password'))
                                        <span
                                            style="color: red"> {{ $errors->first('password') }}</span>
                                    @endif

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
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.Confirmé Mot de passe')}}
                                    </b></label>
                                <div class="col-md-6">
                                    <input type="password" id="confirm_password" class="form-control"
                                           name="confirm_password" value="{{ old('confirm_password') }}"
                                           placeholder="{{__('traduction.Vérifier votre mot de passe')}}"
                                           @if ($errors->first('confirm_password')) style="border-color: red;" @endif>
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

                        <h5 style="color: #204184;">{{ __('traduction.Les données personnelles') }}</h5>

                    </div>
                    <label class="righ">{{ __('traduction.guidedonnée') }}</label>

                    <div class="panel-body righ">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="last_name"
                                       class="col-md-6 col-form-label text-md-right"><b>{{ __('traduction.Nom') }}*</b></label>
                                <div class="col-md-6">
                                    <input type="text" id="last_name" class="form-control" name="last_name"
                                           value="{{ $candidat->last_name }}"
                                           placeholder="{{ __('traduction.Ajouter Votre Nom') }}"
                                           @if ($errors->first('last_name')) style="border-color: red;" @endif>
                                    @if ($errors->first('last_name'))
                                        <span
                                            style="color: red"> {{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="first_name"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.Prénom')}}*</b></label>
                                <div class="col-md-6">
                                    <input type="text" id="first_name" class="form-control"
                                           name="first_name" value="{{ $candidat->first_name }}"
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
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.Date de Naissance')}}
                                        *</b>
                                </label>
                                <div class="col-md-6">

                                    <input type="text" name="dob" id="dob" class="form-control"
                                           placeholder="Jour/Mois/Année"
                                           style="color: black" value="{{ $candidat->birthday->format('d/m/Y') }}"
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
                                           value="{{ $candidat->place_of_birth }}"
                                           placeholder="{{ __('traduction.Ajouter le lieu de naissance') }}"
                                           @if ($errors->has('place_of_birth')) style="border-color:red;" @endif>
                                    @if ($errors->first('place_of_birth'))
                                        <span style="color: red"> {{ $errors->first('place_of_birth') }}</span>
                                    @endif
                                </div>
                            </div>

                            @if($candidat->user->email)
                                <div class="form-group row">
                                    <label for="Email" class="col-md-6 col-form-label text-md-right">
                                        <b> {{__('traduction.emailadress')}}</b>
                                    </label>
                                    <div class="col-md-6 form-check ">
                                        <input class="form-check-input" type="radio" id="checked"
                                               name="mail"
                                               value="yes" checked="checked">
                                        <label class="form-check-label"
                                               style="color : black">{{__('traduction.oui')}}</label>
                                        <input class="form-check-input" type="radio" id=""
                                               name="mail"
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
                                                   value="{{ $candidat->user->email }}"
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
                                                   name="confirm_email" value="{{ $candidat->user->email }}"
                                                   placeholder="{{__('traduction.Confirmer votre adresse E-mail')}}"
                                                   @if ($errors->first('confirm_email')) style="border-color: red;" @endif>
                                            @if ($errors->first('confirm_email'))
                                                <span
                                                    style="color: red"> {{ $errors->first('confirm_email') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            @else
                                <div class="form-group row">
                                    <label for="Email" class="col-md-6 col-form-label text-md-right">
                                        <b> {{__('traduction.emailadress')}}</b>
                                    </label>
                                    <div class="col-md-6 form-check ">
                                        <input class="form-check-input" type="radio" id=""
                                               name="mail"
                                               value="yes">
                                        <label class="form-check-label"
                                               style="color : black">{{__('traduction.oui')}}</label>
                                        <input class="form-check-input" type="radio" id=""
                                               name="mail"
                                               value="no" checked>
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
                                                   value="{{ $candidat->user->email }}"
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
                                                   name="confirm_email" value="{{ $candidat->user->email }}"
                                                   placeholder="{{__('traduction.Confirmer votre adresse E-mail')}}"
                                                   @if ($errors->first('confirm_email')) style="border-color: red;" @endif>
                                            @if ($errors->first('confirm_email'))
                                                <span
                                                    style="color: red"> {{ $errors->first('confirm_email') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">


                            <div class="form-group row">
                                <label style="color :black"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.addresse habitat')}}
                                        *</b></label>
                                <div class="col-md-6">
                                    <textarea type="text" id="addresse" class="form-control" name="addresse"
                                              value="" rows="5" cols="33"
                                              @if ($errors->has('addresse')) style="border-color:red;" @endif>{{ $candidat->addresse }}</textarea>
                                    @if ($errors->first('addresse'))
                                        <span style="color: red"> {{ $errors->first('addresse') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="mobile_phone" class="col-md-6 col-form-label text-md-right">
                                    <b> {{__('traduction.Numéro du Téléphone')}}*</b>
                                </label>
                                <div class="col-md-6">
                                    <input type="number" id="mobile_phone" class="form-control"
                                           name="mobile_phone" value="{{ $candidat->mobile_phone }}"
                                           onkeypress="return restrictAlphabets(event)"

                                           placeholder="{{ __('traduction.Ajouter votre numéro du télephone') }}"
                                           @if ($errors->first('mobile_phone')) style="border-color: red;" @endif>
                                    <script type="text/javascript">

                                        function restrictAlphabets(e) {
                                            var x = e.which || e.keycode;
                                            if ((x >= 48 && x <= 57) || x == 8 ||
                                                (x >= 35 && x <= 40) || x == 46)
                                                return true;
                                            else
                                                return false;
                                        }
                                        $('#mobile_phone').on('paste', function (event) {
                                         if (event.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
                                           event.preventDefault();
                                         }
                                        });

                                        $("#mobile_phone").on("keypress",function(event){
                                                       if(event.which <= 48 || event.which >=57){
                                                           return false;
                                                       }
                                                   });
                                    </script>
                                    @if ($errors->first('mobile_phone'))
                                        <span
                                            style="color: red"> {{ $errors->first('mobile_phone') }}</span>
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
                        <h5 style="color: #204184;"> {{__('traduction.Les données relatives')}}</h5>

                    </div>
                    <label class="righ">{{__('traduction.guidedip')}}</label>

                    <div class="panel-body righ">
                        <div class="col-md-6">

                            @if($candidat->level_studies)
                                <div class="form-group row" id="niveau_etude">
                                    <label style="color :black"
                                           class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.niveau etude')}}
                                            *</b></label>
                                    <input type="hidden" id="niveau_etude">
                                    <div class="col-md-6 level_studies">
                                        <select name="level_studies" id="level_studies" class="form-control "
                                                @if ($errors->first('diploma')) style="border-color: red" @endif>
                                            <option value="{{$candidat->level_studies}}"
                                                    selected>@if (Config::get('app.locale') == 'fr'){{$candidat->level->titre}}@else{{$candidat->level->titre_AR}}@endif</option>
                                        </select>
                                        @if ($errors->first('diploma'))
                                            <span
                                                style="color: red"> {{ $errors->first('diploma') }}</span>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="form-group row" id="niveau_etude">
                                    <label style="color :black"
                                           class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.niveau etude')}}
                                            *</b></label>
                                    <input type="hidden" id="diplome_id">
                                    <div class="col-md-6 level_studies">
                                        <select name="level_studies" id="level_studies" class="form-control "
                                                @if ($errors->first('diploma')) style="border-color: red" @endif>

                                        </select>
                                        @if ($errors->first('diploma'))
                                            <span
                                                style="color: red"> {{ $errors->first('diploma') }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if($candidat->diplome_id)
                                <div class="form-group row" id="dip_elem">
                                    <label style="color :black"
                                           class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.diplome')}}
                                            *</b></label>
                                    <input type="hidden" id="diplome_id">
                                    <div class="col-md-6">
                                        <select name="diploma" id="diploma" class="form-control"
                                                @if ($errors->first('diploma')) style="border-color: red" @endif>
                                                @foreach($diplomes as $dip)
                                                      <option value="{{ $dip->id }}"
                                                              @if($dip->id == $candidat->diplome_id) selected
                                                              @endif
                                                              >
                                                          @if (Config::get('app.locale') == 'fr'){{ $dip->titre}}@else{{ $dip->titre_AR}}@endif
                                                      </option>
                                                  @endforeach
                                        </select>
                                        @if ($errors->first('diploma'))
                                            <span
                                                style="color: red"> {{ $errors->first('diploma') }}</span>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="form-group row" id="dip_elem">
                                    <label style="color :black"
                                           class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.diplome')}}
                                            *</b></label>
                                    <input type="hidden" id="diplome_id">
                                    <div class="col-md-6">
                                        <select name="diploma" id="diploma" class="form-control"
                                                @if ($errors->first('diploma')) style="border-color: red" @endif>
                                            <option value=" "> {{__('traduction.Choisir votre diplôme')}} </option>
                                        </select>
                                        @if ($errors->first('diploma'))
                                            <span
                                                style="color: red"> {{ $errors->first('diploma') }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endif


                            <div class="form-group row" id="moy_bac">
                                <label style="color :black"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.moyen bac')}}
                                        <span class="etoile"> *</span></b></label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="Bachelor_degree" min="0"
                                           placeholder="{{__('traduction.Saisir votre moyenne du BaccaLauréat')}}"
                                           max="20"
                                           id="Bachelor_degree"

                                           step="0.01"
                                           value="{{ $candidat->Bachelor_degree }}"
                                           @if ($errors->has('Bachelor_degree')) style="border-color:red;" @endif>
                                    @if ($errors->first('Bachelor_degree'))
                                        <span style="color: red"> {{ $errors->first('Bachelor_degree') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row" id="etude_prep">
                                <label style="color :black"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.etude prepa')}}
                                        *</b></label>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline" style="float: left;">
                                        <input class="form-check-input" type="radio"
                                               name="preparatory_study"
                                               value="yes"<?php echo ($candidat->preparatory_study == 'yes') ? 'checked="checked"' : '' ?>>
                                        <label class="form-check-label"
                                               style="color : black">{{__('traduction.oui')}}</label>
                                        <input class="form-check-input" type="radio"
                                               <?php echo ($candidat->preparatory_study == 'no') ? 'checked="checked"' : '' ?>
                                               name="preparatory_study" value="no">
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
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.bureau')}}
                                        *</b></label>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline" style="float: left;">
                                        <input class="form-check-input" type="radio" id="inlineRadio6"
                                               name="bureau"
                                               <?php echo ($candidat->conformite_attestation_inscription == 'yes') ? 'checked="checked"' : '' ?>
                                               @if ($errors->first('bureau')) style="border-color: red"
                                               @endif
                                               value="yes">
                                        <label class="form-check-label"
                                               style="color : black">{{__('traduction.oui')}}</label>
                                        <input class="form-check-input" type="radio" id="inlineRadio7"
                                               name="bureau"
                                               <?php echo ($candidat->conformite_attestation_inscription == null) ? 'checked="checked"' : '' ?>
                                               @if ($errors->first('bureau')) style="border-color: red"
                                               @endif
                                               value="">
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
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.permis')}}*</b></label>
                                <div class="col-md-6">

                                    <input type="text" id="date_of_obtaining_a_driving_license" class="form-control"
                                           name="date_of_obtaining_a_driving_license"
                                           value="@isset($candidat->date_of_obtaining_a_driving_license){{date("d/m/Y", strtotime($candidat->date_of_obtaining_a_driving_license))}}@endisset"
                                           placeholder="Jour/Mois/Année"
                                           @if ($errors->first('date_of_obtaining_a_driving_license')) style="border-color: red;" @endif >
                                    @if ($errors->first('birthday'))
                                        <span
                                            style="color: red"> {{ $errors->first('date_of_obtaining_a_driving_license') }}</span>
                                    @endif
                                    <p id="id-error" class="error help-block" style="display: none;">Votre age doit etre
                                        inférieur a 45ans</p>

                                </div>
                            </div>


                        </div>
                        <div class="col-md-6">


                            <div class="form-group row" id="dip_m">
                                <label style="color :black"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.dip_m')}}
                                        *</b></label>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline" style="float: left;">
                                        <input class="form-check-input" type="radio"
                                               name="dip_m"
                                               value="yes"
                                        <?php echo ($candidat->dip_m == 'yes') ? 'checked="checked"' : '' ?>>
                                        <label class="form-check-label"
                                               style="color : black">{{__('traduction.oui')}}</label>
                                        <input class="form-check-input" type="radio"
                                               name="dip_m"
                                               value="no"
                                        <?php echo ($candidat->dip_m == 'no') ? 'checked="checked"' : '' ?>>
                                        <label class="form-check-label"
                                               style="color : black">{{__('traduction.Non')}}</label>
                                    </div>
                                    @if ($errors->first('dip_m'))
                                        <span style="color: red"> {{ $errors->first('dip_m') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row" id="ann_pfe">
                                <label style="color :black" class="col-md-6 col-form-label text-md-right"><b>
                                        {{__('traduction.without pfe')}}<span class="etoile"> *</span></b></label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="last_year_degree_without_pfe"
                                           step="0.01"
                                           id="last_year_degree_without_pfe"
                                           min="0"
                                           max="20"
                                           value="{{ $candidat->last_year_degree_without_pfe }}"
                                           placeholder="{{__('traduction.Saisir votre moyenne de dernière année sans PFE')}}"
                                           @if ($errors->has('last_year_degree_without_pfe')) style="border-color:red;" @endif>
                                    @if ($errors->first('last_year_degree_without_pfe'))
                                        <span
                                            style="color: red"> {{ $errors->first('last_year_degree_without_pfe') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row" id="note_pfe_avec_pfe">
                                <label style="color :black"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.moyenneavecpfe')}}
                                    </b></label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="note_pfe_avec_pfe" min="0"
                                           step="0.01"
                                           placeholder="{{__('traduction.saisir moyenneavecpfe')}}"
                                           max="20"
                                           id="note_pfe_avec_pfe_v"
                                           value="{{$candidat->note_pfe_avec_pfe}}"
                                           @if ($errors->has('note_pfe_avec_pfe')) style="border-color:red;" @endif>
                                    @if ($errors->first('note_pfe_avec_pfe'))
                                        <span
                                            style="color: red"> {{ $errors->first('note_pfe_avec_pfe') }}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row" id="note_pfe">
                                <label style="color :black"
                                       class="col-md-6 col-form-label text-md-right"><b>{{__('traduction.notepfe')}}
                                    </b></label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="note_pfe" id="pfe_note"
                                           step="0.01"
                                           min="0"
                                           max="20"
                                           value="{{ $candidat->note_pfe }}"
                                           placeholder="{{__('traduction.note_pfe')}}"
                                           @if ($errors->has('note_pfe')) style="border-color:red;" @endif>
                                    @if ($errors->first('note_pfe'))
                                        <span
                                            style="color: red"> {{ $errors->first('note_pfe') }}
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
                    @if($res !== 1)
                        <div class="form-group row ">
                            <div class=" ">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="agree" name="agree" value="agree"
                                               style="width: 20px;height: 20px">
                                         <b>{{__('traduction.certification')}}</b>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="agree_sec" name="agree_sec" value="agree"
                                               style="width: 20px;height: 20px">
                                         <b>{{__('traduction.infoexacte')}}</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    @if($res !== 1)
                        <div class="form-group row ">
                            <div class="pull-right">
                                <div class="checkbox">
                                    <label class="">
                                        <b>{{__('traduction.certification')}}</b>
                                        <input type="checkbox" class="" id="agree" name="agree" value="agree"
                                               style="width: 20px;height: 20px">
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <b>{{__('traduction.infoexacte')}}</b>
                                        <input type="checkbox" id="agree_sec" name="agree_sec" value="agree"
                                               style="width: 20px;height: 20px">
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
                <div id="error"></div>
                <br>
                <center>
                    @if($res !== 1)
                        <div class="captcha">
                            <span>{!!  captcha_img() !!}</span>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Entrez code"
                                       name="captcha">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-success" id="refresh"><i
                                            class="fa fa-refresh"></i>
                                    </button>
                                </div>
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                    @endif
                    <div id="error_form"></div>
                    <br>
                    <br>
                    <br>
                    <div id="captcha"></div>

                    @if($res == 1)
                        <p></p>

                    @else
                        <button type="button" id="submit" class=" btn btn-primary"
                                style="width : 120px">{{__('traduction.Valider')}}</button>
                    @endif
                    <div id='loader'><img src="{{asset('images/spinner.gif')}}"/></div>
                    @if ($errors->first('captcha'))
                        <span
                            style="color: red"> {{ $errors->first('captcha') }}</span>
                    @endif
                </center>


            </div>

        </form>
      </div>

    </div>






@endsection

@section('footer')
    @include('projetEnit.layout.footer')
@endsection
@section('scripts')
    <script>
        var locale = '{{ config('app.locale') }}';
    </script>


    <script src="{{asset('js/jquery-min.slim.js')}}"></script>
    <script src="{{asset('js/jquery1.11.3.js')}}"></script>
    <script src="{{asset('js/validatorjs.js')}}"></script>
    <script src="{{asset('js/jasny-bootstrap.min.js')}}"></script>

    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/localization/messages_fr.js"/>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="{{asset('js/moments.js')}}"></script>
    <script src="{{asset('js/jqueryui.js')}}"></script>


    <script>
        $(document).on('click', '#submit', function (e) {
            $(".parsley-errors-list").remove();
            $("#error_form").remove();

            $("input, select").css('border-color', '');
            $("input, select").removeClass("parsley-error");
            e.preventDefault();
            if ($('.js-validation').valid()) {
                var formData;
                formData = $('#signupForm').serialize();
                var validator = $(".js-validation").validate();
                $.ajax({
                    url: '{{route('handleCandidatdeuxiemeAdd',Config('app.locale'))}}',
                    type: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    success: function (response) {
                        console.log(response)
                        if (response.errors) {
                            $.each(response.errors, function (index, value) {
                                $('#' + index).css('border-color', 'red');
                                $('#' + index).addClass('parsley-error');
                                $("<ul class='parsley-errors-list text-danger' id='parsley-id-9842'><li class='print-error text-danger' style='font-weight: bold;font-size: 15px;'>" + value + "</li></ul>").insertAfter('#' + index);
                                $("#error_form").append("<li class='alert alert-danger'>" + index + ":" + value + "</li>")
                            });
                            refreshCaptcha()

                        } else {
                            window.location.href = (response.url);
                        }


                    }
                });
            }
        });
    </script>





    <script>
        $('#refresh').on('click', function () {
            refreshCaptcha()
        });

        function refreshCaptcha() {
            $.ajax({
                type: 'GET',
                url: '{{route('captcha')}}',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        }

        $('#show_email').hide();
        $('input[name="mail"]').click(function () {
            if ($(this).attr("value") == "no") {
                $("#show_email").hide('slow');
            }
            if ($(this).attr("value") == "yes") {
                $("#show_email").show('slow');

            }
        });
    </script>



    <script>
        $(document).ready(function () {
            $('#loader').hide();
            jQuery.ajaxSetup({
                beforeSend: function () {
                    $('#loader').show();
                },
                complete: function () {
                    $('#loader').hide();
                },
                success: function () {
                }
            });

            $('#show_email').hide();
            var isChecked = $('#checked').is(':checked');
            if (isChecked) {
                $("#show_email").show('slow');

            }
            $.validator.addMethod("minAge", function (value, element, min) {
                var min_age = min;


                var convert_date = function () {
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
                        url: "{{route('get_age')}}",
                        data: {date: value},
                        success: function (response) {
                            tmp = response;
                        }
                    });
                    return tmp
                }();
                var today = new Date();

                var birthDate = new Date(convert_date);

                var age = today.getFullYear() - birthDate.getFullYear();
                if (age > min_age) {
                    return true;
                }
            });
            $.validator.addMethod("maxAge", function (value, element, min) {
                var max_age = min;
                var convert_date = function () {
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
                        url: "{{route('get_age')}}",
                        data: {date: value},
                        success: function (response) {
                            tmp = response;
                        }
                    });
                    return tmp
                }();
                var today = new Date();

                var birthDate = new Date(convert_date);
                var age = today.getFullYear() - birthDate.getFullYear();

                if (age < max_age) {
                    return true;
                }
            });
            $.validator.addMethod("pwcheckL", function (value) {
                return /[a-z]/.test(value) // has a lowercase letter
            });
            $.validator.addMethod("pwcheckD", function (value) {
                return /\d/.test(value) // has a lowercase letter
            });
            $.validator.addMethod("pwcheckC", function (value) {
                return /[A-Z]/.test(value) // has a lowercase letter
            });
            $.validator.addMethod("pwcheckS", function (value) {
                return /.[!,@,#,$,%,^,&,*,?,_,~,-,(,),+]/.test(value) // has a lowercase letter
            });
            $("#signupForm").validate({

                rules: {
                    dob: {
                        required: true,
                        minAge: 17,
                        maxAge: 40,
                    },

                    poste: {
                        required: true,
                    },
                    last_name: "required",
                    first_name: "required",
                    cin: {
                        required: true,
                        minlength: 8,
                        maxlength: 8,
                    },
                    confirm_cin: {
                        required: true,
                        minlength: 8,
                        maxlength: 8,
                        equalTo: "#cin"
                    },

                    addresse: "required",
                    mobile_phone: {
                      required: true,
                      number: true,
                    },


                    password: {
                        minlength: 8
                    },
                    confirm_password: {
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
                        required: "{{__('traduction.ajoutbirthay')}}",
                        minAge: "{{__('traduction.minage')}}",
                        maxAge: "{{__('traduction.maxage')}}",
                    },
                    poste: "{{__('traduction.selectposte')}}",
                    birthday: "{{__('traduction.ajoutbirthay')}}",
                    mobile_phone: "{{__('traduction.Ajouter votre numéro du télephone')}}",
                    addresse: "{{__('traduction.Ajouter votre Adresse')}}",
                    cin: {
                        required: "{{__('traduction.Ajouter votre numéro CIN')}}",
                        minlength: "{{__('traduction.testCIN')}}",
                        maxlength: "{{__('traduction.testCIN')}}",
                    },
                    captcha:"required",
                    confirm_cin: {
                        required: "{{__('traduction.Ajouter votre numéro CIN')}}",
                        minlength: "{{__('traduction.testCIN')}}",
                        maxlength: "{{__('traduction.testCIN')}}",
                        equalTo: "{{__('traduction.equalCIN')}}"

                    },
                    first_name: "{{__('traduction.Ajouter Votre Prenom')}}",
                    last_name: "{{__('traduction.Ajouter Votre Nom')}}",
                    confirm_email: {
                        equalTo: "{{__('traduction.equalmail')}}"
                    },
                    password: {
                        minlength: "{{__('traduction.caractères')}}",
                        pwcheckD: "{{__('traduction.chiffre')}}",
                        pwcheckL: "{{__('traduction.lettremaj')}}",
                        pwcheckC: "{{__('traduction.lettremin')}}",
                        pwcheckS: "{{__('traduction.spécial')}}",
                    },
                    diploma: {
                        min: "{{__('traduction.Choisir votre diplôme')}}",
                    },
                    confirm_password: {
                        minlength: "{{__('traduction.caractères')}}",
                        equalTo: "{{__('traduction.equalpass')}}",
                        pwcheckD: "{{__('traduction.chiffre')}}",
                        pwcheckL: "{{__('traduction.lettremaj')}}",
                        pwcheckC: "{{__('traduction.lettremin')}}",
                        pwcheckS: "{{__('traduction.spécial')}}",
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

            function passwordStrength(password) {

                var desc = [{'width': '0px'}, {'width': '20%'}, {'width': '40%'}, {'width': '60%'}, {'width': '80%'}, {'width': '100%'}];

                var descClass = ['', 'progress-bar-warning', 'progress-bar-info', 'progress-bar-danger', 'progress-bar-success', 'progress-bar-success'];

                var score = 0;

                //if password bigger than 6 give 1 point
                //  if (password.length > 7) score++;

                //if password has both lower and uppercase characters give 1 point
                if ((password.match(/[a-z]/)) && (password.match(/[A-Z]/))) score = score + 2;

                //if password has at least one number give 1 point
                if (password.match(/[0-9]/)) score++;

                //if password has at least one special caracther give 1 point
                if (password.match(/.[+,!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) score++;

                //if password bigger than 12 give another 1 point
                if (password.length > 8) score++;
                // display indicator
                $("#jak_pstrength").removeClass(descClass[score - 1]).addClass(descClass[score]).css(desc[score]);
            }

            jQuery(document).ready(function () {
                jQuery("#oldpass").focus();
                jQuery("#password").keyup(function () {
                    passwordStrength(jQuery(this).val());
                });
            });


            var id_post = $("#my_select option:selected").data('reference');
            $('#p_ref').val(id_post);

            switch (id_post) {

                case 'C01/2019':
                case 'C02/1/2019':
                case 'C03/2019':
                case 'C04/1/2019':
                case 'C04/2/2019':
                case 'C04/3/2019':
                    $('.permis').hide();
                    $('#dip_m').hide();
                    $('#etude_prep').show();
                    $('#bureau_emploi').show();
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#dip_elem').show();
                    $('#niveau_etude').hide();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
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
                    $('#bureau_emploi').show();
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#dip_elem').show();
                    $('#niveau_etude').hide();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    var id = $("#diploma").val();
                    if (id == 23 || id == 17|| id == 21
                        || id == 13|| id == 37
                        || id == 15
                        || id == 17
                        || id == 19
                        || id == 21
                        || id == 23
                        || id == 25
                        || id == 27

                    ) {
                        $('#note_pfe_avec_pfe').hide();
                        $('#note_pfe').hide();
                    }
                    break;

                case 'C07/2019':
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#dip_elem').show();
                    $('#etude_prep').hide();
                    $('#bureau_emploi').show();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    $('#dip_m').hide();
                    $('.permis').hide();
                    $('#niveau_etude').hide();

                    var id = $("#diploma").val();
                    if (id == 32) {
                        $('.etoile').hide();

                    } else if (id == 30 || id == 29) {
                        $('.etoile').show();
                        $('#moy_bac').show();
                        $('#ann_pfe').show();
                        $('input[name="dob"]').rules("add", {
                            maxAge: 45,
                            messages: {
                                maxAge: "vous devez avoir au maximum 45 ans!",
                            }
                        });
                        $('input[name="Bachelor_degree"]').rules("add", {
                            required: true,
                            messages: {
                                required: "Merci d'ajouter votre note pfe",
                            }
                        });

                        $('input[name="last_year_degree_without_pfe"]').rules("add", {
                            required: true,
                            messages: {
                                required: "Merci d'ajouter votre note du bac",
                            }
                        });

                    } else if (id == 39) {
                        $('#moy_bac').hide();
                        $('#ann_pfe').show();
                        $('input[name="dob"]').rules("add", {
                            maxAge: 40,
                            required: true,
                            messages: {
                                maxAge: "vous devez avoir au maximum 40 ans!",
                            }
                        });
                    }

                    break;
                case 'C08/2019':
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#dip_elem').show();
                    $('#etude_prep').hide();
                    $('#bureau_emploi').hide();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    $('#dip_m').hide();
                    $('.permis').hide();
                    $('#niveau_etude').hide();

                    var id = $("#diploma").val();
                    if (id == 32) {
                        $('.etoile').hide();

                    } else if (id == 30 || id == 29) {
                        $('.etoile').show();
                        $('#moy_bac').show();
                        $('#ann_pfe').show();
                        $('input[name="dob"]').rules("add", {
                            maxAge: 45,
                            messages: {
                                maxAge: "vous devez avoir au maximum 45 ans!",
                            }
                        });
                        $('input[name="Bachelor_degree"]').rules("add", {
                            required: true,
                            messages: {
                                required: "Merci d'ajouter votre note pfe",
                            }
                        });

                        $('input[name="last_year_degree_without_pfe"]').rules("add", {
                            required: true,
                            messages: {
                                required: "Merci d'ajouter votre note du bac",
                            }
                        });

                    } else if (id == 39) {
                        $('#moy_bac').hide();
                        $('#ann_pfe').show();
                        $('input[name="dob"]').rules("add", {
                            maxAge: 40,
                            required: true,
                            messages: {
                                maxAge: "vous devez avoir au maximum 40 ans!",
                            }
                        });
                    }

                    break;

                case 'C09/2019':
                    $('#etude_prep').hide();
                    $('#bureau_emploi').show();
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#dip_elem').show();
                    $('#niveau_etude').hide();
                    $('.permis').hide();
                    $('#dip_m').hide();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    var id = $("#diploma").val();
                    if (id == 40) {
                        $('#moy_bac').hide();

                    }
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
                    break;

                default:
                    $('.permis').hide();
                    $('#dip_m').hide();
                    $('#etude_prep').hide();
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#dip_elem').show();
                    $('#niveau_etude').hide();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();

            }
        });
        $(function () {


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
                dateFormat: 'd/m/yy',
                yearRange: '1950:2025',
            }).on('change', function (ev) {
                $(this).valid();
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
              dateFormat:'dd-mm-yy',
            yearRange: '1950:2025',
            maxDate:new Date(),
        });
    </script>


    <script>
        $("#diploma").change(function () {
            var id = $("#diploma").val();
            // alert(id)
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
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
            }
        });
    </script>

    <script>
        $('#my_select').on('change', function (e) {
            $("#disabled_input :input").prop("disabled", false);

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

            var form = $("#signupForm").validate();
            form.resetForm();

            var id_post = $("#my_select option:selected").data('reference');
            $('#p_ref').val(id_post);
            $("input[name=note_pfe]").val('');
            $("input[name=last_year_degree_without_pfe]").val('');
            $("input[name=date_of_obtaining_a_driving_license]").val('');
            $("input[name=note_pfe_avec_pfe]").val('');
            $("input[name=Bachelor_degree]").val('');

            switch (id_post) {

                case 'C01/2019':
                case 'C02/1/2019':
                case 'C03/2019':
                case 'C04/1/2019':
                case 'C04/2/2019':
                case 'C04/3/2019':
                    $('.permis').hide();
                    $('#dip_m').hide();
                    $('#etude_prep').show();
                    $('#bureau_emploi').show();
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#dip_elem').show();
                    $('#niveau_etude').hide();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    $("input[id*=dob]").rules("add",{
                        required: true,
                        minAge: 17,
                        maxAge: 40,
                        messages : {
                            required: "{{__('traduction.ajoutbirthay')}}",
                            minAge: "{{__('traduction.minage')}}",
                            maxAge: "{{__('traduction.maxage')}}",
                        }
                    });
                    $("input[id*=pfe_note]").rules("add", {
                        required: true,
                        number: true,
                        messages: {
                            number: 'Vous devez mettre un chiffre décimal (00,00)',
                            required: 'Champs Obligatoire.'
                        }
                    });
                    $("input[id*=last_year_degree_without_pfe]").rules("add", {
                        required: true,
                        number: true,
                        messages: {
                            number: 'Vous devez mettre un chiffre décimal (00,00)',
                            required: 'Champs Obligatoire.'
                        }
                    });
                    $("input[id*=note_pfe_avec_pfe_v]").rules("add", {
                        required: true,
                        number: true,
                        messages: {
                            number: 'Vous devez mettre un chiffre décimal (00,00)',
                            required: 'Champs Obligatoire.'
                        }
                    });
                    $("input[id*=Bachelor_degree]").rules("add", {
                        required: true,
                        number: true,
                        messages: {
                            number: 'Vous devez mettre un chiffre décimal (00,00)',
                            required: 'Champs Obligatoire.'
                        }
                    });
                    $("input[name=preparatory_study]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $("input[id*=dob]").rules("add",{
                        required: true,
                        minAge: 17,
                        maxAge: 40,
                        messages : {
                            required: "{{__('traduction.ajoutbirthay')}}",
                            minAge: "{{__('traduction.minage')}}",
                            maxAge: "{{__('traduction.maxage')}}",
                        }
                    });
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
                    $('#bureau_emploi').show();
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#dip_elem').show();
                    $('#niveau_etude').hide();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    $("input[id*=dob]").rules("add",{
                        required: true,
                        minAge: 17,
                        maxAge: 40,
                        messages : {
                            required: "{{__('traduction.ajoutbirthay')}}",
                            minAge: "{{__('traduction.minage')}}",
                            maxAge: "{{__('traduction.maxage')}}",
                        }
                    });
                    $("input[id*=pfe_note]").rules("add", {
                        messages: {required: 'Champs Obligatoire.'}
                    });
                    $("input[id*=last_year_degree_without_pfe]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $("input[id*=note_pfe_avec_pfe_v]").rules("add", {
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $("input[id*=Bachelor_degree]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $("input[name=preparatory_study]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });

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

                case 'C07/2019':
                    $('#bureau_emploi').show();
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#dip_elem').show();
                    $('#niveau_etude').hide();
                    $('#etude_prep').hide();
                    $('.permis').hide();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    $("input[id*=pfe_note]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $("input[id*=last_year_degree_without_pfe]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $("input[id*=note_pfe_avec_pfe_v]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $("input[id*=Bachelor_degree]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $("input[name=preparatory_study]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $('input[name="bureau"]').click(function () {
                        if ($(this).attr("value") == "no") {
                            $("input[id*=dob]").rules("add", {
                                required: true,
                                minAge: 18,
                                maxAge: 40,
                                messages: {
                                    required: "{{__('traduction.ajoutbirthay')}}",
                                    minAge: "{{__('traduction.minage')}}",
                                    maxAge: "{{__('traduction.maxage')}}",
                                }
                            });
                        }
                        if ($(this).attr("value") == "yes") {
                            $("input[id*=dob]").rules("remove");
                            $("input[id*=dob]").rules("add", {
                                required: true,
                                minAge: 18,
                                maxAge: 45,
                                messages: {
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
                    $('.permis').hide();
                    $('#dip_elem').show();
                    $('#niveau_etude').hide();
                    $('#etude_prep').hide();
                    $('#bureau_emploi').hide();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    $("input[id*=pfe_note]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $("input[id*=last_year_degree_without_pfe]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $("input[id*=note_pfe_avec_pfe_v]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $("input[id*=Bachelor_degree]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $("input[name=preparatory_study]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    break;

                case 'C09/2019':
                    $('#etude_prep').hide();
                    $('#bureau_emploi').show();
                    $('#moy_bac').show();
                    $('#ann_pfe').show();
                    $('#dip_elem').show();
                    $('#niveau_etude').hide();
                    $('.permis').hide();
                    $('#dip_m').hide();
                    $('#note_pfe_avec_pfe').show();
                    $('#note_pfe').show();
                    $("input[id*=pfe_note]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $("input[id*=last_year_degree_without_pfe]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $("input[id*=note_pfe_avec_pfe_v]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $("input[id*=Bachelor_degree]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $("input[name=preparatory_study]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $('input[name="bureau"]').click(function () {
                        if ($(this).attr("value") == "no") {
                            $("input[id*=dob]").rules("add", {
                                required: true,
                                minAge: 18,
                                maxAge: 40,
                                messages: {
                                    required: "{{__('traduction.ajoutbirthay')}}",
                                    minAge: "{{__('traduction.minage')}}",
                                    maxAge: "{{__('traduction.maxage')}}",
                                }
                            });
                        }
                        if ($(this).attr("value") == "yes") {
                            $("input[id*=dob]").rules("remove");
                            $("input[id*=dob]").rules("add", {
                                required: true,
                                minAge: 18,
                                maxAge: 45,
                                messages: {
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
                    $("input[id*=date_of_obtaining_a_driving_license]").rules("add", {
                        required: true,
                        messages: {required: 'Champ Obligatoire.'}
                    });
                    $('input[name="dip_m"]').click(function () {
                        if ($(this).attr("value") == "no") {
                            $("#submit").hide();
                        }
                        if ($(this).attr("value") == "yes") {
                            $("#submit").show();

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
                    $("input[id*=dob]").rules("add", {
                        required: true,
                        minAge: 24,
                        maxAge: 40,
                        messages: {
                            required: "{{__('traduction.ajoutbirthay')}}",
                            minAge: "{{__('traduction.minagec')}}",
                            maxAge: "{{__('traduction.maxage')}}",
                        }
                    });

                    break;

                default:
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
            }
        });

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

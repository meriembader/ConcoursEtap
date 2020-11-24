@extends('projetEnit.layouts.dashboard')

@section('content')
    <style>
        .note-popover {
            display: none;
        }
    </style>
    <div class="container-fluid">

        <div class="modal-content">
            <form action="{{route('handleEmailSave')}}" method="POST">
            {{ csrf_field() }}


            <!-- Outer Row -->
                <div class="row justify-content-center">

                    <div class=" col-lg-12 col-md-9">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">

                                    <div class="col-md-9">
                                        <div class="p-5">
                                            <div class="">
                                                <h1 class="h4 text-gray-900 mb-4">Message 1:
                                                </h1><span>I/ Message pour les candidats sélectionnés provisoirement qui sont au nombre max de 8 par poste:</span>
                                            </div>
                                            <div class="form-group">
                                                <input type="texte" name="objet_1"
                                                       class="form-control form-control-user" id="objet"
                                                       placeholder="{{__('objet')}}" value="{{$Message[0]->objet}}">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                    <textarea type="text" id="message_7"
                                                              class="form-control form-control-user summernote"
                                                              name="message_1" placeholder="{{__('Message ')}}"
                                                    >{{$Message[0]->msg}}</textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <ul>
                                                            <li><a href="#" data-value="%nom_prenom%" class="msg7">Nom
                                                                    et prénom</a>
                                                            <li><a href="#" data-value="%poste%" class="msg7">Poste</a>
                                                            </li>
                                                            <li><a href="#" data-value="%Rang%" class="msg7">Rang</a>
                                                            </li>
                                                            <li><a href="#" data-value="%Score%" class="msg7">Score</a>
                                                            </li>
                                                            <li><a href="#" data-value="%SIS%" class="msg7">SIS</a></li>
                                                            <li><input type="date" id="input7"><a href="#"
                                                                                                  data-value="%Date%"
                                                                                                  class="msg7date">inserer
                                                                    cette date</a>
                                                            </li>
                                                            <li><a href="#" data-value="%Lieu%" class="msg7">Lieu</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success ">
                                                        Save
                                                    </button>

                                                    <button type="reset" class="btn btn-danger">
                                                        Reset
                                                    </button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" col-lg-12 col-md-9">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">

                                    <div class="col-md-9">
                                        <div class="p-5">
                                            <div class="">
                                                <h1 class="h4 text-gray-900 mb-4">Message 2:</h1>
                                                <span>II/Message pour les candidats retenus:5 premiers/8: CONVOCATION POUR LES ORAUX</span>
                                            </div>
                                            <div class="form-group">
                                                <input type="texte" name="objet_2"
                                                       value="{{$Message[1]->objet}}"
                                                       class="form-control form-control-user" id="objet"
                                                       placeholder="{{__('objet')}}">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10">

                                                    <div class="FORM-GROUP">
                                                    <textarea type="text" id="message_2"
                                                              class="form-control form-control-user summernote"
                                                              name="message_2"
                                                              placeholder="{{__('Message ')}}">{{$Message[1]->msg}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <ul>
                                                        <li><a href="#" data-value="%nom_prenom%" class="msg2">Nom et
                                                                prénom</a>
                                                        <li><a href="#" data-value="%poste%" class="msg2">Poste</a>
                                                        </li>
                                                        <li><a href="#" data-value="%Rang%" class="msg2">Rang</a>
                                                        </li>
                                                        <li><a href="#" data-value="%Score%" class="msg2">Score</a>
                                                        </li>
                                                        <li><a href="#" data-value="%SIS%" class="msg2">SIS</a></li>
                                                        <li><input type="date" id="input2"><a href="#"
                                                                                              data-value="%Date%"
                                                                                              class="msg2date">inserer
                                                                cette date</a>
                                                        </li>
                                                        <li><a href="#" data-value="%Lieu%" class="msg2">Lieu</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success ">
                                                        Save
                                                    </button>

                                                    <button type="reset" class="btn btn-danger">
                                                        Reset
                                                    </button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" col-lg-12 col-md-9">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">

                                    <div class="col-md-9">
                                        <div class="p-5">
                                            <div class="">
                                                <h1 class="h4 text-gray-900 mb-4">Message 3:</h1>
                                                <span>III/Message pour les candidats retenus (liste d'attente) 3 derniers/8</span>

                                            </div>
                                            <div class="form-group">
                                                <input type="texte" name="objet_3"
                                                       class="form-control form-control-user" id="objet"
                                                       placeholder="{{__('objet')}}" value="{{$Message[2]->objet}}">
                                            </div>
                                            <div class="FORM-GROUP">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                    <textarea type="text"
                                                              class="form-control form-control-user summernote"
                                                              name="message_3" id="message_3"
                                                              placeholder="{{__('Message ')}}">{{$Message[2]->msg}}</textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <ul>
                                                            <li><a href="#" data-value="%nom_prenom%" class="msg3">Nom
                                                                    et prénom</a>
                                                            <li><a href="#" data-value="%poste%" class="msg3">Poste</a>
                                                            </li>
                                                            <li><a href="#" data-value="%Rang%" class="msg3">Rang</a>
                                                            </li>
                                                            <li><a href="#" data-value="%Score%" class="msg3">Score</a>
                                                            </li>
                                                            <li><a href="#" data-value="%SIS%" class="msg3">SIS</a></li>
                                                            <li><input type="date" id="input3"><a href="#"
                                                                                                  data-value="%Date%"
                                                                                                  class="msg3date">inserer
                                                                    cette date</a>
                                                            </li>
                                                            <li><a href="#" data-value="%Lieu%" class="msg3">Lieu</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success ">
                                                        Save
                                                    </button>

                                                    <button type="reset" class="btn btn-danger">
                                                        Reset
                                                    </button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" col-lg-12 col-md-9">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">

                                    <div class="col-md-9">
                                        <div class="p-5">
                                            <div class="">
                                                <h1 class="h4 text-gray-900 mb-4">Message 4:</h1>
                                                <span>IV/ Message pour les candidats nos retenus (parmi les 8) : il sera envoyé aux candidats ayant présentés des dossiers qui n'ont pas été acceptés  pour non conformité de dossier administratif ou information erronée ou......OU...</span>

                                            </div>
                                            <div class="form-group">
                                                <input type="texte" name="objet_4"
                                                       class="form-control form-control-user" id="objet_4"
                                                       placeholder="{{__('objet')}}" value="{{$Message[3]->objet}}">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                    <textarea type="text" id="message_4"
                                                              class="form-control form-control-user summernote"
                                                              name="message_4"
                                                              placeholder="{{__('Message ')}}">{{$Message[3]->msg}}</textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <ul>
                                                            <li><a href="#" data-value="%nom_prenom%" class="msg4">Nom
                                                                    et prénom</a>
                                                            <li><a href="#" data-value="%poste%" class="msg4">Poste</a>
                                                            </li>
                                                            <li><a href="#" data-value="%Rang%" class="msg4">Rang</a>
                                                            </li>
                                                            <li><a href="#" data-value="%Score%" class="msg4">Score</a>
                                                            </li>
                                                            <li><a href="#" data-value="%SIS%" class="msg4">SIS</a>
                                                            </li>
                                                            <li><input type="date" id="input4"><a href="#"
                                                                                                  data-value="%Date%"
                                                                                                  class="msg4date">inserer
                                                                    cette date</a>
                                                            </li>
                                                            <li><a href="#" data-value="%Lieu%" class="msg4">Lieu</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success ">
                                                        Save
                                                    </button>

                                                    <button type="reset" class="btn btn-danger">
                                                        Reset
                                                    </button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" col-lg-12 col-md-9">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">

                                    <div class="col-md-9">
                                        <div class="p-5">
                                            <div class="">
                                                <h1 class="h4 text-gray-900 mb-4">Message 5:</h1>
                                                <span>V/ Message pour les candidats retenus PROVISOIREMENT jusqu'à la fin du délai de recours</span>

                                            </div>
                                            <div class="form-group">
                                                <input type="texte" name="objet_5"
                                                       class="form-control form-control-user" id="objet_5"
                                                       placeholder="{{__('objet')}}" value="{{$Message[4]->objet}}">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                    <textarea type="text"
                                                              class="form-control form-control-user summernote"
                                                              name="message_5" id="message_5"
                                                              placeholder="{{__('Message ')}}">{{$Message[4]->msg}}</textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <ul>
                                                            <li><a href="#" data-value="%nom_prenom%" class="msg5">Nom
                                                                    et prénom</a>

                                                            <li><a href="#" data-value="%poste%"
                                                                   class="msg5">Poste</a>
                                                            </li>
                                                            <li><a href="#" data-value="%Rang%"
                                                                   class="msg5">Rang</a>
                                                            </li>
                                                            <li><a href="#" data-value="%Score%"
                                                                   class="msg5">Score</a>
                                                            </li>
                                                            <li><a href="#" data-value="%SIS%" class="msg5">SIS</a>
                                                            </li>
                                                            <li><input type="date" id="input5"><a href="#"
                                                                                                  data-value="%Date%"
                                                                                                  class="msg5date">inserer
                                                                    cette date</a>
                                                            </li>
                                                            <li><a href="#" data-value="%Lieu%"
                                                                   class="msg5">Lieu</a>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success ">
                                                            Save
                                                        </button>

                                                        <button type="reset" class="btn btn-danger">
                                                            Reset
                                                        </button>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class=" col-lg-12 col-md-9">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">

                                    <div class="col-md-9">
                                        <div class="p-5">
                                            <div class="">
                                                <h1 class="h4 text-gray-900 mb-4">Message 6:</h1>
                                                <span>VI/Message pour les candidats non retenus</span>

                                            </div>
                                            <div class="form-group">
                                                <input type="texte" name="objet_6"
                                                       class="form-control form-control-user" id="objet_5"
                                                       placeholder="{{__('objet')}}" value="{{$Message[5]->objet}}">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                    <textarea type="text"
                                                              class="form-control form-control-user summernote"
                                                              name="message_6" id="message_6"
                                                              placeholder="{{__('Message ')}}">{{$Message[5]->msg}}</textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <ul>
                                                            <li><a href="#" data-value="%nom_prenom%" class="msg6">Nom
                                                                    et prénom</a>

                                                            <li><a href="#" data-value="%poste%"
                                                                   class="msg6">Poste</a>
                                                            </li>
                                                            <li><a href="#" data-value="%Rang%"
                                                                   class="msg6">Rang</a>
                                                            </li>
                                                            <li><a href="#" data-value="%Score%"
                                                                   class="msg6">Score</a>
                                                            </li>
                                                            <li><a href="#" data-value="%SIS%" class="msg6">SIS</a>
                                                            </li>
                                                            <li><input type="date" id="input5"><a href="#"
                                                                                                  data-value="%Date%"
                                                                                                  class="msg5date">inserer
                                                                    cette date</a>
                                                            </li>
                                                            <li><a href="#" data-value="%Lieu%"
                                                                   class="msg6">Lieu</a>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success ">
                                                            Save
                                                        </button>

                                                        <button type="reset" class="btn btn-danger">
                                                            Reset
                                                        </button>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

            </form>
        </div>
    </div>
    <link href="{{asset('dashboard/css/summernote.css')}}" rel="stylesheet">
    <script src="{{asset('dashboard/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('dashboard/js/summernote.js')}}" defer></script>
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
    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 200,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                }
            });


            $(".msg2").click(function (e) {
                e.preventDefault();
                $('#message_2').summernote('insertText', $(this).data('value'));

            });
            $(".msg6").click(function (e) {
                e.preventDefault();
                $('#message_6').summernote('insertText', $(this).data('value'));

            });

            $(".msg3").click(function (e) {
                e.preventDefault();
                $('#message_3').summernote('insertText', $(this).data('value'));

            });
            $(".msg7").click(function (e) {
                e.preventDefault();
                $('#message_7').summernote('insertText', $(this).data('value'));

            });
            $(".msg4").click(function (e) {
                e.preventDefault();
                $('#message_4').summernote('insertText', $(this).data('value'));

            });
            $(".msg5").click(function (e) {
                e.preventDefault();
                $('#message_5').summernote('insertText', $(this).data('value'));

            });
            $('.msg5date').click(function (e) {
                e.preventDefault();
                $('#message_5').summernote('insertText', $('#input5').val());
            });

            $('.msg4date').click(function (e) {
                e.preventDefault();
                $('#message_4').summernote('insertText', $('#input4').val());
            });
            $('.msg3date').click(function (e) {
                e.preventDefault();
                $('#message_3').summernote('insertText', $('#input3').val());
            });

            $('.msg2date').click(function (e) {
                e.preventDefault();
                $('#message_2').summernote('insertText', $('#input2').val());
            });
            $('.msg7date').click(function (e) {
                e.preventDefault();
                $('#message_7').summernote('insertText', $('#input7').val());
            });
        });
    </script>

@endsection

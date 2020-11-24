@extends('projetEnit.layouts.dashboard')

@section('content')

    <link rel="stylesheet" href="{{asset('dashboard/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/buttons.dataTables.min.css')}}">
    <style>
        .dropdown.show {
            z-index: 99999999999999;
            position: fixed;
        }
    </style>

    <div class="container-fluid" style="margin-top : 50px">

        <ul class="nav nav-tabs" style="display: none;">
            <li class="nav-item">
                <a class="nav-link tab1 active" href="{{route('accepted.candidate')}}">Premiere Selection</a>
            </li>
            <li class="nav-item tab2">
                <a class="nav-link" href="#">Deuxieme Selection</a>
            </li>
            <li class="nav-item">
                <a class="nav-link tab3" href="#">Troisieme selection</a>
            </li>
        </ul>
        <br><br>
        <div class="load">
            <h3 class="m-0 font-weight-bold text-primary">Listes des candidats non conforme</h3>

            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="checkbox" class="checkbox" value="poste" checked> Poste
                                <input type="checkbox" class="checkbox" value="first_name" checked> Nom
                               
                                <input type="checkbox" class="checkbox" value="last_name" checked> Prénom
                                <input type="checkbox" class="checkbox" value="cin" checked> Cin
                                <input type="checkbox" class="checkbox" value="birthday" checked> Date de naissance
                               
                                <input type="checkbox" class="checkbox" value="email" checked> E-mail

                                <input type="checkbox" class="checkbox" value="level_studies"> Niveau d'étude
                               
                                <input type="checkbox" class="checkbox" value="preparatory_study">Etude préparatoire
                               
                                <input type="checkbox" class="checkbox" value="Bachelor_degree">Moyenne du
                                Baccalauréat
                                <input type="checkbox" class="checkbox" value="last_year_degree_without_pfe">Moyenne
                                de la dernière année d'étude sans PFE

                                <input type="checkbox" class="checkbox" value="age"> conformité age
                                <input type="checkbox" class="checkbox" value="diplome"> conformité diplôme
                                <input type="checkbox" class="checkbox" value="cinconfirmity"> conformité cin
                                <input type="checkbox" class="checkbox" value="permis"> conformité permis
                                <input type="checkbox" class="checkbox" value="datepermis"> Date d'obtention du
                                permis
                                <input type="checkbox" class="checkbox" value="note"> conformité notes
                                <input type="checkbox" class="checkbox" value="dossier"> conformité dossier
                                <input type="checkbox" class="checkbox" value="score_1"> score 1
                                <input type="checkbox" class="checkbox" value="score_2"> score 2
                            </div>
                        </div>
                        <div class="d-flex justify-content-center" style="display: none !important;">
                            <div class="row">
                                <div class="col">
                                    <select class="form-control poste">
                                        <option value="">Choisir un poste</option>
                                        @foreach($postes as $post)
                                            <option value="{{$post->id}}">[{{$post->reference}}
                                                ]</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{--<div class="col">
                                    <a href="#" class="btn btn-primary btn-icon-split exportselectionbtn">
                                <span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>
                                        <span class="text">Exporter la Selection</span>
                                    </a>--}}
                            </div>
                            <div class="col">
                                @foreach($messages as $message)
                                    <input type="radio" class="msgselect"
                                           data-id="{{$message->id}}" name="msg">Message {{$message->id}}
                                    : {{$message->objet}}<br/>
                                @endforeach
                                <button class="btn btn-primary sendglobalmail">Publier les messages</button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            @foreach($candidats as $candidat)

                <div class="card shadow mb-4">
                    <div class="card-header py-3 row">
                        @foreach($candidat['poste'] as $poste)
                            <div class="col-md-6">
                                <h6 class="m-0 font-weight-bold text-primary">{{$poste->postname}}
                                    [{{$poste->reference}}
                                    ]</h6>
                            </div>
                        @endforeach
                        <div class="col-md-6" style="text-align: right">
                            <a href="{{route('FirstSelectExport.export', [$poste->id, 8])}}"
                               class="btn btn-primary btn-icon-split"
                               class="pull-right" style="display: none;">
                                <span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>
                                <span class="text">Exporter- Excel xlsx</span>
                            </a>
                            <a href="#" class="btn btn-primary btn-icon-split exportselectionbtn"
                               style="display: none;">
                                <span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>
                                <span class="text">Exporter la Selection</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                               cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                               style="width: 100%;">
                                            <thead>
                                            <tr role="row">
                                                <th><a href="#" class="checkall" data-id="{{$loop->index}}">#</a>
                                                    <div style="display: none;">
                                                        {{$dataid = $loop->index}}
                                                    </div>
                                                </th>
                                                <th class="sorting_asc poste" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 270px;">
                                                    Référence du poste
                                                </th>
                                                <th class="sorting poste" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 270px;">
                                                    Nom du Poste
                                                </th>

                                                <th class="sorting cin" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 270px;">
                                                    Cin
                                                </th>

                                                <th class="sorting first_name" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 270px;">
                                                    Nom
                                                </th>

                                                <th class="sorting last_name" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 270px;">
                                                    Prénom
                                                </th>

                                                <th class="sorting birthday" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
                                                    colspan="1" aria-label="Age: activate to sort column ascending"
                                                    style="width: 101px;">Date de naissance
                                                </th>

                                                <th class="sorting email" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 201px;">
                                                    Adresse E-mail
                                                </th>
                                                <th class="sorting level_studies" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 201px;">
                                                    Niveau d'étude
                                                </th>
                                                <th class="sorting preparatory_study" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 201px;">
                                                    Etude préparatoire
                                                </th>
                                                <th class="sorting Bachelor_degree" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 201px;">
                                                    Moyenne du Baccalauréat
                                                </th>
                                                <th class="sorting last_year_degree_without_pfe" tabindex="0"
                                                    aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 201px;">
                                                    Moyenne de la dernière année d'étude sans PFE
                                                </th>
                                                <th class="sorting age" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 270px;">Conformité Age
                                                </th>
                                                <th class="sorting cinconfirmity" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 270px;">Conformité Numéro CIN
                                                </th>
                                                <th class="sorting diplome" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 270px;">Conformité Diplôme
                                                </th>
                                                <th class="sorting permis" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 270px;">Conformité Permis de Conduire
                                                </th>
                                                <th class="sorting note" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 270px;">Conformité Notes
                                                </th>
                                                <th class="sorting dossier" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 270px;">Dossier Complet
                                                </th>
                                                <th class="sorting datepermis" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 270px;">Date d'obtention du permis
                                                </th>
                                                <th class="sorting score_1" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 270px;">score 1
                                                </th>
                                                <th class="sorting score_2" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 270px;">score 2
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($candidat['candidat'])
                                                @foreach($candidat['candidat'] as $c)
                                                    <tr role="row" class="odd">
                                                        <td>
                                                            <input type="checkbox"
                                                                   name="candidat[{{$c->id }}]" data-id=""
                                                                   class="ceckboxexport checkbyid-{{$dataid}}"
                                                                   value="{{$c->id }}">
                                                        </td>
                                                        <td class="sorting_1 poste">{{$c->post->reference}}</td>
                                                        <td class="poste">{{$c->post->postname}}</td>
                                                        <td class="cin">@isset($c->user->cin){{$c->user->cin}}@endisset</td>
                                                        <td class="first_name">{{$c->last_name}} </td>
                                                        <td class="last_name">{{$c->first_name}} </td>
                                                        <td class="birthday">
                                                            {{ date('d-m-Y', strtotime($c->birthday)) }}
                                                        </td>
                                                        <td class="email">@isset($c->user->cin){{$c->user->email}}@endisset</td>
                                                        <td class="level_studies">
                                                            @if(in_array($c->post->reference, ['C11/2019','C12/2019','C13/2019']))
                                                                @isset($c->level()->first()->titre)
                                                                    {{$c->level()->first()->titre}}
                                                                @endisset
                                                            @else
                                                                @isset($c->diplome()->first()->titre)
                                                                    {{$c->diplome()->first()->titre}}
                                                                @endisset
                                                            @endif
                                                        </td>
                                                        <td class="preparatory_study">{{$c->preparatory_study}}</td>
                                                        <td class="Bachelor_degree">{{$c->Bachelor_degree}}</td>
                                                        <td class="last_year_degree_without_pfe">{{$c->last_year_degree_without_pfe}}</td>
                                                        <td class="age">{{$c->conformite_age}}</td>
                                                        <td class="cinconfirmity">{{$c->conformite_cin}}</td>
                                                        <td class="diplome">{{$c->conformite_diplome}}</td>
                                                        <td class="permis">{{$c->conformite_permis}}</td>
                                                        <td class="note">{{$c->conformite_note}}</td>
                                                        <td class="dossier">{{$c->dossier_complet}}</td>
                                                        <td class="datepermis">{{date('d-m-Y', strtotime($c->date_of_obtaining_a_driving_license))
                                                }}</td>

                                                        <td class="score_1">{{$c->score_1}}</td>
                                                        <td class="score_2">{{$c->score_2}}</td>


                                                    </tr>


                                                @endforeach
                                            @endisset
                                            @isset($candidat['candidat_not_confirmed'])
                                                @foreach($candidat['candidat_not_confirmed'] as $c)
                                                    <tr role="row" class="odd" style="background-color: yellow;">
                                                        <td>
                                                            <input type="checkbox"
                                                                   name="candidat[{{$c->id }}]" data-id=""
                                                                   class="ceckboxexport checkbyid-{{$dataid}}"
                                                                   value="{{$c->id }}">
                                                        </td>
                                                        <td class="sorting_1 poste">{{$c->post->reference}}</td>
                                                        <td class="poste">{{$c->post->postname}}</td>
                                                        <td class="cin">@isset($c->user->cin){{$c->user->cin}}@endisset</td>
                                                        <td class="first_name">{{$c->last_name}} </td>
                                                        <td class="last_name">{{$c->first_name}} </td>
                                                        <td class="birthday">
                                                            {{ date('d-m-Y', strtotime($c->birthday)) }}
                                                        </td>
                                                        <td class="email">@isset($c->user->cin){{$c->user->email}}@endisset</td>
                                                        <td class="level_studies">
                                                            @if(in_array($c->post->reference, ['C11/2019','C12/2019','C13/2019']))
                                                                @isset($c->level()->first()->titre)
                                                                    {{$c->level()->first()->titre}}
                                                                @endisset
                                                            @else
                                                                @isset($c->diplome()->first()->titre)
                                                                    {{$c->diplome()->first()->titre}}
                                                                @endisset
                                                            @endif
                                                        </td>
                                                        <td class="preparatory_study">{{$c->preparatory_study}}</td>
                                                        <td class="Bachelor_degree">{{$c->Bachelor_degree}}</td>
                                                        <td class="last_year_degree_without_pfe">{{$c->last_year_degree_without_pfe}}</td>
                                                        <td class="age">{{$c->conformite_age}}</td>
                                                        <td class="cinconfirmity">{{$c->conformite_cin}}</td>
                                                        <td class="diplome">{{$c->conformite_diplome}}</td>
                                                        <td class="permis">{{$c->conformite_permis}}</td>
                                                        <td class="note">{{$c->conformite_note}}</td>
                                                        <td class="dossier">{{$c->dossier_complet}}</td>
                                                        <td class="datepermis">{{date('d-m-Y', strtotime($c->date_of_obtaining_a_driving_license))
                                                }}</td>

                                                        <td class="score_1">{{$c->score_1}}</td>
                                                        <td class="score_2">{{$c->score_2}}</td>
                                                        <td>
                                                            <a href="{{route('showConformityAdd',$c->user->cin)}}"
                                                               class="btn btn-primary btn-icon-split"> <span
                                                                    class="icon text-white-50"> <i
                                                                        class="fas fa-plus"></i> </span>
                                                                <span class="text">Conformité Dossier</span>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('showNoteAdd',$c->user->cin)}}"
                                                               class="btn btn-primary btn-icon-split"> <span
                                                                    class="icon text-white-50"> <i
                                                                        class="fas fa-plus"></i> </span>
                                                                <span class="text">les notes</span> </a>
                                                        </td>


                                                    </tr>


                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    </div>

    <div id="overlay">
        <img src="https://thumbs.gfycat.com/LoneDetailedFairybluebird-max-1mb.gif"
             style="height: 67px; margin-left: -65px; width: auto;">
        Veuillez patienter
    </div>
    <style>
        #overlay {
            background-color: #ccc;
            display: none;
            width: 21%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            text-align: center;
            margin-left: 39rem;
            height: 65px;
            margin-top: 152px;
            border-radius: 12px;
        }

        #ajax-div {
            z-index: 200; /*important, that it is above the overlay*/
        }
    </style>

    <input type="hidden" name="ids" id="basurl" value="{{Request::root()}}">
    <input type="hidden" name="selection" id="selection" value="">
@endsection


@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="{{asset('dashboard/js/jquery.dataTables.min.js')}}" defer></script>

    <script>
        $(document).ready(function () {

            $(".checkbox").each(function () {
                var checked = $(this).is(':checked');

                if (checked) {
                    $('.' + $(this).val()).show();
                } else {
                    $('.' + $(this).val()).hide();
                }
            });
            $(document).on('click','.checkbox', function () {
                $(".checkbox").each(function () {
                    var checked = $(this).is(':checked');

                    if (checked) {
                        $('.' + $(this).val()).show();
                    } else {
                        $('.' + $(this).val()).hide();
                    }
                });
            });

//  $(".23").hide();
            $(".24").hide();
            $(".25").hide();

            $('.table').DataTable({});


            $(document).on('click', '.checkall', function (e) {
                e.preventDefault();
                id = $(this).data('id');
                var check = 0;
                $(".checkbyid-" + id).each(function () {
                    if ($(this).is(':checked')) {
                        check = 1;
                        return false; // breaks
                    } else {
                        check = 0;
                        return false; // breaks
                    }
                });
                console.log(check);
                if (check == 1) {
                    $(".checkbyid-" + id).removeAttr('checked');
                } else {
                    $(".checkbyid-" + id).attr('checked', '');
                }
            });
            $(document).on('click', '.tab2', function () {
                $('.load').load("{{route('accepted.conforme.candidate')}}");
            });

            $(document).on('click', '.tab3', function () {
                $('.load').load("{{route('accepted.final.candidate')}}");
            });

            $(document).on('change', '.poste', function () {

                /** get candidatures **/
                $.ajax({
                    type: 'GET',
                    url: "{{Route('filter.accepted.candidate')}}",
                    data: {
                        'post_id': $('.poste').find(":selected").val(),

                    },
                    success: function (data) {
                        $('#content').empty();
                        $('#content').append(data);
                    }
                });
            });
            $(document).ready(function () {
                $(document).on('change', '.diplome', function () {
                    /** get candidatures **/
                    $.ajax({
                        type: 'GET',
                        url: "{{Route('filter.accepted.candidate')}}",
                        data: {
                            'post_id': $('.poste').find(":selected").val(),
                            'diplome_id': $('.diplome').find(":selected").val(),

                        },
                        success: function (data) {

                            $('#content').empty();
                            $('#content').html(data);

                        }
                    });
                });
            });
            $(document).on('click', '.sendglobalmail', function () {

                if (!$('.msgselect:checked').data('id')) {
                    alert('Veuillez choisir un message');
                    return false;
                }

                if (confirm("Veuillez vraiment envoyer les emails!")) {
                    var tabPage = [];
                    id = $('.msgselect:checked').data('id');
                    $(".ceckboxexport").each(function (index) {
                        if ($(this).is(':checked')) {
                            tabPage.push($(this).val());
                        }
                    });
                    $('#selection').val(tabPage);
                    $('#overlay').show();
                    $('#page-top').css({'opacity': '.5'});
                    if (tabPage.length === 0) {
                        alert('Veuillez choisir au moins un candidat');
                        $('#overlay').hide();
                        $('#page-top').css({'opacity': '1'});
                    }

                    $.ajax({
                        type: 'GET',
                        url: "{{Route('send.global.mail')}}",
                        data: {
                            'selectionn': $('#selection').val(),
                            'id': id,
                        },
                        success: function (data) {
                            $('#overlay').hide();
                            $('#page-top').css({'opacity': '1'});
                            alert('les emails sont envoyées');

                        }
                    });
                }


            });
            $(document).on('click', '.exportselectionbtn', function () {
                var tabPage = [];

                $(".ceckboxexport").each(function (index) {
                    if ($(this).is(':checked')) {
                        tabPage.push($(this).val());
                    }
                });
                var url = "{{URL::to('export/selection?ids=')}}" + tabPage;
                window.location = url;

            });
        });


    </script>
@endsection


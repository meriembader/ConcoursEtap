@extends('projetEnit.layouts.dashboard')



@section('content')

    <link rel="stylesheet" href="{{asset('dashboard/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/buttons.dataTables.min.css')}}">




    <div class="container-fluid" style="margin-top: 50px">


        <br/><br/>
        <div class="load">
            <h3 class="m-0 font-weight-bold text-primary">Liste des candidats</h3>

            <div class="d-flex justify-content-center">
                <div class="row">
                    <div class="col">
                        <select class="form-control poste">
                            <option value="">Choisir un poste</option>
                            @foreach($postes as $post)
                                <option value="{{$post->id}}">[{{$post->reference}}]</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <a href="{{route('listCandidat.export', ['xlsx', 'undefined'])}}"
                           class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>
                            <span class="text">Exporter- Excel xlsx</span>
                        </a>


                    </div>
                </div>
            </div>


            <div id="content">
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
                            <div class="row embed">
                                <div class="col-sm-12">

                                    <table class="table table-bordered dataTable" id="dataTable"
                                           cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                           style="width: 100%;">
                                        <thead>
                                        <tr role="row">
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

                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach ($candidats as $candidat)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1 poste">{{$candidat->post->reference}}</td>
                                                <td class="poste">{{$candidat->post->postname}}</td>
                                                <td class="cin">@isset($candidat->user->cin){{$candidat->user->cin}}@endisset</td>
                                                <td class="first_name">{{$candidat->last_name}} </td>
                                                <td class="last_name">{{$candidat->first_name}} </td>
                                                <td class="birthday">
                                                    {{ date('d-m-Y', strtotime($candidat->birthday)) }}
                                                </td>
                                                <td class="email">@isset($candidat->user->cin){{$candidat->user->email}}@endisset</td>
                                                <td class="level_studies">
                                                    @if(in_array($candidat->post->reference, ['C11/2019','C12/2019','C13/2019']))
                                                        @isset($candidat->level()->first()->titre)
                                                            {{$candidat->level()->first()->titre}}
                                                        @endisset
                                                    @else
                                                        @isset($candidat->diplome()->first()->titre)
                                                            {{$candidat->diplome()->first()->titre}}
                                                        @endisset
                                                    @endif
                                                </td>
                                                <td class="preparatory_study">{{$candidat->preparatory_study}}</td>
                                                <td class="Bachelor_degree">{{$candidat->Bachelor_degree}}</td>
                                                <td class="last_year_degree_without_pfe">{{$candidat->last_year_degree_without_pfe}}</td>
                                                <td class="age">{{$candidat->conformite_age}}</td>
                                                <td class="cinconfirmity">{{$candidat->conformite_cin}}</td>
                                                <td class="diplome">{{$candidat->conformite_diplome}}</td>
                                                <td class="permis">{{$candidat->conformite_permis}}</td>
                                                <td class="note">{{$candidat->conformite_note}}</td>
                                                <td class="dossier">{{$candidat->dossier_complet}}</td>
                                                <td class="datepermis">@isset($candidat->date_of_obtaining_a_driving_license){{date("d/m/Y", strtotime($candidat->date_of_obtaining_a_driving_license))}}@endisset</td>

                                                <td class="score_1">{{$candidat->score_1}}</td>
                                                <td class="score_2">{{$candidat->score_2}}</td>
                                                <td><a href="#" data-id="{{$candidat->id}}"
                                                       class="btn btn-primary btn-icon-split newpassword"
                                                       style="width: max-content;"> Générer nouveau mot
                                                        de passe</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-center" style="margin-bottom : 40px">

            </div>
        </div>
    </div>
    </div>
    </div>
    <input type="hidden" id="base_url" value="{{route('listCandidat.export', ['',''])}}">
    <input type="hidden" id="fieldes" value="{{route('listCandidat.export', ['',''])}}">

@endsection


@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    <script src="{{asset('dashboard/js/jquery.dataTables.min.js')}}" defer></script>


    <script src="{{asset('dashboard/js/jquery-3.3.1.js')}}"></script>



    <script>

        $(document).ready(function () {

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
            $(document).on('click', '.tab1', function () {
                $('.load').load("{{route('accepted.candidate')}}");
            });

            $(document).on('click', '.tab2', function () {
                $('.load').load("{{route('accepted.conforme.candidate')}}");
            });

            $(document).on('click', '.tab3', function () {
                $('.load').load("{{route('accepted.final.candidate')}}");
            });

            $(document).on('click', '.newpassword', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: "{{Route('newpassword')}}",
                    data: {
                        'id': $(this).data('id'),
                    },
                    success: function (data) {
                        if (data.status == 'changed') {
                            alert('Votre nouveau mot de passe est: ' + data.password);
                        } else {
                            alert("une erreur s'est produite")
                        }
                    }
                });
            })
            $(".checkbox").each(function () {
                var checked = $(this).is(':checked');

                if (checked) {
                    $('.' + $(this).val()).show();
                } else {
                    $('.' + $(this).val()).hide();
                }
            });
            $('.checkbox').on('click', function () {
                var checked = $(this).is(':checked');
                if (checked) {
                    $('.' + $(this).val()).show();
                } else {
                    $('.' + $(this).val()).hide();
                }
            });

            $(document).on('change', '.poste', function (e) {
                e.preventDefault();
                keyword = $('input[type=search]').val() ? $('input[type=search]').val() : 'undefined'
                post_ids = $('.poste').find(":selected").val();
                $('.btn-icon-split').attr('href', $('#base_url').val() + '/' + post_ids + '/' + keyword);
                $.ajax({
                    type: 'GET',
                    url: "{{Route('filter.list.candidate')}}",
                    data: {
                        'post_id': $('.poste').find(":selected").val(),

                    },
                    success: function (data) {

                        $('.embed').empty();
                        $('.embed').append(data);
                        $('.table').DataTable({});
                        $(".checkbox").each(function () {
                            var checked = $(this).is(':checked');

                            if (checked) {
                                $('.' + $(this).val()).show();
                            } else {
                                $('.' + $(this).val()).hide();
                            }
                        });
                    }
                });
            });
            $(document).on('keyup', $('input[type=search]'), function (e) {
                e.preventDefault();

                post_ids = $('.poste').find(":selected").val();
                post = 'xlsx';
                if (post_ids) {

                    post = $('.poste').find(":selected").val();
                }
                $('.btn-icon-split').attr('href', $('#base_url').val() + '/' + post + '/' + $('input[type=search]').val());
            });
            $('.table').DataTable({});

        });
    </script>
@endsection


@extends('projetEnit.layouts.dashboard')



@section('content')

    <link rel="stylesheet" href="{{asset('dashboard/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/buttons.dataTables.min.css')}}">




    <div class="container-fluid" style="margin-top: 50px">


        <br/><br/>
        <div class="load">
            <h3 class="m-0 font-weight-bold text-primary">historique d'inscription des candidats</h3>
            <div class="row">
                <div class="col-md-12">
                    <input type="checkbox" class="checkbox" value="poste" checked> Poste &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="checkbox" value="first_name" checked> Nom
                    &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="checkbox" value="last_name" checked> Prénom &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="checkbox" value="cin" checked> Cin &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="checkbox" value="birthday" checked> Date de naissance
                    &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="checkbox" value="email" checked> E-mail &nbsp;&nbsp;&nbsp;

                    <input type="checkbox" class="checkbox" value="level_studies"> Niveau d'étude
                    &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="checkbox" value="preparatory_study">Etude préparatoire
                    &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="checkbox" value="Bachelor_degree">Moyenne du
                    Baccalauréat &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="checkbox" value="last_year_degree_without_pfe">Moyenne
                    de la dernière année d'étude sans PFE &nbsp;&nbsp;&nbsp;

                    <input type="checkbox" class="checkbox" value="age"> conformité age &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="checkbox" value="diplome"> conformité diplôme &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="checkbox" value="cinconfirmity"> conformité cin &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="checkbox" value="permis"> conformité permis &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="checkbox" value="datepermis"> Date d'obtention du
                    permis &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="checkbox" value="note"> conformité notes &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="checkbox" value="dossier"> conformité dossier &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="checkbox" value="score_1"> score 1 &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="checkbox" value="score_2"> score 2 &nbsp;&nbsp;&nbsp;
                </div>
            </div>

            <div id="content">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row embed">
                                <div class="col-sm-12">

                                    <table class="table table-bordered dataTable" id="dataTable" width="100%"
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
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach ($historys as $candidat)
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

                                                        @isset($candidat->diplome()->first()->titre)
                                                            {{$candidat->diplome()->first()->titre}}
                                                        @endisset
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
                                                <td class="datepermis">{{date('d-m-Y', strtotime($candidat->date_of_obtaining_a_driving_license))
                                                }}</td>

                                                <td class="score_1">{{$candidat->score_1}}</td>
                                                <td class="score_2">{{$candidat->score_2}}</td>
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
        </div>
    </div>
@endsection


@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    <script src="{{asset('dashboard/js/jquery.dataTables.min.js')}}" defer></script>


    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>







    <script>

        $(document).ready(function () {
            $('.table').DataTable({});

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
        });
    </script>
@endsection


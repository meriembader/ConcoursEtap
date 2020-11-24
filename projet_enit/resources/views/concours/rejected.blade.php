@extends('projetEnit.layouts.dashboard')

@section('content')

    <link rel="stylesheet" href="{{asset('dashboard/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/buttons.dataTables.min.css')}}">


    <div class="container-fluid" style="margin-top : 50px">
        <!-- <div class="row"> -->
        <!-- <div class="col"> -->
        <!-- <div class="card-header py-3"> -->
        <div class="row">
            <div class="col-md-6">
                <h3 class="m-0 font-weight-bold text-primary">Listes des candidats rejetés</h3>
            </div>
            <div class="col-md-6">
                Nous avons le regret de vous annoncer que vous n'avez pas été retenue par la commission de recrutement
                de l'ETAP . Vous êtes informés que le délai de recours est de 15 jours et commence à courir à partir de
                la date de publication des résultats sur le site web de l' ETAP. Tout recours ou contestation doit faire
                l'objet une lettre adressée à Monsieur le Président Directeur Général de l'ENIT et déposée directement
                au BOC de l'ENIT.
            </div>
        </div>


        <!-- </div> -->
        <!-- </div> -->

        <!-- </div> -->
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="d-flex justify-content-center">
                        <div class="row">
                            <div class="col">
                                {{-- <select class="form-control poste">
                                     <option value="">choisir un poste</option>
                                     @foreach($postes as $post)
                                         <option value="{{$post->id}}"></option>
                                     @endforeach
                                 </select>--}}
                            </div> 
                            <div class="col">

                                {{--  <a href="{{route('accepted.final.candidate')}}"
                                     class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-eye"></i>
                            </span>
                                      <span class="text">Afficher le Résultat (Deuxième Sélection)</span>
                                  </a>--}}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                            <a href="{{route('rejected.exports', $poste->id)}}"
                               class="btn btn-primary btn-icon-split"
                               class="pull-right">
  <span class="icon text-white-50">
      <i class="fas fa-download"></i>
  </span>
                                <span class="text">Exporter la listes</span>
                            </a>
                            <a href="{{route('rejected.sendmail', $poste->id)}}"
                               class="btn btn-primary btn-icon-split"
                               class="pull-right">
    <span class="icon text-white-50">
        <i class="fas fa-paper-plane"></i>
    </span>
                                <span class="text">Notifier cette liste</span>
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
                                                <th class="sorting_asc poste" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 270px;">
                                                    Référence du poste
                                                </th>
                                                <th class="sorting poste" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 270px;">
                                                    Nom du Poste
                                                </th>

                                                <th class="sorting cin" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
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

                                                <th class="sorting email" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
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
                                                <th class="sorting preparatory_study" tabindex="0"
                                                    aria-controls="dataTable"
                                                    rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 201px;">
                                                    Etude préparatoire
                                                </th>
                                                <th class="sorting Bachelor_degree" tabindex="0"
                                                    aria-controls="dataTable"
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
                                                <th class="sorting age" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
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
                                                <th class="sorting note" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1"
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

                                            @foreach($candidat['candidat'] as $cs)
                                                @foreach($cs as $c)

                                                    <tr role="row" class="odd">

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


                                                    </tr>
                                                @endforeach
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center" style="margin-bottom : 50px">

            </div>
        </div>

    </div>
    </div>
@endsection


@section('scripts')

    <script src="{{asset('dashboard/js/jquery.dataTables.min.js')}}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
            $(document).on('click', '.checkbox', function () {
                $(".checkbox").each(function () {
                    var checked = $(this).is(':checked');

                    if (checked) {
                        $('.' + $(this).val()).show();
                    } else {
                        $('.' + $(this).val()).hide();
                    }
                });
            });
            $('.dataTable').DataTable();
            $(document).on('change', '.poste', function () {
                /** get diplomes **/
                $.ajax({
                    type: 'GET',
                    url: "{{Route('diplomes.list')}}",
                    data: {
                        'post_id': this.value,
                    },
                    success: function (data) {
                        $html = '<option value=" ">choisir un diplome</option>';
                        $.each(data, function (index, codesObj) {
                            if ($('#diplome_id').val() == codesObj.id) {
                                $html += '<option value="' + codesObj.id + '" selected>' + codesObj.titre + '</option>';
                            } else {
                                $html += '<option value="' + codesObj.id + '">' + codesObj.titre + '</option>';
                            }
                        });
                        $('.diplome').empty();
                        $('.diplome').append($html);
                    }
                });
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

        });

    </script>
@endsection


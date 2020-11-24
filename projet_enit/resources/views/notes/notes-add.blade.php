@extends('projetEnit.layouts.dashboard')

@section ('content')


    <div class="container-fluid  " style="margin-top: 50px ; margin-bottom : 50px">

        <h3 class="m-0 font-weight-bold text-primary">ID Dossier : {{$candidat->id_dossier}} </h3>
        <br>
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
        <div class="card shadow mb-4">
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

                                    <tr role="row" class="odd">

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
                                        <td class="datepermis">{{date('d-m-Y', strtotime($candidat->date_of_obtaining_a_driving_license))
                                                }}</td>

                                        <td class="score_1">{{$candidat->score_1}}</td>
                                        <td class="score_2">{{$candidat->score_2}}</td>
                                    </tr>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <center>

            <h3 style="color :black"><b>Ajouter les notes pour ce Candidat</b></h3><br>

        </center>
        <form name="my-form" action="{{ route ('handleNoteAdd')}}" method="post" style="padding-left : 100px">
            {{csrf_field()}}
            <input type="hidden" name="candidat_id" value="{{$candidat->id}}">

            <div class="form-group row">
                <label style="color :black" class="col-md-4 col-form-label text-md-right"><b>Note attribuée au
                        dossier</b> </label>
                <div class="col-md-4">
                    <input type="number" class="form-control  @if ($errors->has('note_dossier')) parsley-error  @endif"
                           name="note_dossier" min="0" value="{{$candidat->score_1}}" readonly>
                </div>
                <div class="parsley-errors-list">
                    @if ($errors->first('note_dossier'))
                        <ul class="parsley-errors-list filled" id="parsley-id-7101">
                            <li class="parsley-required"> {{ $errors->first('note_dossier') }}</li>
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label style="color :black" class="col-md-4 col-form-label text-md-right"><b>Note
                        psychotechnique</b></label>
                <div class="col-md-4">
                    <input type="number" min="0" step=any
                           class="form-control  @if ($errors->has('note_psychotechnique')) parsley-error  @endif"
                           name="note_psychotechnique" value="{{$notes->note_psychotechnique}}">
                </div>
                <div class="parsley-errors-list">
                    @if ($errors->first('note_psychotechnique'))
                        <ul class="parsley-errors-list filled" id="parsley-id-7101">
                            <li class="parsley-required"> {{ $errors->first('note_psychotechnique') }}</li>
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label style="color :black" class="col-md-4 col-form-label text-md-right"><b>note relative aux questions
                        écrites</b></label>
                <div class="col-md-4">
                    <input type="number" min="0" step=any
                           class="form-control  @if ($errors->has('note_question_ecrite')) parsley-error  @endif"
                           name="note_question_ecrite" value="{{$notes->note_question_ecrite}}"
                           @if(in_array($candidat->post->reference, ['C11/2019', 'C12/2019', '
       C13/2019'])) readonly @endif>
                </div>
                <div class="parsley-errors-list">
                    @if ($errors->first('note_question_ecrite'))
                        <ul class="parsley-errors-list filled" id="parsley-id-7101">
                            <li class="parsley-required"> {{ $errors->first('note_question_ecrite') }}</li>
                        </ul>
                    @endif
                </div>
            </div>

            <br>


            <center>
                @if($candidat->conformite_age == 'no' || $candidat->conformite_cin == 'no' || $candidat->conformite_diplome == 'no' || $candidat->conformite_permis == 'no' || $candidat->conformite_note == 'no'
                || $candidat->conformite_etude_prepa == 'no' || $candidat->conformite_attestation_inscription == 'no' || $candidat->conformite_diplome_mecanique == 'no' || $candidat->conformite_attestation_scolarite == 'no')
                    Ce dossier est n'est pas conforme
                @elseif($candidat->conformite_age == '' && $candidat->conformite_cin == '' &&
                $candidat->conformite_diplome == '' && $candidat->conformite_permis == '' &&
                $candidat->conformite_note == '' && $candidat->conformite_etude_prepa == '' && $candidat->conformite_attestation_inscription == '' && $candidat->conformite_diplome_mecanique == '' && $candidat->conformite_attestation_scolarite == '')
                    Veuillez vérifier les confirmitées pour ce dossier
                @else
                    <button href="" type="submit" class="btn btn-primary">Enregistrer</button>
                @endif

            </center>

        </form>
    </div>
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

@section('scripts')

    <script src="{{asset('dashboard/js/jquery.dataTables.min.js')}}" defer></script>


    <script src="{{asset('dashboard/js/jquery-3.3.1.js')}}"></script>
    <script>
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
    </script>
@endsection

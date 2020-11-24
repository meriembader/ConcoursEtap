@foreach($candidats as $candidat)
    <div class="card shadow mb-4">
        <div class="card-header py-3 row">
            @foreach($candidat['poste'] as $poste)
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary"> [{{$poste[0]->reference}}
                        ]</h6>
                </div>
            @endforeach
            <div class="col-md-6" style="text-align: right">
                <a href="{{route('FirstSelectExport.export', [$poste[0]->id, 8])}}"
                   class="btn btn-primary btn-icon-split"
                   class="pull-right">
                                <span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>
                    <span class="text">Exporter- Excel xlsx</span>
                </a>
                <a href="#" class="btn btn-primary btn-icon-split exportselectionbtn">
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
                            <table class="table table-bordered dataTable">
                                <thead>
                                <tr role="row">
                                    <th><a href="" class="checkall" data-id="{{$loop->index}}">#</a>
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

                                    <th>
                                        Conformité
                                    </th>
                                    <th>
                                        notes
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @isset($candidat['candidat'])
                                    <?php unset($candidat['candidat'][0]) ?>
                                    @foreach($candidat['candidat'] as $c)
                                        @isset($c->user->cin)
                                            <tr role="row" class="odd">
                                                <td><input type="checkbox"
                                                           name="candidat[{{ $c->id }}]"
                                                           class="ceckboxexport checkbyid-{{$dataid}}"
                                                           value="{{$c->id }}"></td>
                                                <td class="sorting_1 poste">{{$c->post()->first()->reference}}</td>
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
                                        @endisset
                                    @endforeach
                                @endisset

                                @isset($candidat['candidat_not_confirmed'])
                                    @foreach($candidat['candidat_not_confirmed'] as $c)
                                        @isset($c->user->cin)
                                            <tr role="row" class="odd" style="background-color: yellow;">
                                                <td><input type="checkbox"
                                                           name="candidat[{{$c->id }}]"
                                                           class="ceckboxexport checkbyid-{{$dataid}}"
                                                           value="{{$c->id }}"></td>
                                                <td class="sorting_1 poste">{{$c->post()->first()->reference}}</td>
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
                                                        <span class="text">Conformité Dossier</span> </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('showNoteAdd',$c->user->cin)}}"
                                                       class="btn btn-primary btn-icon-split"> <span
                                                            class="icon text-white-50"> <i
                                                                class="fas fa-plus"></i> </span>
                                                        <span class="text">les notes</span> </a>
                                                </td>


                                            </tr>
                                        @endisset
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



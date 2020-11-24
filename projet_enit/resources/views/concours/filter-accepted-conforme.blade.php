@if($filter == 1)
    @foreach($candidats as $candidat)

        <div class="card shadow mb-4">
            <div class="card-header py-3 row">
                @foreach($candidat['poste'] as $poste)
                    <div class="col-sm-2">
                        <h6 class="m-0 font-weight-bold text-primary"> [{{$poste[0]->reference}}
                            ]</h6>
                    </div>
                @endforeach

                <div class="col-md-6" style="text-align:right ">
                    <a href="{{route('FirstSelectExport.export', [$poste[0]->id, 8])}}"
                       class="btn btn-primary btn-icon-split"
                       class="pull-right">
                                <span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>
                        <span class="text">Exporter- Excel xlsx</span>
                    </a> 
                </div>
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
                                    <th>#</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
                                        style="width: 270px;">Nom & Prénom
                                    </th>

                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
                                        style="width: 270px;">Date de naisance
                                    </th>

                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
                                        style="width: 270px;">
                                        Adresse Email
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
                                        style="width: 270px;">
                                        CIN
                                    </th>

                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
                                        style="width: 270px;">Conformité Age
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
                                        style="width: 270px;">Conformité Numéro CIN
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
                                        style="width: 270px;">Conformité Diplôme
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
                                        style="width: 270px;">Conformité Permis de Conduire
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
                                        style="width: 270px;">Conformité Notes
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
                                        style="width: 270px;">Dossier Complet
                                    </th>

                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
                                        style="width: 270px;">Action
                                    </th>

                                </tr>

                                </thead>
                                <tbody>
                                @foreach($candidat['candidat'] as $cs)
                                    @foreach($cs as $c)
                                        <tr role="row" class="odd">
                                            <td>
                                                <input type="checkbox"
                                                       name="candidat[{{$c->id }}]"
                                                       class="ceckboxexport" value="{{$c->id }}">
                                            </td>
                                            <td class="sorting_1">{{$c->user->name}}</td>
                                            <td>{{$c->birthday}}</td>
                                            <td>{{$c->user->email}}</td>
                                            <td>{{$c->user->cin}}</td>
                                            <td>{{$c->conformite_age}}</td>
                                            <td>{{$c->conformite_cin}}</td>
                                            <td>{{$c->conformite_diplome}}</td>
                                            <td>{{$c->conformite_permis}}</td>
                                            <td>{{$c->conformite_note}}</td>
                                            <td>{{$c->dossier_complet}}</td>


                                            <td>
                                                <a href="{{route('showNoteAdd',$c->id)}}"
                                                   class="btn btn-primary btn-icon-split"> <span
                                                        class="icon text-white-50"> <i
                                                            class="fas fa-plus"></i> </span>
                                                    <span class="text">les notes</span> </a>
                                            </td>




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
@elseif($filter == 2)
    @foreach($candidats as $candidat)
        <div class="card shadow mb-4">
            <div class="card-header py-3 row">
                @foreach($candidat['poste'] as $poste)
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">{{$poste[0]->postname}} [{{$poste[0]->reference}}
                            ]</h6>
                    </div>
                @endforeach

                <div class="col-md-6" style="text-align:right ">
                    <a href="{{route('FirstSelectExport.export', [$poste[0]->id, 8])}}"
                       class="btn btn-primary btn-icon-split"
                       class="pull-right">
                                <span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>
                        <span class="text">Exporter- Excel xlsx</span>
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
                                        <th>#</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 270px;">Nom & Prénom
                                        </th>

                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 270px;">Date de naisance
                                        </th>

                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 270px;">
                                            Adresse Email
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 270px;">
                                            CIN
                                        </th>

                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 270px;">Conformité Age
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 270px;">Conformité Numéro CIN
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 270px;">Conformité Diplôme
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 270px;">Conformité Permis de Conduire
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 270px;">Conformité Notes
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 270px;">Dossier Complet
                                        </th>

                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 270px;">Action
                                        </th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($candidat['candidat'] as $cs)
                                        @foreach($cs as $c)
                                            <tr role="row" class="odd">
                                                <td>
                                                    <input type="checkbox"
                                                           name="candidat[{{$c->id }}]"
                                                           class="ceckboxexport" value="{{$c->id }}">
                                                </td>
                                                <td class="sorting_1">{{$c->user->name}}</td>
                                                <td>ddd{{ date('d-m-Y', strtotime($c->birthday)) }}</td>
                                                <td>{{$c->user->email}}</td>
                                                <td>{{$c->user->cin}}</td>
                                                <td>{{$c->conformite_age}}</td>
                                                <td>{{$c->conformite_cin}}</td>
                                                <td>{{$c->conformite_diplome}}</td>
                                                <td>{{$c->conformite_permis}}</td>
                                                <td>{{$c->conformite_note}}</td>
                                                <td>{{$c->dossier_complet}}</td>


                                                <td>
                                                    <a href="{{route('showNoteAdd',$c->cin)}}"
                                                       class="btn btn-primary btn-icon-split"> <span
                                                            class="icon text-white-50"> <i
                                                                class="fas fa-plus"></i> </span>
                                                        <span class="text">les notes</span> </a>
                                                </td>


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
@else
    aucune candidature
@endif


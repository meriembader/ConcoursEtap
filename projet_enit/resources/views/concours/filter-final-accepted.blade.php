@if($filter == 1)
    @foreach($candidats as $candidat)

        <div class="card shadow mb-4">
            <div class="card-header py-3 row">
                @foreach($candidat['poste'] as $poste)
                    <div class="col-md-4">
                        <h6 class="m-0 font-weight-bold text-primary">[{{$poste[0]->reference}}
                            ]</h6>
                    </div>
                @endforeach
                <div class="col-md-8" style="text-align: right">
                    <a href="{{route('FinalSelectExport.export', [$poste[0]->id, 8])}}"
                       class="btn btn-primary btn-icon-split"
                       class="pull-right">
                                <span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>
                        <span class="text">Exporter- Excel xlsx</span>
                    </a>
                    <a href="{{route('ListeAttenteExport.export', [$poste[0]->id, 5])}}"
                       class="btn btn-primary btn-icon-split"
                       class="pull-right"> 
                                <span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>
                        <span class="text">Exporter la liste d'attente- Excel xlsx</span>
                    </a>
                    <a href="{{route('ListeAttenteExport.mail.send', $poste[0]->id)}}"
                       class="btn btn-primary btn-icon-split"
                       class="pull-right">
                                <span class="icon text-white-50"> <i
                                        class="fas fa-paper-plane"></i> </span> <span class="text">Notifier
                                    liste Attente </span></a>
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
                                            style="width: 270px;">Téléphone
                                        </th>

                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 270px;">score 2
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
                                                <td class="sorting_1">{{$c->last_name}} {{$c->first_name}}</td>
                                                <td>{{$c->birthday}}</td>
                                                <td>{{$c->user->email}}</td>
                                                <td>{{$c->mobile_phone}}</td>
                                                <td>{{$c->score_2}}</td>

                                                <td>
                                                <td>

                                                    <a href="{{route('sendToOne', $c->id)}}"

                                                       class="btn btn-primary btn-icon-split @if ($c->state_sending_mail == 2) disabled @endif"> <span
                                                            class="icon text-white-50"> <i
                                                                class="fas fa-paper-plane"></i> </span></a>
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
                    <div class="col-md-4">
                        <h6 class="m-0 font-weight-bold text-primary">{{$poste[0]->postname}} [{{$poste[0]->reference}}
                            ]</h6>
                    </div>
                @endforeach
                <div class="col-md-8" style="text-align: right">
                    <a href="{{route('FinalSelectExport.export', [$poste[0]->id, 8])}}"
                       class="btn btn-primary btn-icon-split"
                       class="pull-right">
                                <span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>
                        <span class="text">Exporter- Excel xlsx</span>
                    </a>
                    <a href="{{route('ListeAttenteExport.export', [$poste[0]->id, 5])}}"
                       class="btn btn-primary btn-icon-split"
                       class="pull-right">
                                <span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>
                        <span class="text">Exporter la liste d'attente- Excel xlsx</span>
                    </a>
                    <a href="{{route('ListeAttenteExport.mail.send', $poste[0]->id)}}"
                       class="btn btn-primary btn-icon-split"
                       class="pull-right">
                                <span class="icon text-white-50"> <i
                                        class="fas fa-paper-plane"></i> </span> <span class="text">Notifier
                                    liste Attente </span></a>
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
                                            style="width: 270px;">Téléphone
                                        </th>

                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 270px;">score 2
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
                                                <td><input type="checkbox"
                                                           name="candidat[{{$c->id }}]"
                                                           class="ceckboxexport" value="{{$c->id }}"></td>
                                                <td class="sorting_1">{{$c->last_name}} {{$c->first_name}}</td>
                                                <td>{{$c->birthday}}</td>
                                                <td>{{$c->user->email}}</td>
                                                <td>{{$c->mobile_phone}}</td>
                                                <td>{{$c->score_2}}</td>


                                                <td>

                                                    <a href="{{route('sendToOne', $c->id)}}"

                                                       class="btn btn-primary btn-icon-split @if ($c->state_sending_mail == 2) disabled @endif"> <span
                                                            class="icon text-white-50"> <i
                                                                class="fas fa-paper-plane"></i> </span></a>
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


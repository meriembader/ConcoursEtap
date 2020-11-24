{{-- @extends('projetEnit.layouts.dashboard') --}}

{{-- @section('content') --}}

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">


<div class="container-fluid" style="margin-top : 50px">
    <!-- <div class="row"> -->
    <!-- <div class="col"> -->
    <!-- <div class="card-header py-3"> -->
    <h3 class="m-0 font-weight-bold text-primary">Listes des candidats admissibles (Deuxième Sélection)</h3>
    <!-- </div> -->
    <!-- </div> -->

    <!-- </div> -->
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="d-flex justify-content-center">
                    <div class="row">
                        <div class="col">
                            <select class="form-control postecomforme">
                                <option value="">Choisir un poste</option>
                                @foreach($postes as $post)
                                    <option value="{{$post->id}}"> {{$post->postname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">

                            {{--<a href="{{route('accepted.final.candidate')}}" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-eye"></i>
                            </span>
                                <span class="text">Afficher le Résultat ( Troisième Sélection)</span>
                            </a>--}}
                            <a href="#" class="btn btn-primary btn-icon-split exportselectionbtn">
                                <span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>
                                <span class="text">Exporter la Selection</span>
                            </a>
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
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                           cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                           style="width: 100%;">
                                        <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable"
                                                rowspan="1"
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
                                                    <td class="sorting_1">{{$c->last_name}} {{$c->first_name}}</td>
                                                    <td>{{ date('d-m-Y', strtotime($c->birthday)) }}</td>
                                                    <td>{{$c->user->email}}</td>
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
                                                            <span class="text"> les notes</span> </a>

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
        <div class="d-flex justify-content-center" style="margin-bottom : 50px">

        </div>
    </div>

</div>
</div>
{{-- @endsection --}}


{{--@section('scripts')--}}

<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $(document).on('change', '.postecomforme', function () {
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
                url: "{{Route('filter.accepted.conforme.candidate')}}",
                data: {
                    'post_id': $('.postecomforme').find(":selected").val(),
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
{{-- @endsection --}}


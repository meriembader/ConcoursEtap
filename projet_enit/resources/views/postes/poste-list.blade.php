@extends('projetEnit.layouts.dashboard')



@section('content')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">


    <div class="container-fluid" style="margin-top: 50px">

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Liste des Poste Demandés</h3>

                <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal"
                   data-target="#exampleModalCenter">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                    <span class="text">Ajouter la date de clôture des postes</span>
                </a>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Ajouter la date de clôture des
                                    postes</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form name="my-form" action="{{route ('handleAdddate')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group row">
                                        <label style="color :black" class="col-md-4 col-form-label text-md-right"><b>Date
                                                de Clôture</b> </label>
                                        <div class="col-md">
                                            <input type="date" class="form-control" name="date_cloture" required="">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>




            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" id="laravel_datatable" style="width:100%">
                        <thead>
                        <tr>

                            <th style="text-align: center ; color : black">Nom du Poste</th>
                            <th style="text-align: center ; color : black">Référence du Poste (id poste)</th>
                            <th style="text-align: center ; color : black">Diplôme et Niveau d'études demandés</th>
                            <th style="text-align: center ; color : black">Nombre de Postes</th>
                            <th style="text-align: center ; color : black">Date d'Ouverture des Candidatures</th>
                            <th style="text-align: center ; color : black">Actions</th>
                        </tr>

                        </thead>


                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


    <script>

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#laravel_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{route('showPostList')}}",
                    type: 'GET',
                },
                columns: [

                    {data: 'postname', name: 'postname'},
                    {data: 'reference', name: 'reference'},
                    {data: 'qualification', name: 'qualification'},
                    {data: 'postnumber', name: 'postnumber'},
                    {data: 'date_ouverture', name: 'date_ouverture'},
                    {data: 'action', name: 'action', orderable: false}
                ],
                order: [[0, 'desc']]
            });

            //delete Poste
            $('body').on('click', '.deletepost', function () {
                var id = $(this).data("id");

                Swal.fire({
                    title: 'Êtes-vous sûr(e)?',
                    text: "vous ne pourrez plus revenir en arrière!",
                    type: 'Attention !',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'supprimer!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "{{url('/portal/post/delete')}}/"+id,
                            data: {
                                'id': id,
                            },
                            success: function (data) {
                            }
                        });

                        Swal.fire(
                            'Supprimé!',
                            'Le poste est supprimé.',
                        )
                        var oTable = $('#laravel_datatable').dataTable();
                        oTable.fnDraw(false);
                    }
                });
            });

        });
    </script>
@endsection

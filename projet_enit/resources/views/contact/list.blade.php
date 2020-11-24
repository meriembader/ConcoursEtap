@extends('projetEnit.layouts.dashboard')



@section('content')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">

    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 btn font-weight-bold text-primary">listes des contacts</h6>
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
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 270px;">
                                            Nom et prénom
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 401px;">E-mail
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 201px;">message
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach ($contacts as $contact)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$contact->name}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->message}}</td>
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

@endsection


@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


    <script>

        $(document).ready(function () {
            $('#dataTable').dataTable();

        });
    </script>
@endsection

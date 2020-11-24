@extends('projetEnit.layouts.dashboard')



@section('content')
    <style>
        .table-responsive {
            width: 150% !important;
        }
    </style>

    <link rel="stylesheet" href="{{asset('dashboard/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/buttons.dataTables.min.css')}}">




    <div class="container-fluid" style="margin-top: 50px">


        <br/><br/>
        <div class="load">
            <h3 class="m-0 font-weight-bold text-primary">Historique des mot de passe</h3>


            <div id="content">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
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
                                                Supervisor
                                            </th>
                                            <th class="sorting poste" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 270px;">
                                                Candidat
                                            </th>
                                            <th class="sorting poste" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 270px;">
                                                Cin du candidat
                                            </th>

                                            <th class="sorting cin" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 270px;">
                                                Date
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach ($password as $p)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1 poste">{{$p->supervisor}}</td>
                                                <td class="poste">{{$p->candidat}}</td>
                                                <td class="poste">{{$p->cin}}</td>
                                                <td class="cin">{{ date('d-m-Y', strtotime($p->created_at)) }}</td>
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

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>






    <script>

        $(document).ready(function () {

            $(document).on('click', '.tab1', function () {
                $('.load').load("{{route('accepted.candidate')}}");
            });

            $(document).on('click', '.tab2', function () {
                $('.load').load("{{route('accepted.conforme.candidate')}}");
            });

            $(document).on('click', '.tab3', function () {
                $('.load').load("{{route('accepted.final.candidate')}}");
            });

            $(document).on('click', '.newpassword', function () {
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


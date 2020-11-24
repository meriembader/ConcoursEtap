@extends('projetEnit.layout')


@section('header')
    @include('projetEnit.layout.header')
@endsection


@section('content')
    @if(config('app.locale') == 'ar')
        <style>
            .alert {
                text-align: right;
            }
        </style>
    @endif
    <div class="row ">
        <div class="col-md-3"></div>
        <div class="col-md-6" style="background-color: #ccc; border-radius: 5px;padding: 23px 8px;">
            <div class="card">
                <div class="card-body">
                    @if($res == 1)
                        <?=
                        str_replace(array('%poste%', '%rang%', '%score%', '%sis%', '%nom_prenom%'), array($candidat->poste, '...', $candidat->score_1, ' Rue Béchir Salem Belkhira Campus universitaire FARHAT HACHED EL Manar ', $candidat->first_name), $data->msg);
                        ?>
                    @else
                        {{$data}}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>

        <!-- </div> -->
    </div>

@endsection

@section('footer')
    @include('projetEnit.layout.footer')
@endsection

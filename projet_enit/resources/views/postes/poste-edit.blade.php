@extends('projetEnit.layouts.dashboard')



@section('content')

<div class="container-fluid" style="margin-top: 100px ;">

<center>

        <h3  style="color :black"><b>Modifier le poste sélectionné</b> </h3><br>

</center>
            
            <form name="my-form" action="{{ route ('updatePost',['id' => $poste->id ])}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{csrf_field()}} 
                <input type="hidden" name="id" value="{{$poste->id}}">

            
                <div class="form-group row">
                    <label style="color :black" class="col-md-4 col-form-label text-md-right" ><b>Nom du poste</b> </label>
                    <div class="col-md-4">
                        <input type="text" value="{{$poste->postname}}" class="form-control" name="postname" required="" >
                    </div>
                </div>

                <div class="form-group row">
                    <label style="color :black" class="col-md-4 col-form-label text-md-right" ><b>Référence du poste</b></label>
                    <div class="col-md-4">
                        <input type="text" value="{{$poste->reference}}" class="form-control" name="reference" required="" >
                    </div>

                </div>

                <div class="form-group row">
                    <label style="color :black" class="col-md-4 col-form-label text-md-right" ><b>Diplôme et niveau d'études demandés</b></label>
                    <div class="col-md-4">
                        <input type="text" value="{{$poste->qualification}}" class="form-control" name="qualification" required="">
                    </div>

                </div>

                <div class="form-group row">
                    <label style="color :black" class="col-md-4 col-form-label text-md-right" ><b>Nombre des postes</b></label>
                    <div class="col-md-4">
                        <input type="number" value="{{$poste->postnumber}}" class="form-control" name="postnumber" required="" min="0">
                    </div>

                </div>
                <div class="form-group row">
                    <label style="color :black" class="col-md-4 col-form-label text-md-right" ><b>Date d'Ouverture des Candidatures</b></label>
                    <div class="col-md-4">
                        <input type="date" value="{{$poste->date_ouverture}}" class="form-control" name="date_ouverture" required="">
                    </div>
    
                </div>

                <center>

                <button href="" type="submit"class="btn btn-primary">Modifier</button>

                </center>
              

                </div>
            </form>
        </div>
    
@endsection



@section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

@endsection
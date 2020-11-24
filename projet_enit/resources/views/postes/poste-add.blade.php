
@extends('projetEnit.layouts.dashboard')

@section ('content')


<div class="container-fluid" style="margin-top: 100px ;">

<center>

        <h3  style="color :black"><b>Ajouter des postes</b> </h3><br>

</center>
            
            <form name="my-form" action="{{Route ('handlepostAdd')}}" method="post">
            {{csrf_field()}}
                <div class="form-group row">
                    <label style="color :black" class="col-md-4 col-form-label text-md-right" ><b>Nom du poste</b> </label>
                    <div class="col-md-4">
                        <input type="text"class="form-control  @if ($errors->has('postname')) parsley-error  @endif" name="postname" required="" >
                    </div>
                    <div class="parsley-errors-list">
                        @if ($errors->first('postname'))
                        <ul class="parsley-errors-list filled" id="parsley-id-7101">
                            <li class="parsley-required"> {{ $errors->first('postname') }}</li>
                        </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label style="color :black" class="col-md-4 col-form-label text-md-right" ><b>Référence du poste</b></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control  @if ($errors->has('reference')) parsley-error  @endif" name="reference" required="" >
                    </div>
                    <div class="parsley-errors-list">
                        @if ($errors->first('reference'))
                        <ul class="parsley-errors-list filled" id="parsley-id-7101">
                            <li class="parsley-required"> {{ $errors->first('reference') }}</li>
                        </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label style="color :black" class="col-md-4 col-form-label text-md-right" ><b>Diplôme et niveau d'études demandés</b></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control  @if ($errors->has('qualification')) parsley-error  @endif" name="qualification" required="">
                    </div>
                    <div class="parsley-errors-list">
                        @if ($errors->first('qualification'))
                        <ul class="parsley-errors-list filled" id="parsley-id-7101">
                            <li class="parsley-required"> {{ $errors->first('qualification') }}</li>
                        </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label style="color :black" class="col-md-4 col-form-label text-md-right" ><b>Nombre des postes</b></label>
                    <div class="col-md-4">
                        <input type="number" class="form-control  @if ($errors->has('postnumber')) parsley-error  @endif" name="postnumber" required="" min="0">
                    </div>
                    <div class="parsley-errors-list">
                        @if ($errors->first('postnumber'))
                        <ul class="parsley-errors-list filled" id="parsley-id-7101">
                            <li class="parsley-required"> {{ $errors->first('postnumber') }}</li>
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label style="color :black" class="col-md-4 col-form-label text-md-right" ><b>Date d'Ouverture des Candidatures</b></label>
                    <div class="col-md-4">
                        <input type="date" class="form-control  @if ($errors->has('date_ouverture')) parsley-error  @endif" name="date_ouverture" required="">
                    </div>
                    <div class="parsley-errors-list">
                        @if ($errors->first('date_ouverture'))
                        <ul class="parsley-errors-list filled" id="parsley-id-7101">
                            <li class="parsley-required"> {{ $errors->first('date_ouverture') }}</li>
                        </ul>
                        @endif
                    </div>
                </div>


                <center>

                    <button href="" type="submit"class="btn btn-primary">Enregistrer</button>

                </center>
              

                </div>
            </form>
        </div>
    
@endsection


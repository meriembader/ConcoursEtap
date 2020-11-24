<div class="col-sm-12">
    <table class="table table-bordered dataTable" id="dataTable"
           cellspacing="0" role="grid" aria-describedby="dataTable_info"
           style="width: 100%;">
        <thead>
        <tr role="row">
            <th class="sorting_asc poste" tabindex="0" aria-controls="dataTable"
                rowspan="1"
                colspan="1" aria-sort="ascending"
                aria-label="Name: activate to sort column descending"
                style="width: 270px;">
                Référence du poste
            </th>
            <th class="sorting poste" tabindex="0" aria-controls="dataTable" rowspan="1"
                colspan="1" aria-sort="ascending"
                aria-label="Name: activate to sort column descending"
                style="width: 270px;">
                Nom du Poste
            </th>

            <th class="sorting cin" tabindex="0" aria-controls="dataTable" rowspan="1"
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
                style="width: 101px;">Date de naisance
            </th>

            <th class="sorting email" tabindex="0" aria-controls="dataTable" rowspan="1"
                colspan="1" aria-label="Office: activate to sort column ascending"
                style="width: 201px;">
                Adresse E-mail
            </th>
            <th class="sorting level_studies" tabindex="0" aria-controls="dataTable" rowspan="1"
                colspan="1" aria-label="Office: activate to sort column ascending"
                style="width: 201px;">
                Niveau d'études
            </th>
            <th class="sorting preparatory_study" tabindex="0" aria-controls="dataTable" rowspan="1"
                colspan="1" aria-label="Office: activate to sort column ascending"
                style="width: 201px;">
                etude preparatoire
            </th>
            <th class="sorting Bachelor_degree" tabindex="0" aria-controls="dataTable" rowspan="1"
                colspan="1" aria-label="Office: activate to sort column ascending"
                style="width: 201px;">
                Moyenne du Baccalauréat
            </th>
            <th class="sorting last_year_degree_without_pfe" tabindex="0" aria-controls="dataTable" rowspan="1"
                colspan="1" aria-label="Office: activate to sort column ascending"
                style="width: 201px;">
                Moyenne de la dernière année d'étude sans PFE
            </th>
            <th class="sorting age" tabindex="0" aria-controls="dataTable" rowspan="1"
                colspan="1" aria-sort="ascending"
                aria-label="Name: activate to sort column descending"
                style="width: 270px;">Conformité Age
            </th>
            <th class="sorting cinconfirmity" tabindex="0" aria-controls="dataTable" rowspan="1"
                colspan="1" aria-sort="ascending"
                aria-label="Name: activate to sort column descending"
                style="width: 270px;">Conformité Numéro CIN
            </th>
            <th class="sorting diplome" tabindex="0" aria-controls="dataTable" rowspan="1"
                colspan="1" aria-sort="ascending"
                aria-label="Name: activate to sort column descending"
                style="width: 270px;">Conformité Diplôme
            </th>
            <th class="sorting permis" tabindex="0" aria-controls="dataTable" rowspan="1"
                colspan="1" aria-sort="ascending"
                aria-label="Name: activate to sort column descending"
                style="width: 270px;">Conformité Permis de Conduire
            </th>
            <th class="sorting note" tabindex="0" aria-controls="dataTable" rowspan="1"
                colspan="1" aria-sort="ascending"
                aria-label="Name: activate to sort column descending"
                style="width: 270px;">Conformité Notes
            </th>
            <th class="sorting dossier" tabindex="0" aria-controls="dataTable" rowspan="1"
                colspan="1" aria-sort="ascending"
                aria-label="Name: activate to sort column descending"
                style="width: 270px;">Dossier Complet
            </th>
            <th class="sorting datepermis" tabindex="0" aria-controls="dataTable"
                rowspan="1"
                colspan="1" aria-sort="ascending"
                aria-label="Name: activate to sort column descending"
                style="width: 270px;">Deate d'obtention du permis
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
                Action
            </th>
        </tr>
        </thead>

        <tbody>

        @foreach ($candidats as $candidat)
            <tr role="row" class="odd">
                <td class="sorting_1 poste">{{$candidat->post->reference}}</td>
                <td class="poste">{{$candidat->post->postname}}</td>
                <td class="cin">@isset($candidat->user->cin){{$candidat->user->cin}}@endisset</td>
                <td class="first_name">{{$candidat->last_name}} </td>
                <td class="last_name">{{$candidat->first_name}} </td>
                <td class="birthday">
                    {{ date('d-m-Y', strtotime($candidat->birthday)) }}</td>
                <td class="email">@isset($candidat->user->email){{$candidat->user->email}}@endisset</td>
                <td class="level_studies">
                    @if(in_array($candidat->post->reference, ['C11/2019','C12/2019','C13/2019']))
                        @isset($candidat->level()->first()->titre)
                            {{$candidat->level()->first()->titre}}
                        @endisset
                    @else
                        @isset($candidat->diplome()->first()->titre)
                            {{$candidat->diplome()->first()->titre}}
                        @endisset
                    @endif
                </td>
                <td class="preparatory_study">{{$candidat->preparatory_study}}</td>
                <td class="Bachelor_degree">{{$candidat->Bachelor_degree}}</td>
                <td class="last_year_degree_without_pfe">{{$candidat->last_year_degree_without_pfe}}</td>
                <td class="age">{{$candidat->conformite_age}}</td>
                <td class="cinconfirmity">{{$candidat->conformite_cin}}</td>
                <td class="diplome">{{$candidat->conformite_diplome}}</td>
                <td class="permis">{{$candidat->conformite_permis}}</td>
                <td class="datepermis">{{date('d-m-Y', strtotime($candidat->date_of_obtaining_a_driving_license))}}</td>
                <td class="note">{{$candidat->conformite_note}}</td>
                <td class="dossier">{{$candidat->dossier_complet}}</td>
                <td class="score_1">{{$candidat->score_1}}</td>
                <td class="score_2">{{$candidat->score_2}}</td>
                <td><a href="#" data-id="{{$candidat->id}}"
                       class="btn btn-primary btn-icon-split newpassword"
                       style="width: max-content;"> Générer nouveau mot
                        de passe</a></td>
            </tr>
        @endforeach
        </tbody>

    </table>
</div>








<html>
<head>


    <title>Fiche Inscription</title>
    <style>

    </style>
</head>

<body>
<table>
    <tr>
        <td style="width: 60%;">
            <h2 class="line-height: 80%;"> Entreprise Tunisienne d’Activités Pétrolières ETAP</h2>
            <p>Tèl : +216 71 874 700 /+216 70 014 400</p>
        </td>
        <td style="width: 40%">
            <img style="  height: 80px; width: 80px;" src="images/etapLogo.png">
        </td>
    </tr>
</table>

<div style="text-align: center; margin-top : 10px ">
    <h2>Fiche d'inscription au poste : {{$candidat->post->reference}}</h2>
</div>

<table border="1" style="width: 100%;">

    <tbody>
    <tr>
    <td>

    <p style="font-size: 17px; margin-left : 20px ;line-height: 30px">
                <b> Identifiant du dossier : </b> {{$candidat->id_dossier}} <br>

                <b> Poste : </b> {{$candidat->poste}} <br>
                <b> Nom : </b> {{$candidat->last_name }}<br>
                <b> Prénom : </b> {{$candidat->first_name}} <br>
                <b> Numéro CIN : </b> {{$candidat->cin }} <br>
                <b> Date de naissance : </b> {{date('d/m/Y',strtotime($candidat->birthday)) }} <br>

                <b> Lieu de naissance : </b> {{$candidat-> place_of_birth}} <br></p>
                <hr>
                <p style="font-size: 17px; margin-left : 20px ;line-height: 30px">   
                <b>   Numéro de Téléphone : </b>  {{$candidat->mobile_phone }} <br>
                @if($candidat->user->email)
                <b>   Adresse Email : </b>  {{$candidat->user->email }} 
                @endif<br>               
                </p>

                <hr>
                <p style="font-size: 17px; margin-left : 20px ;line-height: 30px">

                @if($candidat->diplome_id)
                    <b> Diplôme Obtenu : </b> {{$candidat->diplome->titre}}  <br>
                @endif
                @if($candidat->level_studies)
                    <b> Niveau d'étude : </b> {{$candidat->level->titre}}  <br>
                @endif

                
                @if($candidat->Bachelor_degree)
                    <b> Moyenne du Baccalauréat : </b> {{$candidat->Bachelor_degree }}  <br>
                @endif

                @if($candidat->last_year_degree_without_pfe)
                    <b> Moyenne de la dernière année d'étude sans la note du mémoire/PFE : </b> {{$candidat->last_year_degree_without_pfe}}
                    <br>
                @endif
                @if($candidat->note_pfe_avec_pfe)
                    <b> Moyenne de la derniére année d'étude avec la note du mémoire/PFE : </b> {{$candidat->note_pfe_avec_pfe}}
                    <br>
                @endif
                @if($candidat->note_pfe )
                    <b> Note du mémoire/PFE : </b> {{$candidat->note_pfe}}
                    <br>
                @endif
                @if($candidat->preparatory_study)
                    @if($candidat->preparatory_study == 'yes')
                        <b> Etudes préparatoires aux écoles d'ingénieurs : </b> oui  <br>
                    @else
                    <b> Etudes préparatoires aux écoles d'ingénieurs : </b> non  <br>


                    @endif
                @endif

                @if($candidat->conformite_attestation_inscription)
                    @if($candidat->conformite_attestation_inscription == 'yes')
                        <b> Inscrit au bureau de l'emploi : </b> oui  <br>
                    @else
                    <b> Inscrit au bureau de l'emploi  : </b> non  <br>
                    @endif
                @endif

                @if($candidat->date_of_obtaining_a_driving_license)
                    <b> Date d'obtention du permis de conduire : </b> {{date('d/m/Y',strtotime($candidat->date_of_obtaining_a_driving_license))}}
                    <br>
                @endif
                @if($candidat->dip_m)
                    @if($candidat->dip_m == 'yes')
                        <b> Diplôme mécanique : </b> oui  <br>
                    @else
                    <b> Diplôme mécanique : </b> non  <br>


                    @endif
                @endif

                </p>
            <p style="font-size: 17px; margin-left : 20px">- Je certifie d'avoir pris connaissance de toutes les conditions et la méthodologie du concours</p>
            <p style="font-size: 17px; margin-left : 20px">- Je certifie que toutes les informations saisies sont exactes</p>


            <p style="font-size: 17px; float : right "><b> Inscription faite le : </b> {{ date('d/m/Y H:i:s',strtotime($candidat->created_at)) }} <br>
            </p>
<br>
<br>

        </td>

    </tr>
    </tbody>

</table>

<div style=" text-align: center; margin-top : 30px">
    <span>Copyright ETAP © 2019 </span>
</div>


</html>

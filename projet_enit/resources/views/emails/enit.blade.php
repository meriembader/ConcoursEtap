<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>


<h2>Bonjour Monsieur/Madame {{$candidat->last_name}} {{$candidat->first_name}}</h2>

<p>
<!-- {{$data->msg}} -->
    <?=

    str_replace(array('%poste%', '%rang%', '%score%', '%sis%', '%nom_prenom%'), array($candidat->poste, '...', $candidat->score_1, ' Rue Béchir Salem Belkhira Campus universitaire FARHAT HACHED EL Manar ', $candidat->first_name), $data->msg);

    ?>


</p>

</body>

</html>

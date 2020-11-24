<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>


<h2>Bonjour {{$user->candidat()->first()->first_name}} {{$user->candidat()->first()->first_name}}</h2>
Votre nouveau mot de passe: {{$user['unhashed']}}

</body>

</html>

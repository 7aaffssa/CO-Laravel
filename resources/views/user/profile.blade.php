<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')
@section('content')
    <h1>Profil de {{ $user['name'] }}</h1>
    <h2>Application: {{ $app_name }}</h2>
    <p>Email: {{ $user['email'] }}</p>
    <a href="/">Retour à l'accueil</a>
@endsection
</body>
</html>
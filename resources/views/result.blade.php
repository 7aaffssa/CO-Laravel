<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <p><strong>Nom:</strong> {{ $formData['nom'] }}</p>
    <p><strong>Prénom:</strong> {{ $formData['prenom'] }}</p>
    <p><strong>Âge:</strong> {{ $formData['age'] }}</p>
    <p><strong>Date de Naissance:</strong> {{ $formData['dn'] }}</p>
    <p><strong>Méthode :</strong> POST</p>
    <p><strong>URL :</strong> {{ url()->current() }}</p>
    <p><strong>IP :</strong> {{ request()->ip() }}</p>
    <a href="{{ route('form.show') }}">Retour au formulaire</a>
</body>
</html>
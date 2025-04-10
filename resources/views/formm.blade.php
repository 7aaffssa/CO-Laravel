<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <h1>Formulaire</h1>
    <form action="{{ route('form.submit') }}" method="POST">
        @csrf 
        <div>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
        <div>
            <label for="age">Âge:</label>
            <input type="number" id="age" name="age" required>
        </div>
        <div>
            <label for="dn">Date de Naissance:</label>
            <input type="date" id="dn" name="dn" required>
        </div>
        <button type="submit">Soumettre</button>
    </form>
</body>
</html>
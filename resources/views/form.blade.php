<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('products.destroy', ['id' => 1]) }}" 
        method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer l'article</button>
    </form>
    
</body>
</html>
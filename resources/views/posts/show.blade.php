<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
        }

        .author {
            font-size: 1.2rem;
            color: #7f8c8d;
            margin-bottom: 20px;
            text-align: center;
        }

        .body {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #34495e;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $post->title }}</h1>

        <p class="author"><strong>Auteur :</strong> {{ $post->author }}</p>

        <div class="body">
            <p>{{ $post->body }}</p>
        </div>

        <a href="{{ route('posts.index') }}" class="back-button">Retour à la liste</a>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #444;
        }

        .create-post-link {
            display: block;
            text-align: right;
            margin-bottom: 20px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .create-post-link:hover {
            text-decoration: underline;
        }

        .post {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }
        .post:last-child {
            border-bottom: none;
        }
        .post:hover {
            background-color: #f9f9f9;
        }

        .post h2 {
            margin: 0 0 5px 0;
            font-size: 1.5em;
            color: #333;
        }

        .post p {
            margin: 0;
            font-size: 14px;
            color: #666;
        }

        .post-actions {
            margin-top: 10px;
        }
        .post-actions a, .post-actions button {
            margin-right: 10px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .post-actions a:hover {
            text-decoration: underline;
        }
        .post-actions button {
            background: none;
            border: none;
            cursor: pointer;
            color: #d9534f;
            font-weight: bold;
        }
        .post-actions button:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Posts</h1>

        <a href="{{ route('posts.create') }}" class="create-post-link">Créer un nouveau post</a>

        @foreach($posts as $post)
            <div class="post">
                <h2>{{ $post->title }}</h2>
                <p>Auteur: {{ $post->author }}</p>
                <div class="post-actions">
                    <a href="{{ route('posts.show', $post) }}">Voir</a>
                    <a href="{{ route('posts.edit', $post) }}">Modifier</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
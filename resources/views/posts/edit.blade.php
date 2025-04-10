<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier le Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
    <h1>Modifier le Post</h1>

    <div class="success" id="success-message" style="display: none;">
        Post mis à jour avec succès.
    </div>

   <form action="/posts/1" method="POST">
        <input type="hidden" name="_method" value="PUT">

        <input type="hidden" name="_token" value="your_csrf_token_here">

        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" value="Mon premier post" required>
            <div class="error" id="title-error" style="display: none;">Le titre est requis.</div>
        </div>

        <div>
            <label for="body">Contenu :</label>
            <textarea name="body" id="body" required>Ceci est le contenu de mon premier post.</textarea>
            <div class="error" id="body-error" style="display: none;">Le contenu est requis.</div>
        </div>
        <div>
            <label for="author">Auteur :</label>
            <input type="text" name="author" id="author" value="Yahya" required>
            <div class="error" id="author-error" style="display: none;">L'auteur est requis.</div>
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
    <a href="/posts">Retourner à la liste des posts</a>
</body>
</html>
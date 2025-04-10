<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route courante</title>
</head>
<body>
    <p>Route courante : {{ $route->getName() }}</p>
    <p>URI : {{ $route->uri() }}</p>
</body>
</html>
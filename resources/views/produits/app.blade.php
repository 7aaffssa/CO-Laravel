<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits App</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #fff8f0;
            padding: 40px;
            color: #333;
        }

        h1, h2 {
            color: #ff7b54;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
        }

        th, td {
            border: 1px solid #ffe0d3;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #ffe0d3;
        }

        tr:nth-child(even) {
            background-color: #fff6f2;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ffd6c3;
            border-radius: 8px;
            background: #fffdfa;
        }

        .btn {
            padding: 8px 16px;
            background-color: #ff7b54;
            color: white;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #ff5722;
        }

        .btn-secondary {
            background-color: #ccc;
        }

        .btn-warning {
            background-color: #f4b942;
        }

        .btn-danger {
            background-color: #ff4e4e;
        }

        .btn + .btn {
            margin-left: 8px;
        }

        .pagination {
            margin-top: 20px;
        }
        .pagination-nav {
    margin-top: 20px;
    text-align: center;
}

.pagination-list {
    list-style: none;
    display: inline-flex;
    padding: 0;
    border-radius: 10px;
    background: #ffe9dc;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    overflow: hidden;
}

.pagination-list li {
    display: inline;
}

.pagination-list li a,
.pagination-list li span {
    display: inline-block;
    padding: 10px 14px;
    color: #ff7b54;
    text-decoration: none;
    transition: background 0.2s;
}

.pagination-list li a:hover {
    background-color: #ffc9b5;
}

.pagination-list li.active span {
    background-color: #ff7b54;
    color: white;
    font-weight: bold;
}

.pagination-list li.disabled span {
    color: #ccc;
    cursor: not-allowed;
}

        .search-box {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-box input {
            flex: 1;
        }

        form.inline {
            display: inline;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>

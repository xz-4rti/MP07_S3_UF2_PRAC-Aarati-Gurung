<!DOCTYPE html>
<html>

<head>
    <title>Usuaris amb comandes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
            padding: 10px;
            background: #f5f5f5;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h1>Usuaris amb almenys una comanda:</h1>

    <ul>
        @forelse($usuaris as $usuari)
        <li>{{ $usuari->nom }} — Comandes: {{ $usuari->total_comandes }}</li>
        @empty
        <li>No hi ha usuaris amb comandes</li>
        @endforelse
    </ul>
</body>

</html>
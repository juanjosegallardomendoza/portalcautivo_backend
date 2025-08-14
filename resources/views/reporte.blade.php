<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @page {
        margin: 100px 25px 6px 25px; /* top, right, bottom, left */
    }

    header {
        position: fixed;
        top: -40px;
        left: 0;
        right: 0;
        height: 60px;
        background-color: #f5f5f5;
        text-align: center;
        line-height: 35px;
        border-bottom: 1px solid #ccc;
    }

    footer {
        position: fixed;
        bottom: -40px;
        left: 0;
        right: 0;
        height: 30px;
        background-color: #f5f5f5;
        text-align: center;
        font-size: 12px;
        border-top: 1px solid #ccc;
        line-height: 25px;
    }
    </style>
</head>
<body>


<header>
    <h3>Reporte de Usuarios</h3>
</header>

<footer>
    Juan Jose
</footer>
<main>
    <table border="1">
        @foreach ( $registros as $registro )

        <tr>
            <td>{{ $registro->created_at }}</td>
            <td>{{ $registro->usuario->nombre }}</td>
            <td>{{ $registro->actividad }}</td>
            <td>{{ $registro->ip }}</td>
            <td>{{ $registro->usuario->tipo }}</td>
            <td></td>
        </tr>
                
        @endforeach
    </table>
</main>


</body>
</html>
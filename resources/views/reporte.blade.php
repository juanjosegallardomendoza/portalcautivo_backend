<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        @foreach ( $registros as $registro )

        <tr>
            <td>{{ $registro->created_at }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
                
        @endforeach
    </table>
</body>
</html>
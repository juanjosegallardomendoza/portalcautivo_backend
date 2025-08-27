<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @page {
        margin: 250px 25px 6px 25px; /* top, right, bottom, left */
    }
    header {
        position: fixed;
        top: -200px;
        left: 0;
        right: 0;
        text-align: center;

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
<table width="100%" border="1" cellpading="0" cellspacing="0" >
    <tr>
        <td width="20%" align="center">CECYTEG</td>
        <td  width="60%" align="center">REGISTRO DE HORAS PRÁCTICA EN CENTRO DE CÓMPUTO</td>
        <td  width="20%" align="center">
            CÓDIGO: <br>
            FO236-004/C
        </td>
    </tr>
</table>
<div align="left">
Unidad<br>
Académica: <u>Pénjamo</u>
<table border="1" cellpading="0" cellspacing="0" width="100%">

        <tr>
            <td rowspan="2">No.</td>
            <td rowspan="2">FECHA</td>
            <td rowspan="2">NOMBRE</td>
            <td colspan="4" >USUARIO</td>
            <td rowspan="2">HORA DE ENTRADA</td>
            <td rowspan="2">HORA DE SALIDA</td>
            <td rowspan="2">GRUPO</td>
            <td rowspan="2">No. EQUIPO</td>
            <td rowspan="2">ACTIVIDAD</td>
            <td rowspan="2">¿USO INTERNET?</td>
            <td rowspan="2">OBSERVACIONES</td>

        </tr>
        <tr>

            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>

    </table>

</div>
</header>

<footer>
    Juan Jose
</footer>

<main>
    <table border="1" cellpading="0" cellspacing="0" width="100%">


        @foreach ( $registros as $registro )

        <tr>
            <td>{{ $registro->created_at }}</td>
            <td>{{ $registro->usuario->nombre }}</td>
            <td>{{ $registro->actividad }}</td>
            <td>{{ $registro->ip }}</td>
             <td>{{ $registro->duracion }}</td>
            <td>{{ $registro->usuario->tipo }}</td>
            <td></td>
        </tr>
                
        @endforeach
    </table>
</main>


</body>
</html>
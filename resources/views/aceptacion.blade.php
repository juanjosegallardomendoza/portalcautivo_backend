<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @page {
        margin: 190px 25px 70px 25px; /* top, right, bottom, left */
        font-size: 8px;
        font-family: Arial, Helvetica, sans-serif;
    }
    header {
        position: fixed;
        top: -172px;
        left: 0;
        right: 0;
        text-align: center;

    }
    table,  tr,  td, th
    {
        border:  none;
        padding: 0;                  /* sin espacio interno */
        margin: 0;
    }

    table.borde, table.borde tr, table.borde tr td,table.borde tr th
    {
        border: 1px solid #000;      /* línea negra simple en todas las celdas */
        padding: 0;                  /* sin espacio interno */
        margin: 0;
    }

    td.opcion
    {
        border: 1px solid #000;  
        padding: 0 !important;
        margin: 0 !important;
        text-align: center;
    }






    </style>
</head>
<body>


<header>
<table class="borde" width="100%" border="0" cellpading="0" cellspacing="0" >
    <tr >
        <th  style="height: 40px;"  width="8%" align="center">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/cecyteg.png'))) }}" alt="Logo" style="width:35px;">

        </th>
        <th  width="85%" align="center">Aceptación de Calificaciones y Faltas</th>
        <th  width="7%" align="center">
            Código: <br>
            FO104-070/A
        </th>
    </tr>
</table>

<br><br>
<table width="100%" border="1" cellpading="0" cellspacing="0" >
    <tr>
        <td>FECHA:</td>
        <td>__________________________________________________________</td>
        <td>TURNO:</td>
        <td>___________________________</td>
    </tr>
    <tr>
        <td>UNIDAD ACADÉMICA:</td>
        <td>__________________________________________________________</td>
        <td>GRUPO:</td>
        <td>___________________________</td>
    </tr>
    <tr>
        <td>PLAN DE ESTUDIOS:</td>
        <td>__________________________________________________________</td>
        <td>SEMESTRE</td>
        <td>___________________________</td>
    </tr>
    <tr>
        <td>ASIGNATURA:</td>
        <td>__________________________________________________________</td>
        <td>DOCENTE</td>
        <td>___________________________</td>
    </tr>
</table>
<br><br>
<table width="100%" cellpading="0" cellspacing="0">
    <tr>
        <td width="16%">SELECCIONAR (Según Aplique)</td>
        <td width="12%" class="opcion">1er Parcial</td>
        <td width="12%" class="opcion">2do Parcial</td>
        <td width="12%" class="opcion">3er Parcial</td>
        <td width="12%" class="opcion">Examen Global</td>
        <td width="12%" class="opcion">Examen Extraordinario 1</td>
        <td width="12%" class="opcion">Examen Extraordinario 2</td>
        <td width="12%" class="opcion">Curso de Regularización</td>
    </tr>
</table>
<div align="left">
<br>

<br><br>
<table class="borde" border="1" cellpading="0" cellspacing="0" width="100%">

        <tr class="cabecera">
            <th width="5%">#</h>
            <th width="14%" >No. Control</th>
            <th width="25%">Nombre del alumno</h>
            <th width="14%">Calificación</th>
            <h width="14%">Faltas</h>
            <th width="14%">Firma del Estudiante</h>
            <th width="14%">Observaciones</th>
            
        </tr>

    </table>

</div>
</header>

<main>
    <table class="borde" border="1" cellpading="0" cellspacing="0" width="100%">

        @php($no=1);
        @foreach ( $registros as $registro )

        <tr>
            <th width="5%">{{$no++  }}</th>
            <td width="14%">&nbsp;{{ $registro->usuario->usuario }}</td>
            <td width="25%">&nbsp;{{ $registro->usuario->nombre }}</td>
            <td width="14%"></td>
            <td width="14%"></td>
            <td width="14%"></td>
            <td width="14%"></td>
        </tr>
                
        @endforeach
    </table>


</main>
<footer>
    <br><br>
    <table class="borde" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <br>
                <i>
                    <u>
                        Nota 1: Al firmar este formato el estudiante acepta la retroalimentación de calificaciones y faltas reconociendo que fué informado de los resultados de la evaluación 

                    </u>
                </i>
                <br>
                <br>
            </td>
        </tr>
    </table>
</footer>


</body>
</html>
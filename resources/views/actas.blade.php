<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <h1>Generar Actas</h1>

 <form action="http://localhost:8000/aceptacion" target="_blank" method="GET">
    <label>Dia</label>
    <select name="dia">
        @for ($i=1;$i<=31;$i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>

    <label>Mes</label>
    <select name="mes">
        @for ($i=1;$i<=12;$i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>

    <label>Año</label>
    <select name="anio">
        @for ($i=2026;$i<=2030;$i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>
    <br>
    <br>
    <label >actividad</label>
    <select name="actividad" id="actividad"></select>
    

    @php($grupos=[2801 ])
    
    <br>
    <br>

     <label >actividad</label>
    <select name="grupo">
        @foreach ($grupos as $grupo )
            <option value="{{ $grupo }}">{{ $grupo }}</option>
        @endforeach

    </select>
    <br>
    <br>
    <label >Profesor</label>
        @php($profesores=["JOSE LUIS LUEVANOS BARRAGAN"])
    <select name="profesor" >
        <option value=""></option>

        @foreach ($profesores as $profesor )
            <option value="{{ $profesor }}">{{ $profesor }}</option>
        @endforeach
        
    </select>
    <br>
    <br>
    <label>Documento</label>
    <select name="documento" >
        <option value="aceptacion">Aceptación</option>
        <option value="evaluacion">Acta de evaluación</option>
        
    </select>
    
    <br>
    <br>

    
    <input type="submit" value="GENERAR">
    
 </form>
 <script>
    function cargarActividades()
    {
      fetch('http://10.10.10.10:8000/api/actividades', {
          method: 'GET',
          headers: {
            'Content-Type': 'application/json'
          }
        })
        .then(async response => {
         
          const data = await response.json();

          if (!response.ok) 
          {
              throw new Error(data.message || 'Error desconocido');
          }
          return data;
        }
      )
      .then(data => {
        let ft_actividad = document.getElementById("actividad");
        for(const item of data)
        {
          const opcion  = document.createElement("option");
          opcion.value  = item.nombre;
          opcion.innerHTML =item.nombre;

          console.log(item);
          ft_actividad.append(opcion);
        }
      })
      .catch(error => {
        document.getElementById("mensaje").innerHTML=error;
        
      });
    }

    cargarActividades();
 </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Buscar: <input type="text" id="txt_busqueda""><br><br>
    <div id="resultado"></div>
</body>
<script src="https://unpkg.com/rxjs@7/dist/bundles/rxjs.umd.min.js"></script>
<script>

    const { fromEvent, filter } = rxjs;
    const { debounceTime, map, distinctUntilChanged, switchMap } = rxjs.operators;


    function abrir( item )
    {
        const data = JSON.parse(item.dataset.item);
        document.getElementById(`div_${data.id}`).innerHTML = `<br>usuario: <input type="text" value="${data.usuario}"><br> <br>`;
    }
    fromEvent(txt_busqueda, "keyup").pipe(
        map(event => event.target.value.trim()),          // obtenemos el texto
        debounceTime(700),                                // esperamos 500ms sin teclear
        distinctUntilChanged(),  
        filter(texto=> texto.length >3),                        // solo si cambió el valor
        switchMap(texto => {
      
            resultado.innerHTML = "Buscando..";
            return rxjs.from(
                fetch(`{{ config('app.url')}}/api/users?busqueda=${encodeURIComponent(texto)}`)
                    .then(res => res.json())
            );
        })
        ).subscribe(data => {
            if (!data || data.length === 0) {
                resultado.innerHTML = "<em>Sin resultados</em>";
                return;
            }

            // Mostramos los resultados
            resultado.innerHTML = data
                .map(item => `<div data-item='${JSON.stringify(item)}' style="cursor:pointer" onclick="abrir(this)"><strong>${item.nombre}</strong><div id="div_${item.id}"></div></div><hr>`)
                .join("");
        });


</script>

</html>






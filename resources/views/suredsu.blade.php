<!DOCTYPE html>
<html lang="en">
<head>
    <title>Encuesta SUREDSU</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        li {
  margin-bottom: 10px; /* o el espacio que quieras */
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">

        <div class="text-center">
            <h1>{{$registro->usuario->nombre}}</h1>
            <h2>Responder encuesta SUREDSU</h2>            
        </div>

        
        <div>
       

            <ol  class="ps-4" style="list-style-type: decimal;">
                <li>
                    Ingresa a:
                    <a href="https://suredsu.guanajuato.gob.mx/modulos/acceso/acceso.aspx" 
                        onclick="abrirVentanaSUREDSU(event)">
                        Abrir SUREDSU
                    </a>
                </li>

                <li>
                    Copia tu CURP
                    <button onclick="copiar('{{ $registro->usuario->datos['CURP']['valor'] ?? '' }}')" class="btn btn-primary">Copiar CURP</button> 
                    y pégalo en donde dice <b>"*Ingresa con tu CURP*"</b>
                </li>

               
                <li>
                    Copia tu correo electrónico
                    <button onclick="copiar('{{ $registro->usuario->datos['CORREO']['valor'] ?? '' }}')" class="btn btn-primary">Copiar Correo</button> 
                    y pégalo en donde dice <b>"*Email*"</b>
                </li>
                <li>
                    Selecciona la casilla no soy un robot, y resuelve el CAPTCHA en caso de ser necesario
                </li>

                <li>
                   Haz click en el botón enviarme  email de activación
                </li>

                <li>
                    Revisa la bandeja de entrada de tu email y busca el correo, si no lo encuentras busca en el correo no deseado
                </li>
                <li>
                    Ingresa el código de validación en la caja de texto  que dice <b>Introduce el código de validación</b>
                </li>
                <li>
                    Da click en validar código
                </li>
                <li>
                    Marca la casilla acepto los terminos de uso y da click en el botón acepto
                </li>

                <li>
                    Completa tus datos
                </li>
                <li>
                    Verifica que aparezca <b>CECYTE PLANTEL PENJAMO Y DA CLICK EN SI</b>
                </li>
                <li>
                    Completa tus datos con tus expectativas de estudios universitarios
                </li>
                <li>
                    Llena el estudio socioeconómico
                </li>
                <li>
                    Llena la encuesta de aptitudes
                </li>
            </ol>

            
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        function copiar(texto) {
            if (!navigator.clipboard) {
                // Fallback para navegadores más antiguos
                const textarea = document.createElement("textarea");
                textarea.value = texto;
                document.body.appendChild(textarea);
                textarea.select();
                try {
                document.execCommand("copy");
                console.log("Texto copiado (fallback)");
                } catch (err) {
                console.error("Error al copiar al portapapeles (fallback):", err);
                }
                document.body.removeChild(textarea);
            } else {
                // API moderna
                navigator.clipboard.writeText(texto)
                .then(() => {
                    console.log("Texto copiado al portapapeles");
                })
                .catch(err => {
                    console.error("Error al copiar al portapapeles:", err);
                });
            }
        }

        let ventanaSUREDSU= null;
        function abrirVentanaSUREDSU(e) {
            e.preventDefault(); // evita recargar la página actual
            const url = 'https://suredsu.guanajuato.gob.mx/modulos/acceso/acceso.aspx';
            
            if (!ventanaSUREDSU || ventanaSUREDSU.closed) {
                ventanaSUREDSU = window.open(url, 'superateBBVA'); // abre o reutiliza la pestaña
            } else {
                ventanaSUREDSU.focus();
            }
        }



         
        let ventanaOffice = null;
        function abrirVentanaOffice(e) {
            e.preventDefault(); // evita recargar la página actual
            const url = 'https://outlook.live.com/';
            
            if (!ventanaOffice || ventanaOffice.closed) {
                ventanaOffice = window.open(url, 'ventanaOffice'); // abre o reutiliza la pestaña
            } else {
               ventanaBBVA.focus();
            }
        }

    </script>
</body>

</html>
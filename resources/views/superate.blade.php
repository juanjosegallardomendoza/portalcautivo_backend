<!DOCTYPE html>
<html lang="en">
<head>
    <title>Crea tu cuenta BBVA SUPERATE</title>
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
            <h2>Crea tu cuenta de BBVA Superate</h2>            
        </div>

        
        <div>
       

            <ol  class="ps-4" style="list-style-type: decimal;">
                <li>
                    Ingresa a:
                    <a href="https://escuelas.superateconfundacionbbva.mx/registro" 
                        onclick="abrirVentanaBBVA(event)">
                        Registrar BBVA SUPERATE
                    </a>
                </li>

                <li>
                    Copia el nombre de usuario  
                    <button onclick="copiar('CECYTEG{{$registro->usuario->usuario}}')" class="btn btn-primary">Copiar Nombre de Usuario</button> 
                    y pégalo en donde dice <b>"Escribe tu nombre de usuario:"</b>
                </li>

                <li>Selecciona <b>"Soy estudiante"</b> donde dice <b>Selecciona tu perfil: </b></li>
                <li>Da click en <b>"Continuar"</b></li>

                <li>
                    Copia la contraseña    
                    <button onclick="copiar('{{ $registro->usuario->datos['PASSWORD SUPERATE']['valor'] ?? '' }}')" class="btn btn-primary">Copiar contraseña</button> 
                    y pégala en donde dice <b>Crea tu contraseña de acceso:</b>
                </li>
                <li>
                    Copia el GRUPO    
                    <button onclick="copiar('{{ $registro->usuario->datos['GRUPO SUPERATE']['valor'] ?? '' }}')" class="btn btn-primary">Copiar grupo</button> 
                    y pégala en donde dice <b>Crea tu contraseña de acceso:</b>
                </li>

                <li>Pégala nuevamente en donde dice <b>Vuelve a escribir tu contraseña:</b></li>
                <li>Marca la casilla <b>"He leído y acepto el Aviso de Privacidad de Supérate"</b></li>
                <li>Da click en <b>"Finalizar"</b></li>

                <li>
                    Copia este correo   
                    <button onclick="copiar('{{ $registro->usuario->datos['Correo']['valor'] ?? '' }}')" class="btn btn-primary">Copiar correo</button> 
                    y pégalo en donde dice <b>Escribe el correo electrónico de tu padre, madre o tutor:</b>
                </li>

                <li>Pégalo nuevamente en donde dice <b>Confirma el correo electrónico:</b></li>

                <li>
                    Ingresa a:
                    <a href="https://escuelas.superateconfundacionbbva.mx/registro" 
                        onclick="abrirVentanaOffice(event)">
                        Office.com
                    </a>
                </li>

                <li>Haz click en <b>Iniciar sesión</b></li>
                <li>Pega tu correo electrónico donde dice <b>Iniciar Sesión</b></li>

                <li>
                    Copia esta contraseña   
                    <button onclick="copiar('{{ $registro->usuario->datos['Password Correo Nuevo']['valor'] ?? '' }}')" class="btn btn-primary">Copiar contraseña correo</button> 
                    y pégala en donde dice <b>Escribe tu contraseña</b>
                </li>

                <li>Haz click en <b>Iniciar sesión</b></li>
                <li>Haz click en <b>Mantener tu sesión iniciada</b></li>
                <li>Busca en tu bandeja de entrada un correo con el asunto <b>¡Bienvenido a Supérate con Fundación BBVA!</b></li>
                <li>Da click en el botón <b>Valida aquí el correo</b></li>
                <li>Cierra tu sesion de correo</li>
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

        let ventanaBBVA = null;
        function abrirVentanaBBVA(e) {
            e.preventDefault(); // evita recargar la página actual
            const url = 'https://escuelas.superateconfundacionbbva.mx/registro';
            
            if (!ventanaBBVA || ventanaBBVA.closed) {
                ventanaBBVA = window.open(url, 'superateBBVA'); // abre o reutiliza la pestaña
            } else {
                ventanaBBVA.focus();
            }
        }


         
        let ventanaOffice = null;
        function abrirVentanaOffice(e) {
            e.preventDefault(); // evita recargar la página actual
            const url = 'https://www.office.com/';
            
            if (!ventanaOffice || ventanaOffice.closed) {
                ventanaOffice = window.open(url, 'ventanaOffice'); // abre o reutiliza la pestaña
            } else {
               ventanaBBVA.focus();
            }
        }

    </script>
</body>

</html>
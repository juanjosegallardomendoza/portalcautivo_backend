<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <style type="text/css">

        html, body {
            height: 100%;
            padding: 0;
            margin: 0;
        }

        .oc {
            display: table;
            width: 100%;
            height: 100%;
        }

        .ic {
            display: table-cell;
            vertical-align: middle;
            height: 100%;
        }

        form {
            display: block;
            background: #FFF;
            border: 2px solid #234176;
            padding: 0 0 25px 0;
            width: 500px;
            font-family: helvetica, sans-serif;
            font-size: 14px;
            margin: 10px auto;
        }

        .fel, .fer, .fec {
            text-align: center;
            width: 350px;
            margin: 0 auto;
            padding: 10px;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        .fel {
            text-align: left;
        }

        .fer {
            text-align: right;
        }

        h1 {
            font-weight: bold;
            font-size: 21px;
            margin: 0;
            padding: 20px 10px;
            text-align: center;
        }

        p {
            margin: 15px auto;
            width: 75%;
            text-align: left;
        }

        ul {
            margin: 15px auto;
            width: 75%;
        }

        h2 {
            margin: 25px 10px;
            font-weight: bold;
            text-align: center;
        }

        label, h2 {
            font-size: 16px;
        }

        .logo {
            background: #005ee5 center 25px url(%%IMAGE:logo_cecyteg%%) no-repeat;
            padding-top: 180px;
        }

        select,
        input {
            margin: auto;
            width: 250px;
            height: 30px;
        }

        label {
            width: 100px;
        }

        button {
            width: 150px;
            height: 50px;
            border-radius: 20px;
            background-color: #005ee5;
            color: white;
            border-color: white;
            cursor: pointer;
        }

        button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        h1, h2 {
            color: white;
        }

    </style>

    <title>
        Registro de actividades
    </title>

</head>


<body>

<div class="oc">

    <div class="ic">

        <form
            action="%%AUTH_POST_URL%%"
            method="post"
            id="formulario"
        >

            <!-- DATOS NECESARIOS PARA FORTIGATE -->

            <input
                type="hidden"
                name="%%REDIRID%%"
                id="hf_url"
                value="http://10.10.10.10/"
            >

            <input
                type="hidden"
                name="%%MAGICID%%"
                value="%%MAGICVAL%%"
            >

            <input
                type="hidden"
                name="%%USERNAMEID%%"
                id="ft_un"
            >

            <input
                type="hidden"
                name="%%PASSWORDID%%"
                id="ft_pd"
                value="cecyteg"
            >


            <!-- TITULO -->

            <h1 class="logo" id="mensaje">
                Registro de actividades
            </h1>

            <h2>
                %%QUESTION%%
            </h2>


            <!-- SEMESTRE -->

            <div class="fel">

                <label for="ft_semestre">
                    Semestre:
                </label>

                <select
                    id="ft_semestre"
                    required
                >

                    <option value="2">
                        1°
                    </option>
                    <option value="2">
                        2°
                    </option>

                    <option value="2">
                        3°
                    </option>
                    <option value="4">
                        4°
                    </option>

                    <option value="2">
                        5°
                    </option>
                    <option value="6">
                        6°
                    </option>

                </select>

            </div>


            <!-- GRUPO -->

            <div class="fel">

                <label for="ft_grupo">
                    Grupo:
                </label>

                <input
                    id="ft_grupo"
                    type="text"
                    autocorrect="off"
                    autocapitalize="off"
                    required
                >

            </div>


            <!-- CARRERA -->

            <div class="fel">

                <label for="ft_carrera">
                    Carrera:
                </label>

                <select
                    id="ft_carrera">
                  <option value="PIA">PIA</option>
                  <option value="SyMEC">SyMEC</option>
                  <option value="Progrmación">Progrmación</option>
                </select>

            </div>


            <!-- ASIGNATURA -->

            <div class="fel">

                <label for="ft_asignatura">
                    Asignatura:
                </label>

                <input
                    id="ft_asignatura"
                    type="text"
                    autocorrect="off"
                    autocapitalize="off"
                    required
                >

            </div>


            <!-- ACTIVIDAD -->

            <div class="fel">

                <label for="ft_actividad">
                    Actividad:
                </label>

                <input
                    id="ft_actividad"
                    type="text"
                    autocorrect="off"
                    autocapitalize="off"
                    required
                >

            </div>


            <!-- PROFESOR -->

            <div class="fel">

                <label for="ft_profesor">
                    Profesor:
                </label>

                <input
                    id="ft_profesor"
                    type="text"
                    autocorrect="off"
                    autocapitalize="off"
                    required
                >

            </div>


            <!-- FECHA -->

            <div class="fel">

                <label for="ft_fecha">
                    Fecha:
                </label>

                <input
                    id="ft_fecha"
                    type="date"
                    required
                >

            </div>


            <!-- HORA -->

            <div class="fel">

                <label for="ft_hora">
                    Hora:
                </label>

                <select
                    id="ft_hora"
                    required
                >

                    <option value="07:00">7:00</option>
                    <option value="07:50">7:50</option>
                    <option value="08:40">8:40</option>
                    <option value="09:30">9:30</option>
                    <option value="10:00">10:00</option>
                    <option value="10:50">10:50</option>
                    <option value="11:40">11:40</option>
                    <option value="12:30">12:30</option>
                    <option value="13:20">13:20</option>
                    <option value="14:10">14:10</option>
                    <option value="15:00">15:00</option>

                </select>

            </div>


            <!-- AULA -->

            <div class="fel">

                <label for="ft_aula">
                    Aula:
                </label>

                <select
                    id="ft_aula"
                    required
                >

                    <option value="Del A1 al A35">
                        Aula A
                    </option>

                    <option value="Del B1 al B42">
                        Aula B
                    </option>

                </select>

            </div>


            <!-- DURACION -->

            <div class="fel">

                <label for="ft_duracion">
                    Duración:
                </label>

                <select
                    id="ft_duracion"
                    required
                >

                    <option value="50">
                        1 módulo (50 minutos)
                    </option>

                    <option value="100">
                        2 módulos (100 minutos)
                    </option>

                    <option value="150">
                        3 módulos (150 minutos)
                    </option>

                </select>

            </div>


            <!-- URL -->

            <div class="fel">

                <label for="ft_url">
                    URL:
                </label>

                <input
                    id="ft_url"
                    type="url"
                    autocorrect="off"
                    autocapitalize="off"
                >

            </div>


            <!-- BOTON -->

            <div class="fer">

                <button
                    id="btn_enviar"
                    type="submit"
                >
                    Enviar
                </button>

            </div>

        </form>

    </div>

</div>


<script>

var actividades = [];


document
    .querySelector("#formulario")
    .addEventListener("submit", function (event) {

        event.preventDefault();


        /*
         * DATOS DEL GRUPO
         */

        let semestre = document
            .getElementById("ft_semestre")
            .value;

        let grupo = document
            .getElementById("ft_grupo")
            .value;

        let carrera = document
            .getElementById("ft_carrera")
            .value;

        let asignatura = document
            .getElementById("ft_asignatura")
            .value;


        /*
         * DATOS DE LA ACTIVIDAD
         */

        let nombre = document
            .getElementById("ft_actividad")
            .value;

        let profesor = document
            .getElementById("ft_profesor")
            .value;

        let fecha = document
            .getElementById("ft_fecha")
            .value;

        let hora = document
            .getElementById("ft_hora")
            .value;

        let aula = document
            .getElementById("ft_aula")
            .value;

        let duracion = document
            .getElementById("ft_duracion")
            .value;

        let url = document
            .getElementById("ft_url")
            .value;


        /*
         * CAMBIAR ESTADO DEL FORMULARIO
         */

        document
            .getElementById("mensaje")
            .innerHTML = "Registrando...";

        document
            .getElementById("btn_enviar")
            .disabled = true;


        /*
         * ENVIAR AL API
         */

        fetch(
            "http://10.10.10.10:8000/api/actividades",
            {
                method: "POST",

                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                },

                body: JSON.stringify({

                    semestre: semestre,
                    grupo: grupo,
                    carrera: carrera,
                    asignatura: asignatura,

                    nombre: nombre,
                    profesor: profesor,
                    fecha: fecha,
                    hora: hora,
                    aula: aula,
                    duracion: duracion,
                    url: url

                })
            }
        )

        .then(async function (response) {

            const data = await response.json();


            if (!response.ok) {

                /*
                 * Laravel normalmente devuelve:
                 *
                 * {
                 *     message: "...",
                 *     errors: {
                 *         campo: ["..."]
                 *     }
                 * }
                 */

                let mensaje = data.message || "No fue posible registrar la actividad.";


                /*
                 * Si Laravel devuelve errores de validación,
                 * mostrar el primero.
                 */

                if (data.errors) {

                    let primerCampo = Object.keys(data.errors)[0];

                    if (
                        primerCampo &&
                        data.errors[primerCampo] &&
                        data.errors[primerCampo][0]
                    ) {
                        mensaje = data.errors[primerCampo][0];
                    }

                }


                throw new Error(mensaje);
            }


            return data;

        })


        .then(function (data) {


            /*
             * REGISTRO CORRECTO
             */

            document
                .getElementById("mensaje")
                .innerHTML =
                    "✅ Actividad registrada correctamente.";


            /*
             * SOLO LIMPIAMOS LOS DATOS
             * DE LA ACTIVIDAD.
             *
             * Conservamos:
             * semestre
             * grupo
             * carrera
             * asignatura
             */

            document
                .getElementById("formulario")
                .reset();


            document
                .getElementById("btn_enviar")
                .disabled = false;


            /*
             * Dejamos el cursor en actividad
             * para capturar la siguiente.
             */

            document
                .getElementById("ft_actividad")
                .focus();

        })


        .catch(function (error) {


            /*
             * ERROR
             */

            document
                .getElementById("btn_enviar")
                .disabled = false;


            document
                .getElementById("mensaje")
                .innerHTML =
                    "❌ " + error.message;

        });

    });

</script>

</body>

</html>


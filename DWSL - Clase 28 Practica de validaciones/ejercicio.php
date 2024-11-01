<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios de Validación</title>
    <script>
        function validarFormulario(event) {
            event.preventDefault();

            const nombre = document.getElementById("nombre").value;
            if (!/^[MOPS]/i.test(nombre)) {
                alert("El nombre debe iniciar con M, O, P o S");
                return;
            }

            const direccion = document.getElementById("direccion").value;
            if (!/^(casa|apartamento)/i.test(direccion)) {
                alert("La dirección debe comenzar con 'casa' o 'apartamento'");
                return;
            }

            const correo = document.getElementById("correo").value;
            if (!/@gmail\.com$/.test(correo)) {
                alert("El correo debe terminar en 'gmail.com'");
                return;
            }

            const texto = document.getElementById("texto").value;
            const palabrasConAs = (texto.match(/\b\w*as\b/gi) || []).length;
            alert(`El texto contiene ${palabrasConAs} palabras que terminan en 'as'`);

            const telefono = document.getElementById("telefono").value;
            if (!/^[27]/.test(telefono)) {
                alert("El número de teléfono debe iniciar con 2 (casa) o 7 (celular)");
                return;
            }

            const numero = document.getElementById("numero").value;
            if (/^79|^72/.test(numero)) {
                alert("La compañía es Tigo");
            } else if (/^77|^75/.test(numero)) {
                alert("La compañía es Movistar");
            } else if (/^71|^73/.test(numero)) {
                alert("La compañía es Digicel");
            } else {
                alert("Compañía no identificada");
            }

            const genero = document.getElementById("genero").value.toLowerCase();
            if (genero === "masculino") {
                alert("Género: Masculino (1)");
            } else if (genero === "femenino") {
                alert("Género: Femenino (2)");
            } else {
                alert("Por favor ingrese 'masculino' o 'femenino'");
                return;
            }
        }
    </script>
</head>
<body>
    <form onsubmit="validarFormulario(event)">
        <label>Digite un nombre y evalúe si inicia con M, O, P o S</label><br>
        <input type="text" id="nombre"><br><hr>

        <label>Digite una dirección e identifique si existe la palabra "casa" o "apartamento" al inicio de la cadena</label><br>
        <input type="text" id="direccion"><br><hr>

        <label>Identifique al final de la cadena si el correo escrito es gmail.com</label><br>
        <input type="email" id="correo"><br><hr>

        <label>Escriba un texto cualquiera e identifique cuántas palabras finalizan con "as"</label><br>
        <input type="text" id="texto"><br><hr>

        <label>Identifique si el número de teléfono es de casa (iniciando con 2) o celular (iniciando con 7)</label><br>
        <input type="text" id="telefono"><br><hr>

        <label>Identificar la compañía de celular: 79 o 72 (Tigo), 77 o 75 (Movistar), 71 o 73 (Digicel)</label><br>
        <input type="text" id="numero"><br><hr>

        <label>Identificar el género digitado (masculino=1, femenino=2)</label><br>
        <input type="text" id="genero"><br><hr>

        <input type="submit" value="Evaluar">
    </form>
</body>
</html>

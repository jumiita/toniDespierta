<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toni Quetglas Despertador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<div class="container mt-5">
    <h1 class="text-center">Toni Quetglas Despertador</h1>

    <div class="row mt-4">
        <div class="col text-center">
            <h2 id="clock">00:00:00</h2>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            <form id="arrivalForm">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Hora de llegada de Toni:</label>
                    <input type="time" class="form-control" id="time" required>
                </div>
                <button type="submit" class="btn btn-primary">Añadir</button>
            </form>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <h3>Llegadas Programadas:</h3>
            <ul id="arrivalList" class="list-group">
<!--                --><?php
/*
                foreach ($listado as $item) {

                    echo $item->nombre." : ";
                    echo $item->hora_llegada;
                }
                */?>
                <!-- Aquí se mostrarán las llegadas programadas -->
            </ul>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function updateClock() {
            const now = new Date();
            const clock = document.getElementById('clock');
            clock.innerText = now.toLocaleTimeString();
        }
        setInterval(updateClock, 1000);

        // Funciones para manejar cookies
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "")  + expires + "; path=/";
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
            }
            return null;
        }

        const arrivalForm = document.getElementById('arrivalForm');
        const arrivalList = document.getElementById('arrivalList');

        function addArrivalToList(name, time) {
            const listItem = document.createElement('li');
            listItem.classList.add('list-group-item');
            listItem.textContent = `${name} - Llegada de Toni: ${time}`;
            arrivalList.appendChild(listItem);
        }

        arrivalForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const name = document.getElementById('name').value;
            const time = document.getElementById('time').value;

            addArrivalToList(name, time);

            // Guardar en cookies
            let arrivals = JSON.parse(getCookie('arrivals') || '[]');
            arrivals.push({ name, time });
            setCookie('arrivals', JSON.stringify(arrivals), 7);

            arrivalForm.reset();
        });

        // Cargar llegadas guardadas
        let savedArrivals = JSON.parse(getCookie('arrivals') || '[]');
        savedArrivals.forEach(function(arrival) {
            addArrivalToList(arrival.name, arrival.time);
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

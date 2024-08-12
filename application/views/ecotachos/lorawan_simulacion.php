<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulación LoRaWAN y Ecotacho</title>
    <style>
        /* styles.css */

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        #simulation {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            position: relative; /* Para posicionar el botón "Volver" */
        }

        h2 {
            color: #333;
            font-size: 1.8em;
            margin-bottom: 20px;
            font-weight: 600;
            text-align: center;
        }

        #ecotacho, #data {
            margin-bottom: 40px;
            padding: 20px;
            background: #fafafa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #ecotacho {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        #ecotacho-status, #data-display {
            margin: 15px 0;
            font-size: 1.4em;
            color: #666;
        }

        button {
            background-color: #007bff;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-size: 1.1em;
            padding: 12px 24px;
            cursor: pointer;
            margin: 10px;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }

        button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        button:active {
            background-color: #004085;
            transform: translateY(0);
        }

        #data-chart {
            max-width: 100%;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff;
        }

        /* Estilos de notificación */
        #notification {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #28a745;
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            font-size: 1.2em;
        }

        #notification.show {
            display: block;
        }

        /* Estilos para el botón "Volver" */
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #dc3545;
            color: #fff;
            font-size: 1.5em;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.3s;
            z-index: 1000;
            text-decoration: none; /* Remove underline from link */
            display: inline-block;
        }

        .back-button:hover {
            background-color: #c82333;
            transform: translateY(-2px);
        }

        .back-button:active {
            background-color: #bd2130;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div id="simulation">
        <!-- Botón para volver a la página anterior -->
        <a href="javascript:history.back()" class="back-button">Volver</a>

        <div id="ecotacho">
            <h2>Ecotacho</h2>
            <div id="ecotacho-status">Estado: En espera</div>
            <button onclick="startSimulation()">Iniciar Simulación</button>
            <button onclick="stopSimulation()">Detener Simulación</button>
        </div>
        <div id="data">
            <h2>Datos LoRaWAN</h2>
            <div id="data-display">Esperando datos...</div>
            <canvas id="data-chart" width="400" height="200"></canvas>
        </div>
    </div>

    <!-- Notificación -->
    <div id="notification">¡Ecotacho lleno!</div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let simulationInterval;
        let startTime;
        let dataChartUpdated = false;

        const ctx = document.getElementById('data-chart').getContext('2d');
        const dataChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Datos de Llenado',
                    data: [],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            max: 100
                        }
                    }
                }
            }
        });

        function startSimulation() {
            const ecotachoStatus = document.getElementById('ecotacho-status');
            const dataDisplay = document.getElementById('data-display');

            ecotachoStatus.textContent = 'Estado: En funcionamiento';
            startTime = new Date();
            dataChartUpdated = false;

            simulationInterval = setInterval(() => {
                const elapsedTime = (new Date() - startTime) / 60000; // tiempo transcurrido en minutos
                const simulatedData = Math.min(100, (elapsedTime * 100)).toFixed(2) + '%';
                dataDisplay.textContent = `Datos: ${simulatedData}`;

                // Actualizar gráfico
                const now = new Date();
                dataChart.data.labels.push(now.toTimeString().split(' ')[0]);
                dataChart.data.datasets[0].data.push(parseFloat(simulatedData));
                dataChart.update();

                if (parseFloat(simulatedData) >= 100) {
                    stopSimulation();
                }
            }, 1000); // Actualizar cada segundo
        }

        function stopSimulation() {
            clearInterval(simulationInterval);
            document.getElementById('ecotacho-status').textContent = 'Estado: Completo';
            document.getElementById('data-display').textContent = 'Datos: 100%';

            // Limitar el gráfico para que se detenga en 100%
            if (!dataChartUpdated) {
                dataChartUpdated = true;
                dataChart.data.datasets[0].data.push(100);
                dataChart.update();
            }

            // Mostrar notificación
            showNotification();

            // Enviar correo electrónico
            sendEmailNotification();
        }

        function showNotification() {
            const notification = document.getElementById('notification');
            notification.classList.add('show');
            setTimeout(() => {
                notification.classList.remove('show');
            }, 5000); // Mantener la notificación visible durante 5 segundos
        }

        function sendEmailNotification() {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "send_email.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log("Correo enviado exitosamente.");
                } else if (xhr.readyState === 4) {
                    console.log("Error al enviar el correo.");
                }
            };
            xhr.send();
        }
    </script>
</body>
</html>

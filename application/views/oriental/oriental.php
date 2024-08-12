<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa Oriental</title>
    <style>
        .midde_cont {
            margin: 20px;
        }
        .container-fluid {
            padding: 0 15px;
        }
        .row {
            margin-bottom: 20px;
        }
        #mapaOriental {
            width: 100%;
            height: 900px;
            border: 0;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxuIEYr6QvIHH0hRbPF6oHcpoc2dWpdG8&libraries=places&callback=initMap" async defer></script>
</head>
<body>
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Mapa de Ecotachos Orientales</h2>
                    </div>
                </div>
            </div>

            <div id="mapaOriental"></div>
        </div>
    </div>

    <script>
        function initMap() {
            var coordenadaCentral = new google.maps.LatLng(-0.9339577388522958, -78.61459669570844); // Coordenada de ejemplo para el centro
            var mapaOriental = new google.maps.Map(document.getElementById('mapaOriental'), {
                center: coordenadaCentral,
                zoom: 18,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            <?php if (isset($orientales) && count($orientales) > 0): ?>
                <?php foreach ($orientales as $temporal): ?>
                    var coordenadaTemporal = new google.maps.LatLng(<?php echo $temporal->latitud; ?>, <?php echo $temporal->longitud; ?>);
                    var icono = {
                        url: "<?php echo base_url('assets/images/ecotacho1.png'); ?>",
                        scaledSize: new google.maps.Size(30, 30) // Ajusta el tamaño del ícono aquí
                    };
                    var marcador = new google.maps.Marker({
                        position: coordenadaTemporal,
                        map: mapaOriental,
                        title: "Ecotacho: <?php echo $temporal->direccion; ?>",
                        icon: icono
                    });
                <?php endforeach; ?>
            <?php endif; ?>
        }

        window.onload = function() {
            initMap();
        };
    </script>
</body>
</html>

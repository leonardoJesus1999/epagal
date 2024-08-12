<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa Occidental</title>
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
        #mapaOccidental {
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
                        <h2>Mapa de Ecotachos Occidentales</h2>
                    </div>
                </div>
            </div>

            <div id="mapaOccidental"></div>
        </div>
    </div>

    <script>
        function initMap() {
            var coordenadaCentral = new google.maps.LatLng(-0.9339577388522958, -78.61459669570844); // Coordenada central para Occidental
            var mapaOccidental = new google.maps.Map(document.getElementById('mapaOccidental'), {
                center: coordenadaCentral,
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            <?php if (isset($occidentales) && count($occidentales) > 0): ?>
                <?php foreach ($occidentales as $temporal): ?>
                    var coordenadaTemporal = new google.maps.LatLng(<?php echo $temporal->latitud; ?>, <?php echo $temporal->longitud; ?>);
                    var icono = {
                        url: "<?php echo base_url('assets/images/ecotacho2.png'); ?>",
                        scaledSize: new google.maps.Size(30, 30) // Ajusta el tamaño del ícono aquí
                    };
                    var marcador = new google.maps.Marker({
                        position: coordenadaTemporal,
                        map: mapaOccidental,
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

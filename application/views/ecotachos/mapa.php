<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Ecotachos</title>
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
        #reporteMapa {
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
                        <h2>Mapa de Ecotachos</h2>
                    </div>
                </div>
            </div>

            <div id="reporteMapa"></div>
        </div>
    </div>

    <script>
        function getIconoPorRuta(ruta_id) {
            const iconos = {
                1: '<?php echo base_url('assets/images/ecotacho1.png') ?>',
                2: '<?php echo base_url('assets/images/ecotacho2.png') ?>',
                3: '<?php echo base_url('assets/images/ecotacho3.png') ?>'
            };
            return iconos[ruta_id] || 'http://maps.google.com/mapfiles/ms/icons/red-dot.png';
        }

        function initMap() {
            var coordenadaCentral = new google.maps.LatLng(-0.9339577388522958, -78.61459669570844);
            var miMapa = new google.maps.Map(document.getElementById('reporteMapa'), {
                center: coordenadaCentral,
                zoom: 17,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            console.log("Mapa inicializado.");

            <?php if (isset($ecotachos) && count($ecotachos) > 0): ?>
                <?php foreach ($ecotachos as $ecotacho): ?>
                    console.log("Ecotacho ID: <?php echo $ecotacho->id; ?>, Lat: <?php echo $ecotacho->latitud; ?>, Lng: <?php echo $ecotacho->longitud; ?>");

                    var coordenadaTemporal = new google.maps.LatLng(<?php echo $ecotacho->latitud; ?>, <?php echo $ecotacho->longitud; ?>);
                    var iconoEcotacho = getIconoPorRuta(<?php echo $ecotacho->ruta_id; ?>);

                    var marcador = new google.maps.Marker({
                        position: coordenadaTemporal,
                        map: miMapa,
                        title: '<?php echo $ecotacho->codigo; ?>',
                        icon: {
                            url: iconoEcotacho,
                            scaledSize: new google.maps.Size(30, 30), // Tamaño del icono escalado
                            anchor: new google.maps.Point(15, 15) // Punto de anclaje
                        }
                    });

                    // Función para titilar el icono del marcador
                    function titilarMarcador(marcador, iconoOriginal) {
                        var titilado = false;
                        setInterval(function() {
                            if (titilado) {
                                marcador.setIcon({
                                    url: iconoOriginal,
                                    scaledSize: new google.maps.Size(30, 30)
                                });
                            } else {
                                marcador.setIcon({
                                    url: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png', // Icono rojo de Google Maps
                                    scaledSize: new google.maps.Size(30, 30)
                                });
                            }
                            titilado = !titilado;
                        }, 700); // Alternar cada 0.5 segundos
                    }

                    // Llamar a la función de titilación para todos los marcadores
                    titilarMarcador(marcador, iconoEcotacho);

                <?php endforeach; ?>
            <?php else: ?>
                console.log("No se encontraron ecotachos.");
            <?php endif; ?>
        }
    </script>
</body>
</html>

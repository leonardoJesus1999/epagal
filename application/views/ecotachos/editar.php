<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ecotacho</title>
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
        #mapa {
            margin-top: 2rem;
            height: 400px;
            width: 100%;
            margin-bottom: 2rem;
        }
        .info-iconos {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            background-color: #f9f9f9;
            margin-left: 20px;
            width: 300px;
            position: relative;
        }
        .info-iconos h4 {
            margin-top: 0;
        }
        .info-iconos img {
            width: 30px;
            height: 30px;
            vertical-align: middle;
            margin-right: 10px;
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
                        <h2>Editar Ecotacho</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="mx-auto" style="width:100%;">
                        <form class="row" id="form-editar-ecotacho" enctype="multipart/form-data" action="<?php echo site_url('ecotachos/actualizarEcotacho') ?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo $ecotachoEditar->id ?>">

                            <div class="col-6 mt-4">
                                <label for="codigo">Código</label>
                                <input value="<?php echo $ecotachoEditar->codigo ?>" placeholder="Código del ecotacho" type="text" class="form-control" required name="codigo" id="codigo">
                            </div>

                            <div class="col-6 mt-4">
                                <label for="ruta_id">Ruta</label>
                                <select required name="ruta_id" id="ruta_id" class="form-control">
                                    <option value="">--Seleccione la Ruta--</option>
                                    <?php foreach ($rutas as $ruta): ?>
                                        <option value="<?php echo $ruta->id; ?>" <?php echo $ruta->id == $ecotachoEditar->ruta_id ? 'selected' : ''; ?>>
                                            <?php echo $ruta->nombre; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12 mt-4">
                                <label for="direccion">Dirección</label>
                                <input value="<?php echo $ecotachoEditar->direccion ?>" placeholder="Dirección del ecotacho" type="text" class="form-control" required name="direccion" id="direccion">
                            </div>

                            <div class="col-12 mt-4">
                                <label for="observaciones">Observaciones</label>
                                <textarea class="form-control" name="observaciones" id="observaciones"><?php echo $ecotachoEditar->observaciones ?></textarea>
                            </div>

                            <div class="col-6 mt-4">
                                <label for="latitud" class="form-label">Latitud</label>
                                <input value="<?php echo $ecotachoEditar->latitud ?>" placeholder="Latitud" type="text" class="form-control" required name="latitud" id="latitud" readonly>
                            </div>

                            <div class="col-6 mt-4">
                                <label for="longitud" class="form-label">Longitud</label>
                                <input value="<?php echo $ecotachoEditar->longitud ?>" placeholder="Longitud" type="text" class="form-control" required name="longitud" id="longitud" readonly>
                            </div>

                            <div id="mapa"></div>

                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit">Actualizar</button>
                                &nbsp;
                                <a href="<?php echo site_url('ecotachos/index') ?>" class="btn">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-iconos">
                        <h4>Íconos de Ecotachos</h4>
                        <p><img src="<?php echo base_url('assets/images/ecotacho1.png') ?>" alt="Ecotacho Oriental"> Ruta Oriental</p>
                        <p><img src="<?php echo base_url('assets/images/ecotacho2.png') ?>" alt="Ecotacho Occidental"> Ruta Occidental</p>
                        <p><img src="<?php echo base_url('assets/images/ecotacho3.png') ?>" alt="Ecotacho Nocturno"> Ruta Nocturna</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function initMap() {
            const coordCentral = new google.maps.LatLng(-0.9339577388522958, -78.61459669570844);
            const mapa = document.getElementById('mapa');
            const miMapa = new google.maps.Map(mapa, {
                center: coordCentral,
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            // URLs de los iconos
            const iconos = {
                1: '<?php echo base_url('assets/images/ecotacho1.png') ?>', // Oriental
                2: '<?php echo base_url('assets/images/ecotacho2.png') ?>', // Occidental
                3: '<?php echo base_url('assets/images/ecotacho3.png') ?>'  // Nocturno
            };

            // Crear un marcador para cada icono y posición
            const marcador = new google.maps.Marker({
                position: { lat: parseFloat('<?php echo $ecotachoEditar->latitud; ?>'), lng: parseFloat('<?php echo $ecotachoEditar->longitud; ?>') },
                map: miMapa,
                draggable: true,
                icon: {
                    url: iconos[<?php echo $ecotachoEditar->ruta_id; ?>], // Icono basado en la ruta
                    scaledSize: new google.maps.Size(30, 30) // Tamaño del icono escalado
                }
            });

            google.maps.event.addListener(marcador, 'dragend', function() {
                const latitud = this.getPosition().lat();
                const longitud = this.getPosition().lng();

                // Actualizar latitud y longitud en el formulario
                const latitudInput = document.getElementById('latitud');
                const longitudInput = document.getElementById('longitud');

                latitudInput.value = latitud;
                longitudInput.value = longitud;
                latitudInput.classList.remove('error');
                longitudInput.classList.remove('error');
                if (document.getElementById('latitud-error')) {
                    document.getElementById('latitud-error').remove();
                }
                if (document.getElementById('longitud-error')) {
                    document.getElementById('longitud-error').remove();
                }
            });
        }

        window.onload = function() {
            initMap();
        };
    </script>
</body>
</html>

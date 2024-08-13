<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Ecotachos</h2>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <a href="<?php echo site_url('ecotachos/nuevo'); ?>" class="btn btn-custom">
                Agregar Ecotacho <i class="bi bi-plus-circle"></i>
            </a>
        </div>

        <div>
            <div class="table-responsive">
                <?php if ($ecotachos): ?>
                    <table class="table table-striped" id="tabla">
                        <thead>
                            <tr>
                                <th class="px-4 py-3">Ruta ID</th>
                                <th class="px-4 py-3">Código</th>
                                <th class="px-4 py-3">Dirección</th>
                                <th class="px-4 py-3">Observaciones</th>
                                <th class="px-4 py-3">Latitud</th>
                                <th class="px-4 py-3">Longitud</th>
                                <th class="px-4 py-3">Estado</th> <!-- Nueva columna para el estado -->
                                <th class="px-4 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ecotachos as $ecotacho): ?>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td><?php echo $ecotacho->ruta_id ?></td>
                                    <td><?php echo $ecotacho->codigo ?></td>
                                    <td><?php echo $ecotacho->direccion ?></td>
                                    <td><?php echo $ecotacho->observaciones ?></td>
                                    <td><?php echo $ecotacho->latitud ?></td>
                                    <td><?php echo $ecotacho->longitud ?></td>
                                    <td>
                                        <!-- Círculo de Estado -->
                                        <div style="display: flex; align-items: center;">
                                            <?php
                                                $fillPercentage = isset($ecotacho->fill_percentage) ? $ecotacho->fill_percentage : 0; // Asigna 0 si no está definido
                                                $color = getFillColor($fillPercentage);
                                            ?>
                                            <div id="circle-<?php echo $ecotacho->id; ?>" style="width: 20px; height: 20px; border-radius: 50%; background-color: <?php echo $color; ?>;"></div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-sm">
                                        <?php if ($this->session->userdata('perfil_usu') != 'USUARIO1'): ?>
                                            <a href="<?php echo site_url('ecotachos/editar/') . $ecotacho->id; ?>" class="btn btn-warning btn-sm">
                                                <i class="fa fa-pencil"></i> Editar
                                            </a>
                                            <a href="<?php echo site_url('ecotachos/simulacion_lorawan/') . $ecotacho->id; ?>" class="btn btn-primary btn-sm">
                                                <i class="fa fa-play"></i> Control
                                            </a>
                                            <a href="<?php echo site_url('ecotachos/eliminar/') . $ecotacho->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este ecotacho?');">
                                                <i class="fa fa-trash"></i> Eliminar
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No hay ecotachos registrados.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- PHP Helper Function -->
<?php
function getFillColor($percentage) {
    if ($percentage <= 0) {
        return '#FFFFFF'; // Blanco
    } elseif ($percentage < 50) {
        return '#FFFF00'; // Amarillo
    } elseif ($percentage < 100) {
        return '#FFA500'; // Naranja
    } else {
        return '#FF0000'; // Rojo
    }
}
?>

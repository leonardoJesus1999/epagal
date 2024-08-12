<div class="middle_cont">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="page_title text-center">
                    <h2><i class="fas fa-route"></i> Rutas</h2>
                </div>
                <div class="mb-4 text-center">
                    <a href="<?php echo site_url('rutas/nuevo'); ?>" class="btn btn-custom">
                        Agregar Ruta <i class="bi bi-plus-circle"></i>
                    </a>
                </div>
                <div class="table-responsive">
                    <?php if ($rutas): ?>
                        <table class="table table-striped text-center" id="tabla">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3">ID</th>
                                    <th class="px-4 py-3">Nombre</th>
                                    <th class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rutas as $ruta): ?>
                                    <tr class="text-gray-700 dark:text-gray-400">
                                      <td><?php echo $ruta->id ?></td>
                                        <td><?php echo $ruta->nombre ?></td>
                                        <td class="px-4 py-3 text-sm">
                                            <?php if ($this->session->userdata('perfil_usu') != 'USUARIO1'): ?>
                                                <a href="<?php echo site_url('rutas/editar/') . $ruta->id; ?>" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-pencil"></i> Editar
                                                </a>
                                            <?php endif; ?>
                                            <?php if ($this->session->userdata('perfil_usu') == 'ADMINISTRADOR'): ?>
                                                <a href="javascript:void(0)" class="btn btn-danger btn-sm"
                                                    onclick="confirmarEliminar('<?php echo site_url('rutas/eliminar/') . $ruta->id; ?>', 'Ruta');">
                                                    <i class="fa fa-trash"></i> Eliminar
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No hay rutas registradas.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function confirmarEliminar(url, item) {
    if (confirm('¿Estás seguro de que quieres eliminar este ' + item + '?')) {
        window.location.href = url;
    }
}
</script>

<!-- Add this line to include FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

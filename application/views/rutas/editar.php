<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2><i class="fas fa-route"></i> Editar Ruta</h2>
                </div>
            </div>
        </div>

        <div class="mx-auto" style="width:60%;">
            <?php if ($this->session->flashdata('mensaje')): ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('mensaje'); ?>
                </div>
            <?php endif; ?>
            <form class="row" id="form-editar-ruta" action="<?php echo site_url('rutas/actualizarRuta/' . $rutaEditar->id) ?>" method="POST">
                <div class="col-12 mt-4">
                    <label for="nombre">Nombre de la Ruta</label>
                    <input value="<?php echo $rutaEditar->nombre; ?>" type="text" class="form-control" required name="nombre" id="nombre">
                </div>

                <div class="col-md-6 mt-4">
                    <button class="btn btn-success" type="submit">Actualizar Ruta</button>
                    &nbsp;
                    <a href="<?php echo site_url('rutas/index') ?>" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add this line to include FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<?php
class Ecotachos extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("Ecotacho");
        $this->load->model("Ruta");
        $this->load->library('session'); // Carga la librería de sesión
    }

    public function index()
    {
        $data["ecotachos"] = $this->Ecotacho->obtenerTodos();

        $this->load->view("header");
        $this->load->view('ecotachos/index', $data);
        $this->load->view('footer');
    }

    public function nuevo()
    {
        $this->verificar_rol(array('ADMINISTRADOR', 'USUARIO1')); // Permite que USUARIO1 también acceda

        $data["rutas"] = $this->Ruta->obtenerTodos();
        $this->load->view("header");
        $this->load->view('ecotachos/nuevo', $data);
        $this->load->view('footer');
    }

    public function editar($id)
    {
        $this->verificar_rol(array('ADMINISTRADOR')); // Solo ADMINISTRADOR puede acceder

        // Obtener el perfil del usuario
        $usuario = $this->session->userdata('perfil_usu');

        // Verificar que el usuario no es el que tiene perfil 'USUARIO1'
        if ($usuario === 'USUARIO1') {
            show_error('No tienes permiso para editar', 403, 'Acceso Denegado');
            return;
        }

        $data["ecotachoEditar"] = $this->Ecotacho->obtenerPorId($id);
        $data["rutas"] = $this->Ruta->obtenerTodos();

        $this->load->view("header");
        $this->load->view('ecotachos/editar', $data);
        $this->load->view('footer');
    }

    public function mapa()
    {
        $data["ecotachos"] = $this->Ecotacho->obtenerTodos();

        // Depuración: Verificar datos obtenidos
        error_log(print_r($data["ecotachos"], true));

        $this->load->view("header");
        $this->load->view('ecotachos/mapa', $data);
        $this->load->view('footer');
    }

    public function eliminar($id)
    {
        $this->verificar_rol(array('ADMINISTRADOR')); // Solo ADMINISTRADOR puede acceder

        // Obtener el perfil del usuario
        $usuario = $this->session->userdata('perfil_usu');

        // Verificar que el usuario no es el que tiene perfil 'USUARIO1'
        if ($usuario === 'USUARIO1') {
            show_error('No tienes permiso para eliminar', 403, 'Acceso Denegado');
            return;
        }

        $this->Ecotacho->eliminar($id);
        $this->session->set_flashdata('mensaje', 'El ecotacho fue eliminado correctamente');
        redirect('ecotachos/index');
    }

    public function guardarEcotacho()
    {
        $this->verificar_rol(array('ADMINISTRADOR', 'USUARIO1')); // Permite que USUARIO1 también acceda

        $codigo = $this->input->post('codigo');
        $ruta_id = $this->input->post('ruta_id');
        $direccion = $this->input->post('direccion');
        $observaciones = $this->input->post('observaciones');
        $latitud = $this->input->post('latitud');
        $longitud = $this->input->post('longitud');

        // Asignar el icono según la ruta
        $iconos = [
            1 => 'ecotacho1.png',  // Oriental
            2 => 'ecotacho2.png',  // Occidental
            3 => 'ecotacho3.png'   // Nocturno
        ];

        if (isset($iconos[$ruta_id])) {
            $icono = $iconos[$ruta_id];
        } else {
            $icono = 'default_icon.png';
        }

        // Depuración
        error_log("Ruta ID: " . $ruta_id);
        error_log("Icono: " . $icono);

        $data = array(
            'codigo' => $codigo,
            'ruta_id' => $ruta_id,
            'direccion' => $direccion,
            'observaciones' => $observaciones,
            'latitud' => $latitud,
            'longitud' => $longitud,
            'icono' => $icono,
            'fill_percentage' => 0 // Inicializa el porcentaje de llenado
        );

        if ($this->Ecotacho->insertar($data)) {
            $this->session->set_flashdata('mensaje', 'El ecotacho fue guardado correctamente');
        } else {
            $this->session->set_flashdata('mensaje', 'Ocurrió un error al guardar el ecotacho');
        }

        redirect('ecotachos/index');
    }

    public function actualizarEcotacho()
    {
        $this->verificar_rol(array('ADMINISTRADOR')); // Solo ADMINISTRADOR puede acceder

        $id = $this->input->post("id");
        $ecotachoEditar = $this->Ecotacho->obtenerPorId($id);

        $datosEcotacho = array(
            "codigo" => $this->input->post("codigo"),
            "direccion" => $this->input->post("direccion"),
            "observaciones" => $this->input->post("observaciones"),
            "latitud" => $this->input->post("latitud"),
            "longitud" => $this->input->post("longitud"),
            "ruta_id" => $this->input->post("ruta_id"),
            "icono" => $ecotachoEditar->icono, // Mantener el icono existente si no cambia
            "fill_percentage" => $ecotachoEditar->fill_percentage // Mantener el porcentaje de llenado existente
        );

        if ($this->Ecotacho->actualizar($id, $datosEcotacho)) {
            $this->session->set_flashdata('mensaje', 'El ecotacho fue actualizado correctamente');
        } else {
            $this->session->set_flashdata('mensaje', 'Ocurrió un error al actualizar el ecotacho');
        }

        redirect("ecotachos/index");
    }

    private function verificar_rol($roles_requeridos)
    {
        $perfil = strtoupper($this->session->userdata('perfil_usu')); // Asegúrate de convertir a mayúsculas
        if (!in_array($perfil, array_map('strtoupper', $roles_requeridos))) {
            show_error('No tienes permiso para realizar esta acción', 403, 'Acceso Denegado');
            exit;
        }
    }

    public function simulacion_lorawan($id)
    {
        // Actualizar el fill_percentage a 100% (rojo)
        $this->Ecotacho->updateFillPercentage($id, 100);

        // Obtener los detalles del ecotacho
        $data['ecotacho'] = $this->Ecotacho->obtenerPorId($id);

        // Cargar las vistas con los datos necesarios
        $this->load->view('header');
        $this->load->view('ecotachos/lorawan_simulacion', $data);
        $this->load->view('footer');
    }
}
?>

<?php
class Rutas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("Ruta");
        $this->load->library('session');
    }

    public function index()
    {
        $data["rutas"] = $this->Ruta->obtenerTodos();

        $this->load->view("header");
        $this->load->view('rutas/index', $data);
        $this->load->view('footer');
    }

    public function nuevo()
    {
        $this->verificar_rol(array('ADMINISTRADOR', 'USUARIO1'));

        $this->load->view("header");
        $this->load->view('rutas/nuevo');
        $this->load->view('footer');
    }

    public function editar($id)
    {
        $this->verificar_rol(array('ADMINISTRADOR'));

        // Obtener el usuario actual
        $usuario = $this->session->userdata('perfil_usu');

        // Verificar que el usuario no es el que tiene perfil 'USUARIO1'
        if ($usuario === 'USUARIO1') {
            show_error('No tienes permiso para editar', 403, 'Acceso Denegado');
            return;
        }

        $data["rutaEditar"] = $this->Ruta->obtenerPorId($id);

        $this->load->view("header");
        $this->load->view('rutas/editar', $data);
        $this->load->view('footer');
    }

    public function actualizarRuta($id)
    {
        $this->verificar_rol(array('ADMINISTRADOR'));

        $datos = array(
            'nombre' => $this->input->post('nombre')
        );

        if ($this->Ruta->actualizar($id, $datos)) {
            $this->session->set_flashdata('mensaje', 'La ruta fue actualizada correctamente');
        } else {
            $this->session->set_flashdata('mensaje', 'Ocurrió un error al actualizar la ruta');
        }

        redirect('rutas/index');
    }

    public function eliminar($id)
    {
        $this->verificar_rol(array('ADMINISTRADOR'));

        $this->Ruta->eliminar($id);
        $this->session->set_flashdata('mensaje', 'La ruta fue eliminada correctamente');
        redirect('rutas/index');
    }

    public function guardarRuta()
    {
        $this->verificar_rol(array('ADMINISTRADOR', 'USUARIO1'));

        $datos = array(
            'nombre' => $this->input->post('nombre')
        );

        if ($this->Ruta->insertar($datos)) {
            $this->session->set_flashdata('mensaje', 'La ruta fue guardada correctamente');
        } else {
            $this->session->set_flashdata('mensaje', 'Ocurrió un error al guardar la ruta');
        }

        redirect('rutas/index');
    }

    private function verificar_rol($roles_requeridos)
    {
        $perfil = strtoupper($this->session->userdata('perfil_usu'));
        if (!in_array($perfil, array_map('strtoupper', $roles_requeridos))) {
            show_error('No tienes permiso para realizar esta acción', 403, 'Acceso Denegado');
            exit;
        }
    }
}
?>

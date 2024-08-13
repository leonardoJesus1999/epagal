<?php

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('login');
    }

    public function procesar_login() {
        $this->form_validation->set_rules('username', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $usuario = $this->Usuario_model->obtener_usuario_por_credenciales($username, $password);

            if ($usuario) {
                // Depuración: Verifica el contenido del usuario obtenido
                var_dump($usuario);

                // Iniciar sesión
                $this->session->set_userdata('usuario_id', $usuario['id_usu']);
                $this->session->set_userdata('perfil_usu', strtoupper($usuario['perfil_usu'])); // Asegúrate de que el rol esté en mayúsculas

                // Depuración: Verifica los datos de sesión
                var_dump($this->session->userdata());

                $this->session->set_flashdata('bienvenida', 'Bienvenido al sistema ' . $usuario['nombre_usu'] . '; Rol: ' . $usuario['perfil_usu']);

                redirect('inicio');
            } else {
                $data['error'] = 'Usuario o contraseña incorrectos';
                $this->load->view('login', $data);
            }
        }
    }



    public function cerrar_sesion() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>

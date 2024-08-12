<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cargar librerías o modelos necesarios
        $this->load->library('session');
    }

    public function logout() {
        // Eliminar la sesión actual
        $this->session->sess_destroy();
        // Redirigir a la página de inicio de sesión o la página principal
        redirect('login'); // Cambiar 'login' por la ruta correcta
    }
}
?>

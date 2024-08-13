<?php

class Inicio extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // Cargar el modelo si es necesario en el futuro
    }

    public function index()
    {
        // Aquí puedes cargar los datos necesarios si los hubiera
        $data = array(
            // Ejemplo de datos si necesitas pasarlos a la vista
            // 'variable' => 'valor'
        );

        $this->load->view("header");
        $this->load->view('inicio', $data);
        $this->load->view('footer');
    }
}

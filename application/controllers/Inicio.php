<?php

class Inicio extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // No se cargan modelos en este controlador
    }

    public function index()
    {
        // Definir los datos que se pasarán a la vista
        $data = array(
            'titulo' => 'Información Cooperativa', // Puedes ajustar según tu necesidad
            'mision' => 'Aquí va la misión', // Puedes ajustar según tu necesidad
            'vision' => 'Aquí va la visión', // Puedes ajustar según tu necesidad
            'nombre' => 'Nombre de la Cooperativa', // Puedes ajustar según tu necesidad
            'provincia' => 'Provincia', // Puedes ajustar según tu necesidad
            'ciudad' => 'Ciudad', // Puedes ajustar según tu necesidad
            'direccion' => 'Dirección', // Puedes ajustar según tu necesidad
            'logo' => 'logo.png', // Puedes ajustar según tu necesidad
            'latitud' => '-0.9339577388522958', // Puedes ajustar según tu necesidad
            'longitud' => '-78.61459669570844' // Puedes ajustar según tu necesidad
        );

        $this->load->view("header");
        $this->load->view('inicio', $data);
        $this->load->view('footer');
    }
}

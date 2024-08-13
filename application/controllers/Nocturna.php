<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nocturna extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Carga la base de datos
    }

    public function nocturna() {
        // Obtén los datos de ecotachos nocturnos directamente de la base de datos
        $query = $this->db->select('latitud, longitud, direccion')
                          ->from('ecotachos')
                          ->where('ruta_id', 3) // ID de la ruta nocturna
                          ->get();

        $data['nocturnos'] = $query->result();

        $this->load->view("header");
        $this->load->view('nocturna/nocturna', $data);
        $this->load->view('footer');
    }
}

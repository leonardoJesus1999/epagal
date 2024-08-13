<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Occidental extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Carga la base de datos
    }

    public function occidental() {
        // Obtén los datos de ecotachos relacionados con la ruta Occidental
        $query = $this->db->select('latitud, longitud, direccion')
                          ->from('ecotachos')
                          ->where('ruta_id', 2) // ID de la ruta Occidental
                          ->get();

        $data['occidentales'] = $query->result();

        $this->load->view("header");
        $this->load->view('occidental/occidental', $data);
        $this->load->view('footer');
    }
}
?>

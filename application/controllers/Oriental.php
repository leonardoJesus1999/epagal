<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oriental extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Carga la base de datos
    }

    public function oriental() {
        // Obtén los datos de ecotachos relacionados con la ruta Oriental
        $query = $this->db->select('latitud, longitud, direccion')
                          ->from('ecotachos')
                          ->where('ruta_id', 1) // ID de la ruta Oriental (ajusta si es necesario)
                          ->get();

        $data['orientales'] = $query->result();

        $this->load->view("header");
        $this->load->view('oriental/oriental', $data);
        $this->load->view('footer');
    }
}
?>

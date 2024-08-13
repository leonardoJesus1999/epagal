<?php
class Oriental {

    function __construct() {
        $this->load->database(); // Asegúrate de que el archivo esté en la carpeta 'models'
    }

    function obtenerTodosOriental() {
        // Obtiene todos los ecotachos relacionados con la ruta "Oriental"
        $query = $this->db->select('ecotachos.*')
                          ->from('ecotachos')
                          ->join('rutas', 'ecotachos.ruta_id = rutas.id')
                          ->where('rutas.nombre', 'Oriental')  // Ajusta el nombre si es necesario
                          ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
}
?>

<?php
class Occidental {

    function __construct() {
        $this->load->database(); // Asegúrate de que el archivo esté en la carpeta 'models'
    }

    function obtenerTodosOccidental() {
        // Obtiene todos los ecotachos relacionados con la ruta "Occidental"
        $query = $this->db->select('ecotachos.*')
                          ->from('ecotachos')
                          ->join('rutas', 'ecotachos.ruta_id = rutas.id')
                          ->where('rutas.nombre', 'Occidental')  // Ajusta el nombre si es necesario
                          ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
}
?>

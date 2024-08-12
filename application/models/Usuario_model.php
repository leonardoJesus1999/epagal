<?php

class Usuario_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Obtiene un usuario por sus credenciales.
     *
     * @param string $username Email del usuario.
     * @param string $password Contraseña del usuario.
     * @return array|bool Devuelve los datos del usuario si se encuentra, o false si no.
     */
    public function obtener_usuario_por_credenciales($username, $password) {
        $this->db->select('id_usu, nombre_usu, email_usu, password_usu, apellido_usu, perfil_usu');
        $this->db->from('usuario');
        $this->db->where('email_usu', $username);
        $this->db->where('password_usu', $password); // Comparar contraseñas en texto plano

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}
?>

<?php
class Ruta extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function obtenerTodos()
    {
        $query = $this->db->get('rutas');
        return $query->result();
    }

    public function obtenerPorId($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('rutas');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('rutas', $data);
    }

    public function actualizar($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('rutas', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('rutas');
    }
}
?>

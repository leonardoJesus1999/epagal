<?php

class Ecotacho extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function obtenerTodos()
    {
        $query = $this->db->get('ecotachos');
        return $query->result();
    }

    public function obtenerPorId($id)
    {
        $query = $this->db->get_where('ecotachos', array('id' => $id));
        return $query->row();
    }

    public function insertar($data)
    {
        $this->db->insert('ecotachos', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizar($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('ecotachos', $data);
    }

    public function eliminar($id)
    {
        return $this->db->delete('ecotachos', array('id' => $id));
    }

    // Nueva función para obtener ecotachos por estado
    public function obtenerPorEstado($estado)
    {
        $query = $this->db->get_where('ecotachos', array('estado' => $estado));
        return $query->result();
    }

    // Nueva función para actualizar el porcentaje de llenado
    public function updateFillPercentage($id, $fill_percentage)
    {
        $this->db->set('fill_percentage', $fill_percentage);
        $this->db->where('id', $id);
        $this->db->update('ecotachos');
    }
}
?>

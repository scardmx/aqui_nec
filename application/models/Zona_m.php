<?php

class Zona_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getId($id) {
        $sql = 'SELECT * FROM zona where idZona = ' . $id;
        $query = $this->db->query($sql);
        if ($query->num_rows() == 1)
            return $query->row();
        else
            return FALSE;
    }

    function getAll() {
        $sql = 'SELECT * FROM zona ORDER BY descripcion ASC ';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }

    function upd($id, $datos) {
        $this->db->where('idZona', $id);
        $this->db->update('zona', $datos);
        return true;
    }

    function add($datos) {
        $query = $this->db->insert('zona', $datos);
        return $this->db->insert_id();
    }

    function del($id) {
        $sql = 'delete  FROM zona where idZona=' . $id;
        $query = $this->db->query($sql);
        return true;
    }

}

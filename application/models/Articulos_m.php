<?php

class Articulos_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getId($id) {
        $sql = 'SELECT * FROM articulos where idArticulos = ' . $id;
        $query = $this->db->query($sql);
        if ($query->num_rows() == 1)
            return $query->row();
        else
            return FALSE;
    }

    function getAll() {
        $sql = 'SELECT * FROM articulos ';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }

    function upd($id, $datos) {
        $this->db->where('idArticulos', $id);
        $this->db->update('articulos', $datos);
        return true;
    }

    function add($datos) {
        $query = $this->db->insert('articulos', $datos);
        return $this->db->insert_id();
    }

    function del($id) {
        $sql = 'delete  FROM articulos where idArticulos=' . $id;
        $query = $this->db->query($sql);
        return true;
    }

}

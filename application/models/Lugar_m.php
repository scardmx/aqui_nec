<?php

class Lugar_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getId($id) {
        $sql = 'SELECT * FROM lugar where idLugar = ' . $id;
        $query = $this->db->query($sql);
        if ($query->num_rows() == 1)
            return $query->row();
        else
            return FALSE;
    }

    function getAll() {
        $sql = 'SELECT * FROM lugar ';
         
        $query = $this->db->query($sql);
       if ($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }
    

    function getAllZonas() {
        $sql = 'SELECT * FROM lugar, zona
                WHERE
                lugar.id_zona=zona.idZona
               ORDER BY lugar.fecha_modificacion ASC ';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }

    function upd($id, $datos) {
        $this->db->where('idLugar', $id);
        $this->db->update('lugar', $datos);
        return true;
    }

    function add($datos) {
        $query = $this->db->insert('lugar', $datos);
        return $this->db->insert_id();
    }

    function del($id) {
        $sql = 'delete  FROM lugar where idLugar=' . $id;
        $query = $this->db->query($sql);
        return true;
    }

}

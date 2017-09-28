<?php

class Usuario_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getId($id) {
        $sql = 'SELECT * FROM usuarios where idUsuarios = ' . $id;
        $query = $this->db->query($sql);
        if ($query->num_rows() == 1)
            return $query->row();
        else
            return FALSE;
    }

    function login($nbusuario, $nbclave) {
        $sql = 'SELECT * FROM `usuarios` WHERE `correo`="' . $nbusuario . '" AND `password`="' . $nbclave . '" ';
        $query = $this->db->query($sql);
        $query = $this->db->query($sql);
        if ($query->num_rows() == 1)
            return $query->row();
        else
            return FALSE;
    }

    function getAll() {
        $sql = 'SELECT * FROM usuarios ';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }

    function upd($id, $datos) {
        $this->db->where('idUsuarios', $id);
        $this->db->update('usuarios', $datos);
        return true;
    }

    function add($datos) {
        $query = $this->db->insert('usuarios', $datos);
        return $this->db->insert_id();
    }

    function del($id) {
        $sql = 'delete  FROM usuarios where idUsuarios=' . $id;
        $query = $this->db->query($sql);
        return true;
    }

}

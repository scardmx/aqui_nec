<?php

class Reporte_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getId($id) {
        $sql = 'SELECT * FROM lugar_reporte where idLugarReporte = ' . $id;
        $query = $this->db->query($sql);
        if ($query->num_rows() == 1)
            return $query->row();
        else
            return FALSE;
    }

    function getAll() {
        $sql = 'SELECT * FROM lugar_reporte ';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }

    function upd($id, $datos) {
        $this->db->where('idLugarReporte', $id);
        $this->db->update('lugar_reporte', $datos);
        return true;
    }

    function add($datos) {
        $query = $this->db->insert('lugar_reporte', $datos);
        return $this->db->insert_id();
    }

    function del($id) {
        $sql = 'delete  FROM lugar_reporte where idLugarReporte=' . $id;
        $query = $this->db->query($sql);
        return true;
    }

    function getAllReportesIdLugar($id) {
        $sql = 'SELECT * FROM lugar_reporte, articulos '
                . 'WHERE '
                . 'id_art=idArticulos  AND prioridad NOT LIKE "TERMINADO"  AND id_luga = ' . $id .
                ' ORDER BY fecha_modificacion ASC';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }

    function getReporteFiltros($datos) {

        $i = 0;
        $sql = 'SELECT lu.idLugar,
                    lr.idLugarReporte, 
                    lu.direccion, 
                    lu.tipo_lugar, 
                    lu.zona_refencia,
                    zo.descripcion as zona_captura, 
                    lu.fecha_modificacion as fecha_lugar,
                    lr.fecha_modificacion, 
                    lr.prioridad,
                    lr.necesarios,
                    lr.requeridos,
                    lr.no_requeridos,
                    lr.brigadistas,
                    lu.coord1, 
                lu.coord2
        FROM  lugar lu
            LEFT JOIN lugar_reporte lr ON lu.idLugar= lr.id_luga
            LEFT JOIN zona zo ON lu.id_zona=zo.IdZona
            LEFT JOIN articulos art ON art.idArticulos=lr.id_art';

        $idLugar = '';
        $zona = '';
        $tipo = '';
        $prioridad = '';


        if ($datos['id'] != '' || $datos['id'] != NULL || $datos['id'] != 0) {

            $idLugar = ' WHERE lu.idLugar=' . $datos['id'];

            $i++;
        }

        if ($datos['zona'] > 0) {
            if ($i < 1) {
                $zona = ' WHERE zo.idZona =' . $datos['zona'];
            } else {
                $zona = ' AND zo.idZona =' . $datos['zona'];
            }
            $i++;
        }

        if ($datos['tipo_lugar'] != '-') {
            if ($i < 1) {
                $tipo = ' WHERE lu.tipo_lugar like "' . $datos['tipo_lugar'] . '"';
            } else {
                $tipo = ' AND lu.tipo_lugar like "' . $datos['tipo_lugar'] . '"';
            }
            $i++;
        }

        if ($datos['tipo_reporte'] > 0) {
            if ($i < 1) {
                $prioridad = ' WHERE art.idArticulos = ' . $datos['tipo_reporte'] . '';
            } else {
                $prioridad = ' AND art.idArticulos  = ' . $datos['tipo_reporte'];
            }
        }



        $sql = $sql . $idLugar . $zona . $tipo . $prioridad . ' ORDER BY lu.idLugar, lr.idLugarReporte ASC';


       
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
        
    }

    function cuentaReportes($id) {
        $sql = 'SELECT COUNT( * ) as cuenta FROM lugar_reporte where id_luga = ' . $id;
        $query = $this->db->query($sql);

        $query = $this->db->query($sql);

        $max = $query->row();
        return $max->cuenta;
    }

    function addHistoria($datos) {
        $query = $this->db->insert('historia_reporte', $datos);
        return $this->db->insert_id();
    }

}

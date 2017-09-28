<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {

        parent::__construct();
        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->model('lugar_m', 'lu_m');
        $this->load->model('reporte_m', 're_m');

        global $data;
    }

    public function index() {





        $data['lugares'] = $this->listaReporte($this->lu_m->getAllZonas());
        $this->load->view('reportes/reportes', $data);
    }

    public function verReportesLugar() {

        $id = $this->uri->segment(3);

        $lugar = $this->lu_m->getId($id);
        $data['lugar'] = $lugar;
        $puntos = '["' . $lugar->direccion . '", "' . $lugar->id_zona . '", "' . $lugar->tipo_lugar . '", ' . $lugar->coord1 . ', ' . $lugar->coord2 . ', "#", "' . base_url() . 'zoner/assets/img/properties/property-01.jpg", "' . base_url() . 'zoner/assets/img/property-types/neutro.png"]';

        $data['puntos_geos'] = $puntos;
        $data['reportes'] = $this->re_m->getAllReportesIdLugar($id);

        $this->load->view('reportes/reportesLugar', $data);
    }

    public function addReporte() {
        $id_luga = $this->uri->segment(3);
        global $data;


        date_default_timezone_set('UTC');


//Reporte
        $datos_reporte = array(
            'id_luga' => $id_luga,
            'tipo' => $this->input->post('tipo'),
            'brigadistas' => $this->input->post('brigadista'),
            'prioridad' => $this->input->post('prioridad'),
            'necesarios' => $this->input->post('necesarios'),
            'requeridos' => $this->input->post('requeridos'),
            'no_requeridos' => $this->input->post('no_requeridos'),
            'fecha_modificacion' => date('Y-m-d H:i:s'),
        );


        $this->re_m->add($datos_reporte);

        $datos_lugar = array(
            'fecha_modificacion' => date('Y-m-d H:i:s')
        );



        $this->lu_m->upd($id_luga, $datos_lugar);
        redirect('/reporte/verReportesLugar/' . $id_luga);
    }

    private function listaReporte($lugares) {
        global $data;






        $act = array();


        if ($lugares != FALSE) {
            foreach ($lugares as $row) {




                $datos = array(
                    'idLugar' => $row->idLugar,
                    'tipo_lugar' => $row->tipo_lugar,
                    'direccion' => $row->direccion,
                    'descripcion' => $row->descripcion,
                    'fecha_modificacion' => $row->fecha_modificacion,
                    'cuenta' => $this->re_m->cuentaReportes($row->idLugar),
                );


                array_push($act, $datos);
            }
        }



        return $act;
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lugar extends CI_Controller {

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
        $this->load->model('zona_m', 'zo_m');

        global $data;
    }

    public function index() {
        if ($this->session->userdata('id')) {


            $data['zonas'] = $this->zo_m->getAll();
            $this->load->view('lugares/agregarLugar', $data);
        } else {
            redirect('');
        }
    }

    public function addLugar() {

        global $data;
        if ($this->session->userdata('id')) {


            date_default_timezone_set('America/Mexico_City');




            $array = explode(',', $this->input->post('address'));
            $datos_lugar = array(
                'notas' => $this->input->post('notas'),
                'direccion' => $this->input->post('address'),
                'estatus' => 'ACTIVO',
                'fecha_creacion' => date('Y-m-d H:i:s'),
                'coord1' => $this->input->post('latitude'),
                'coord2' => $this->input->post('longitude'),
                'referencias' => $this->input->post('referencia'),
                'tipo_lugar' => $this->input->post('tipo_lugar'),
                'id_zona' => $this->input->post('zona'),
            );

            if (sizeof($array) > 2) {

                $datos_lugar['zona_refencia'] = $array[1];
            }


            $id = $this->lu_m->add($datos_lugar);
        }

        redirect('');
    }

    public function editarView() {
        if ($this->session->userdata('id')) {
            $id = $this->uri->segment(3);

            $lugar = $this->lu_m->getId($id);

            $data['lugar'] = $lugar;
            $data['zona'] = $this->zo_m->getId($lugar->id_zona);
            $data['zonas'] = $this->zo_m->getAll();

            $this->load->view('lugares/editarLugar', $data);
        } else {
            redirect('');
        }
    }

    public function modLugar() {


        global $data;
        if ($this->session->userdata('id')) {


            $id = $this->uri->segment(3);

            date_default_timezone_set('UTC');



            $array = explode(',', $this->input->post('address'));
            $datos_lugar = array(
                'notas' => $this->input->post('notas'),
                'direccion' => $this->input->post('address'),
                'estatus' => 'ACTIVO',
                'fecha_creacion' => date('Y-m-d H:i:s'),
                'coord1' => $this->input->post('latitude'),
                'coord2' => $this->input->post('longitude'),
                'referencias' => $this->input->post('referencia'),
                'tipo_lugar' => $this->input->post('tipo_lugar'),
                'id_zona' => $this->input->post('zona'),
            );

            if (sizeof($array) > 2) {

                $datos_lugar['zona_refencia'] = $array[1];
            }


            $this->lu_m->upd($id, $datos_lugar);
        }

        redirect('reporte');
    }

}

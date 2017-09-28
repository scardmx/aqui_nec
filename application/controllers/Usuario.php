<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
        $this->load->model('usuario_m', 'us_m');

        global $data;
    }

    public function index() {
        if ($this->session->userdata('rol') == 'ADMIN') {

            $data['usuarios'] = $this->us_m->getAll();
            $this->load->view('usuario/usuarios', $data);
        } else {
            redirect('');
        }
    }

    public function addUsuario() {
        global $data;
        if ($this->session->userdata('rol') == 'ADMIN') {



            $nbclave = hash('sha512', $this->input->post('password'));
//Reporte
            $datos_usuario = array(
                'nombre' => $this->input->post('nombre'),
                'apellido_paterno' => $this->input->post('apellido_paterno'),
                'apellido_materno' => $this->input->post('apellido_materno'),
                'correo' => $this->input->post('correo'),
                'rol' => $this->input->post('rol'),
                'password' => $nbclave,
                'estatus' => 'ACTIVO',
            );


            $id = $this->us_m->add($datos_usuario);


            redirect('usuario/');
        } else {

             redirect('');
        }
    }

    public function editUsuarioView() {
        if ($this->session->userdata('rol') == 'ADMIN') {
            $id = $this->uri->segment(3);
            $data['usuario'] = $this->us_m->getId($id);
            $this->load->view('usuario/usuariosMod', $data);
        } else {
            redirect('/');
        }
    }

    public function ModUser() {
        if ($this->session->userdata('rol') == 'ADMIN') {
            $id = $this->uri->segment(3);



            $nbclave = hash('sha512', $this->input->post('password'));
//Reporte
            $datos_usuario = array(
                'nombre' => $this->input->post('nombre'),
                'apellido_paterno' => $this->input->post('apellido_paterno'),
                'apellido_materno' => $this->input->post('apellido_materno'),
                'correo' => $this->input->post('correo'),
                'rol' => $this->input->post('rol'),
                'password' => $nbclave,
                'estatus' => $this->input->post('estatus'),
            );


            if ($this->input->post('password') != '' || $this->input->post('password') != NULL) {

                $nbclave = hash('sha512', $this->input->post('password'));
                $datos_usuario['password'] = $nbclave;
            }


            $this->us_m->upd($id, $datos_usuario);

            redirect('usuario/');
        } else {
            redirect('');
        }
    }

    public function delete() {

        if ($this->session->userdata('rol') == 'ADMIN') {
            $id = $this->uri->segment(3);

            $this->us_m->del($id);

            redirect('usuario/');
        } else {

             redirect('');
        }
    }

}

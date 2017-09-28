<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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

        $this->load->model('usuario_m', 'u_m');
        $this->load->model('zona_m', 'zo_m');



        global $data;
    }

    public function index() {

        $data['error2'] = 0;

        $this->load->view('login/login', $data);
    }

    public function do_login() {
        global $data;
        $usuario = $this->input->post('usuario');
        $clave = $this->input->post('password');


        $registrado = $this->u_m->login($usuario, hash('sha512', $clave));

        echo $usuario;

        if ($registrado != FALSE) {


            $this->session->set_userdata('nombre', $registrado->nombre . ' ' . $registrado->apellido_paterno);
            $this->session->set_userdata('correo', $registrado->correo);
            $this->session->set_userdata('id', $registrado->idUsuarios);
            $this->session->set_userdata('rol', $registrado->rol);

      redirect('');
            
        } else {

            $data['error2'] = 1;
            $data['error'] = 'Los datos no son correctos';
            $this->load->view('login/login', $data);
        }
    }

    public
            function do_logout() {
        $this->session->sess_destroy();
         redirect('');
    }

}

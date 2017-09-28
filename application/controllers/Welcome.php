<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
        $this->load->model('zona_m', 'zo_m');
        $this->load->model('articulos_m', 'ar_m');
        global $data;

//$data['usuario'] = $this->um->get($this->session->userdata('seidusuario'));
    }

    public function index() {

        $geos = $this->lu_m->getAll();

        $array = $this->puntosArray($geos);

        $data['zonas'] = $this->zo_m->getAll();
        $data['articulos'] = $this->ar_m->getAll();

        $data['puntos_geos'] = $this->cargaPuntosGeograficos($array);


        $this->load->view('inicio', $data);
    }

    private function puntosArray($geos) {
        global $data;






        $act = array();


        if ($geos != FALSE) {
            foreach ($geos as $row) {


                $registrados = 'Sin Reservaciones';



                $reportes = $this->re_m->getAllReportesIdLugar($row->idLugar);

                $imagen = 'bajo.png';
                $cuenta = 0;
                $suma = 0;
                if ($reportes != FALSE) {

                    foreach ($reportes as $row2) {

                        if ($cuenta == 1) {

                            if ($row2->prioridad == "ALTA") {
                                $imagen = 'alto.png';
                                $cuenta = $cuenta + 1;
                                $suma = $suma + 3;
                            } else {

                                $cuenta = $cuenta + 1;
                                if ($row2->prioridad == "MEDIA")
                                    $suma = $suma + 2;
                                if ($row2->prioridad == "BAJA")
                                    $suma = $suma + 1;
                            }
                        } else {
                            $cuenta = $cuenta + 1;

                            if ($row2->prioridad == "ALTA")
                                $suma = $suma + 3;
                            if ($row2->prioridad == "MEDIA")
                                $suma = $suma + 2;
                            if ($row2->prioridad == "BAJA")
                                $suma = $suma + 1;
                        }
                    }
                }

                if ($imagen != 'alto.png') {


                    if ($cuenta > 0) {
                        $promedio = bcdiv($suma, $cuenta, 3);

                        if ($promedio > 2.3) {
                            $imagen = 'alto.png';
                        }
                        if ($promedio < 2.4 && $promedio > 1.4) {
                            $imagen = 'medio.png';
                        }
                    }
                }
                $zona = $this->zo_m->getId($row->id_zona);



                $datos = array(
                    'id' => $row->idLugar,
                    'direccion' => $row->direccion,
                    'tipo_lugar' => $row->tipo_lugar,
                    'zona' => $zona->descripcion,
                    'coord1' => $row->coord1,
                    'coord2' => $row->coord2,
                    'imagen' => $imagen,
                );

                array_push($act, $datos);
            }
        }



        return $act;
    }

    private function cargaPuntosGeograficos($puntos_geos) {

        $puntos = '';
        $i = 0;


        if ($puntos_geos != FALSE) {

            foreach ($puntos_geos as $row) {

                $coma = ',';
                if ($i == 0) {
                    $coma = '';
                }

                $puntos = $puntos . $coma . '["' . $row["direccion"] . '", "' . $row["zona"] . '" ,"' . $row["tipo_lugar"] . '",' . $row["coord1"] . ',' . $row["coord2"] . ',"' . base_url() . 'index.php/reporte/verReportesLugar/' . $row["id"] . '", "' . base_url() . 'zoner/assets/img/properties/property-01.jpg", "' . base_url() . 'zoner/assets/img/property-types/' . $row["imagen"] . '"]';
                $i++;
            }
        }

        return $puntos;
    }

}

<?php $this->load->view('generals/header'); ?>



<!-- Page Content -->
<div id="page-content">
    <section id="banner">
        <div class="block has-dark-background background-color-default-darker center text-banner">
            <div class="container">
                <h2 class="no-bottom-margin no-border"><?php echo $lugar->tipo_lugar . ' | ' . $lugar->direccion ?></h2>
            </div>
        </div>
    </section><!-- /#banner -->
    <section id="our-services" class="block" >
        <div class="container">

            <div class="row">

                <div id="map"></div>
            </div>


            <div class="row">

                <?php if ($this->session->userdata('id')) { ?>

                    <form role="form" id="form-submit"  method="POST"  action="<?php echo base_url(); ?>index.php/reporte/addReporte/<?php echo $lugar->idLugar ?>">

                        <header>
                            <header><h3>ALTA DE REPORTE</h3></header>
                            <div>Da de alta un nuevo reporte para el lugar seleccionado:</div>
                        </header>




                        <div>
                            <label class="desc" id="title4" for="Field4">
                                Necesarios:
                            </label>

                            <div>
                                <textarea class="form-control"  rows="3" id="necesarios" name="necesarios" ></textarea>
                            </div>
                        </div>


                        <div>
                            <label class="desc" id="title4" for="Field4">
                                Requeridos:
                            </label>

                            <div>
                                <textarea class="form-control"  rows="3" id="requeridos" name="requeridos" ></textarea>
                            </div>
                        </div>

                        <div>
                            <label class="desc" id="title4" for="Field4">
                                No Requeridos:
                            </label>

                            <div>
                                <textarea class="form-control"  rows="3" id="no_requeridos" name="no_requeridos" ></textarea>
                            </div>
                        </div>




                        <div>
                            <fieldset>

                                <legend id="title5" class="desc">
                                    Categoria de Reporte
                                </legend>
                                <div>
                                    <select  id="tipo" name="tipo">
                                        <?php foreach ($articulos as $row2) { ?>
                                            <option value="<?php echo $row2->idArticulos ?>"><?php echo $row2->descripcion ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                        </div>

                        <div>

                            <legend id="title5" class="desc">
                                Brigadistas
                            </legend>
                            <div>
                                <select  id="tipo" name="brigadista">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>

                            </div>

                        </div>
                        <div>
                            <legend id="title5" class="desc">
                                Prioriad
                            </legend>
                            <div>
                                <select  id="prioridad" name="prioridad">
                                    <option value="ALTA">ALTA</option>
                                    <option value="MEDIA">MEDIA</option>
                                    <option value="BAJA">BAJA</option>

                                </select>
                            </div>

                            </fieldset>
                        </div>


                        <div>
                            <label class="desc" id="title4" for="Field4">
                                Contacto:
                            </label>

                            <div>
                                <textarea class="form-control"  rows="2" id="contacto" name="contacto" ></textarea>
                            </div>
                        </div>


                        <div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Agregar Reporte</button>
                            </div><!-- /.form-group -->

                        </div>

                    </form>

                <?php } ?>



            </div>

    </section>
    <section id="our-services" class="block">
        <div class="container">
            <div class="row">
                <table id="example" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>

                            <th>Actualizacion</th>
                            <th>Prioridad</th>
                            <th>Tipo</th>
                            <th>Brigadistas</th>
                            <th>Necesarios</th>
                            <th>Requeridos</th>
                            <th>No Requeridos</th>
                            <?php if ($this->session->userdata('id')) { ?>
                                <th>Acciones</th>
                            <?php } ?>
                        </tr>
                    </thead>

                    <tbody>


                        <?php if ($reportes) { ?>
                            <?php foreach ($reportes as $row) { ?>
                                <tr>
                                    <td><?php echo $row->idLugarReporte ?></td>
                                    <td><?php echo $row->fecha_modificacion ?></td>

                                    <?php
                                    if ($row->prioridad == 'ALTA') {
                                        echo'<td class="alto">' . $row->prioridad . '</td>';
                                    } else if ($row->prioridad == 'MEDIA') {
                                        echo'<td class="medio">' . $row->prioridad . '</td>';
                                    } else {
                                        echo'<td class="bajo">' . $row->prioridad . '</td>';
                                    }
                                    ?>

                                    <td><?php echo $row->descripcion ?></td>
                                    <td><?php echo $row->brigadistas ?></td>
                                    <td><?php echo $row->necesarios ?></td>
                                    <td><?php echo $row->requeridos ?></td>
                                    <td><?php echo $row->no_requeridos ?></td>
                                    <?php if ($this->session->userdata('id')) { ?>
                                        <td><a class="glyphicon glyphicon-pencil" aria-hidden="true" href="<?php echo base_url(); ?>index.php/reporte/editarView/<?php echo $row->idLugarReporte ?>"</td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        <?php } ?>

                    </tbody>
                </table>
            </div><!-- /.container -->
        </div>
    </section><!-- /#our-services -->
</div>
<!-- end Page Content -->
<!-- Page Footer -->
<?php $this->load->view('generals/footer'); ?>
<!-- end Page Footer -->	
</div>

<?php $this->load->view('generals/java_scripts'); ?>

<script>

    var locations = [<?php echo $puntos_geos ?>];

</script>
<?php $this->load->view('generals/custom-map_small'); ?>
<?php $this->load->view('generals/custom_small'); ?>

<!--[if gt IE 8]>
<script type="text/javascript" src="assets/js/ie.js"></script>
<![endif]-->

<script>

    var options = {
        enableHighAccuracy: true,
        timeout: 2000,
        maximumAge: 0
    };


    function success(pos) {
        var crd = pos.coords;


        console.log('Latitude : ' + crd.latitude);
        console.log('Longitude: ' + crd.longitude);

        _latitude = crd.latitude;
        _longitude = crd.longitude;


        createHomepageGoogleMap(_latitude, _longitude);
        $(window).load(function () {
            initializeOwl(false);
        });

    }
    ;

    function error(err) {

        _latitude = 19.4361609;
        _longitude = -99.13731359999997;

        createHomepageGoogleMap(_latitude, _longitude);
        $(window).load(function () {
            initializeOwl(false);
        });

    }
    ;

    navigator.geolocation.getCurrentPosition(success, error, options);



</script>



<script type="text/javascript" src="<?php echo base_url(); ?>zoner/dataTables/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>zoner/dataTables/dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>zoner/dataTables/rowReorder.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>zoner/dataTables/responsive.js"></script>
<script>

    $(document).ready(function () {
        var table = $('#example').DataTable({
            scrollX: true,

        });
    });

</script>
</body>
</html>
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

                <?php if ($this->session->userdata('id')) { ?>

                    <form role="form" id="form-submit"  method="POST"  action="<?php echo base_url(); ?>index.php/reporte/editarReporte/<?php echo $reporte->idLugarReporte ?>">

                        <header>
                            <header><h3>EDICION:</h3></header>
                            <div>Actualizar de Reporte:</div>
                        </header>




                        <div>
                            <label class="desc" id="title4" for="Field4">
                                Necesarios:
                            </label>

                            <div>
                                <textarea class="form-control"  rows="3" id="necesarios" name="necesarios" ><?php echo $reporte->necesarios ?> </textarea>
                            </div>
                        </div>


                        <div>
                            <label class="desc" id="title4" for="Field4">
                                Requeridos:
                            </label>

                            <div>
                                <textarea class="form-control"  rows="3" id="requeridos" name="requeridos" ><?php echo $reporte->requeridos ?></textarea>
                            </div>
                        </div>

                        <div>
                            <label class="desc" id="title4" for="Field4">
                                No Requeridos:
                            </label>

                            <div>
                                <textarea class="form-control"  rows="3" id="no_requeridos" name="no_requeridos" ><?php echo $reporte->no_requeridos ?></textarea>
                            </div>
                        </div>




                        <div>
                            <fieldset>

                                <legend id="title5" class="desc">
                                    Categoria de Reporte
                                </legend>
                                <div>
                                    <select  id="tipo" name="tipo">
                                        <option value="<?php echo $articulo->idArticulos ?>"><?php echo $articulo->descripcion ?></option>
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


                                    <option value="<?php echo $reporte->brigadistas ?>"><?php echo $reporte->brigadistas ?></option>
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
                                    <option value="<?php echo $reporte->prioridad ?>"><?php echo $reporte->prioridad ?></option>
                                    <option value="ALTA">ALTA</option>
                                    <option value="MEDIA">MEDIA</option>
                                    <option value="BAJA">BAJA</option>
                                    <option value="TERMINADO">TERMINADO</option>

                                </select>
                            </div>

                            </fieldset>
                        </div>

                        <div>
                            <label class="desc" id="title4" for="Field4">
                                Contacto:
                            </label>

                            <div>
                                <textarea class="form-control"  rows="2" id="contacto" name="contacto" ><?php echo $reporte->contacto ?></textarea>
                            </div>
                        </div>

                        <div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Editar Reporte</button>
                            </div><!-- /.form-group -->

                        </div>

                    </form>

                <?php } ?>



            </div>

    </section>

</div>
<!-- end Page Content -->
<!-- Page Footer -->
<?php $this->load->view('generals/footer'); ?>
<!-- end Page Footer -->	
</div>

<?php $this->load->view('generals/java_scripts'); ?>




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
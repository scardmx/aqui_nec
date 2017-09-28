<?php $this->load->view('generals/header'); ?>

<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */


</style>
<!-- Page Content -->
<div id="page-content">
    <section id="banner">
        <div class="block has-dark-background background-color-default-darker center text-banner">
            <div class="container">
                <h2 class="no-bottom-margin no-border">PANEL DE USUARIOS</h2>
            </div>
        </div>
    </section><!-- /#banner -->
    <section id="our-services" class="block" >
        <div class="container">
            <div class="row">








                <div class="container">
                    <header><h1>REGISTRA USUARIO:</h1></header>

                    <form role="form" id="form-submit"  method="POST" class="form-submit" action="<?php echo base_url(); ?>index.php/usuario/addUsuario">
                        <div class="row">
                            <div class="block">
                                <div class="col-md-9 col-sm-9">
                                    <section id="submit-form">
                                        <div class="row">
                                            <div class="block clearfix">

                                                <div class="col-md-6 col-sm-6">
                                                    <section id="place-on-map">

                                                        <div class="form-group">
                                                            <label for="nombre">NOMBRE</label>
                                                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                                                        </div><!-- /.form-group -->

                                                        <div class="form-group">
                                                            <label for="paterno">APELLIDO PATERNO</label>
                                                            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" >
                                                        </div><!-- /.form-group -->

                                                        <div class="form-group">
                                                            <label for="paterno">APELLIDO MATERNO</label>
                                                            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" >
                                                        </div><!-- /.form-group -->

                                                        <div class="form-group">
                                                            <label for="paterno">CORREO ELECTRONICO</label>
                                                            <input type="text" class="form-control" id="correo" name="correo" required>
                                                        </div><!-- /.form-group -->

                                                        <div class="form-group">
                                                            <label for="paterno">PASSWORD</label>
                                                            <input type="password" class="form-control" id="password" name="password" required>
                                                        </div><!-- /.form-group -->



                                                        <div class="form-group">
                                                            <label>ROL</label>
                                                            <select  id="rol" name="rol">
                                                                <option value="CAPTURISTA">CAPTURISTA</option>
                                                                <option value="ADMIN">ADMIN</option>

                                                            </select>
                                                        </div><!-- /.form-group -->

                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-default">Agregar</button>
                                                        </div><!-- /.form-group -->

                                                    </section><!-- /#place-on-map -->

                                                </div><!-- /.row -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <section id="summary">

                                                <table id="example" class="table" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nombre</th>
                                                            <th>Correo</th>
                                                            <th>Rol</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>


                                                        <?php if ($usuarios) { ?>
                                                            <?php foreach ($usuarios as $row) { ?>
                                                                <tr>
                                                                    <td><?php echo $row->idUsuarios ?></td>
                                                                    <td><?php echo $row->nombre . ' ' . $row->apellido_paterno . ' ' . $row->apellido_materno ?></td>


                                                                    <td><?php echo $row->correo ?></td>
                                                                    <td><?php echo $row->rol ?></td>


                                                                    <td><a class="glyphicon glyphicon-list-alt" aria-hidden="true" href="<?php echo base_url(); ?>index.php/usuario/editUsuarioView/<?php echo $row->idUsuarios ?>"</a>-- 
                                                                        <a class="glyphicon glyphicon-remove" aria-hidden="true" href="<?php echo base_url(); ?>index.php/usuario/delete/<?php echo $row->idUsuarios ?>"</a></td>

                                                                </tr>
                                                            <?php } ?>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>

                                            </section><!-- /#summary -->

                                        </div><!-- /.col-md-6 -->
                                </div><!-- /.block -->


                                </section>

                            </div><!-- /.col-md-9 -->

                        </div>
                </div><!-- /.row -->
                </form><!-- /#form-submit -->
            </div><!-- /.container -->

        </div>
        <!-- end Page Content -->
        <!-- Page Footer -->
        <?php $this->load->view('generals/footer'); ?>
        <!-- end Page Footer -->	
</div>

<?php $this->load->view('generals/java_scripts'); ?>


<!--[if gt IE 8]>
<script type="text/javascript" src="assets/js/ie.js"></script>
<![endif]-->



<script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/js_table/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/js_table/dataTables.js"></script>
<script>

    $(document).ready(function () {
        $('#example').DataTable({
            "scrollY": "300px",
            "scrollX": "300px",

        });
    });




</script>
</body>
</html>
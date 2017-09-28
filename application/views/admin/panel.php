<?php $this->load->view('generals/header'); ?>



<!-- Search Box -->


<!-- Page Content -->
<div id="page-content">
    <section id="banner">
        <div class="block has-dark-background background-color-default-darker center text-banner">
            <div class="container">
                <h1 class="no-bottom-margin no-border">Apoya de forma inteligente e informada en <a href="#" class="text-underline">Aquí Necesitamos</a>!</h1>
            </div>
        </div>
    </section><!-- /#banner -->
    <section id="our-services" class="block">
        <div class="container">
            <header class="section-title"><h2>Menu de Acciones de Administrador</h2></header>
            <div class="row">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Acceso</th>
                       
                        </tr>
                    </thead>

                    <tbody>

                        <tr>

                            <td>Panel de Usuarios </td>
                            <td><a class="glyphicon glyphicon-plus" aria-hidden="true" href="<?php echo base_url(); ?>index.php/usuario"</td>

                        </tr>

                        <tr>

                            <td>Catalogo de Zonas </td>
                            <td><a class="glyphicon glyphicon-plus" aria-hidden="true" href="<?php echo base_url(); ?>index.php/reporte/verReportesLugar"</td>

                        </tr>

                        <tr>

                            <td>Catalogo de Tipos de Lugares </td>
                            <td><a class="glyphicon glyphicon-plus" aria-hidden="true" href="<?php echo base_url(); ?>index.php/reporte/verReportesLugar"</td>

                        </tr>



                    </tbody>
                </table>
            </div><!-- /.container -->
    </section><!-- /#our-services -->


    <!--
    <section id="partners" class="block">
        <div class="container">
            <header class="section-title"><h2>P</h2></header>
            <div class="logos">
                <div class="logo"><a href=""><img src="assets/img/logo-partner-01.png" alt=""></a></div>
                <div class="logo"><a href=""><img src="assets/img/logo-partner-02.png" alt=""></a></div>
                <div class="logo"><a href=""><img src="assets/img/logo-partner-03.png" alt=""></a></div>
                <div class="logo"><a href=""><img src="assets/img/logo-partner-04.png" alt=""></a></div>
                <div class="logo"><a href=""><img src="assets/img/logo-partner-05.png" alt=""></a></div>
            </div>
        </div>
    </section>
    -->
</div>
<!-- end Page Content -->
<!-- Page Footer -->
<?php $this->load->view('generals/footer'); ?>
<!-- end Page Footer -->	
</div>

<?php $this->load->view('generals/java_scripts'); ?>

<script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/js_table/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/js_table/dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/js_table/dataTablesBootTrap.js"></script>
<script>


    $(document).ready(function () {
        $('#example').DataTable();
    });



</script>
</body>
</html>
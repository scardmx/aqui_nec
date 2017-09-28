<?php $this->load->view('generals/header'); ?>

<style>
    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    body {
        padding: 20px 15%;
    }
    form header {
        margin: 0 0 20px 0; 
    }
    form header div {
        font-size: 90%;
        color: #999;
    }
    form header h2 {
        margin: 0 0 5px 0;
    }
    form > div {
        clear: both;
        overflow: hidden;
        padding: 1px;
        margin: 0 0 10px 0;
    }
    form > div > fieldset > div > div {
        margin: 0 0 5px 0;
    }
    form > div > label,
    legend {
        width: 25%;
        float: left;
        padding-right: 10px;
    }
    form > div > div,
    form > div > fieldset > div {
        width: 75%;
        float: right;
    }
    form > div > fieldset label {
        font-size: 90%;
    }
    fieldset {
        border: 0;
        padding: 0;
    }

    input[type=text],
    input[type=email],
    input[type=url],
    input[type=password],
    textarea {
        width: 100%;
        border-top: 1px solid #ccc;
        border-left: 1px solid #ccc;
        border-right: 1px solid #eee;
        border-bottom: 1px solid #eee;
    }
    input[type=text],
    input[type=email],
    input[type=url],
    input[type=password] {
        width: 50%;
    }
    input[type=text]:focus,
    input[type=email]:focus,
    input[type=url]:focus,
    input[type=password]:focus,
    textarea:focus {
        outline: 0;
        border-color: #4697e4;
    }

    @media (max-width: 600px) {
        form > div {
            margin: 0 0 15px 0; 
        }
        form > div > label,
        legend {
            width: 100%;
            float: none;
            margin: 0 0 5px 0;
        }
        form > div > div,
        form > div > fieldset > div {
            width: 100%;
            float: none;
        }
        input[type=text],
        input[type=email],
        input[type=url],
        input[type=password],
        textarea,
        select {
            width: 100%; 
        }
    }
    @media (min-width: 1200px) {
        form > div > label,
        legend {
            text-align: right;
        }
    }

</style>

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
            <header class="section-title"><h2>Aquí Necesitamos</h2></header>
            <div class="row">
                <table id="example" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipo</th>
                            <th>Direccion</th>
                            <th>Zona</th>
                            <th>Fecha Actualización</th>
                            <th># Reportes</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if ($lugares) { ?>
                            <?php foreach ($lugares as $row) { ?>
                                <tr>
                                    <td><?php echo $row["idLugar"] ?></td>
                                    <td><?php echo $row["tipo_lugar"] ?></td>
                                    <td><?php echo $row["direccion"] ?></td>
                                    <td><?php echo $row["descripcion"] ?></td>
                                    <td><?php echo $row["fecha_modificacion"] ?></td>
                                    <td> <?php echo $row["cuenta"] ?></td>
                                    <td><a class="glyphicon glyphicon-plus" aria-hidden="true" href="<?php echo base_url(); ?>index.php/reporte/verReportesLugar/<?php echo $row["idLugar"] ?>"></a> |
                                        <a class="glyphicon glyphicon-pencil" aria-hidden="true" href="<?php echo base_url(); ?>index.php/lugar/editarView/<?php echo $row["idLugar"] ?>"></a>      
                                    </td>

                                </tr>
                            <?php } ?>
                        <?php } ?>

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
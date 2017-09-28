<!DOCTYPE html>

<html lang="en-US">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="ThemeStarz">

        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
        <link href="<?php echo base_url(); ?>zoner/assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zoner/assets/bootstrap/css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zoner/assets/css/bootstrap-select.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zoner/assets/css/jquery.slider.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zoner/assets/css/owl.carousel.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zoner/assets/css/style.css" type="text/css">


        <link rel="stylesheet" href="<?php echo base_url(); ?>zoner/dataTables/dataTables.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zoner/dataTables/rowReorder.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zoner/dataTables/responsive.css" type="text/css">




        <!-- Search Box -->
        <style type="text/css">

            table .alto {
                background-color:#ff8585;
            }

            table .medio {
                background-color:#ffa066;
            }

            table .bajo {
                background-color:#f9e166;
            }
        </style>


    

    <title>Aqui Necesitamos - Web App </title>

</head>

<body class="page-sub-page page-submit" id="page-top">
    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Navigation -->
        <div class="navigation">
            <div class="secondary-navigation">
                <div class="container">
                    <div class="contact">
                        <figure><strong>Teléfono de Emergencia Nacional:</strong>911</figure>
                        <figure><strong>Email:</strong>contacto@aquinecesitamos.org</figure>
                    </div>
                    <div class="user-area">
                        <div class="actions">
                            <?php if ($this->session->userdata('id')) { ?>
                                <a href="<?php echo base_url(); ?>index.php/lugar" class="promoted">Alta Lugar</a>
                            <?php } ?>
                            <a href="<?php echo base_url(); ?>index.php/reporte" class="promoted"><strong>Reportes</strong></a>


                            <?php if ($this->session->userdata('id')) { ?>
                                |<a href="<?php echo base_url(); ?>index.php/login/do_logout">Cerrar Sesion</a> | <a href="#" class="promoted"><strong><?php echo $this->session->userdata('nombre') ?></strong></a>
                            <?php } else { ?>
                                <a href="<?php echo base_url(); ?>index.php/login">Acceder</a>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <header class="navbar" id="top" role="banner">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-brand nav" id="brand">
                            <a href="#"><img src="<?php echo base_url(); ?>zoner/assets/img/logo.png" alt="brand"></a>
                        </div>
                    </div>
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <li class=""><a href="<?php echo base_url(); ?>">Inicio</a>
                                <?php if ($this->session->userdata('id')) { ?>
                                </li>

                                <li class="has-child"><a href="<?php echo base_url(); ?>index.php/lugar">Agregar Lugar</a>
                                <?php }
                                ?>
                            </li>
                            <li class="has-child"><a href="<?php echo base_url(); ?>index.php/reporte">Lista de Lugares</a>

                            </li>


                            <li><a href="#">Preguntas Frecuentes</a></li>
                            <li><a href="#">Contacto</a></li>
                            <?php if ($this->session->userdata('rol') == 'ADMIN') { ?>

                                <li class="has-child"><a href="<?php echo base_url(); ?>index.php/admin">Administracion</a>
                                <?php } ?>
                            </li>
                        </ul>
                    </nav>
                    <?php if ($this->session->userdata('id')) { ?>
                        <div class="add-your-property">
                            <a href="<?php echo base_url(); ?>index.php/lugar" class="btn btn-default"><i class="fa fa-plus"></i><span class="text">Agrega un Lugar</span></a>
                        </div>
                    <?php } ?>

                </header><!-- /.navbar -->
            </div><!-- /.container -->
        </div><!-- /.navigation -->
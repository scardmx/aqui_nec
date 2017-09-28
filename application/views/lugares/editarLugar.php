
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
        <link rel="stylesheet" href="<?php echo base_url(); ?>zoner/assets/css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zoner/assets/css/jquery.slider.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zoner/assets/css/owl.carousel.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zoner/assets/css/fileinput.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zoner/assets/css/style.css" type="text/css">

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
                                <a href="<?php echo base_url(); ?>index.php/lugar" class="promoted">Alta Lugar</a>
                                <a href="<?php echo base_url(); ?>index.php/reporte" class="promoted"><strong>Reportes</strong></a>
                                <a href="sign-in.html">Acceder</a>
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
                                <a href="index-google-map-fullscreen.html"><img src="<?php echo base_url(); ?>zoner/assets/img/logo.png" alt="brand"></a>
                            </div>
                        </div>
                        <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                            <ul class="nav navbar-nav">
                                <li class=""><a href="<?php echo base_url(); ?>">Inicio</a>

                                </li>
                                <li class="has-child"><a href="<?php echo base_url(); ?>index.php/lugar">Agregar Lugar</a>

                                </li>
                                <li class="has-child"><a href="<?php echo base_url(); ?>index.php/reporte">Lista de Lugares</a>

                                </li>


                                <li><a href="#">Preguntas Frecuentes</a></li>
                                <li><a href="#">Contacto</a></li>


                                <li class="has-child"><a href="<?php echo base_url(); ?>index.php/admin">Administracion</a>

                                </li>
                            </ul>
                        </nav><!-- /.navbar collapse-->
                        </nav><!-- /.navbar collapse-->
                        <div class="add-your-property">
                            <a href="<?php echo base_url(); ?>index.php/lugar" class="btn btn-default"><i class="fa fa-plus"></i><span class="text">Agrega un Lugar</span></a>
                        </div>

                    </header><!-- /.navbar -->
                </div><!-- /.container -->
            </div><!-- /.navigation -->
            <!-- end Navigation -->
            <!-- Page Content -->

            <div id="page-content">
                <section id="banner">
                    <div class="block has-dark-background background-color-default-darker center text-banner">
                        <div class="container">
                            <h1 class="no-bottom-margin no-border">Apoya de forma inteligente e informada en <a href="#" class="text-underline">Aquí Necesitamos</a>!</h1>
                        </div>
                    </div>
                </section><!-- /#banner -->

                <div class="container">
                    <header><h1>EDITA LUGAR</h1></header>

                    <form role="form" id="form-submit"  method="POST" class="form-submit" action="<?php echo base_url(); ?>index.php/lugar/modLugar/<?php echo $lugar->idLugar ?>">
                        <div class="row">
                            <div class="block">
                                <div class="col-md-9 col-sm-9">
                                    <section id="submit-form">
                                        <div class="row">
                                            <div class="block clearfix">

                                                <div class="col-md-6 col-sm-6">
                                                    <section id="place-on-map">
                                                        <header class="section-title">
                                                            <h2>Lugar</h2>
                                                            <span class="link-arrow geo-location">Obtener posición</span>
                                                        </header>
                                                        <div class="form-group">
                                                            <label for="address-map">Dirección Exacta</label>
                                                            <input type="text" class="form-control" id="address-map" name="address" required value="<?php echo $lugar->direccion ?>">
                                                        </div><!-- /.form-group -->


                                                        <label for="address-map">Mueve el mapa para ubicar el lugar exacto</label>
                                                        <div id="submit-map"></div>

                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo $lugar->coord1 ?>"  style="visibility:hidden">
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo $lugar->coord2 ?>"  style="visibility:hidden">
                                                                </div><!-- /.form-group -->
                                                            </div>

                                                            <div>
                                                                <legend id="title5" class="desc">
                                                                    Zona
                                                                </legend>
                                                                <div>
                                                                    <select  id="zona" name="zona" >

                                                                        <option value="<?php echo $zona->idZona ?>"><?php echo $zona->descripcion ?></option>
                                                                        <?php foreach ($zonas as $row) { ?>
                                                                            <option value="<?php echo $row->idZona ?>"><?php echo $row->descripcion ?></option>
                                                                        <?php } ?>

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <br>

                                                            <div>
                                                                <legend id="title5" class="desc">
                                                                    Refencias
                                                                </legend>

                                                                <div>
                                                                    <textarea class="form-control"  rows="4" id="referencia" name="referencia"><?php echo $lugar->referencias ?></textarea>
                                                                </div>
                                                            </div>

                                                            <br>


                                                            <div>
                                                                <legend id="title5" class="desc">
                                                                    Tipo de Lugar
                                                                </legend>
                                                                <div>
                                                                    <select  id="tipo_lugar" name="tipo_lugar">

                                                                        <option value="<?php echo $lugar->tipo_lugar ?>"><?php echo $lugar->tipo_lugar ?></option>
                                                                        <option value="ALBERGUE">ALBERGUE</option>
                                                                        <option value="CENTRO DE ACOPIO">CENTRO DE ACOPIO</option>
                                                                        <option value="HOSPITAL">HOSPITAL</option>
                                                                        <option value="DERRUMBE">DERRUMBE</option>
                                                                        <option value="OTRO">OTRO</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <br>



                                                            <div>
                                                                <legend id="title5" class="desc">
                                                                    Notas
                                                                </legend>


                                                                <div>
                                                                    <textarea class="form-control"  rows="3" id="notas" name="notas" ><?php echo $lugar->notas ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section><!-- /#place-on-map -->

                                                </div><!-- /.row -->
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <button type="submit" class="btn btn-default">Editar Lugar</button>
                                        </div><!-- /.form-group -->

                                    </section><!-- /#summary -->

                                </div><!-- /.col-md-6 -->
                            </div><!-- /.block --


                    </form><!-- /#form-submit -->
                        </div><!-- /.container -->
                </div>
                <!-- end Page Content -->
                <?php $this->load->view('generals/footer'); ?>
            </div>

            <script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/jquery-2.1.0.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/jquery-migrate-1.2.1.min.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjs7OHHOoGAY49M5-WnQ41y6uZ7EUf7zY&libraries=places"
            type="text/javascript"></script>


            <script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/markerwithlabel_packed.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/bootstrap/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/smoothscroll.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/owl.carousel.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/bootstrap-select.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/jquery.validate.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/icheck.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/retina-1.1.0.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/jquery.magnific-popup.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/fileinput.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/custom-map.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>zoner/assets/js/custom.js"></script>

            <!--[if gt IE 8]>
            <script type="text/javascript" src="assets/js/ie.js"></script>
            <![endif]-->

            <script>
                var _latitude = <?php echo $lugar->coord1 ?>;
                var _longitude = <?php echo $lugar->coord2 ?>;

                google.maps.event.addDomListener(window, 'load', initSubmitMap(_latitude, _longitude));
                function initSubmitMap(_latitude, _longitude) {
                    var mapCenter = new google.maps.LatLng(_latitude, _longitude);
                    var mapOptions = {
                        zoom: 15,
                        center: mapCenter,
                        disableDefaultUI: false,
                        //scrollwheel: false,
                        styles: mapStyles
                    };
                    var mapElement = document.getElementById('submit-map');
                    var map = new google.maps.Map(mapElement, mapOptions);
                    var marker = new MarkerWithLabel({
                        position: mapCenter,
                        map: map,
                        icon: '<?php echo base_url(); ?>zoner/assets/img/marker.png',
                        labelAnchor: new google.maps.Point(50, 0),
                        draggable: true
                    });
                    $('#submit-map').removeClass('fade-map');
                    google.maps.event.addListener(marker, "mouseup", function (event) {
                        var latitude = this.position.lat();
                        var longitude = this.position.lng();
                        $('#latitude').val(this.position.lat());
                        $('#longitude').val(this.position.lng());
                    });

                    //      Autocomplete
                    var input = /** @type {HTMLInputElement} */(document.getElementById('address-map'));
                    var autocomplete = new google.maps.places.Autocomplete(input);
                    autocomplete.bindTo('bounds', map);
                    google.maps.event.addListener(autocomplete, 'place_changed', function () {
                        var place = autocomplete.getPlace();
                        if (!place.geometry) {
                            return;
                        }
                        if (place.geometry.viewport) {
                            map.fitBounds(place.geometry.viewport);
                        } else {
                            map.setCenter(place.geometry.location);
                            map.setZoom(17);
                        }
                        marker.setPosition(place.geometry.location);
                        marker.setVisible(true);
                        $('#latitude').val(marker.getPosition().lat());
                        $('#longitude').val(marker.getPosition().lng());
                        var address = '';

                        if (place.address_components) {


                            address = [
                                (place.address_components[0] && place.address_components[0].short_name || ','),
                                (place.address_components[1] && place.address_components[1].short_name || ','),
                                (place.address_components[2] && place.address_components[2].short_name || ',')
                            ].join(',');


                        }
                    });

                }

                function success(position) {
                    initSubmitMap(position.coords.latitude, position.coords.longitude);
                    $('#latitude').val(position.coords.latitude);
                    $('#longitude').val(position.coords.longitude);
                }

                $('.geo-location').on("click", function () {
                    if (navigator.geolocation) {
                        $('#submit-map').addClass('fade-map');
                        navigator.geolocation.getCurrentPosition(success);
                    } else {
                        error('Geo Location is not supported');
                    }
                });











            </script>


    </body>
</html>
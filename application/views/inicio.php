<?php $this->load->view('generals/header'); ?>


<div class="container">
    <div class="geo-location-wrapper">
        <span class="btn geo-location"><i class="fa fa-map-marker"></i><span class="text">Encontrar Ubicación</span></span>
    </div>
</div>

<!-- Map -->
<div id="map" class="has-parallax"></div>
<!-- end Map -->


<!-- Search Box -->
<div class="search-box-wrapper">
    <div class="search-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="search-box map">
                        <form role="form" id="form-map" class="form-map form-search" method="POST"  action="<?php echo base_url(); ?>index.php/reporte/generaReporteExcel/">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <h2>Generar Consulta</h2>
                            <div class="form-group">
                                <input type="number" name="idLugar" id="idLugar" class="form-control" id="search-box-property-id" placeholder="ID Lugar">
                            </div>
                            <div class="form-group">
                                <select name="tipo_lugar" id="tipo_lugar">
                                    <option value="-">Tipo de Lugar</option>
                                    <option value="ALBERGUE">ALBERGUE</option>
                                    <option value="CENTRO DE ACOPIO">CENTRO DE ACOPIO</option>
                                    <option value="HOSPITAL">HOSPITAL</option>
                                    <option value="DERRUMBE">DERRUMBE</option>
                                    <option value="OTRO">OTRO</option>
                                </select>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <select name="zona" id="zona">
                                    <option value=0>Zona</option>
                                    <?php foreach ($zonas as $row) { ?>
                                        <option value=<?php echo $row->idZona ?>><?php echo $row->descripcion ?></option>
                                    <?php } ?>
                                </select>
                            </div><!-- /.form-group -->



                            <div class="form-group">

                                <select  name="tipo_reporte" id="tipo_reporte">
                                    <option value=0>Tipo de Reporte</option>
                                    <?php foreach ($articulos as $row2) { ?>
                                        <option value=<?php echo $row2->idArticulos ?>><?php echo $row2->descripcion ?></option>
                                    <?php } ?>
                                </select>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Buscar</button>
                            </div><!-- /.form-group -->
                        </form><!-- /#form-map -->
                    </div><!-- /.search-box.map -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.search-box-inner -->
</div>
<!-- end Search Box -->

<!-- Page Content -->
<div id="page-content">
    <section id="banner">
        <div class="block has-dark-background background-color-default-darker center text-banner">
            <div class="container">
                <h1 class="no-bottom-margin no-border">Apoya de forma inteligente e informada en <a href="#" class="text-underline">Aquí Necesitamos</a>!</h1>
            </div>
        </div>
    </section><!-- /#banner -->





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
<?php $this->load->view('generals/custom-map'); ?>
<?php $this->load->view('generals/custom'); ?>

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
</body>
</html>
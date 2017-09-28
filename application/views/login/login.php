<?php $this->load->view('generals/header'); ?>
<!-- end Navigation -->
<!-- Page Content -->
<div id="page-content">

    <!-- end Breadcrumb -->


    <div class="container">
        <header><h1>Ingresa</h1></header>
        <div class="row">
            <?php if ($error2 == 1) { ?>

                <div>
                    <p>
                        <b> <font color="red"> &nbsp &nbsp &nbsp MENSAJE: &nbsp <?php echo $error; ?></font>	</b>
                    </p>

                </div>

            <?php } ?>
            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                <form role="form" id="form-submit"  method="POST" class="form-submit" action="<?php echo base_url(); ?>index.php/login/do_login">
                    <div class="form-group">
                        <label for="form-create-account-email">Email:</label>
                        <input type="email" class="form-control" id="usuario" name="usuario" required>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="form-create-account-password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div><!-- /.form-group -->
                    <div class="form-group clearfix">
                        <button type="submit" class="btn pull-right btn-default" id="account-submit">Ingresar</button>
                    </div><!-- /.form-group -->
                </form>
                <hr>
                <div class="center"><a href="#">Si tienes problemas de acceso por favor escribre a  contacto@aquinecesitamos.org</a></div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->
<!-- Page Footer -->
<?php $this->load->view('generals/footer'); ?>
<!-- end Page Footer -->	
</div>

<?php $this->load->view('generals/java_scripts'); ?>



</body>
</html>
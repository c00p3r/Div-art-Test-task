<?php
/**
 * Created by PhpStorm.
 * User: Игорь
 * Date: 21.07.2016
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="icon" href="<?php echo base_url(); ?>favicon.ico">

    <title>Вхід</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/bootstrap-3.3.6-dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url('assets/css/ie10-viewport-bug-workaround.css'); ?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <div class="col-xs-12">
        <div class="form-container center-block">
            <img src="<?php echo base_url('assets/images/google_logo.png'); ?>"
                 id="login-logo" class="img-responsive center-block" alt="Google logo">
            <?php
                $form_attr = array('class' => 'form-horizontal', 'id' => 'login-form');
                echo form_open('login_controller/login_process', $form_attr);
            ?>
                <div class="form-group has-feedback">
                    <label class="control-label sr-only" for="input_email">E-mail</label>
                    <div class="col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="fa fa-envelope-o fa-fw" aria-hidden="true"></span>
                            </span>
                            <input type="email" name="input_email" id="email" class="form-control invalid"
                                   aria-describedby="email" placeholder="Електронна адреса"
                                   required autofocus>
                        </div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                </div>
                <div class="form-group has-feedback">
                    <label class="control-label sr-only" for="input_password">Password</label>
                    <div class="col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="fa fa-unlock-alt fa-fw" aria-hidden="true"></span>
                            </span>
                            <input type="password" name="input_password" id="password" class="form-control invalid"
                                   aria-describedby="password" placeholder="Пароль"
                                   required>
                        </div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
                <a href="javascript: void(0);">Забули пароль?</a>
                <button class="btn btn-lg btn-success btn-sm pull-right" type="submit"
                        data-loading-text="Зачекайте <span class='fa fa-lg fa-spinner fa-spin'></span>">Увійти</button>
            </form>
        </div>
    </div>
</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js'); ?>"></script>
<!-- Font awesome CDN -->
<script src="https://use.fontawesome.com/57fc43996d.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>!window.jQuery && document.write(decodeURI('%3Cscript src="<?php echo base_url('assets/js/jquery-2.2.4.min.js'); ?>"%3E%3C/script%3E'))</script>

<script src="<?php echo base_url('assets/bootstrap-3.3.6-dist/js/bootstrap.min.js'); ?>"></script>

<script  src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/form_validation.js'); ?>"></script>

</body>
</html>
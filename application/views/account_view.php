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

    <title>Персональний кабінет</title>

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
    <div class="jumbotron text-center center-block">
        <h2>Персональний кабінет</h2>
        <a class="btn btn-danger btn-block btn-lg" role="button"
           href="<?php echo base_url('account_controller/logout') ?>">Вийти</a>
    </div>
</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js'); ?>"></script>
<!-- Font awesome CDN -->
<script src="https://use.fontawesome.com/57fc43996d.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>!window.jQuery && document.write(decodeURI('%3Cscript src="<?php echo base_url('assets/js/jquery-2.2.4.min.js'); ?>"%3E%3C/script%3E'))</script>

<script src="<?php echo base_url('assets/bootstrap-3.3.6-dist/js/bootstrap.min.js'); ?>"></script>
</body>
</html>
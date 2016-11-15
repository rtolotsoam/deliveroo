<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
<head>
	<title><?php echo $titre; ?></title>
	
	<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	
	<link href="<?php echo img_url('fav-icon.png'); ?>" rel="shortcut icon" sizes="16x16" type="image/png" />

	<!--[if lt IE 9]><link rel="stylesheet" href="../assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->
	<?php 
	if(isset($css)){
		foreach ($css as $val_css) {
	?>
		<link rel="stylesheet" href="<?php echo css_url($val_css); ?>" />
	
	<?php
		}
	}
	?>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <?php 
	if(isset($js)){
		foreach ($js as $val_js) {
	?>
		<script type="text/javascript" src="<?php echo js_url($val_js); ?>"></script>
	
	<?php
		}
	}
	?>
    
	<script src="<?php echo js_url('library/jquery/jquery.min.js?v=v1.2.3'); ?>"></script>
	<script src="<?php echo js_url('library/jquery/jquery-migrate.min.js?v=v1.2.3'); ?>"></script>
	<script src="<?php echo js_url('library/modernizr/modernizr.js?v=v1.2.3'); ?>"></script>
	<script src="<?php echo js_url('plugins/less-js/less.min.js?v=v1.2.3'); ?>"></script>
	<script src="<?php echo js_url('modules/admin/charts/flot/assets/lib/excanvas.js?v=v1.2.3'); ?>"></script>
	<script src="<?php echo js_url('plugins/browser/ie/ie.prototype.polyfill.js?v=v1.2.3'); ?>"></script>	


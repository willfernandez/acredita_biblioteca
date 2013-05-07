<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
	<title>Universidad José Carlos Mariátegui</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="Sistema de Biblioteca UJCM" />
	<meta name="author" content="" />
	<?php echo $html->meta('icon', $html->url('../img/favicon.ico')); ?>
	
	<?php
		echo $this->Html->css(array('bootstrap.min','cpanel'));
	?>
	<style type="text/css">
      body {
		background: #f5f5f5;
      }
    </style>
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php echo $scripts_for_layout;?>
	
  </head>
<body> 
	<div class="container">
	<!-- contenido -->
		<?php echo $this->Session->flash(); ?>
		<?php echo $content_for_layout; ?>			
	<!-- fin contenido -->
	</div>
</body>
</html>

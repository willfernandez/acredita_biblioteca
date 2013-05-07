<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Universidad José Carlos Mariátegui</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="Sistema de Biblioteca UJCM" />
	<meta name="author" content="" />
	<?php echo $html->meta('icon', $html->url('../img/favicon.ico')); ?>
	<!-- Le styles -->
    <?php echo $this->Html->css(array('bootstrap.min','cpanel','elrte.min','elastislide','bootstrap-responsive.min')); 
		  echo $this->Html->script(array('jquery','jquery-ui.min','bootstrap.min','jquery.dataTables','elrte.full','elrte.es','jquery.elastislide'));
	?>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php echo $scripts_for_layout;?>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a href="#" class="brand">Sistema Biblioteca</a>
			<div class="nav-collapse collapse">
				<p class="navbar-text pull-right">Logeado como
					<a class="navbar-link" href="#"><?php echo $session->read('Auth.Alumno.nombres').' '.$session->read('Auth.Alumno.apellidos') ?></a> 
				</p>
				<ul class="nav">
					<li class="active"><?php echo $this->Html->link('Panel','/lectores');?></li>
					<li><?php echo $this->Html->link('Cátalogo','/lectores/catalogo'); ?></li>
					<li><?php echo $this->Html->link('Mis reservas','/lectores/reservas');?></li>
					<li><?php echo $this->Html->link('Mis publicaciones','/lectores/archivos');?></li>
				</ul>
			</div><!--/.nav-collapse -->	
		</div>
	</div>
</div>
<!-- container -->
<div class="container">
	<div class="row">
		<div class="span2">
				<div class="member-box round-all"> 
					<div align="center"><?php echo $this->Html->image('logo_admin.png',array('class'=>'member-box-avatar'));?></div>
					<span>
						<strong>Lector</strong><br>
						<a><?php echo $session->read('Auth.Alumno.nombres').' '.$session->read('Auth.Alumno.apellidos') ?></a><br> 
						
						<span class="member-box-links"> <?php echo $this->Html->link('Salir',array('controller'=>'lectores','action'=>'logout'));?></span>
					</span><!--<?php echo $this->Html->link('Configuración','/lectores/editar/'.$this->Session->read('Auth.Lectore.id')); ?> |-->
				</div>
			<!-- sidebar -->
			<div class="sidebar-nav">
				<div style="padding: 8px 0;" class="well">
					<ul class="nav nav-list"> 
						<li class="nav-header">Menú</li>
						<li><?php echo $this->Html->link('<i class="icon-home"></i>Mi bitácora de Préstamos','/lectores/bitacora',array('escape'=>false)); ?></li>
						<li><?php echo $this->Html->link('<i class="icon-th-list"></i>Mis sanciones','/lectores/sanciones',array('escape'=>false)); ?></li>
						<!--<li><?php echo $this->Html->link('<i class="icon-user"></i>Usuarios','',array('escape'=>false)); ?></li>
						<li><?php echo $this->Html->link('<i class="icon-comment"></i>Comentarios','',array('escape'=>false)); ?></li>-->
						
						<li class="nav-header">Circulación</li>
						<li><?php echo $this->Html->link('<i class="icon-user"></i>Reservas','/lectores/reservas',array('escape'=>false)); ?></li>
                                                    

					</ul>
				</div>
			</div><!--/sidebar -->
		</div>
			<div class="span10">
				<?php echo $this->Session->flash(); ?>
				<?php echo $content_for_layout; ?>
			</div>
	</div>
	<footer>
		© 2012 Universidad José Carlos Mariátegui <br />
		Calle Ayacucho Nº 393. Moquegua - Perú Telf. 461110 Anexo 101<br />
		correo@ujcm.edu.pe 
	</footer>	
</div>
<?php echo $this->Html->script(array('script')); ?>
</body>
</html>
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title><?php echo $title_for_layout; ?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
	<meta name="author" content="" />
	<!-- Le styles -->
    <?php echo $this->Html->css(array('bootstrap','web/style','elastislide','bootstrap-responsive')); 
		  echo $this->Html->script(array('jquery','jquery-ui.min','bootstrap.min','jquery.elastislide'));
	?>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php echo $this->Html->script(array('jquery','bootstrap.min')); ?>
	<?php echo $scripts_for_layout;?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="span3">
				<div id="sidebar">
					<!-- header -->
					<header id="header">
							<a href="/biblioteca-final/web" id="logo">
								<?php echo $this->Html->image('logo.png');?>
							</a>
							
							<nav class="navbar navbar-inverse">
								<a class="btn btn-navbar collapsed" data-target=".nav-collapse" data-toggle="collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</a>
								<div  class="nav-collapse collapse">	
									<ul class="nav">
							
                                                                                <!--<li><?php echo $this->Html->link('Portada','/web/portada');?></li>-->
										<li><?php echo $this->Html->link('Sobre la Biblioteca','/web/biblioteca');?></li>
										<li><?php echo $this->Html->link('Servicios','/web/servicio');?></li>
										<li><?php echo $this->Html->link('Bibliotecas','/web/campus');?></li>
                                                                                <li><?php echo $this->Html->link('Ingresa a la Biblioteca','/lectores/login');?></li>
										<li><?php echo $this->Html->link('Contactenos','/web/contactenos');?></li>
										
										
										<li><?php echo $this->Html->link('Catálogo en línea','/catalogo');?></li>
									</ul>
								</div>
							</nav>
					</header><!-- /header -->
				</div>
			</div><!-- /span3-->
			<div class="span9">	
				<!-- content-right -->
				<div id="content-right">
					<?php //echo $this->Html->link('Iniciar Sesión','/usuarios/usuario_login',array('class'=>'user-login'));?>
					<section>
						<?php echo $this->Session->flash(); ?>
						<?php echo $content_for_layout; ?>
					</section>		
				</div><!-- /content-right -->
				<!-- footer -->
				<footer id="footer">
					<small>Copyright © 2012 Universidad José Carlos Mariátegui. Todos los derechos reservados.</small>
					<small>Calle Ayacucho Nº 393. Moquegua - Perú Telf. 461110 Anexo 101</small>
					<small>correo@ujcm.edu.pe</small>
				</footer><!-- /footer -->
			</div><!-- /span9 -->
		</div><!-- /row -->
	</div><!-- /container -->
</body>
</html>
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
    <?php echo $this->Html->css(array('bootstrap.min','cpanel','elrte.min','bootstrap-responsive.min')); 
		  echo $this->Html->script(array('jquery','bootstrap.min','jquery.dataTables','elrte.full','elrte.es'));
	?>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php echo $scripts_for_layout;?>
</head>
<body>
<?php $menu = $this->params['controller']; ?>
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
					<a class="navbar-link" href="#"><?php echo $session->read('Auth.Usuario.nombres')?></a>
				</p>
				<ul class="nav">
					<li <?php if($menu =='panel'):?> class="active" <?php endif;?>><?php echo $this->Html->link('Panel','/web/biblioteca');?></li>
					<li <?php if($menu =='textos'):?> class="active" <?php endif;?>><?php echo $this->Html->link('Cátalogo','/textos'); ?></li>
					<li <?php if($menu =='biblioteca' or $menu == 'prestamos'):?> class="active" <?php endif;?>><?php echo $this->Html->link('Circulación','/biblioteca/circulacion');?></li>
					<li <?php if($menu =='adquisiciones'):?> class="active" <?php endif;?>><?php echo $this->Html->link('Adquisiones','/adquisiciones');?></li>
					<li><?php echo $this->Html->link('Reportes','/biblioteca/sancionados');?></li>
					<li <?php if($menu =='configuracion'):?> class="active" <?php endif;?>><?php echo $this->Html->link('Configuración','/configuracion');?></li>
				</ul>
			</div><!--/.nav-collapse -->	
		</div>
	</div>
</div>
<!-- container -->
<div class="container">
	<div class="row">
		<div class="span3">
				<div class="member-box round-all"> 
					<table>
						<tr>
							<td id="avatar">
								<?php echo $this->Html->image('logo_admin.png',array('class'=>'member-box-avatar'));?>
							</td>
							<td>
								<strong>Administrador</strong><br />
								<a href="#"><?php echo $this->Session->read('Auth.Usuario.nombres');?></a><br />
								<span class="member-box-links"><?php echo $this->Html->link('Configuración','/usuarios/editar/'.$this->Session->read('Auth.Usuario.id')); ?> | <?php echo $this->Html->link('Salir',array('controller'=>'usuarios','action'=>'logout'));?></span>
							</td>
						</tr>
					</table>
				</div>
			<!-- sidebar -->
			<div class="sidebar-nav">
				<div style="padding: 8px 0;" class="well">
					<ul class="nav nav-list"> 
						<li class="nav-header">Menú</li>   
						<!--<li><a href="index.html"><i class="icon-home"></i>Panel</a></li>-->
                                                <li><?php echo $this->Html->link('Panel','/web/biblioteca');?></li>
						<li><?php echo $this->Html->link('<i class="icon-edit"></i>Material Bibliográfico','',array('escape'=>false)); ?></li>
						<li><?php echo $this->Html->link('<i class="icon-comment"></i>Comentarios','',array('escape'=>false)); ?></li>
						
						<li class="nav-header">Circulación</li>
						<li><?php echo $this->Html->link('<i class="icon-user"></i>Préstamos','/prestamos',array('escape'=>false)); ?></li>	
						<li><?php echo $this->Html->link('<i class="icon-user"></i>Reservas','/biblioteca/reservas',array('escape'=>false)); ?></li>
						<li><?php echo $this->Html->link('<i class="icon-user"></i>Devolución','/biblioteca/devoluciones',array('escape'=>false)); ?></li>
						
						<li class="nav-header">Lectores</li>
						<li><?php echo $this->Html->link('<i class="icon-user"></i>Prestados','',array('escape'=>false)); ?></li>	
						<li><?php echo $this->Html->link('<i class="icon-user"></i>Sancionados','/biblioteca/sancionados',array('escape'=>false)); ?></li>	
						
						<li class="nav-header">Configuración</li>
						<li><?php echo $this->Html->link('<i class="icon-user"></i>Usuarios','/usuarios',array('escape'=>false)); ?></li>	
						<li><a href="#" class="cookie-delete"><i class="icon-wrench"></i> Delete Cookies</a></li>
					</ul>
				</div>
			</div><!--/sidebar -->
		</div>
			<div class="span9">
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
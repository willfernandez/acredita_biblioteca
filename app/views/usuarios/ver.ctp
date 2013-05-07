<div class="page-header">
	<h2><?php echo $usuario['Usuario']['nombre_usuario'];?></h2>
</div>

<div class="row">
	<div class="span3">
		<h3>Gestión de usuarios</h3>
		<p>Datos del usuario.</p>
	</div>
	
	<div class="span9">
	<div class="perfil-usuario">
	<div class="perfil-left">
		<?php echo $this->Html->image('normal-man.gif',array('alt'=>'Usuario')); ?>	
	</div>
	
	<div class="perfil-right">	
			<?php 
				setlocale(LC_TIME, "spanish");
				$fecha_registro= strftime("%d de %B del %Y",strtotime($usuario['Usuario']['fecha_registro']));
			?>
		
		<p><span class="strong">Usuario : </span><?php echo $usuario['Usuario']['login'];?></p>
		<p><span class="strong">Contraseña: </span><?php echo $usuario['Usuario']['password'];?></p>
		<p><span class="strong">Email : </span><?php echo $usuario['Usuario']['email'];?></p>	
		<p><span class="strong">Fecha de registro: </span><?php echo $fecha_registro;?></p>
	</div>
	</div>
	</div>
</div>



	

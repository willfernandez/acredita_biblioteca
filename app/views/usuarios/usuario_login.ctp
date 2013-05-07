<div id="login">
	<div id="logo">
		<?php echo $this->Html->image('ujcm-login.gif');?>
	</div>
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('Usuario',array('action'=>'usuario_login'));
		echo $this->Form->input('email',array('label'=>'Correo eléctronico','div'=>'clearfix'));
		echo $this->Form->input('password',array('label'=>'Contraseña','div'=>'clearfix'));
		echo '<div class="clearfix">';
		echo $this->Form->button('Iniciar Sesión',array('type'=>'submit','class'=>'btn btn-success'));	
		echo '</div>';
		echo $this->Form->end();
	?>
	
</div>


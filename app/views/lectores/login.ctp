<div class="well" style="width:40%;margin:auto auto;">
	<div class="navbar navbar-static navbar_as_heading">
		<div class="navbar-inner">
			<div class="container" style="width: auto;">
				<a class="brand">Sistema integral de biblioteca ujcm</a>
			</div>
		</div>
		<div id="login-lector">
			<?php echo $this->Session->flash('auth'); ?>
			<?php echo $this->Form->create('Lectore',array('action'=>'login'));
			echo '<fieldset>';
			echo $this->Form->input('Alumno.codigo',array('label'=>'Codigo:','class'=>'input-xlarge-fluid','div'=>'control-group','between'=>'<div class="controls"><div class="input-prepend"><span class="add-on"><i class="icon-large icon-user"></i></span>','after'=>'</div></div>'));
			echo $this->Form->input('Alumno.dni',array('label'=>'Dni:','class'=>'input-xlarge-fluid','div'=>'control-group','between'=>'<div class="controls"><div class="input-prepend"><span class="add-on"><i class="icon-large icon-lock"></i></span>','after'=>'</div></div>'));
			echo '<div>';
			echo $this->Form->button('Iniciar Sesión',array('type'=>'submit','class'=>'btn btn-primary'));	
			echo '</div>';
			echo '<fieldset>';
			echo $this->Form->end();
			?>
		</div>
	</div>
</div>
	
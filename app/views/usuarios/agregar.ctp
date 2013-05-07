<div>
    <ul class="breadcrumb">
        <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
        <li><?php echo $this->Html->link('Usuarios','/usuarios');?> <span class="divider">/</span></li>
        <li class="active">Agregar</li>
    </ul>
</div>
	
<div class="row-fluid">
	<div id="col0" class="span12 column ui-sortable">
		<div class="box">
			<h4 class="box-header round-top">
				Gestión de Usuarios
			</h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<?php echo $this->Form->create('Usuario',array('class'=>'form-horizontal'));?>
					<?php
						echo $this->Form->input('nombres',array('label'=>'Nombres','class'=>':required span6','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>')); 
						echo $this->Form->input('apellidos',array('label'=>'Apellidos','class'=>'span6','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('email',array('label'=>'Correo eléctronico','class'=>':required :email span6','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));	
						echo $this->Form->input('password',array('label'=>'Contraseña','class'=>':required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));	
						echo $this->Form->input('biblioteca_id',array('label'=>'Biblioteca','class'=>':required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo '<div class="form-actions">';
						echo $this->Form->button('Agregar',array('type'=>'submit','class'=>'btn btn-success'));	
						echo $this->Form->button('Reestablecer',array('type'=>'reset','class'=>'btn btn-info'));
						echo '</div>';
						echo $this->Form->end();
					?>
				</div>
			</div>
		</div>
		
	</div>
</div>
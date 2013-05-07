<div>
    <ul class="breadcrumb">
        <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
		<li><?php echo $this->Html->link('Configuración','/configuracion');?> <span class="divider">/</span></li>
        <li><?php echo $this->Html->link('Categorias','/configuracion/editoriales');?> <span class="divider">/</span></li>
        <li class="active">Agregar</li>
    </ul>
</div>
	
<div class="row-fluid">
	<div id="col0" class="span12 column ui-sortable">
		<div class="box">
			<h4 class="box-header round-top">
				Editoriales
			</h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<?php echo $this->Form->create('Editorial',array('url'=>'/configuracion/editorial_add','class'=>'form-horizontal'));?>
					<?php
						echo $this->Form->input('nombre_editorial',array('label'=>'Nombre editorial','class'=>':required span6','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>')); 
						
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
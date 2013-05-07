<div>
    <ul class="breadcrumb">
        <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
        <li><?php echo $this->Html->link('Archivos','/lectores/archivos');?> <span class="divider">/</span></li>
        <li class="active">Agregar Archivo</li>
    </ul>
</div>
	
<div class="row-fluid">
	<div id="col0" class="span12 column ui-sortable">
		<div class="box">
			<h4 class="box-header round-top">
				Información bibliográfica
			</h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<?php echo $this->Form->create('Texto',array('url'=>'/lectores/add_archivo','class'=>'form-horizontal','type'=>'file'));?>
					<?php
						echo $this->Form->input('titulo',array('label'=>'Titulo','class'=>':required span8','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>')); 
						echo $this->Form->input('autor',array('label'=>'Autor(es)','class'=>'span8','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('anio_publicacion',array('label'=>'Año de Publicación','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('editorial_id',array('label'=>'Editorial','class'=>':required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));	
						echo $this->Form->input('idioma_id',array('label'=>'Idioma','class'=>':required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('numero_paginas',array('label'=>'Número de Páginas','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('archivo',array('label'=>'Archivo','type'=>'file','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('archivo_imagen',array('label'=>'Imagen','type'=>'file','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('descripcion',array('label'=>'Descripción','id'=>'editor','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo '<div class="form-actions">';
						echo $this->Form->button('Guardar',array('type'=>'submit','class'=>'btn btn-success'));	
						echo $this->Form->button('Reestablecer',array('type'=>'reset','class'=>'btn btn-info'));
						echo '</div>';
						echo $this->Form->end();
					?>
				</div>
			</div>
		</div>
		
	</div>
</div>

<script type="text/javascript" charset="utf-8">
	$().ready(function() {
		var opts = {
			cssClass : 'el-rte',
			lang     : 'es',
			height   : 300,
			toolbar  : 'normal',
		}
		$('#editor').elrte(opts);
	})
</script>
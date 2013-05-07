<div>
    <ul class="breadcrumb">
        <li><?php echo $this->Html->link('Panel','/lectores');?> <span class="divider">/</span></li>
        <li><?php echo $this->Html->link('Archivos','/lectores/archivos');?> <span class="divider">/</span></li>
        <li class="active">Editar Archivo</li>
    </ul>
</div>
	
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">
				Información bibliográfica
			</h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<div class="span3">
						<div class="detalle-archivo">
						<?php if(!empty($this->data['Texto']['imagen'])):?>
							<?php echo $this->Html->image('imagenes/'.$this->data['Texto']['imagen']);?>
						<?php else:?>
							<?php echo $this->Html->image('imagenes/imagen-no-disponible.jpg')?>
						<?php endif;?>
						</div>
						<p>
							<?php if(!empty($this->data['Texto']['nombre_archivo'])): ?>
				
							<table class="table table-striped table-condensed">
								<thead>	
									<tr>
										<th>Archivo</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php $archivo = $this->data['Texto']['nombre_archivo'];?>
										<td><?php echo $archivo;?></td>
										<td>
											<?php echo $this->Html->link('Descargar',"/files/archivos/$archivo",array('class'=>'btn','style'=>'position:relative; top:6px;'));?>
										</td>	
									</tr>
								</tbody>
							</table>
							<?php endif;?>
						</p>
					</div>
					
					<div class="span9">
					<?php echo $this->Form->create('Texto',array('url'=>'/lectores/edit_archivo','class'=>'form-horizontal','type'=>'file'));?>
					<?php
						echo $this->Form->hidden('id');
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
</div>
<?php //echo print_r($this->data); ?>
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
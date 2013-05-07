<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link('Adquisiciones','/adquisiciones');?> <span class="divider">/</span></li>
    <li class="active">Agregar Archivo</li>
</ul>
<div class="row">
	<div class="span1">
		<div class="button_window">
			<form>
				<button class="btn btn-info" onclick="archivo_add();">
					<i class="icon-ok icon-white"></i><br />
					Guardar
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form>
				<button class="btn btn-warning" onclick="limpiar();">
					<i class="icon-refresh icon-white"></i><br />
					Limpiar
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'adquisiciones','action'=>'archivo_index'));?>">
				<button class="btn btn-success">
					<i class="icon-book icon-white"></i><br />
					Listado
				</button>
			</form>
		</div>
	</div>
</div><!-- /row -->	
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Agregar Archivo</h4>
			<div class="box-content">
				<?php echo $this->Form->create('Texto',array('url'=>'/adquisiciones/archivo_add','class'=>'form-horizontal','type'=>'file','name'=>'form1'));?>					
					<?php
						echo $this->Form->input('titulo',array('label'=>'Titulo','class'=>':required span8','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>')); 
						echo $this->Form->input('autor',array('label'=>'Autor(es)','class'=>'span8','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('anio_publicacion',array('label'=>'Año de Publicación','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('editorial_id',array('label'=>'Editorial','class'=>':required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));	
						echo $this->Form->input('idioma_id',array('label'=>'Idioma','class'=>':required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('numero_paginas',array('label'=>'Número de Páginas','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('categoria_id',array('label'=>'Categoria','class'=>':required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('subcategoria_id',array('label'=>'Subcategoria','class'=>':required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('estado',array('label'=>'Estado','options'=>array('borrador'=>'Borrador','publicado'=>'Publicado'),'div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						//echo $this->Form->input('etiquetas',array('label'=>'Tags','class'=>':required span7','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('archivo',array('label'=>'Archivo','type'=>'file','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('archivo_imagen',array('label'=>'Imagen','type'=>'file','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('descripcion',array('label'=>'Descripción','id'=>'editor','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->end();
					?>
			</div>
		</div>
	</div>
</div>
<script>
	function archivo_add(){
		document.form1.submit();
		alert("Guardando...");
	}
	function limpiar(){
		document.form1.reset();
	}
</script>
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
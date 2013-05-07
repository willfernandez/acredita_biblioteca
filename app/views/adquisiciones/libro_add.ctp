<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link('Adquisiciones','/adquisiciones');?> <span class="divider">/</span></li>
    <li class="active">Agregar libro</li>
</ul>
<div class="row">
	<div class="span1">
		<div class="button_window">
			<form>
				<button class="btn btn-info" onclick="libro_add();">
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
			<form action="<?php echo $this->Html->url(array('controller'=>'adquisiciones','action'=>'libro_index'));?>">
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
			<h4 class="box-header round-top">Agregar Libro</h4>
			<div class="box-content">
				<?php echo $this->Form->create('Texto',array('url'=>'/adquisiciones/libro_add','class'=>'form-horizontal','type'=>'file','name'=>'form1'));?>
					<?php
						echo $this->Form->input('titulo',array('label'=>'Titulo','class'=>':required span8','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>')); 
						echo $this->Form->input('autor',array('label'=>'Autor(es)','class'=>'span8','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('editorial_id',array('label'=>'Editorial','class'=>':required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));	
						echo $this->Form->input('idioma_id',array('label'=>'Idioma','class'=>':required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('subcategoria_id',array('label'=>'Categoria','class'=>':required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('edicion',array('label'=>'Edición','class'=>':required span2','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('etiquetas',array('label'=>'Tags','class'=>':required span7','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('archivo',array('label'=>'Imagen','type'=>'file','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('descripcion',array('label'=>'Descripción','id'=>'editor','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->end();
					?>
			</div>
		</div>
	</div>
</div>
<script>
	function libro_add(){
		document.form1.submit();
		alert("Guardando...");
	}
	function limpiar(){
		document.form1.reset();
	}
</script>
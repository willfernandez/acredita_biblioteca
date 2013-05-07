<div>
    <ul class="breadcrumb">
        <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
		<li><?php echo $this->Html->link('Configuración','/configuracion');?> <span class="divider">/</span></li>
        <li><?php echo $this->Html->link('Categorias','/configuracion/categorias');?> <span class="divider">/</span></li>
        <li class="active">Agregar</li>
    </ul>
</div>
	
<div class="row-fluid">
	<div id="col0" class="span12 column ui-sortable">
		<div class="box">
			<h4 class="box-header round-top">
				Gestión de Categorias
			</h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<?php echo $this->Form->create('Categoria',array('url'=>'/configuracion/categoria_add','class'=>'form-horizontal'));?>
					<?php
						echo $this->Form->input('nombre_cat',array('label'=>'Categoria','class'=>':required span6','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>')); 
						echo $this->Form->input('descripcion',array('label'=>'Descripción','id'=>'editor','class'=>'span6','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
	
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
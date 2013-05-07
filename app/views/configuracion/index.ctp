<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
    <li class="active">Configuración</li>
</ul>
<div class="row">
	<div class="span1">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'usuarios','action'=>'index'));?>">
				<button class="btn btn-success">
					<i class="icon-book icon-white"></i><br />
					Usuarios
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'configuracion','action'=>'categorias'));?>">
				<button class="btn btn-warning">
					<i class="icon-list-alt icon-white"></i><br />
					Categorías
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'configuracion','action'=>'subcategorias'));?>">
				<button class="btn btn-primary">
					<i class="icon-list-alt icon-white"></i><br />
					Subcategorías
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'configuracion','action'=>'editoriales'));?>">
				<button class="btn btn-danger">
					<i class="icon-list-alt icon-white"></i><br />
					Editoriales
				</button>
			</form>
		</div>
	</div>

</div><!-- /row -->
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Módulo de Configuración</h4>
			<div class="box-content">
				<i>Ninguna descripción disponible.<i>
			</div>
		</div>
	</div>
</div>
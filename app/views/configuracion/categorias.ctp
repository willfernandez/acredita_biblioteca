<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link('configuración','/configuracion');?> <span class="divider">/</span></li>
    <li class="active">Categoria</li>
</ul>
<div class="row">
	<div class="span1">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'configuracion','action'=>'categoria_add'));?>">
				<button class="btn btn-info">
					<i class="icon-plus icon-white"></i><br />
					Agregar
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form method="post" class="FormularioEnviar" action="<?php echo $this->Html->url(array('controller'=>'usuarios','action'=>'editar'));?>"> 
				<input type="hidden" name="UsuarioIdValue" id="UsuarioIdEditar" />
				<button class="btn btn-success">
					<i class="icon-pencil icon-white"></i><br />
					Editar
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form method="post" class="FormularioEnviar" action="<?php echo $this->Html->url(array('controller'=>'usuarios','action'=>'eliminar'));?>"> 
				<input type="hidden" name="UsuarioIdValue" id="UsuarioIdEliminar" />
				<button class="btn btn-danger">
					<i class="icon-trash icon-white"></i><br />
					Eliminar
				</button>
			</form>
		</div>
	</div>
</div>
		 
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Categorías</h4>
			<div class="box-content">
				<table id="datatable" class="table table-striped table-bordered bootstrap-datatable dataTable" cellspacing="0" cellpadding="0" border="0" aria-describedby="datatable_info">
					<thead>
						<th style="text-align:center"><input type="checkbox" disabled=""/></th>
						<th>Id</th>
						<th>Categoria</th>
						<th>Descripción</th>
					</thead> 
					<tbody>
						<?php foreach ($categorias as $categoria):?>
						<tr>
							<td style="text-align:center"><input type="checkbox" name="UsuarioId[]" value="<?php echo $categoria['Categoria']['id']; ?>"/></td>
							<td><?php echo $categoria['Categoria']['id']; ?></td>
							<td><?php echo $categoria['Categoria']['nombre_cat']; ?></td>
							<td><?php echo $categoria['Categoria']['descripcion']; ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /box-content -->
		</div>
	</div>
</div>
<script>
	jQuery.fn.getCheckboxValues = function(){
		var values = [];
		var i = 0;
		this.each(function(){
			values[i++] = $(this).val();
		});
				return values;
		} 
			
		$(document).ready(function(){	
			$(".FormularioEnviar").submit(function () {
				var arr = $("input:checked").getCheckboxValues();
				$("#UsuarioIdEditar").attr('value', arr[0]);
				$("#UsuarioIdEliminar").attr('value', arr[0]);
			});
		});
</script>
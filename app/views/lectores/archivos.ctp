<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','/lectores');?> <span class="divider">/</span></li>
    <li class="active">Archivos</li>
</ul>
<div class="row">
	<div class="span1">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'lectores','action'=>'add_archivo'));?>">
				<button class="btn btn-info">
					<i class="icon-plus icon-white"></i><br />
					Agregar
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form method="post" class="FormularioEnviar" action="<?php echo $this->Html->url(array('controller'=>'lectores','action'=>'edit_archivo'));?>"> 
				<input type="hidden" name="TextoIdValue" id="TextoIdEditar" />
				<button class="btn btn-success">
					<i class="icon-pencil icon-white"></i><br />
					Editar
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form method="post" class="FormularioEnviar" action="<?php echo $this->Html->url(array('controller'=>'lectores','action'=>'delete_archivo'));?>"> 
				<input type="hidden" name="TextoIdValue" id="TextoIdEliminar" />
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
			<h4 class="box-header round-top">Textos</h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<table id="datatable" class="table table-striped table-bordered bootstrap-datatable dataTable" cellspacing="0" cellpadding="0" border="0" aria-describedby="datatable_info">
						<thead>
							<th style="text-align:center"><input type="checkbox" disabled=""/></th>
							<th>Titulo</th>
							<th>Autor</th>
							<th>Estado</th>
							<th>Fecha</th>
						</thead> 
						<tbody>
							<?php foreach ($textos as $texto):?>
							<tr>
								<td style="text-align:center"><input type="checkbox" name="TextoId[]" value="<?php echo $texto['Texto']['id']; ?>"/></td>
								<td><?php echo $texto['Texto']['titulo']; ?></td>
								<td><?php echo $texto['Texto']['autor']; ?></td>
								<td><?php if($texto['Texto']['estado']=='borrador'): 
											echo '<span class="label label-warning">'.$texto['Texto']['estado'] .'</span>'; 
										  else:
											echo '<span class="label label-success">'.$texto['Texto']['estado'] .'</span>'; 
										  endif;
									?>
									</span>
								</td>
								<td><?php echo $texto['Texto']['fecha_archivo']; ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
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
				$("#TextoIdEditar").attr('value', arr[0]);
				$("#TextoIdEliminar").attr('value', arr[0]);
			});
		});
</script>

<?php //print_r($textos)?>

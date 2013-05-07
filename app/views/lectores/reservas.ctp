<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','/lectores');?> <span class="divider">/</span></li>
    <li class="active">Mis reservas</li>
</ul>
<div class="row">
	<div class="span1">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'lectores','action'=>'catalogo'));?>">
				<button class="btn btn-info">
					<i class="icon-plus icon-white"></i><br />
					Agregar
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form method="post" class="FormularioEnviar" action="<?php echo $this->Html->url(array('controller'=>'lectores','action'=>'borrarficha'));?>"> 
				<input type="hidden" name="PrestamoIdValue" id="PrestamoIdEliminar" />
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
							<th>Código</th>
							<th>Titulo</th>
							<th>Autor</th>
							<th>Biblioteca</th>
							<th>Fecha reserva</th>
						</thead> 
						<tbody>
							<?php foreach ($reservas as $reserva):?>
							<tr>
								<td style="text-align:center"><input type="checkbox" name="PrestamoId[]" value="<?php echo $reserva['p']['id']; ?>"/></td>
								<td><?php echo $reserva['e']['codigo']; ?></td>
								<td><?php echo $reserva['t']['titulo']; ?></td>
								<td><?php echo $reserva['t']['autor']; ?></td>
								<td><?php echo $reserva['b']['nombre_biblioteca']; ?></td>
								<td><?php echo $reserva['p']['fecha_reserva']; ?></td>
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
				$("#PrestamoIdEliminar").attr('value', arr[0]);
			});
		});
</script>

<?php //print_r($reservas);?>

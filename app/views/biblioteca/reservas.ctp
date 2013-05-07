<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link('Circulación','/biblioteca/circulacion');?> <span class="divider">/</span></li>
    <li class="active">Reservas</li>
</ul>
<div class="row">
	<div class="span1">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'biblioteca','action'=>'circulacion'));?>">
				<button class="btn btn-info">
					<i class="icon-plus icon-white"></i><br />
					Detalles
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form method="post" class="FormularioEnviar" action="<?php echo $this->Html->url(array('controller'=>'biblioteca','action'=>'edit_reserva'));?>"> 
				<input type="hidden" name="ReservaIdValue" id="ReservaIdEditar" />
				<button class="btn btn-success">
					<i class="icon-pencil icon-white"></i><br />
					Aprobar
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form method="post" class="FormularioEnviar" action="<?php echo $this->Html->url(array('controller'=>'biblioteca','action'=>'delete_reserva'));?>"> 
				<input type="hidden" name="ReservaIdValue" id="ReservaIdEliminar" />
				<button class="btn btn-danger">
					<i class="icon-trash icon-white"></i><br />
					Eliminar
				</button>
			</form>
		</div>
	</div>
</div>

<?php if(!empty($reservas)):?>
<?php foreach($reservas as $reserva):?>
<?php if(!empty($reserva[0]['b']['nombre_biblioteca'])):?>
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top"><?php echo $reserva[0]['b']['nombre_biblioteca'];?></h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<table id="datatable" class="table table-striped table-bordered bootstrap-datatable dataTable" cellspacing="0" cellpadding="0" border="0" aria-describedby="datatable_info">
						<thead>
							<th style="text-align:center"><input type="checkbox" disabled=""/></th>
							<th>Lector</th>
							<th>Código</th>
							<th>Titulo</th>
							<th>Autor</th>
							<th>Fecha reserva</th>
						</thead> 
						<tbody>
							<?php foreach ($reserva as $reservado):?>
							<tr>
								<td style="text-align:center"><input type="checkbox" name="ReservaId[]" value="<?php echo $reservado['p']['id']; ?>"/></td>
								<td><?php echo $reservado['le']['nombre_lector']; ?></td>
								<td><?php echo $reservado['e']['codigo']; ?></td>
								<td><?php echo $reservado['t']['titulo']; ?></td>
								<td><?php echo $reservado['t']['autor']; ?></td>
								<td><span class="label label-warning"><?php echo $reservado['p']['fecha_reserva']; ?></span></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php endif;?>
<?php endforeach;?>
<?php else:?>
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Reservas</h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<i>Ninguna reserva.</i>
				</div>
			</div>
		</div>
	</div>
</div>
			
<?php endif;?>
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
				$("#ReservaIdEditar").attr('value', arr[0]);
				$("#ReservaIdEliminar").attr('value', arr[0]);
			});
		});
</script>

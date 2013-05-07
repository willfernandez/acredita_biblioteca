<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link('Circulación','/biblioteca/circulacion');?> <span class="divider">/</span></li>
    <li class="active">Devoluciones</li>
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
			<form method="post" class="FormularioEnviar" action="<?php echo $this->Html->url(array('controller'=>'biblioteca','action'=>'devolver'));?>"> 
				<input type="hidden" name="PrestamoIdValue" id="PrestamoIdEditar" />
				<button class="btn btn-danger">
					<i class="icon-retweet icon-white"></i><br />
					Devolver
				</button>
			</form>
		</div>
	</div>
</div>	
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Préstamos</h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<table id="datatable" class="table table-striped table-bordered bootstrap-datatable dataTable" cellspacing="0" cellpadding="0" border="0" aria-describedby="datatable_info">
						<thead>
							<th style="text-align:center"><input type="checkbox" disabled=""/></th>
							<th>Código</th>
							<th>Titulo</th>
							<th>Lector</th>
							<th>Fecha entrega</th>
							<th>Atraso</th>
							<th>Fecha préstamo</th>
						</thead> 
						<tbody>
							<?php foreach ($prestamos as $prestamo):?>
							<tr>
								<td style="text-align:center"><input type="checkbox" name="PrestamoId[]" value="<?php echo $prestamo['p']['id']; ?>"/></td>
								<td><?php echo $prestamo['e']['codigo']; ?></td>
								<td><?php echo $prestamo['t']['titulo']; ?></td>
								<td><?php echo $prestamo['le']['nombre_lector']; ?></td>
								<td><?php echo $prestamo['p']['fecha_entrega']; ?></td>
								<td><?php echo $prestamo['p']['atraso']; ?></td>
								<td>
									<?php if($prestamo['p']['atraso'] > 0):?>
										<span class="label label-important"><?php echo $prestamo['p']['fecha_prestamo']; ?></span>
									<?php else:?>
										<span class="label label-success"><?php echo $prestamo['p']['fecha_prestamo']; ?></span>
									<?php endif;?>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Devoluciones del material bibliográfico</h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<table id="datatable" class="table table-striped table-bordered bootstrap-datatable dataTable" cellspacing="0" cellpadding="0" border="0" aria-describedby="datatable_info">
						<thead>
							<th>Código</th>
							<th>Titulo</th>
							<th>Lector</th>
							<th>Biblioteca</th>
							<th>Fecha devolución</th>
						</thead> 
						<tbody>
							<?php foreach ($devoluciones as $devolucione):?>
							<tr>
								<td><?php echo $devolucione['e']['codigo']; ?></td>
								<td><?php echo $devolucione['t']['titulo']; ?></td>
								<td><?php echo $devolucione['le']['nombre_lector']; ?></td>
								<td><?php echo $devolucione['b']['nombre_biblioteca']; ?></td>
								<td><span class="label label-success"><?php echo $devolucione['p']['fecha_devolucion']; ?></span></td>
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
				$("#PrestamoIdEditar").attr('value', arr[0]);
			});
		});
</script>
<?php //print_r($reservas)?>

<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','/lectores');?> <span class="divider">/</span></li>
    <li class="active">Mis Sanciones</li>
</ul>

<div class="row">
	<div class="span1" id="window">
		<div class="button_window">
			<form method="post" class="FormularioEnviar" action="<?php echo $this->Html->url(array('controller'=>'lectores','action'=>'edit_archivo'));?>"> 
				<input type="hidden" name="TextoIdValue" id="TextoIdEditar" />
				<button class="btn btn-info">
					<i class="icon-plus-sign icon-white"></i><br />
					Detalle
				</button>
			</form>
		</div>
	</div>
	<div class="span1">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'lectores','action'=>'bitacora'));?>">
				<button class="btn btn-success">
					<i class="icon-th-list icon-white"></i><br />
					Mis Préstamos
				</button>
			</form>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Mis Sanciones</h4>
				<div class="box-container-toggle">
					<div class="box-content">
						<table id="datatable" class="table table-striped table-bordered bootstrap-datatable dataTable" cellspacing="0" cellpadding="0" border="0" aria-describedby="datatable_info">
							<thead> 
								<th style="text-align:center"><input type="checkbox" disabled="" /></th>
								<th>Ejemplar</th>
								<th>Titulo</th>
								<th>Fecha Pedido</th>
								<th>Fecha Entrega</th>
								<th>Fecha Devolución</th>
								<th>Sansion</th>
								<th>Costo</th>
							</thead> 
							<tbody>
								<?php $total=0; foreach ($sanciones as $texto):?>
								<tr>
									<td style="text-align:center"><input type="checkbox" name="TextoId[]" value="<?php echo $texto['e']['id']; ?>"/></td>
									<td><?php echo $texto['e']['codigo']; ?></td>
									<td><?php echo $texto['t']['titulo']; ?></td>
									<td><?php echo $texto['p']['fecha_prestamo']; ?></td>
									<td><?php echo $texto['p']['fecha_entrega']; ?></td>
									<td><?php echo $texto['p']['fecha_devolucion']; ?></td>
									<td><?php echo '<span class="label label-info">'.$texto['s']['nombre_sancion'].'</span>'; ?></td>
									<td><?php echo $texto['s']['costo']; ?></td>
								</tr>
									<?php $total = $total + $texto['s']['costo']; endforeach; ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="6"><strong>TOTAL</strong></td>
									<td colspan="3"><?php echo '<span class="label label-important">S/.'.$total.'</span>'; ?></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
		</div>
	</div>
</div>
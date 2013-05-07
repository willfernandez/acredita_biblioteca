<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','/lectores');?> <span class="divider">/</span></li>
    <li class="active">Mi bitácora</li>
</ul>

<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Textos</h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<table id="datatable" class="table table-striped table-bordered bootstrap-datatable dataTable" cellspacing="0" cellpadding="0" border="0" aria-describedby="datatable_info">
						<thead>
							<th>#</th>
							<th>Biblioteca</th>
                            <th>Texto</th>
                            <th>Fecha reserva</th>
                            <th>Fecha préstamo</th>
                            <th>Fecha entrega</th>
                            <th>Fecha devolución</th>
                            <th>Estado</th>
						</thead> 
						<tbody>
							<?php $i=1;?>
							<?php foreach ($prestamos as $prestamo):?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $prestamo['Ejemplare']['Biblioteca']['nombre_biblioteca']; ?></td>
								<td><?php echo $prestamo['Ejemplare']['Texto']['titulo']; ?></td>
								<td><?php echo $prestamo['Prestamo']['fecha_reserva']; ?></td>
								<td><?php echo $prestamo['Prestamo']['fecha_prestamo']; ?></td>
								<td><?php echo $prestamo['Prestamo']['fecha_entrega']; ?></td>
								<td><?php echo $prestamo['Prestamo']['fecha_devolucion']; ?></td>
								<td>
									<?php switch ($prestamo['Prestamo']['estado']) {
											case 0:
													echo '<span class="label label-warning">Pendiente</span>';
													break;
											case 1:
													echo '<span class="label label-success">Devuelto</span>';
													break;
											case 2:
													echo '<span class="label label-info">Entregado</span>';
													break;
											}
									?>
								</td>
							</tr>
							<?php $i=$i+1;?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


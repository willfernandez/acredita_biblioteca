<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
    <li class="active">Sancionados</li>
</ul>

<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Lectores deudores de libros</h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<table id="datatable" class="table table-striped table-bordered bootstrap-datatable dataTable" cellspacing="0" cellpadding="0" border="0" aria-describedby="datatable_info">
						<thead>
							<th>Código</th>
							<th>Titulo</th>
							<th>Lector</th>
							<th>Atraso</th>
							<th>Sanción</th>
							<th>Costo</th>
						</thead> 
						<tbody>
							<?php foreach ($sancionados as $sancionado):?>
							<tr>
								<td><?php echo $sancionado['e']['codigo']; ?></td>
								<td><?php echo $sancionado['t']['titulo']; ?></td>
								<td><?php echo $sancionado['le']['nombre_lector']; ?></td>
								<td><?php echo $sancionado['p']['atraso']; ?></td>
								<td><?php switch($sancionado['s']['grado']){
										case 'Leve':
													echo '<span class="label label-warning">'.$sancionado['s']['grado'].'</span>';
													break;
										case 'Mediano':
													echo '<span class="label label-warning">'.$sancionado['s']['grado'] .'</span>';
													break;
										case 'Grave':
													echo '<span class="label label-important">'.$sancionado['s']['grado'] .'</span>';
													break;
									}
									?>
									
								</td>
								<td><?php echo $sancionado['s']['costo']; ?></td>
								
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php //print_r($sancionados)?>

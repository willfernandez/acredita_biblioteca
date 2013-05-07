<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link('adquisiciones','/adquisiciones');?> <span class="divider">/</span></li>
    <li class="active">Detalle</li>
</ul>
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Material Bibliográfico</h4>
			<div class="box-content">
				<div class="span3">
					<div class="detalle-imagen">
						<?php if($texto['Texto']['imagen']!=''):?>
							<?php
								$ruta = 'imagenes/'.$texto['Texto']['imagen'].'';
								echo $this->Html->image($ruta);
							?>
						<?php else:?>
							<?php
								$ruta = 'imagenes/default.jpg';
								echo $this->Html->image($ruta);
							?>	
						<?php endif;?>
					</div>
				</div>
				<div class="span9">
					<div class="detalle-contenido">
						<table class="table">
							<tr>
								<td class="title">Título</td>
								<td colspan="5"><?php echo $texto['Texto']['titulo']; ?></td>
							</tr>
							<tr>
								<td class="title">Autor</td>
								<td colspan="5"><?php echo $texto['Texto']['autor'] ?></td>
							</tr>
							<tr>
								<td class="title">Editorial</td>
								<td colspan="5"><?php echo $texto['Editorial']['nombre_editorial'] ?></td>
							</tr>
							<tr>
								<td class="title">Idioma</td>
								<td width="100px"><?php echo $texto['Idioma']['idioma'] ?></td>
								<td class="title">Tomo</td>
								<td class="center"><?php echo $texto['Texto']['tomos'] ?></td>
								<td class="title">Volumen</td>
								<td class="center"><?php echo $texto['Texto']['volumenes'] ?></td>
							</tr>
							<tr>
								<td class="title">Cantidad</td>
								<td class="center"><?php echo $texto['Texto']['cantidad_total'] ?></td>
								<td class="title">Disponibles</td>
								<td class="center"><?php echo $texto['Texto']['tomos'] ?></td>
								<td class="title">Reservados</td>
								<td class="center"><?php echo $texto['Texto']['cantidad_total'] ?></td>
							</tr>
						</table>
					</div>	
				</div>
			</div><!-- /box-content -->
		</div>
	</div>
</div>
	<?php // print_r($texto);?>
	<?php // print_r($ejemplares);?>
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Ejemplares</h4>
			<div class="box-content">
				<table id="datatable" class="table table-striped table-bordered bootstrap-datatable dataTable" cellspacing="0" cellpadding="0" border="0" aria-describedby="datatable_info">
					<thead>
						<th>Código</th>
						<th>Biblioteca</th>
						<th>Estado</th>
						</thead> 
						<tbody>
						<?php foreach ($ejemplares as $ejemplar):?>
						<tr>
							<td><?php echo $ejemplar['Ejemplare']['codigo']; ?></td>
							<td><?php echo $ejemplar['Biblioteca']['nombre_biblioteca']; ?></td>
							<td><?php echo $ejemplar['Ejemplare']['estado']; ?></td>
						</tr>
						<?php endforeach; ?>
						</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<h1>Catálogo en línea</h1>
<div id="detalle-libro">
	<div class="row">
		<div class="span3">
			<div class="detalle-imagen">
				<?php if(!empty($texto['Texto']['imagen'])):?>
						<?php echo $this->Html->image('imagenes/'.$texto['Texto']['imagen']);?>
				<?php else:?>
						<?php echo $this->Html->image('imagenes/imagen-no-disponible.jpg')?>
				<?php endif;?>
			</div>
		</div>
		<div class="span5">
			<div class="detalle-contenido" style="padding-top:6px">
				<table class="table">
					<tr>
						<td class="title">Título</td>
						<td colspan="4"><?php echo $texto['Texto']['titulo'] ?></td>
					</tr>
					<tr>
						<td class="title">Autor</td>
						<td colspan="4"><?php echo $texto['Texto']['autor'] ?></td>
					</tr>
					<tr>
						<td class="title">Editorial</td>
						<td colspan="4"><?php echo $texto['Editorial']['nombre_editorial'] ?></td>
					</tr>
					<tr>
						<td class="title">Idioma</td>
						<td><?php echo $texto['Idioma']['idioma'] ?></td>
						<td class="title">Tomo</td>
						<td><?php echo $texto['Texto']['tomos'] ?></td>
						<td class="title">Volumen</td>
						<td><?php echo $texto['Texto']['volumenes'] ?></td>
					</tr>
					<tr>
						<td class="title">Cantidad</td>
						<td><?php echo $texto['Texto']['cantidad_total'] ?></td>
						<td class="title">Disponibles</td>
						<td><?php echo $texto['Texto']['tomos'] ?></td>
						<td class="title">Reservados</td>
						<td><?php echo $texto['Texto']['cantidad_total'] ?></td>
					</tr>
				</table>
			</div><!-- /detalle-contenido -->
			<div class="descripcion">
				<h3>Descripción</h3>
			</div>
				<div class="descripcion">
						<?php if(!empty($texto['Texto']['descripcion'])):
								echo $texto['Texto']['descripcion'];
							  else:
								echo '<i>Ninguna descripción disponible.</i>';
							  endif;
						?>
				</div>
		
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<div class="box">
			
				<table id="datatable" class="table table-striped table-bordered">
					<thead>
						<th>Código</th>
						<th>Biblioteca</th>
						
					</thead> 
					<tbody>
						<?php foreach ($ejemplares as $ejemplar):?>
						<tr>
							<td><?php echo $ejemplar['Ejemplare']['codigo']; ?></td>
							<td><?php echo $ejemplar['Biblioteca']['nombre_biblioteca']; ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			
		</div>
	</div>
</div>



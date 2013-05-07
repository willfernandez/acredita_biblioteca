<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','/lectores');?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link('Catálogo','/lectores/catalogo');?> <span class="divider">/</span></li>
    
</ul>
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Información Bibliográfica</h4>
			<div class="box-content">
				<div class="span4">
					<div class="detalle-imagen">
						<?php if(!empty($texto['Texto']['imagen'])):?>
							<?php echo $this->Html->image('imagenes/'.$texto['Texto']['imagen']);?>
						<?php else:?>
							<?php echo $this->Html->image('imagenes/imagen-no-disponible.jpg')?>
						<?php endif;?>
					</div>
				</div>
				<div class="span8">
					<div class="titulo">
						<h3><?php echo $texto['Texto']['titulo']; ?></h3>
					</div>
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
							<td><?php echo $texto['Texto']['cantidad_disp'] ?></td>
						</tr>
					</table>
					</div>
					<div class="titulo">
						<h3>Descripción</h3>
					</div>
					<div class="descripcion">
						<?php 	if(!empty($texto['Texto']['descripcion'])):
									echo $texto['Texto']['descripcion'];
								else:
									echo '<i>Ninguna descripción disponible.</i>';
								endif;
								
								if(!isset($ejemplares)):
									echo '<br /><br />';
									$archivo = $texto['Texto']['nombre_archivo'];
									echo $this->Html->link('Descargar',"/files/archivos/$archivo",array('class'=>'btn btn-success'));
								endif;	
						?>
					</div>
				</div>
			</div><!-- /box-content -->
		</div>
	</div>
</div>

<?php if(isset($ejemplares)):?>
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Ejemplares</h4>
			<div class="box-content">
				<table id="datatable" class="table table-striped table-bordered bootstrap-datatable dataTable" cellspacing="0" cellpadding="0" border="0" aria-describedby="datatable_info">
					<thead>
						<th>Código</th>
						<th>Biblioteca</th>
						<th>acciones</th>
					</thead> 
					<tbody>
						<?php foreach ($ejemplares as $ejemplar):?>
						<?php if($ejemplar['Ejemplare']['estado']!= 'No disponible'):?>
						<tr>
							<td><?php echo $ejemplar['Ejemplare']['codigo']; ?></td>
							<td><?php echo $ejemplar['Biblioteca']['nombre_biblioteca']; ?></td>
							<td><?php echo $this->Html->link('<i class="icon-thumbs-up icon-white"></i> Reservar','/lectores/crearficha/'.$ejemplar['Ejemplare']['id'],array('class'=>'btn btn-success','escape'=>false)); ?></td>
						</tr>
						<?php endif;?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php endif;?>

<?php //print_r($ejemplares);?>
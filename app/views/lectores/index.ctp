<ul class="breadcrumb">
    <li class="active"><strong>Bienvenido!</strong></li>
</ul>

<div class="row-fluid">
	<div class="span12">
		<!-- Elastislide Carousel -->
			<div id="carousel" class="es-carousel-wrapper">
				<div class="es-carousel">
					<ul>
						<?php foreach($textos as $texto):?>
							<li>
								<?php if(!empty($texto['Texto']['imagen'])):?>
									<?php echo $this->Html->link($this->Html->image('imagenes/'.$texto['Texto']['imagen'],array('alt'=>'Novedades')),array('action'=>'detalle',$texto['Texto']['id']),array('escape'=>false,'title'=>$texto['Texto']['titulo']));?>
								<?php else: //imagen por defecto?>
									<?php echo $this->Html->link($this->Html->image('imagenes/default.jpg',array('alt'=>'Novedades')),array('action'=>'detalle',$texto['Texto']['id']),array('escape'=>false,'title'=>$texto['Texto']['titulo']));?>
								<?php endif;?>
							</li>
						<?php endforeach;?>
					</ul>
				</div>
			</div>
			<!-- End Elastislide Carousel -->
	</div>
</div>
<br />
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Novedades</h4>
			<div class="box-content">
				<div class="portada">
					<h3>Últimas adquisiciones</h3>
				</div>
				<p>
					A continuación se muestran las ultimas publicaciones categorizadas por tipo de publicación, para poder reservar y prestar una publicación, puede acceder al catálogo.
				</p>
				<ul class="nav nav-tabs" id="myTab">
					<li class="active"><a href="#libros">Libros</a></li>
					<li><a href="#tesis">Tesis</a></li>
					<li><a href="#revistas">Revistas</a></li>
					<li><a href="#informes">Informes</a></li>
				</ul>
				<div class="tab-content">
	
					<div class="tab-pane active" id="libros">
						<?php if(!empty($libros)):?>
						<table class="table table-striped">
							<thead> 
								<th>Id</th>
								<th>Título</th>
								<th>Autor</th>
								<th>Año de Publicación</th>
							</thead> 
							<tbody>
								<?php foreach ($libros as $libro):?>
								<tr>
									<td><?php echo $libro['Texto']['id']; ?></td>
									<td><?php echo $libro['Texto']['titulo']; ?></td>
									<td><?php echo $libro['Texto']['autor']; ?></td>
									<td><?php echo $libro['Texto']['anio_publicacion']; ?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<?php else: ?>
							<p><i>Ninguna descripción disponible.</i></p>
						<?php endif;?>
					</div>
					<div class="tab-pane" id="tesis">
						<?php if(!empty($tesis)): ?>
						<table class="table table-striped">
							<thead> 
								<th>Id</th>
								<th>Título</th>
								<th>Autor</th>
								<th>Año de Publicación</th>
							</thead> 
							<tbody>
								<?php foreach ($tesis as $tesi):?>
								<tr>
									<td><?php echo $tesi['Texto']['id']; ?></td>
									<td><?php echo $tesi['Texto']['titulo']; ?></td>
									<td><?php echo $tesi['Texto']['autor']; ?></td>
									<td><?php echo $tesi['Texto']['anio_publicacion']; ?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<?php else: ?>
							<p><i>Ninguna descripción disponible.</i></p>
						<?php endif;?>
					</div>
					<div class="tab-pane" id="revistas">
						<?php if(!empty($revistas)):?>
						<table class="table table-striped">
							<thead> 
								<th>Id</th>
								<th>Título</th>
								<th>Autor</th>
								<th>Año de Publicación</th>
							</thead> 
							<tbody>
								<?php foreach ($revistas as $revista):?>
								<tr>
									<td><?php echo $revista['Texto']['id']; ?></td>
									<td><?php echo $revista['Texto']['titulo']; ?></td>
									<td><?php echo $revista['Texto']['autor']; ?></td>
									<td><?php echo $revista['Texto']['anio_publicacion']; ?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<?php else: ?>
							<p><i>Ninguna descripción disponible.</i></p>
						<?php endif;?>
					</div>
					<div class="tab-pane" id="informes">
						<?php if(!empty($informes)):?>
						<table class="table table-striped">
							<thead> 
								<th>Id</th>
								<th>Título</th>
								<th>Autor</th>
								<th>Año de Publicación</th>
							</thead> 
							<tbody>
								<?php foreach ($informes as $informe):?>
								<tr>
									<td><?php echo $informe['Texto']['id']; ?></td>
									<td><?php echo $informe['Texto']['titulo']; ?></td>
									<td><?php echo $informe['Texto']['autor']; ?></td>
									<td><?php echo $informe['Texto']['anio_publicacion']; ?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<?php else: ?>
							<p><i>Ninguna descripción disponible.</i></p>
						<?php endif;?>
					</div>
				</div>
			</div><!-- /box-content -->
		</div>
	</div>
</div>

<?php if(!empty($masprestados[0]['t']['titulo'])):?>
<div class="row-fluid">
	<div class="span4 column ui-sortable">
		<div class="box">
			<h4 class="box-header round-top">Mis libros más prestados</h4>	
			<div class="box-container-toggle">
                <div class="box-content">
				<ul class="dashboard-member-activity">
                    <?php foreach($masprestados as $ultimos): ?>
                    <li>
						<a href=<?php echo "'../../textos/ver_texto/".$ultimos['t']['id']."'"?> >
							<img src=<?php echo "'".$ultimos['t']['imagen']."'";?> class="dashboard-member-activity-avatar"/>
						</a>
							<strong>Titulo:</strong> <a href=<?php echo "'?ejemplar=".$ultimos['p']['ejemplare_id']."'"?>><?php echo $ultimos['t']['titulo'];?></a><br />
							<strong>Autor:</strong> <?php echo $ultimos['t']['autor'];?><br />
							<strong>Fecha:</strong> <?php echo $ultimos['p']['fecha_prestamo'];?><br />
							<strong>Veces:</strong> <?php echo '<span class="label label-warning">'.$ultimos['0']['suma'].'</span>';?><br />
                    </li>
                    <?php endforeach;?>
                </ul>
				</div>
			</div> 
		</div>
	</div>
</div>
<?php endif;?>

<script type="text/javascript">
	$('#carousel').elastislide({
		imageW 	: 180,
		minItems	: 5
	});
	
	$('#myTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
    })
</script>

<?php //print_r($libros)?>
				
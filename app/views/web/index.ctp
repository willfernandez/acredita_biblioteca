<div class="row-fluid">
	<div class="span12">
		<div class="portada">
			<h3>Top de Novedades</h3>
		</div>
		<!-- Elastislide Carousel -->
			<div id="carousel" class="es-carousel-wrapper">
				<div class="es-carousel">
					<ul>
						<?php foreach($textos as $texto):?>
							<li>
								<?php if(!empty($texto['Texto']['imagen'])):?>
									<?php echo $this->Html->link($this->Html->image('imagenes/'.$texto['Texto']['imagen'],array('alt'=>'Novedades')),array('controller'=>'catalogo','action'=>'detalle',$texto['Texto']['id']),array('escape'=>false,'title'=>$texto['Texto']['titulo']));?>
								<?php else: //imagen por defecto?>
									<?php echo $this->Html->link($this->Html->image('imagenes/default.jpg',array('alt'=>'Novedades')),array('controller'=>'catalogo','action'=>'detalle',$texto['Texto']['id']),array('escape'=>false,'title'=>$texto['Texto']['titulo']));?>
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
		<div class="span6"> 
			<div class="portada">
				<h3>Últimas noticias</h3>
			</div>
			<a>Tesis que llegan a la hemeroteca</a> <br/>
				Publicado el 2010-04-06

		</div>
		<div class="span6"> 
			<div class="portada">
				<h3>Últimos eventos</h3>
			</div>
			No se encontraron eventos registradas
		</div>
	</div>
</div>
<br />
<div class="row-fluid">
	<div class="span12">
		<div class="portada">
			<h3>Ultimas galerías de imágenes</h3>
		</div>
	</div>
</div>
<br />
<div class="row-fluid">
	<div class="span12">
		<div class="box">
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
					<?php setlocale(LC_TIME, "spanish");?>
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
				
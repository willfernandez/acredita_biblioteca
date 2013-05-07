<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
    <li class="active">Adquisiciones</li>
</ul>
<div class="row">
	<div class="span1">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'adquisiciones','action'=>'libro_add'));?>">
				<button class="btn btn-success">
					<i class="icon-book icon-white"></i><br />
					Libros
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'adquisiciones','action'=>'informe_add'));?>">
				<button class="btn btn-warning">
					<i class="icon-list-alt icon-white"></i><br />
					Informes
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'adquisiciones','action'=>'revista_add'));?>">
				<button class="btn btn-primary">
					<i class="icon-list-alt icon-white"></i><br />
					Revistas
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'adquisiciones','action'=>'tesis_add'));?>">
				<button class="btn btn-danger">
					<i class="icon-list-alt icon-white"></i><br />
					Tesis
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'adquisiciones','action'=>'archivo_add'));?>">
				<button class="btn btn-inverse">
					<i class="icon-list-alt icon-white"></i><br />
					Archivos
				</button>
			</form>
		</div>
	</div>
</div><!-- /row -->
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Últimas Aquisiciones</h4>
			<div class="box-content">
				<table class="table table-striped table-bordered dataTable">
					<thead>
						<th>Código</th>
						<th>Título</th>
						<th>Categoria</th>
						<th>Fecha Aquisición</th>
						</thead> 
						<tbody>
						<?php foreach ($ejemplares as $ejemplar):?>
						<tr>
							<td><?php echo $ejemplar['Ejemplare']['codigo'];?></td>
							<td><?php echo $this->Html->link($ejemplar['Texto']['titulo'],array('action'=>'detalle',$ejemplar['Ejemplare']['texto_id'])); ?></td>
							<td><?php echo $ejemplar['Categoria']['nombre_cat']; ?></td>
							<td><?php echo $ejemplar['Ejemplare']['fecha_adquisicion']; ?></td>
						</tr>
						<?php endforeach; ?>
						</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Últimas Aquisiciones: Archivos digitales</h4>
			<div class="box-content">
				<table class="table table-striped table-bordered dataTable">
					<thead>
						<th>Título</th>
						<th>Subido por</th>
						<th>Categoria</th>
						<th>Fecha</th>
					</thead> 
					<tbody>
					<?php foreach ($textos as $texto):?>
					<tr>
						<td><?php echo $texto['Texto']['titulo']; ?></td>
						<td><?php if(!empty($texto['Usuario']['nombres'])): 
									echo $texto['Usuario']['nombres'].' '.$texto['Usuario']['apellidos'];
								else:
									echo $texto['Lectore']['nombre_lector'];
								endif;
							?>
						</td>
						<td><?php echo $texto['Categoria']['nombre_cat']; ?></td>
						<td><?php echo $texto['Texto']['fecha_archivo']; ?></td>
					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
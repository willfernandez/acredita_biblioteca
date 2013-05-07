<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','/lectores');?> <span class="divider">/</span></li>
    <li class="active">Catálogo</li>
</ul>
<div class="row">
	<?php foreach($categorias as $categoria):?>
	<div class="span1"  id="window">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'lectores','action'=>'categoria',$categoria['Categoria']['id']));?>">
				<button class="btn <?php if(isset($categoria['Categoria']['button'])): echo $categoria['Categoria']['button']; else:?>btn-success<?php endif;?>">
					<i class="<?php if(isset($categoria['Categoria']['icono'])): echo $categoria['Categoria']['icono']; else:?>icon-list-alt<?php endif;?> icon-white"></i><br />
					<?php echo $categoria['Categoria']['nombre_cat'];?>
				</button>
			</form>
		</div>
	</div>
	<?php endforeach;?>
</div><!-- /row -->
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Material Bibliográfico</h4>
			<div class="box-content">
				<table id="datatable" class="table table-striped table-bordered bootstrap-datatable dataTable" cellspacing="0" cellpadding="0" border="0" aria-describedby="datatable_info">
					<thead>
						<th>Id</th>
						<th>Título</th>
						<th>Autor</th>
						<th>Idioma</th>
						</thead> 
						<tbody>
						<?php foreach ($textos as $texto):?>
						<tr>
							<td><?php echo $texto['Texto']['id']; ?></td>
							<td><?php echo $this->Html->link($texto['Texto']['titulo'],array('action'=>'detalle',$texto['Texto']['id'])); ?></td>
							<td><?php echo $texto['Texto']['autor']; ?></td>
							<td><?php echo $texto['Idioma']['idioma']; ?></td>
						</tr>
						<?php endforeach; ?>
						</tbody>
				</table>
			</div><!-- /box-content -->
		</div>
	</div>
</div>
<h1>Catálogo en línea</h1>
	<div id="search-box">
		<div class="row-fluid">
			<div class="span9">
				<div id="search">
					<?php echo $this->Form->create(false,array('url'=>'/catalogo/busqueda_general','class'=>'form-inline'));?>
					<label class="title_search">Búsqueda</label>
						<table style="width:100%;">
							<tr>
								<td width="100%"><input type="text" name="data[query]"/></td>
								<td align="right"><?php echo $this->Form->button('Buscar',array('class'=>'btn btn-success'));?></td>
							</tr>
						</table>
					<?php foreach($categorias as $categoria):?>
						<label class="radio inline">
							<input type="radio" name="data[categoria]" <?php if($categoria_seleccionada == $categoria['Categoria']['id']):?> checked <?php endif;?> value="<?php echo $categoria['Categoria']['id'];?>"><?php echo $categoria['Categoria']['nombre_cat'];?>
						</label>
					<?php endforeach;?>
					<?php echo $this->Form->end();?>
				</div>
			</div>
			<div class="span3">
				<?php echo $this->Html->image('web/search.jpg');?>
			</div>
		</div>
	</div><!-- /search-box -->
	<div id="search-resultado">
		<div class="subtitulo">
			<h2>Resultados de Búsqueda</h2>
			<small>Encontrados : <?php echo $total_resultado;?></small>
		</div>
		<table class="table table-striped resultados">
			<thead>
				<th>Código</th>
				<th>Título</th>
				<th>Autor</th>
				<th>Detalle</th>
			</thead>
			<tbody>
				<?php foreach($textos as $texto):?>
				<tr>
					<td><?php echo $texto['Texto']['id']; ?></td>
					<td><?php echo $texto['Texto']['titulo']; ?></td>
					<td><?php echo $texto['Texto']['autor']; ?></td>
					<td style="text-align:center">
						<?php echo $this->Html->link($this->Html->image('icons/ver_32.png',array('class'=>'icons')),'/catalogo/detalle/'.$texto['Texto']['id'],array('escape'=>false)); ?>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div><!-- /resultado-search -->		
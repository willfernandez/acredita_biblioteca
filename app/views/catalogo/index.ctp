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
					<?php $i=1;?>
					<?php foreach($categorias as $categoria):?>
						<label class="radio inline">
							<input type="radio" name="data[categoria]" <?php if($i==1):?> checked <?php endif;?> value="<?php echo $categoria['Categoria']['id'];?>"><?php echo $categoria['Categoria']['nombre_cat'];?>
						</label>
					<?php $i= $i+1;?>
					<?php endforeach;?>
					<?php echo $this->Form->end();?>
				</div>
			</div>
			<div class="span3">
				<?php echo $this->Html->image('web/search.jpg');?>
			</div>
		</div>
	</div>

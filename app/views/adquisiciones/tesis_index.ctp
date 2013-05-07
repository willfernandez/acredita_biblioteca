<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link('Adquisiciones','/adquisiciones');?> <span class="divider">/</span></li>
    <li class="active">Tesis</li>
</ul>
<div class="row">
	<div class="span1">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'adquisiciones','action'=>'tesis_add'));?>">
				<button class="btn btn-info">
					<i class="icon-plus icon-white"></i><br />
					Agregar
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form>
				<input type="hidden" name="UsuarioIdValue" id="TextoIdEditar" />
				<button class="btn btn-success">
					<i class="icon-pencil icon-white"></i><br />
					Editar
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form method="post" class="FormularioEnviar" action="<?php echo $this->Html->url(array('controller'=>'adquisiciones','action'=>'texto_delete'));?>"> 
				<input type="hidden" name="TextoIdValue" id="TextoIdEliminar" />
				<button class="btn btn-danger">
					<i class="icon-trash icon-white"></i><br />
					Eliminar
				</button>
			</form>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Material Bibliográfico: Tesis</h4>
			<div class="box-content">
				<table class="table table-striped table-bordered dataTable">
					<thead>
						<th style="text-align:center"><input type="checkbox"/></th>
						<th>Id</th>
						<th>Título</th>
						<th>Autor</th>
						
					</thead> 
					<tbody>
					<?php foreach ($textos as $texto):?>
					<tr>
						<td style="text-align:center"><input type="checkbox" name="TextoId[]" value="<?php echo $texto['Texto']['id']; ?>"/></td>
						<td><?php echo $texto['Texto']['id']; ?></td>
						<td><?php echo $this->Html->link($texto['Texto']['titulo'],array('action'=>'detalle',$texto['Texto']['id'])); ?></td>
						<td><?php echo $texto['Texto']['autor']; ?></td>
						
					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div><!-- /box -->
	</div>
</div><!-- /row-fluid -->
<script>
	jQuery.fn.getCheckboxValues = function(){
		var values = [];
		var i = 0;
		this.each(function(){
			values[i++] = $(this).val();
		});
				return values;
		} 
			
		$(document).ready(function(){	
			$(".FormularioEnviar").submit(function () {
				var arr = $("input:checked").getCheckboxValues();
				$("#TextoIdEjemplar").attr('value', arr[0]);
				$("#TextoIdEliminar").attr('value', arr[0]);
			});
		});
</script>
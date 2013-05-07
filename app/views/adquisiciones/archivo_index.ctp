<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link('Adquisiciones','/adquisiciones');?> <span class="divider">/</span></li>
    <li class="active">Archivos digitales</li>
</ul>
<div class="row">
	<div class="span1">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'adquisiciones','action'=>'archivo_add'));?>">
				<button class="btn btn-info">
					<i class="icon-plus icon-white"></i><br />
					Agregar
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form method="post" class="FormularioEnviar" action="<?php echo $this->Html->url(array('controller'=>'adquisiciones','action'=>'edit_archivo'));?>"> 
				<input type="hidden" name="TextoIdValue" id="TextoIdEditar" />
				<button class="btn btn-success">
					<i class="icon-pencil icon-white"></i><br />
					Editar
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form method="post" class="FormularioEnviar" action="<?php echo $this->Html->url(array('controller'=>'adquisiciones','action'=>'delete_archivo'));?>"> 
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
			<h4 class="box-header round-top">Material Bibliográfico: Archivos digitales</h4>
			<div class="box-content">
				<table class="table table-striped table-bordered dataTable">
					<thead>
						<th style="text-align:center"><input type="checkbox"/></th>
						<th>Título</th>
						<th>Subido por</th>
						<th>Estado</th>
						<th>Fecha</th>
					</thead> 
					<tbody>
					<?php foreach ($textos as $texto):?>
					<tr>
						<td style="text-align:center"><input type="checkbox" name="TextoId[]" value="<?php echo $texto['Texto']['id']; ?>"/></td>
						<td><?php echo $texto['Texto']['titulo']; ?></td>
						<td><?php if(!empty($texto['Usuario']['nombres'])): 
									echo $texto['Usuario']['nombres'].' '.$texto['Usuario']['apellidos'];
								else:
									echo $texto['Lectore']['nombre_lector'];
								endif;
							?>
						</td>
						<td><?php if($texto['Texto']['estado']=='borrador'): 
									echo '<span class="label label-important">'.$texto['Texto']['estado'] .'</span>'; 
								else:
									echo '<span class="label label-success">'.$texto['Texto']['estado'] .'</span>'; 
								endif;
							?>
						</td>
						<td><?php echo $texto['Texto']['fecha_archivo']; ?></td>
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
				$("#TextoIdEditar").attr('value', arr[0]);
				$("#TextoIdEliminar").attr('value', arr[0]);
			});
		});
</script>

<?php //print_r($textos);?>
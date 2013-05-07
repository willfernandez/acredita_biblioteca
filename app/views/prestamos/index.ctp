<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link('Circulación','/biblioteca/circulacion');?> <span class="divider">/</span></li>
    <li class="active">Préstamos</li>
</ul>
<div class="row">
	<div class="span1">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'prestamos','action'=>'prestamo_add'));?>">
				<button class="btn btn-info">
					<i class="icon-plus icon-white"></i><br />
					Registrar
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'prestamos','action'=>'prestamo_delete'));?>" class="FormularioEnviar">
				<input type="hidden" name="PrestamoIdValue" id="PrestamoIdEliminar" />
				<button class="btn btn-danger">
					<i class="icon-trash icon-white"></i><br />
					Eliminar
				</button>
			</form>
		</div>
	</div>
</div><!-- /row -->
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Préstamos realizados</h4>
			<div class="box-content">
				<table class="table table-striped table-bordered dataTable">
					<thead>
						<th style="text-align:center"><input type="checkbox"/></th>
						<th>Id</th>
						<th>Lector</th>
						<th>Fecha de Préstamo</th>
						</thead> 
						<tbody>
						<?php foreach ($prestamos as $prestamo):?>
						<tr>
							<td style="text-align:center"><input type="checkbox" name="UsuarioId[]" value="<?php echo $prestamo['Prestamo']['id']; ?>"/></td>
							<td><?php echo $prestamo['Prestamo']['id']; ?></td>
							<td><a href="#ficha_prestamo" onclick="ficha_prestamo(<?php echo $prestamo['Prestamo']['id']; ?>);"><?php echo $prestamo['Lectore']['nombre_lector']; ?></a></td>
							<td><?php echo $prestamo['Prestamo']['fecha_prestamo'];?></td>
						</tr>
						<?php endforeach; ?>
						</tbody>
				</table>
			</div>
		</div><!-- /box -->
	</div><!-- /span12 -->
</div>
<div id="ficha_prestamo"></div>
<script type="text/javascript">
	function ficha_prestamo(id){
		var id_prestamo = id;
		$.post("/biblioteca-ujcm/prestamos/ficha_prestamo",{id:id_prestamo},function(data){
				$("#ficha_prestamo").html(data);
		});
	}
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
				$("#PrestamoIdEliminar").attr('value', arr[0]);
			});
		});
</script>
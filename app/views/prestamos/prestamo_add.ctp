<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link('Préstamos','/prestamos');?> <span class="divider">/</span></li>
    <li class="active">Registrar préstamo</li>
</ul>
<div class="row">
	<div class="span1">
		<div class="button_window">
			<?php echo $this->Form->create('Prestamo',array('action'=>'prestamo_add'));?>
				<input type="hidden" name="data[Prestamo][lectore_id]" id="LectorId" />
				<input type="hidden" name="data[Prestamo][ejemplare_id]" id="TextoId" />
				<button class="btn btn-info">
					<i class="icon-ok icon-white"></i><br />
					Guardar
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form>
				<button class="btn btn-warning" onclick="limpiar();">
					<i class="icon-refresh icon-white"></i><br />
					Limpiar
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'prestamos','action'=>'index'));?>">
				<button class="btn btn-success">
					<i class="icon-list-alt icon-white"></i><br />
					Préstamos
				</button>
			</form>
		</div>
	</div>
</div><!-- /row -->	
<div class="row-fluid">
	<div id="col0" class="span12 column ui-sortable">
		<div class="box">
			<h4 class="box-header round-top">Registrar Préstamo</h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<form class="reg_data">
					<div class="span5">
						<legend>Usuario</legend>
						<dl class="data">
							<dt>Código</dt>
							<dd><input type="text" value="" name="LectorName" id="LectorCodigo" class="input-mini"/></dd>
							<dt>Usuario</dt>
							<dd><input type="text" value="" name="LectorName" id="LectorNombre" class="span12"/></dd>
						</dl>
					</div>
					<div class="span6">
						<legend>Material Bibliográfico</legend>
						<dl class="data">
							<dt>Código</dt>
							<dd><input type="text" value="" name="TextoName" id="TextoCodigo" class="input-small"/></dd>
							<dt>Título</dt>
							<dd><input type="text" value="" name="TextoName" id="TextoTitulo" class="span12"/></dd>
							<dt>Autor</dt>
							<dd><input type="text" value="" name="TextoName" id="TextoAutor" class="span12"/></dd>
						</dl>
					</div>
					</form>
				</div>
			</div>
		</div><!-- /box -->
	</div><!-- /span12 -->
</div><!-- /row -->
<div class="row-fluid">
	<div id="col0" class="span5 column ui-sortable">
		<div class="box">
			<h4 class="box-header round-top">Lectores</h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<table class="table table-striped table-bordered dataTable">
					<thead>
						<th>Id</th>
						<th>Nombres y Apellidos</th>
						<th></th>	
					</thead> 
						<tbody>
						<?php foreach ($lectores as $lector):?>
						<tr>
							<td><?php echo $lector['Lectore']['id']; ?></td>
							<td><?php echo $lector['Lectore']['nombre_lector']; ?></td>
							<td><a title="Seleccionar" href="javascript:lector(<?php echo $lector['Lectore']['id']; ?>,'<?php echo $lector['Lectore']['nombre_lector']; ?>');">
								<?php echo $this->Html->image('icons/aceptar.png'); ?></a>
							</td>
						</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div><!-- /span6 -->
	<div id="col0" class="span7 column ui-sortable">
		<div class="box">
			<h4 class="box-header round-top">Material Bibliográfico</h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<table class="table table-striped table-bordered dataTable">
					<thead>
						<th>Código</th>
						<th>Título</th>
						<th>Estado</th>
						<th></th>
						</thead> 
						<tbody>
						<?php foreach ($ejemplares as $ejemplar):?>
						<tr>
							<td><?php echo $ejemplar['Ejemplare']['codigo']; ?></td>
							<td><?php echo $ejemplar['Texto']['titulo']; ?></td>
							<td><?php echo $ejemplar['Ejemplare']['estado']; ?></td>
							<?php 
								$texto_id = $ejemplar['Ejemplare']['id'];
								$texto_codigo = $ejemplar['Ejemplare']['codigo'];
								$texto_titulo = $ejemplar['Texto']['titulo'];
								$texto_autor = $ejemplar['Texto']['autor'];
							?>
							<td>
							<?php if($ejemplar['Ejemplare']['estado']=='Disponible'): ?>
								<a title="Seleccionar" href="javascript:ejemplar(<?php echo $texto_id; ?>,'<?php echo $texto_codigo; ?>','<?php echo $texto_titulo; ?>','<?php echo $texto_autor; ?>');">
									<?php echo $this->Html->image('icons/aceptar.png'); ?>
								</a>
								<?php 
								else:
									echo $this->Html->image('icons/aceptar_disabled.png');
								endif;
								?>
							</td>
						</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div><!-- /row -->
<script type="text/javascript">
	function lector(id,nombre){
		var id_lector = id;
		var nombre_lector = nombre;
		$("#LectorId").attr('value',id_lector);	
		$("#LectorCodigo").attr('value',id_lector);	
		$("#LectorNombre").attr('value',nombre_lector);	
	}
	
	function ejemplar(id, codigo, titulo, autor){
		$("#TextoId").attr('value',id);	
		$("#TextoCodigo").attr('value',codigo);	
		$("#TextoTitulo").attr('value',titulo);	
		$("#TextoAutor").attr('value',autor);	
	}
	function limpiar(){
		$("#LectorCodigo").attr('value',"");	
		$("#LectorNombre").attr('value',"");	
		$("#TextoCodigo").attr('value',"");	
		$("#TextoTitulo").attr('value',"");	
		$("#TextoAutor").attr('value',"");
	}
</script>
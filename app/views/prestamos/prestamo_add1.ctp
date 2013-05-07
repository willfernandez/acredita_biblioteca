<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link('Préstamos','/prestamos');?> <span class="divider">/</span></li>
    <li class="active">Registrar préstamo</li>
</ul>
	
<div class="row-fluid">
	<div id="col0" class="span12 column ui-sortable">
		<div class="box">
			<h4 class="box-header round-top">Registrar Préstamo</h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<div class="span3">
						<form type="post" action="<?php $this->Html->url(array('controller'=>'prestamos','action'=>'prestamo_add'));?>" id="FormularioBuscarLector">
							<label>Código del Alumno</label><input type="text" class="span6" />
							<button class="btn btn-success" type="submit">Buscar</button>
						</form>
						<form type="post" action="<?php $this->Html->url(array('controller'=>'prestamos','action'=>'prestamo_add'));?>" id="FormularioBuscarTexto">
							<label>Código del Texto</label><input type="text" class="span6" />
							<button class="btn btn-success" type="submit">Buscar</button>
						</form>
					</div>
					<div class="span5">
						<?php echo $this->Form->create('Prestamo',array('action'=>'prestamo_add'));?>
						<fieldset>
							<legend>Usuario</legend>
							<label>Código</label>
							<input type="text" value="" name="LectorName" id="LectorCodigo"/>
							<label>Nombre Usuario</label>
							<input type="text" value="" name="LectorName" id="LectorNombre"/>
						</fieldset>
						<fieldset>
							<legend>Material Bibliográfico</legend>
							<label>Código</label>
							<input type="text" value="" name="TextoName" id="TextoCodigo"/>
							<label>Título</label>
							<input type="text" value="" name="TextoName" id="TextoTitulo"/>
							<label>Autor</label>
							<input type="text" value="" name="TextoName" id="TextoAutor"/>
						</fieldset>
						<?php echo $this->Form->end();?>
						<div id="result"></div>
						<br />
						<div id="result2"></div>
					</div>
				</div>
			</div>
		</div><!-- /box -->
	</div><!-- /span12 -->
</div><!-- /row -->
<script type="text/javascript">
	$(document).ready(function(){	
		$("#FormularioBuscarLector").submit(function () {
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				// Mostramos un mensaje con la respuesta de PHP
				success: function(data) {
					$('#result').html(data);
					//var arr = $("input:checked").getCheckboxValues();
					//$("#LectorNombre").attr('value', 'Jose');
				}
			});   
			return false;	
		});
		
		$("#FormularioBuscarTexto").submit(function () {
			$.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            // Mostramos un mensaje con la respuesta de PHP
            success: function(data) {
                $('#result2').html(data);
            }
        });   
        return false;
		});
		
	});
</script>
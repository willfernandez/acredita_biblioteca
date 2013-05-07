<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
    <li><?php echo $this->Html->link('Adquisiciones','/adquisiciones');?> <span class="divider">/</span></li>
    <li class="active">Agregar Ejemplar</li>
</ul>
<div class="row">
	<div class="span1">
		<div class="button_window">
			<form>
				<button class="btn btn-info" onclick="ejemplar_add();">
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
	<?php 
		switch($texto['Texto']['categoria_id']){
			case 1: $action = 'libro_index'; break;
			case 3: $action = 'revista_index'; break;
			default: $action = 'index'; break;
		}
	?>
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'adquisiciones','action'=>$action));?>">
				<button class="btn btn-success">
					<i class="icon-list-alt icon-white"></i><br />
					Listado
				</button>
			</form>
		</div>
	</div>
</div><!-- /row -->	
<div class="row-fluid">
	<div class="span6">
		<div class="box">
			<h4 class="box-header round-top">Agregar Ejemplar</h4>
			<div class="box-content">
				<div id="ficha">	
					<div class="page-header">
						<h2>Fecha Registro : <?php echo $fecha;?></h2>
					</div>
				<?php 
					echo $this->Form->create('Ejemplare',array('url'=>'/adquisiciones/ejemplar_add/'.$texto['Texto']['id'].'','class'=>'form-horizontal','name'=>'form1'));
					echo $this->Form->input('codigo',array('label'=>'Código','class'=>':required input-small','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
					echo $this->Form->input('biblioteca_id',array('label'=>'Biblioteca','class'=>':required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
					echo $this->Form->hidden('texto_id',array('value'=>$texto['Texto']['id']));
					echo $this->Form->end();
				?>
				</div><!-- /ficha -->
			</div>
		</div>
	</div><!-- /span6 -->
	<div class="span6">
		<div class="box">
			<h4 class="box-header round-top">Material Bibliográfico</h4>
			<div class="box-content">
				<div class="detalle_texto">
					<strong>Código</strong> : <?php echo $texto['Texto']['id']?> <br />
					<strong>Título</strong> : <?php echo $texto['Texto']['titulo']?> <br />
					<strong>Autor</strong> : <?php echo $texto['Texto']['autor']?>	<br />	
					<strong>Editorial</strong> : <?php echo $texto['Editorial']['nombre_editorial']?>	<br />	
					<strong>Idioma</strong> : <?php echo $texto['Idioma']['idioma']?>	<br />	
					<strong>Categoria</strong> : <?php echo $texto['Subcategoria']['nombre_subcategoria']?><br />	
				</div>
			</div>
			
		</div>
	</div><!-- /span6 -->
</div>
<?php if(!empty($ejemplares)):?>
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Ejemplares</h4>
			<div class="box-content">
				<table class="table table-striped table-bordered dataTable">
					<thead>
						<th>Código</th>
						<th>Biblioteca</th>
						<th>Estado</th>
						</thead> 
						<tbody>
						<?php foreach ($ejemplares as $ejemplar):?>
						<tr>
							<td><?php echo $ejemplar['Ejemplare']['codigo']; ?></td>
							<td><?php echo $ejemplar['Biblioteca']['nombre_biblioteca']; ?></td>
							<td><?php echo $ejemplar['Ejemplare']['estado']; ?></td>
						</tr>
						<?php endforeach; ?>
						</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php endif;?>
<script>
	function ejemplar_add(){
		document.form1.submit();
		alert("Guardando...");
	}
	function limpiar(){
		document.form1.reset();
	}
</script>
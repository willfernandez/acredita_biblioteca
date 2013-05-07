<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
    <li class="active">Circulación</li>
</ul>
<div class="row">
	<div class="span1">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'prestamos','action'=>'index'));?>">
				<button class="btn btn-info">
					<i class="icon-hand-up icon-white"></i><br />
					Préstamos
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'biblioteca','action'=>'reservas'));?>"> 
				<button class="btn btn-success">
					<i class="icon-star icon-white"></i><br />
					Reservas
				</button>
			</form>
		</div>
	</div>
	<div class="span1" id="window">
		<div class="button_window">
			<form action="<?php echo $this->Html->url(array('controller'=>'biblioteca','action'=>'devoluciones'));?>"> 
				<button class="btn btn-warning">
					<i class="icon-retweet icon-white"></i><br />
					Devolución
				</button>
			</form>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Ultimos prestamos</h4>
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
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Ultimas Devoluciones</h4>
			<div class="box-content">
				<table class="table table-striped table-bordered dataTable">
					<thead>
						<th style="text-align:center"><input type="checkbox"/></th>
						<th>Id</th>
						<th>Lector</th>
						<th>Fecha de Préstamo</th>
						</thead> 
						<tbody>
						<?php foreach ($devoluciones as $prestamo):?>
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
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Ultimas Reservas</h4>
			<div class="box-content">
				<table class="table table-striped table-bordered dataTable">
					<thead>
						<th style="text-align:center"><input type="checkbox"/></th>
						<th>Id</th>
						<th>Lector</th>
						<th>Fecha de Reserva</th>
						</thead> 
						<tbody>
						<?php foreach ($reservas as $prestamo):?>
						<tr>
							<td style="text-align:center"><input type="checkbox" name="UsuarioId[]" value="<?php echo $prestamo['Prestamo']['id']; ?>"/></td>
							<td><?php echo $prestamo['Prestamo']['id']; ?></td>
							<td><a href="#ficha_prestamo" onclick="ficha_prestamo(<?php echo $prestamo['Prestamo']['id']; ?>);"><?php echo $prestamo['Lectore']['nombre_lector']; ?></a></td>
							<td><?php echo $prestamo['Prestamo']['fecha_reserva'];?></td>
						</tr>
						<?php endforeach; ?>
						</tbody>
				</table>
			</div>
		</div><!-- /box -->
	</div><!-- /span12 -->
</div>
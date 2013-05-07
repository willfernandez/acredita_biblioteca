<div class="row-fluid">
	<div id="col0" class="span12 column ui-sortable">
		<div class="box">
			<h4 class="box-header round-top">Ficha préstamo</h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<div id="ficha">
						<div class="page-header">
							<span class="label label-success">Fecha Préstamo : <?php echo $prestamo['Prestamo']['fecha_prestamo']?></span>
						</div>
						<div class="span5">
							<legend>Usuario</legend>
							<dl class="data">
								<dt>Código</dt>
								<dd><?php echo $prestamo['Lectore']['id']?></dd>
								<dt>Usuario</dt>
								<dd><?php echo $prestamo['Lectore']['nombre_lector']?></dd>
							</dl>
						</div>
						<div class="span6">
							<legend>Material Bibliográfico</legend>
							<dl class="data">
								<dt>Código</dt>
								<dd><?php echo $prestamo['Ejemplare']['codigo']?></dd>
								<dt>Título</dt>
								<dd><?php echo $texto['Texto']['titulo']?></dd>
								<dt>Autor</dt>
								<dd><?php echo $texto['Texto']['autor']?></dd>
							</dl>
						</div>
					</div><!-- /ficha -->
				</div>
			</div>
		</div><!-- /box -->
	</div><!-- /span12 -->
</div><!-- /row -->
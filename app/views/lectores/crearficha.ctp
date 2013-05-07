<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Panel','/lectores');?> <span class="divider">/</span></li>
    <li class="active">Ficha de Biblioteca</li>
</ul>
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<h4 class="box-header round-top">Información Ficha</h4>
			<div class="box-container-toggle">
				<div class="box-content">
					<div class="span8">
					<?php echo $this->Form->create('Prestamo',array('url'=>'/lectores/crearficha/'.$ejemplar[0]['e']['id'],'class'=>'well','inputDefaults'=>array('div'=>false)));?>
					<?php
						echo $this->Form->hidden('ejemplare_id',array('value'=>$ejemplar[0]['e']['id']));
						echo $this->Form->hidden('estado',array('value'=>0));
						echo $this->Form->input('codigo',array('label'=>'Código','class'=>'span5','disabled'=>'disabled','value'=>$ejemplar[0]['e']['codigo'])); 
						echo $this->Form->input('titulo',array('label'=>'Titulo','class'=>'span12','disabled'=>'disabled','value'=>$ejemplar[0]['t']['titulo'])); 
						echo $this->Form->input('autor',array('label'=>'Autor','class'=>'span12','disabled'=>'disabled','value'=>$ejemplar[0]['t']['autor'])); 
						echo $this->Form->input('biblioteca',array('label'=>'Biblioteca','class'=>'span12','disabled'=>'disabled','value'=>$ejemplar[0]['b']['nombre_biblioteca'])); 
						echo '<div align="right">';
						echo $this->Form->button('Reservar',array('type'=>'submit','class'=>'submit btn btn-success'));	
						echo $this->Html->link('Cancelar',array('controller'=>'lectores','action'=>'catalogo'),array('class'=>'btn'));
						echo '</div>';
						echo $this->Form->end();
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php //print_r($ejemplar)?>


 <div class="row-fluid span12 well">
        <div class="span1 action-btn round-all">
          <a href="#">
                <div><i class="icon-pencil"></i></div>
                <div><strong><?php echo $this->Html->link(__('Listar mis prestamos', true), array('action' => 'misprestamos')); ?></strong></div>          
            </a>
        </div>

        <div class="span1 action-btn round-all">
          <a href="#">
                <div><i class="icon-pencil"></i></div>
                <div><strong><?php echo $this->Html->link(__('Nuevos prestamos', true), array('controller' => 'sanciones', 'action' => 'index')); ?> </strong></div>          
            </a>
        </div>

        <div class="span1 action-btn round-all">
          <a href="#">
            <div><i class="icon-align-justify"></i></div>
              <div><strong><?php echo $this->Html->link(__('Mis sanciones', true), array('controller' => 'ejemplares', 'action' => 'index')); ?></strong></div>         
            </a>
        </div>
 </div>



<div class="page-header">
	<h1>Ficha de biblioteca</h1>
</div>
<div class="span11 row" id="cont">
	<div class="span5">
		<h3>Nueva Ficha</h3>
		<p>Esta creando una nueva ficha de préstamo.</p>
		<div id="col4">
             <!-- Portlet: Site Activity Gauges -->
             <div class="box" id="box-3">
              <h4 class="box-header round-top">Mis ultimos prestamos
                  <a class="box-btn" title="close"><i class="icon-remove"></i></a>
                  <a class="box-btn" title="toggle"><i class="icon-minus"></i></a>     
                  <a class="box-btn" title="config" data-toggle="modal" href="#box-config-modal"><i class="icon-cog"></i></a>
              </h4>         
              <div class="box-container-toggle">
                  <div class="box-content">
                    <ul class="dashboard-member-activity">
                      <?php foreach($misprestamos as $ultimos): ?>
                      <li>
                        <a href=<?php echo "'../../textos/ver_texto/".$ultimos['t']['id']."'"?>>
                          <img src=<?php echo "'".$ultimos['t']['imagen']."'";?> class="dashboard-member-activity-avatar"/></a>
                          <strong>Titulo:</strong> <a href=<?php echo "'?ejemplar=".$ultimos['p']['ejemplare_id']."'"?>><?php echo $ultimos['t']['titulo'];?></a><br />
                          <strong>Autor:</strong> <?php echo $ultimos['t']['autor'];?><br />
                          <strong>Fecha:</strong> <?php echo $ultimos['p']['fecha_prestamo'];?><br />
                          <strong>Estado:</strong> 
                          <?php   switch ($ultimos['p']['estado']) {
                                    case 0:
                                        echo '<span class="label label-warning">Pendiente</span>';
                                        break;
                                    case 1:
                                       echo '<span class="label label-success">Devuelto</span>';
                                        break;
                                    case 2:
                                       echo '<span class="label label-info">Entregado</span>';
                                        break;
                                }
                               ?>

                        </a>
                      </li>
                    <? endforeach;?>
                    </ul>
                  </div>
              </div>
            </div><!--/span-->
         </div>
	</div>
	<div class="span7">
		<?php echo $this->Form->create('Prestamo',array('url'=>'/reservas/crearficha','class'=>'well','inputDefaults'=>array('div'=>false)));?>
		<?php
			echo $this->Form->hidden('ejemplare_id',array('value'=>$ejemplares['0']['Ejemplare']['id']));
			echo $this->Form->hidden('lectore_id',array('value'=>1));
      echo $this->Form->hidden('sancione_id',array('value'=>1));
      echo $this->Form->hidden('estado',array('value'=>0));

      echo '<div class="input text"><label>Datos Claves<span> IMPORTANTE</span></label>'.$this->Form->input('Usuario',array('label'=>'Usuario', 'type'=>"text", 'class'=>"date", 'div' => false, 'label' => false));
      echo ' Biblioteca '.$this->Form->input('fecha_devolu',array('label'=>'Fecha de devolución', 'type'=>"text", 'class'=>"date",'div' => false, 'label' => false)).'</div>';
			echo '<div class="input text"><label>Periodo de Préstamo <span> IMPORTANTE</span></label>'.$this->Form->input('fecha_prestamo',array('label'=>'Fecha de Prestamo', 'type'=>"text", 'class'=>"date", 'div' => false, 'label' => false));
			echo ' hasta '.$this->Form->input('fecha_devolu',array('label'=>'Fecha de devolución', 'type'=>"text", 'class'=>"date",'div' => false, 'label' => false)).'</div>';
			echo $this->Form->input('titulo',array('label'=>'Autor','class'=>'span6','class'=>'span5 uneditable-input :required :max_length;50 :min_length;4', 'value'=>$ejemplares['0']['Texto']['autor'])); 
			echo $this->Form->input('autor',array('label'=>'Titulo y subtitulo','class'=>'span5 uneditable-input :required :max_length;50 :min_length;4', 'value'=>$ejemplares['0']['Texto']['titulo'])); 
			echo $this->Form->input('descripcion',array('label'=>'Descripción','type'=>'textarea','class'=>'span7', 'value'=>$ejemplares['0']['Texto']['descripcion']));
      echo '<div></div>';
			echo $this->Form->input('edicion',array('label'=>'Edición','class'=>'span5 :required :max_length;50 :min_length;4','value'=>$ejemplares['0']['Texto']['edicion'])); 
			echo $this->Form->input('Tomo',array('label'=>'Tomos','class'=>'span5 :required :max_length;50 :min_length;4','value'=>$ejemplares['0']['Texto']['tomos'])); 
			echo $this->Form->input('Volumen',array('label'=>'Volumenes','class'=>'span5 :required :max_length;50 :min_length;4','value'=>$ejemplares['0']['Texto']['volumenes'])); 
		
			echo $this->Form->button('Cancelar',array('type'=>'reset','class'=>'reset btn btn-info', 'id'=>'reset'));
			echo $this->Form->button('Reservar',array('type'=>'submit','class'=>'submit btn btn-success'));	
			echo $this->Html->link('sss',array('controller'=>'encuestas','action'=>'asignaciones'),array('class'=>'btn btn-primary'));	
			echo $this->Form->end();
		?>
	</div>
</div>


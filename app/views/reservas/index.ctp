

 <div class="row-fluid span12 well">
        <div class="span1 action-btn round-all">
        	<a href="#">
                <div><i class="icon-pencil"></i></div>
                <div><strong><?php echo $this->Html->link(__('Nuevo prestamo', true), array('action' => 'add')); ?></strong></div>        	
            </a>
        </div>

        <div class="span1 action-btn round-all">
        	<a href="#">
                <div><i class="icon-pencil"></i></div>
                <div><strong><?php echo $this->Html->link(__('Listar Sanciones', true), array('controller' => 'sanciones', 'action' => 'index')); ?> </strong></div>        	
            </a>
        </div>

        <div class="span1 action-btn round-all">
        	<a href="#">
	        	<div><i class="icon-align-justify"></i></div>
    	        <div><strong><?php echo $this->Html->link(__('Listar Ejemplares', true), array('controller' => 'ejemplares', 'action' => 'index')); ?></strong></div>        	
            </a>
        </div>
 </div>


 <div class="row-fluid">
         <!-- Portlet Set 4 -->
         <div class="span4 column" id="col4">
             <!-- Portlet: Site Activity Gauges -->
             <div class="box" id="box-3">
              <h4 class="box-header round-top">Nuevos usuarios
                  <a class="box-btn" title="close"><i class="icon-remove"></i></a>
                  <a class="box-btn" title="toggle"><i class="icon-minus"></i></a>     
                  <a class="box-btn" title="config" data-toggle="modal" href="#box-config-modal"><i class="icon-cog"></i></a>
              </h4>         
              <div class="box-container-toggle">
                  <div class="box-content">
                    <ul class="dashboard-member-activity">
                      <li>
                        <a href="#">
                          <img src="images/member_ph.png" class="dashboard-member-activity-avatar"/></a>
                          <strong>Name:</strong> <a href="#">John Doe</a><br />
                          <strong>Since:</strong> 21/01/2012<br />
                          <strong>Status:</strong> <span class="label label-success">Approved</span>                                  
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src="images/member_ph.png" class="dashboard-member-activity-avatar"/></a>
                          <strong>Name:</strong> <a href="#">Jane Doe</a><br />
                          <strong>Since:</strong> 21/01/2012<br />
                          <strong>Status:</strong> <span class="label label-important">Banned</span>                                  
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src="images/member_ph.png" class="dashboard-member-activity-avatar"/></a>
                          <strong>Name:</strong> <a href="#">Fred Flintstone</a><br />
                          <strong>Since:</strong> 21/01/2012<br />
                          <strong>Status:</strong> <span class="label label-warning">Pending</span>                                  
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src="images/member_ph.png" class="dashboard-member-activity-avatar"/></a>
                          <strong>Name:</strong> <a href="#">Bat Man</a><br />
                          <strong>Since:</strong> 21/01/2012<br />
                          <strong>Status:</strong> <span class="label label-info">Updates</span>                                  
                        </a>
                      </li>
                    </ul>
                  </div>
              </div>
            </div><!--/span-->
         </div>
         
         <!-- Portlet Set 5 -->
         <div class="span4 column" id="col5">
             <!-- Portlet: Site Activity Gauges -->
             <div class="box" id="box-4">
              <h4 class="box-header round-top">Estadisticas Libres
                  <a class="box-btn" title="close"><i class="icon-remove"></i></a>
                  <a class="box-btn" title="toggle"><i class="icon-minus"></i></a>     
                  <a class="box-btn" title="config" data-toggle="modal" href="#box-config-modal"><i class="icon-cog"></i></a>
              </h4>         
              <div class="box-container-toggle">
                  <div class="box-content">
                    <ul class="dashboard-statistics">
                      <li>
                        <a href="#">
                          <i class="icon-arrow-up"></i>                               
                          <span class="green">100</span>
                          Nuevas revistas                                    
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="icon-arrow-down"></i>
                          <span class="red">12</span>
                          New Registrations
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="icon-minus"></i>
                          <span class="blue">33</span>
                          Nuevos Libros                                    
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="icon-fire"></i>
                          <span class="yellow">400</span>
                          Nuevas Tesis                                    
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="icon-arrow-up"></i>                               
                          <span class="green">100</span>
                          Nuevos informes                                    
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="icon-arrow-down"></i>
                          <span class="red">12</span>
                          New Registrations
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="icon-minus"></i>
                          <span class="blue">33</span>
                          New Articles                                    
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="icon-fire"></i>
                          <span class="yellow">400</span>
                          User reviews                                    
                        </a>
                      </li>
                    </ul>
                  </div>
              </div>
            </div><!--/span-->
        </div>    
        <!-- Portlet Set 6 -->
    <div class="span4 column" id="col6">
             <!-- Portlet: Site Activity Gauges -->
             <div class="box" id="box-5">
              <h4 class="box-header round-top">Member Comments
                  <a class="box-btn" title="close"><i class="icon-remove"></i></a>
                  <a class="box-btn" title="toggle"><i class="icon-minus"></i></a>     
                  <a class="box-btn" title="config" data-toggle="modal" href="#box-config-modal"><i class="icon-cog"></i></a>
              </h4>         
              <div class="box-container-toggle">
                  <div class="box-content">
                    <ul class="dashboard-member-activity">
                      <li>
                        <a href="#">
                          <img src="images/member_ph.png" class="dashboard-member-activity-avatar"/>
                          <span class="blue">Comment by <strong>Member</strong> on 21/02/2012</span></a>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean bibendum, est at congue gravida...</p>                                
                        
                      </li>
                      <li>
                        <a href="#">
                          <img src="images/member_ph.png" class="dashboard-member-activity-avatar"/>
                          <span class="blue">Comment by <strong>Member</strong> on 21/02/2012</span></a>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean bibendum, est at congue gravida...</p>                                
                        
                      </li>
                      <li>
                        <a href="#">
                          <img src="images/member_ph.png" class="dashboard-member-activity-avatar"/>
                          <span class="blue">Comment by <strong>Member</strong> on 21/02/2012</span></a>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean bibendum, est at congue gravida...</p>                                
                        
                      </li>
 
                    </ul>
                  </div>
              </div>
            </div><!--/span-->
         </div>
      </div>         
        


<div class="span12">
<div class="prestamos index">
	<h2>Bítacora de prestamos General</h2>
	
<div class="box">
              <h4 class="box-header round-top">Bitácora de préstamos de las bibliotecas (MOQUEGUA)
                  <a class="box-btn" title="close"><i class="icon-remove"></i></a>
                  <a class="box-btn" title="toggle"><i class="icon-minus"></i></a>     
                  <a class="box-btn" title="config" data-toggle="modal" href="#box-config-modal"><i class="icon-cog"></i></a>
              </h4>         
              <div class="box-container-toggle">
                  <div class="box-content">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered bootstrap-datatable" id="datatable">
                      <thead>
                          <tr>
                              <th>Registro</th>
                              <th>Lector</th>
                              <th>Apellidos y nombres</th>
                              <th>Biblioteca</th>
                              <th>Ejemplar</th>
                              <th>Sanción</th>
                              <th>Fecha reserva</th>
                              <th>Fecha entrega</th>
                              <th>Fecha devolucion</th>
                              <th>Estado texto</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>   
                      <tbody>
                      	<?php 	foreach ($prestamos as $prestamo): ?>
                        <tr>
                            <td><?php echo $prestamo['Prestamo']['id']; ?>&nbsp;</td>
                            		<td>
			<?php echo $this->Html->link($prestamo['Lectore']['Alumno']['codigo_anterior'], array('controller' => 'usuarios', 'action' => 'view', $prestamo['Usuario']['id'])); ?>
		</td>

		<td>
			<?php echo $this->Html->link($prestamo['Lectore']['Alumno']['nombres'].' '.$prestamo['Lectore']['Alumno']['apellidos'], array('controller' => 'usuarios', 'action' => 'view', $prestamo['Usuario']['id'])); ?>

		</td>
		<td>
			<?php echo $this->Html->link($prestamo['Ejemplare']['Biblioteca']['nombre_biblioteca'], array('controller' => 'ejemplares', 'action' => 'view', $prestamo['Ejemplare']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($prestamo['Ejemplare']['Texto']['titulo'], array('controller' => 'ejemplares', 'action' => 'view', $prestamo['Ejemplare']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($prestamo['Sancione']['nombre_sancion'], array('controller' => 'sanciones', 'action' => 'view', $prestamo['Sancione']['id'])); ?>
		</td>
		
		<td><?php echo $prestamo['Prestamo']['fecha_prestamo']; ?>&nbsp;</td>
		<td><?php echo $prestamo['Prestamo']['fecha_entrega']; ?>&nbsp;</td>
		<td><?php echo $prestamo['Prestamo']['fecha_devolu']; ?>&nbsp;</td>
		<td><?php 


			switch ($prestamo['Prestamo']['estado']) {
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
		 ?>&nbsp;</td>


                            <td class="center"> 

            <?php echo $this->Html->link(__('Detalle', true), array('action' => 'view', $prestamo['Prestamo']['id']),array('class'=>'btn btn-success','title'=>'Ver Ficha de prestamo','rel'=>'tooltip')); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $prestamo['Prestamo']['id']),array('class'=>'btn btn-info','title'=>'Ver Ficha de prestamo','rel'=>'tooltip')); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $prestamo['Prestamo']['id']),array('class'=>'btn btn-danger','title'=>'Ver Ficha de prestamo','rel'=>'tooltip'),sprintf(__('Are you sure you want to delete # %s?', true), $prestamo['Prestamo']['id'])); ?>
                               
                            </td>
                        </tr>
                        <?php endforeach; ?>
</table>
	</div>
			</div>
		</div>
	</div>


</div>
		
<script>
 $(document).ready( function () {
 $('#proceso').dataTable( {
    "sDom": "<'row-fluid'<'span4'l><'span4'f>r>t<'row-fluid'<'span4'i><'span4'p>>",
    "sPaginationType": "full_numbers",
    "bJQueryUI": true,
    "oLanguage": {
      "sLengthMenu": "Mostrar _MENU_ Registros",
      "sInfo": "Mostrando _START_ de _END_ de _TOTAL_ registros",
      "oPaginate": {
          "sFirst":    "«",
          "sPrevious": "←",
          "sNext":     "→",
          "sLast":     "»"
        }
    }
  } );
    } ); 

</script>
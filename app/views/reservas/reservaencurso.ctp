
<div class="span8">
  <h2>Bitácora de préstamos en proceso </h2>
  <?php  $i=0; foreach($prestamosencurso as $encurso):?>
    <div class="span12">
      <div class="box">
              <h4 class="box-header round-top"> <?php echo $encurso[0]['Ejemplare']['Biblioteca']['nombre_biblioteca']; ?>
                  <a class="box-btn" title="close"><i class="icon-remove"></i></a>
                  <a class="box-btn" title="toggle"><i class="icon-minus"></i></a>     
                  <a class="box-btn" title="config" data-toggle="modal" href="#box-config-modal"><i class="icon-cog"></i></a>
              </h4>         
              <div class="box-container-toggle">
                  <div class="box-content">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="proceso">
                      <thead>
                          <tr>
                              <th>Registro</th>
                              <th>Lector</th>
                              <th>Ejemplar</th>
                              <th>Fecha reserva</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>   
                      <tbody>
                        <?php   foreach ($encurso as $prestamo): 
                        if ($prestamo['Prestamo']['estado']==0){
                        ?>
                        <tr>
                            <td><?php echo $prestamo['Prestamo']['id']; ?>&nbsp;</td>
              <td>
                <?php echo $this->Html->link($prestamo['Lectore']['Alumno']['codigo_anterior'], array('controller' => 'usuarios', 'action' => 'view', $prestamo['Lectore']['Alumno']['id'])); ?>
              </td>
              
              <td>
                <?php echo $this->Html->link($prestamo['Ejemplare']['Texto']['titulo'], array('controller' => 'ejemplares', 'action' => 'view', $prestamo['Ejemplare']['id'])); ?>
              </td>
                  <td><?php echo $prestamo['Prestamo']['fecha_prestamo']; ?>&nbsp;</td>
                  <td class="center"> 
            <?php echo $this->Html->link(__('Aprobar', true), array('action' => 'view', $prestamo['Prestamo']['id']),array('class'=>'btn btn-info','title'=>'Ver Ficha de prestamo','rel'=>'tooltip')); ?>
            
                      <?php echo $this->Html->link(__('Detalle', true), array('action' => 'view', $prestamo['Prestamo']['id']),array('class'=>'btn btn-success','title'=>'Ver Ficha de prestamo','rel'=>'tooltip')); ?>
            
                <?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $prestamo['Prestamo']['id']),array('class'=>'btn btn-danger','title'=>'Ver Ficha de prestamo','rel'=>'tooltip'),sprintf(__('Are you sure you want to delete # %s?', true), $prestamo['Prestamo']['id'])); ?>
                   </td>
              </tr>

              <?php } else {} endforeach; ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<div class="span4">
  <h2>Ultimos aprobados </h2>

  <?php foreach($prestamosencurso as $encurso): ?>
 

    <div class="span12">
      <div class="box">
              <h4 class="box-header round-top"> <?php echo $encurso[0]['Ejemplare']['Biblioteca']['nombre_biblioteca']; ?>
                  <a class="box-btn" title="close"><i class="icon-remove"></i></a>
                  <a class="box-btn" title="toggle"><i class="icon-minus"></i></a>     
                  <a class="box-btn" title="config" data-toggle="modal" href="#box-config-modal"><i class="icon-cog"></i></a>
              </h4>         
              <div class="box-container-toggle">
                  <div class="box-content">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="proceso">
                      <thead>
                          <tr>
                              <th>Registro</th>
                              <th>Lector</th>
                              <th>Ejemplar</th>
                              <th>Estado</th>
                          </tr>
                      </thead>   
                      <tbody>
                        <?php   foreach ($encurso as $prestamo): 
                         if ($prestamo['Prestamo']['estado']==1){
                        
                        ?>
                        <tr>
                            <td><?php echo $prestamo['Prestamo']['id']; ?>&nbsp;</td>
              <td>
                <?php echo $this->Html->link($prestamo['Lectore']['Alumno']['codigo_anterior'], array('controller' => 'usuarios', 'action' => 'view', $prestamo['Lectore']['Alumno']['id'])); ?>
              </td>
             
              <td>
                <?php echo $this->Html->link($prestamo['Ejemplare']['Texto']['titulo'], array('controller' => 'ejemplares', 'action' => 'view', $prestamo['Ejemplare']['id'])); ?>

              </td>
               <td><span class="label label-info">Aprobado</span></td>
              </tr>
               <?php } else {} endforeach; ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
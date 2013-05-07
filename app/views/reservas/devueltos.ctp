

<div class="span12">
  <h2>Bitácora de libros devueltos y que deben ser devueltos</h2>
    <h3>El día de hoy es: <?echo date('Y-M-d')?></h3>

  <?php  $i=0; foreach($prestamosencurso as $encurso): ?>

    <div class="span11">
      <div class="box">
              <h4 class="box-header round-top"> <?php echo $encurso['0']['b']['nombre_biblioteca']; $i=$i+1;?>
                  <a class="box-btn" title="close"><i class="icon-remove"></i></a>
                  <a class="box-btn" title="toggle"><i class="icon-minus"></i></a>     
                  <a class="box-btn" title="config" data-toggle="modal" href="#box-config-modal"><i class="icon-cog"></i></a>
              </h4>         
              <div class="box-container-toggle">
                  <div class="box-content">
                    <h3>Textos que se deben entregar </h3>
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="proceso">
                      <thead>
                          <tr>
                              <th>Registro</th>
                              <th>Lector</th>
                              <th>Ejemplar</th>
                              <th>Fecha a ser devuelto</th>
                              <th>Retraso</th>
                              <th>Sancion</th>
                              <th width="200" align="center">Acciones</th>
                          </tr>
                      </thead>   
                      <tbody>
                        <?php   foreach ($encurso as $prestamo): 
                        if($prestamo['p']['estado'] == 1) { ?>
                        <tr>
                            <td><?php echo $prestamo['p']['id']; ?>&nbsp;</td>
              <td>
                <?php echo $this->Html->link($prestamo['a']['nombres'].' '.$prestamo['a']['apellidos'], array('controller' => 'usuarios', 'action' => 'view', $prestamo['l']['id'])); ?>
              </td>
              
              <td>
                <?php echo $this->Html->link($prestamo['t']['titulo'], array('controller' => 'ejemplares', 'action' => 'view', $prestamo['e']['id'])); ?>
              </td>
                  <td><?php echo $prestamo['p']['fecha_devolucion']; ?>&nbsp;</td>
               <td><?php echo $prestamo['0']['ahora']. 'días'; ?>&nbsp;</td>
                <td>
                  <?php 
                        switch ($prestamo['s']['id']) {
                            case '1':
                                echo '<span class="label label-success">'.$prestamo['s']['grado'].'</span>';
                                break;
                            case '2':
                               echo '<span class="label label-warning">'.$prestamo['s']['grado'].'</span>';
                                break;
                            case '3':
                               echo '<span class="label label-important">'.$prestamo['s']['grado'].'</span>';
                                break;
                            case '4':
                               echo '<span class="label label-important">'.$prestamo['s']['grado'].'</span>';
                                break;
                        }

                       ?>

                     <td align="center">


                  <a href="textos/ver/<?php echo $prestamo['e']['id'];?>" class="btn btn-info" title="Devolver"> 
                    <i class="icon-retweet icon-white"></i> Devolver
                  </a>
                  <a href="borrarficha/<?php echo  $prestamo['p']['id'];?>" class="btn btn-danger" onclick="return confirm('¿Está seguro?');" title="Eliminar">
                    <i class="icon-trash icon-white"></i> 
                  </a>
                   <a href="textos/ver/<?php echo $prestamo['e']['id'];?>" class="btn btn-success" title="Detalle"> 
                    <i class="icon-zoom-in icon-white"></i> 
                  </a>

      
                   </td>
              </tr>

              <?php } else {} endforeach; ?>
            </tbody>
          </table>

        </div>


                  <div class="box-content">
                    <h3>Textos que se deben entregar </h3>
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="proceso">
                      <thead>
                          <tr>
                              <th>Registro</th>
                              <th>Lector</th>
                              <th>Ejemplar</th>
                              <th>Fecha a ser devuelto</th>
                              <th>Retraso</th>
                              <th>Sancion</th>
                              <th width="200" align="center">Acciones</th>
                          </tr>
                      </thead>   
                      <tbody>
                        <?php   foreach ($encurso as $prestamo): 
                        if($prestamo['p']['estado'] == 2) { ?>
                        <tr>
                            <td><?php echo $prestamo['p']['id']; ?>&nbsp;</td>
              <td>
                <?php echo $this->Html->link($prestamo['a']['nombres'].' '.$prestamo['a']['apellidos'], array('controller' => 'usuarios', 'action' => 'view', $prestamo['l']['id'])); ?>
              </td>
              
              <td>
                <?php echo $this->Html->link($prestamo['t']['titulo'], array('controller' => 'ejemplares', 'action' => 'view', $prestamo['e']['id'])); ?>
              </td>
                  <td><?php echo $prestamo['p']['fecha_devolucion']; ?>&nbsp;</td>
               <td><?php echo $prestamo['0']['ahora'].' días'; ?>&nbsp;</td>
                <td>
                  <?php 
                        switch ($prestamo['s']['id']) {
                            case '1':
                                echo '<span class="label label-success">'.$prestamo['s']['grado'].'</span>';
                                break;
                            case '2':
                               echo '<span class="label label-warning">'.$prestamo['s']['grado'].'</span>';
                                break;
                            case '3':
                               echo '<span class="label label-important">'.$prestamo['s']['grado'].'</span>';
                                break;
                            case '4':
                               echo '<span class="label label-important">'.$prestamo['s']['grado'].'</span>';
                                break;
                        }

                       ?>

                     <td align="center">


                   <a href="textos/ver/<?php echo $prestamo['p']['id'];?>" class="btn btn-success" title="Detalle"> 
                                     <i class="icon-zoom-in icon-white"></i> Ver Detalles Devuelto
                  </a>
      
                   </td>
              </tr>

              <?php } else {} endforeach; ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>

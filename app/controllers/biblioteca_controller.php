<?php 
class BibliotecaController extends AppController{
	public $name = 'Biblioteca';
	public $uses = array('Biblioteca','Prestamo','Ejemplare');
	
	function beforeFilter() {
		$this->_authusuarios();
		$this->layout = 'cpanel';
    }
	
	function circulacion(){
		$prestamos = $this->Prestamo->find('all',array(
			'order'=>array('Prestamo.fecha_prestamo DESC'),
			'conditions'=>array('Prestamo.estado'=>1)));
		
		$devoluciones = $this->Prestamo->find('all',array(
			'order'=>array('Prestamo.fecha_prestamo DESC'),
			'conditions'=>array('Prestamo.estado'=>2)));
		
		$reservas = $this->Prestamo->find('all',array(
			'order'=>array('Prestamo.fecha_prestamo DESC'),
			'conditions'=>array('Prestamo.estado'=>0)));
		
		$this->set(compact('prestamos','devoluciones','reservas'));
	}	
	function reservas(){		
		$bibliotecas= $this->Biblioteca->find('all',array('recursive' => 0));				

		foreach($bibliotecas as $biblioteca){			

			$id =$biblioteca['Biblioteca']['id'];			

			$reservas[$id] = $this->Prestamo->query("SELECT p.id,e.codigo,le.nombre_lector,p.fecha_reserva,t.titulo,t.autor,b.nombre_biblioteca FROM prestamos AS p																				
			INNER JOIN lectores AS le ON le.id = p.lectore_id																				
			INNER JOIN ejemplares AS e ON e.id = p.ejemplare_id																				
			INNER JOIN textos AS t ON t.id = e.texto_id																				
			INNER JOIN bibliotecas AS b ON b.id = e.biblioteca_id																			
			WHERE p.estado=0 AND b.id=$id");		
			}		
			
			$this->set('reservas',$reservas);	
	}		
	
	function edit_reserva($id = null){		
		$id = $_REQUEST['ReservaIdValue'];		
		$fecha = $this->fecha_hora();
		$id_usuario = $this->Session->read('Auth.Lectore.id');		
		$fecha_entrega = $this->sumar_fechas($fecha,2);
		
		$this->Prestamo->updateAll(array('Prestamo.estado'=>1,'Prestamo.fecha_entrega'=>"'$fecha_entrega'",'Prestamo.fecha_prestamo'=>"'$fecha'",'Prestamo.usuario_id'=>$id_usuario),array('Prestamo.id'=>$id));		
		$prestamo_tmp = $this->Prestamo->read(null,$id);
		$id_ejemplar = $prestamo_tmp['Prestamo']['ejemplare_id'];
		
		$this->Ejemplare->updateAll(array('Ejemplare.estado'=>"'No disponible'"),array('Ejemplare.id'=>$id_ejemplar));		
		
		$this->Session->setFlash('La operación se completo con éxito.','default',array('class'=>'alert alert-success'));
		$this->redirect(array('controller'=>'biblioteca','action'=>'reservas'));
			
	}		
		
		function delete_reserva($id = null) {		
		$id = $_REQUEST['ReservaIdValue'];				
		if (!$id) {			
		$this->redirect(array('controller'=>'biblioteca','action'=>'reservas'));		
		}				
		if ($this->Prestamo->delete($id)) {			
		$this->Session->setFlash('Se elimino con Ã©xito.');		
		$this->redirect(array('controller'=>'biblioteca','action'=>'reservas'));		
		}			
		
		$this->redirect(array('controller'=>'biblioteca','action'=>'reservas'));	
		
		}		
		
		function devoluciones(){		
		
		//calculo de los dias de atraso
		$this->Prestamo->recursive = 1;
		$prestamos_lectores= $this->Prestamo->find('all',array('conditions'=>array('Prestamo.estado'=>1)));
		foreach($prestamos_lectores as $prest){	
			if(strtotime($this->fecha()) > strtotime($prest['Prestamo']['fecha_entrega'])){
				$atraso = $this->restaFechas($prest['Prestamo']['fecha_entrega'],$this->fecha());
				//calculo de las sanciones
				switch($atraso){
					case 0: $this->Prestamo->updateAll(array('Prestamo.atraso'=>$atraso,'Prestamo.sancione_id'=>1),array('Prestamo.id'=>$prest['Prestamo']['id'])); break;
					case 1: $this->Prestamo->updateAll(array('Prestamo.atraso'=>$atraso,'Prestamo.sancione_id'=>2),array('Prestamo.id'=>$prest['Prestamo']['id'])); break;
					case 2: $this->Prestamo->updateAll(array('Prestamo.atraso'=>$atraso,'Prestamo.sancione_id'=>3),array('Prestamo.id'=>$prest['Prestamo']['id'])); break;
					case 3: $this->Prestamo->updateAll(array('Prestamo.atraso'=>$atraso,'Prestamo.sancione_id'=>4),array('Prestamo.id'=>$prest['Prestamo']['id'])); break;
					default: $this->Prestamo->updateAll(array('Prestamo.atraso'=>$atraso,'Prestamo.sancione_id'=>4),array('Prestamo.id'=>$prest['Prestamo']['id'])); break;
				}
			}	
		}
		
		$prestamos = $this->Prestamo->query("SELECT p.id,p.atraso,p.fecha_entrega,e.codigo,le.nombre_lector,p.fecha_prestamo,t.titulo,t.autor,b.nombre_biblioteca FROM prestamos AS p											
		INNER JOIN lectores AS le ON le.id = p.lectore_id											
		INNER JOIN ejemplares AS e ON e.id = p.ejemplare_id											
		INNER JOIN textos AS t ON t.id = e.texto_id											
		INNER JOIN bibliotecas AS b ON b.id = e.biblioteca_id											
		WHERE p.estado=1");	
		
		$devoluciones = $this->Prestamo->query("SELECT p.id,e.codigo,le.nombre_lector,p.fecha_devolucion,t.titulo,t.autor,b.nombre_biblioteca FROM prestamos AS p												
		INNER JOIN lectores AS le ON le.id = p.lectore_id											
		INNER JOIN ejemplares AS e ON e.id = p.ejemplare_id												
		INNER JOIN textos AS t ON t.id = e.texto_id	INNER JOIN bibliotecas AS b ON b.id = e.biblioteca_id WHERE p.estado=2");				

		$this->set('devoluciones',$devoluciones);		

		$this->set('prestamos',$prestamos);	

	}		

			

	function devolver($id = null){		

		$id = $_REQUEST['PrestamoIdValue'];		

		$fecha = $this->fecha_hora();		

		$this->Prestamo->updateAll(array('Prestamo.estado'=>2,'Prestamo.fecha_devolucion'=>"'$fecha'"),array('Prestamo.id'=>$id));

		

		$this->redirect(array('controller'=>'biblioteca','action'=>'devoluciones'));		

	}

	function sancionados(){
		
		$sancionados = $this->Prestamo->query("SELECT p.estado,s.nombre_sancion,s.grado,s.costo,p.atraso,le.nombre_lector,t.titulo,e.codigo FROM prestamos AS p
												INNER JOIN sanciones AS s ON s.id = p.sancione_id
												INNER JOIN lectores AS le ON le.id = p.lectore_id
												INNER JOIN ejemplares AS e ON e.id = p.ejemplare_id
												INNER JOIN textos AS t ON t.id = e.texto_id
												WHERE p.estado = 1 AND p.atraso > 0");
		$this->set('sancionados',$sancionados);	
	}

}
?>
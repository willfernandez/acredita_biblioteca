<?php
class ReservasController extends AppController {
	//public $name = 'Reservas';
	public $uses = array('Prestamo','Sancione','Ejemplare','Texto','Sede','Biblioteca','Alumno','Personal');


	function beforeFilter() {

		$this->_authusuarios();

    }

	function index() {

		$this->layout = 'cpanel';				
		$prestamos = $this->Prestamo->find('all', array('recursive' => 2));
		$this->set('prestamos',$prestamos);

	}

	function reservaencurso() {

		$this->layout = 'cpanel';				
		$bibliotecas= $this->Biblioteca->find('all',array('recursive' => 0));
		$i=0;
		foreach ($bibliotecas as $biblioteca):
		$prestamosencurso[$i] = $this->Prestamo->find('all', array('joins' => array(
    	array(
        'table' => 'ejemplares',
        'alias' => 'Ejemplar',
        'type' => 'inner',
        'foreignKey' => false,
        'conditions'=> array('Prestamo.ejemplare_id = Ejemplar.id')
   		 )),'conditions'=>array('Ejemplar.biblioteca_id'=>$biblioteca['Biblioteca']['id'],'OR'=>array( array('Prestamo.estado' => 0), array('Prestamo.estado' => 1))),'recursive' =>2));
		$i=$i+1;
		endforeach;
		$this->set('prestamosencurso',$prestamosencurso);
		$this->set('bibliotecas',$bibliotecas);

	}
	function devueltos() {

		$this->layout = 'cpanel';				
		$bibliotecas= $this->Biblioteca->find('all',array('recursive' => 0));
		$i=0;
		foreach ($bibliotecas as $biblioteca):
		$prestamosencurso[$i] = $this->Prestamo->query('SELECT l.id,s.id,b.nombre_biblioteca,p.id ,p.estado, a.nombres,a.apellidos,t.titulo,p.fecha_devolucion,s.grado,e.id, DATEDIFF(NOW(),p.fecha_devolucion) AS ahora FROM prestamos p
		INNER JOIN lectores l ON p.lectore_id=l.id
		INNER JOIN alumnos a ON l.alumno_id=a.id
		INNER JOIN sanciones s ON p.sancione_id=s.id
		INNER JOIN ejemplares e ON p.ejemplare_id=e.id
		INNER JOIN textos t ON e.texto_id=t.id
		INNER JOIN bibliotecas b ON e.biblioteca_id=b.id
		WHERE b.id='.$biblioteca['Biblioteca']['id'].' AND (p.estado=1 OR p.estado=2)');
		$i=$i+1;
		endforeach;
		$this->set('prestamosencurso',$prestamosencurso);
		$this->set('bibliotecas',$bibliotecas);
	

	}
	
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid prestamo', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('prestamo', $this->Prestamo->read(null, $id));
	}

	function crearficha() {
		if (!empty($this->data)) {
			$this->Prestamo->create();
			if ($this->Prestamo->save($this->data)) {
				$this->Session->setFlash(__('Prestamo guardado exitosamente', true));
				$this->redirect(array('controller' => 'reservas', 'action'=>'index'));
			} else {
				$this->Session->setFlash(__('La reserva no se guardo, intentelo nuevamente.', true));
			}
		}
		$this->layout = 'cpanel';
		$ejemplar_id=$_GET['ejemplar'];		
		$lector_id=1;			
		//Proceso de reserva
		$ejemplares = $this->Ejemplare->find('all', array('conditions'=>array('Ejemplare.id'=> $ejemplar_id),'recursive' => 2));
		$sanciones = $this->Prestamo->Sancione->find('list');
		$usuarios = $this->Prestamo->Usuario->find('list');
		
		$misprestamos = $this->Prestamo->query("SELECT  p.id, t.id, t.titulo,t.autor,t.imagen,p.ejemplare_id, p.fecha_prestamo,p.estado FROM prestamos p
		INNER JOIN ejemplares e ON p.ejemplare_id=e.id
		INNER JOIN textos t ON e.texto_id=t.id 
		WHERE p.lectore_id = 1  ORDER BY p.id DESC LIMIT 5");
		//Mis prestamos
		$this->set(compact('sanciones', 'ejemplares', 'usuarios','misprestamos'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid prestamo', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Prestamo->save($this->data)) {
				$this->Session->setFlash(__('The prestamo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prestamo could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Prestamo->read(null, $id);
		}
		$sanciones = $this->Prestamo->Sancione->find('list');
		$ejemplares = $this->Prestamo->Ejemplare->find('list');
		$usuarios = $this->Prestamo->Usuario->find('list');
		$this->set(compact('sanciones', 'ejemplares', 'usuarios'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for prestamo', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Prestamo->delete($id)) {
			$this->Session->setFlash(__('Prestamo deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Prestamo was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}

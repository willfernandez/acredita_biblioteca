<?php 

class PrestamosController extends AppController{

	public $name = 'Prestamos';

	

	function beforeFilter() {

		$this->_authusuarios();

		$this->layout = 'cpanel';

    }

	

	function index(){

		$prestamos = $this->Prestamo->find('all',array(
			'order'=>array('Prestamo.fecha_prestamo DESC'),
			'conditions'=>array('Prestamo.estado'=>1)));

		$this->set(compact('prestamos'));

	}

	function prestamo_add(){

		if(!empty($this->data)){

			$this->Prestamo->create();

			$fecha_actual = $this->fecha_hora();
			$this->data['Prestamo']['fecha_entrega']=$this->sumar_fechas($fecha_actual,2);
			$this->data['Prestamo']['sancione_id']=1; //sin sancion
			$this->data['Prestamo']['fecha_prestamo']=$this->fecha_hora();
			$this->data['Prestamo']['estado']=1;
			$this->data['Prestamo']['usuario_id']=$this->Auth->user('id');

			

			if($this->Prestamo->save($this->data)){
				$this->Session->setFlash('Se ha guardado correctamente','default',array('class'=>'alert alert-success'));

				$this->redirect(array('action' => 'index'));

			}

			else{

				$this->Session->setFlash(__('Error al guardar. Por favor, intente de nuevo.', true));

			}

		}

		

		$this->Prestamo->Lectore->recursive = -1;

		$lectores = $this->Prestamo->Lectore->find('all');

		

		$id_biblioteca= 1; //esto verificar donde pertence el usuario

		

		$this->Prestamo->Ejemplare->Behaviors->attach('Containable');

		$this->Prestamo->Ejemplare->contain('Texto','Biblioteca');

		$ejemplares = $this->Prestamo->Ejemplare->find('all',array('conditions'=>array('Ejemplare.biblioteca_id'=>$id_biblioteca)));

		

		$this->set(compact('lectores','ejemplares'));

	}

	

	function ficha_prestamo(){

		$this->layout = 'ajax';

		

		$prestamo_id = $_REQUEST['id'];

		$this->Prestamo->Behaviors->attach('Containable');

		$this->Prestamo->contain('Ejemplare','Lectore','Usuario');

		$prestamo = $this->Prestamo->read(null,$prestamo_id);

		$id_texto = $prestamo['Ejemplare']['texto_id'];

		$texto = $this->Prestamo->Ejemplare->Texto->recursive = -1;

		$texto = $this->Prestamo->Ejemplare->Texto->read(null,$id_texto);	

		$this->set(compact('prestamo','texto'));

	}

	

	function prestamo_delete($id = null) {

		$id = $_REQUEST['PrestamoIdValue'];

		

		if (!$id) {

			$this->redirect(array('action'=>'index'));

		}

		

		if ($this->Prestamo->delete($id)) {
			$this->Session->setFlash('Se elimino correctamente','default',array('class'=>'alert alert-success'));

			$this->redirect(array('action'=>'index'));

		}

	

		$this->redirect(array('action' => 'index'));

	}

	

}



?>
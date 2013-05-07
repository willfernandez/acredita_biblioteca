<?php 
class ConfiguracionController extends AppController{
	var $uses = array('Categoria','Subcategoria','Editorial','Idioma','Sede','Provincia','Departamento','Distrito');
	
	function beforeFilter() {
		$this->_authusuarios();
		$this->layout = 'cpanel';
    }
	
	function index(){
		
	}
	
	function categorias(){
		
		$this->recursive=-1;
		$this->set('categorias',$this->Categoria->find('all'));
	}
	
	function subcategorias(){
		$this->Subcategoria->Behaviors->attach('Containable');
		$this->Subcategoria->contain('Categoria');
		$this->set('subcategorias',$this->Subcategoria->find('all'));
	}
	
	function editoriales(){
		
		$this->recursive=-1;
		$this->set('editoriales',$this->Editorial->find('all'));
	}
	
	function categoria_add(){
		if (!empty($this->data)) {
			$this->Categoria->create();
			if ($this->Categoria->save($this->data)) {
				$this->Session->setFlash('Se grabó correctamente los datos.','default',array('class'=>'alert alert-success'));
				$this->redirect(array('controller'=>'configuracion','action' => 'categorias'));
			} else {
				$this->Session->setFlash('No se puedo completar la operación. Intente de nuevo.','default',array('class'=>'alert alert-success'));
			}
		}
	}
	
	function subcategoria_add(){
		if (!empty($this->data)) {
			$this->Subcategoria->create();
			if ($this->Subcategoria->save($this->data)) {
				$this->Session->setFlash('Se grabó correctamente los datos.','default',array('class'=>'alert alert-success'));
				$this->redirect(array('controller'=>'configuracion','action' => 'subcategorias'));
			} else {
				$this->Session->setFlash('No se puedo completar la operación. Intente de nuevo.','default',array('class'=>'alert alert-success'));
			}
		}
		else{
			$categorias = $this->Categoria->find('list');
			$this->set(compact('categorias'));
		}
	}
	
	function editorial_add(){
		if (!empty($this->data)) {
			$this->Editorial->create();
			if ($this->Editorial->save($this->data)) {
				$this->Session->setFlash('Se grabó correctamente los datos.','default',array('class'=>'alert alert-success'));
				$this->redirect(array('controller'=>'configuracion','action' => 'editoriales'));
			} else {
				$this->Session->setFlash('No se puedo completar la operación. Intente de nuevo.','default',array('class'=>'alert alert-success'));
			}
		}
	}
	
	function sede_add(){
		if (!empty($this->data)) {
			$this->Sede->create();
			if ($this->Sede->save($this->data)) {
				$this->Session->setFlash('<a class="close" href="#">×</a>Se grabó correctamente los datos.','default',array('class'=>'alert-message success'));
				$this->redirect(array('controller'=>'configuracion','action' => 'index'));
			} else {
				$this->Session->setFlash('<a class="close" href="#">×</a>No se puedo completar la operación. Intente de nuevo.','default',array('class'=>'alert-message error'));
			}
		}
		
		$departamentos = $this->Sede->Departamento->find('list');
		$provincias = $this->Sede->Provincia->find('list');
		$distritos = $this->Sede->Distrito->find('list');
		$this->set(compact('departamentos','provincias','distritos'));
	}
	
	function sede_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('<a class="close" href="#">×</a>El artículo no existe.','default',array('class'=>'alert-message error'));
			$this->redirect(array('controller'=>'configuracion','action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Sede->save($this->data)) {
				$this->Session->setFlash('<a class="close" href="#">×</a>Se actualizaron correctamente los datos.','default',array('class'=>'alert-message success'));
				$this->redirect(array('controller'=>'configuracion','action' => 'index'));
			} 
			else {
				$this->Session->setFlash('<a class="close" href="#">×</a>No se puedo completar la operación. Intente de nuevo.','default',array('class'=>'alert-message error'));
			}
		}
		else{
			$this->data = $this->Sede->read(null, $id);
		}
		
		$departamentos = $this->Sede->Departamento->find('list');
		$provincias = $this->Sede->Provincia->find('list');
		$distritos = $this->Sede->Distrito->find('list');
		$this->set(compact('departamentos','provincias','distritos'));
	}
	
	function departamento_add(){
		if (!empty($this->data)) {
			$this->Departamento->create();
			if ($this->Departamento->save($this->data)) {
				$this->Session->setFlash('<a class="close" href="#">×</a>Se grabó correctamente los datos.','default',array('class'=>'alert-message success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<a class="close" href="#">×</a>No se puedo completar la operación. Intente de nuevo.','default',array('class'=>'alert-message error'));
			}
		}
	}
	
	function departamento_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('<a class="close" href="#">×</a>El artículo no existe.','default',array('class'=>'alert-message error'));
			$this->redirect(array('controller'=>'configuracion','action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Departamento->save($this->data)) {
				$this->Session->setFlash('<a class="close" href="#">×</a>Se actualizaron correctamente los datos.','default',array('class'=>'alert-message success'));
				$this->redirect(array('controller'=>'configuracion','action' => 'index'));
			} 
			else {
				$this->Session->setFlash('<a class="close" href="#">×</a>No se puedo completar la operación. Intente de nuevo.','default',array('class'=>'alert-message error'));
			}
		}
		else{
			$this->data = $this->Departamento->read(null, $id);
		}
	}
	
	function provincia_add(){
		if (!empty($this->data)) {
			$this->Provincia->create();
			if ($this->Provincia->save($this->data)) {
				$this->Session->setFlash('<a class="close" href="#">×</a>Se grabó correctamente los datos.','default',array('class'=>'alert-message success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<a class="close" href="#">×</a>No se puedo completar la operación. Intente de nuevo.','default',array('class'=>'alert-message error'));
			}
		}
		
		$departamentos = $this->Provincia->Departamento->find('list');
		$this->set(compact('departamentos'));
	}
	
	function provincia_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('<a class="close" href="#">×</a>El artículo no existe.','default',array('class'=>'alert-message error'));
			$this->redirect(array('controller'=>'configuracion','action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Provincia->save($this->data)) {
				$this->Session->setFlash('<a class="close" href="#">×</a>Se actualizaron correctamente los datos.','default',array('class'=>'alert-message success'));
				$this->redirect(array('controller'=>'configuracion','action' => 'index'));
			} 
			else {
				$this->Session->setFlash('<a class="close" href="#">×</a>No se puedo completar la operación. Intente de nuevo.','default',array('class'=>'alert-message error'));
			}
		}
		else{
			$this->data = $this->Provincia->read(null, $id);
			$departamentos = $this->Provincia->Departamento->find('list');
			$this->set(compact('departamentos'));
		}
	}
	
	function distrito_add(){
		if (!empty($this->data)) {
			$this->Distrito->create();
			if ($this->Distrito->save($this->data)) {
				$this->Session->setFlash('<a class="close" href="#">×</a>Se grabó correctamente los datos.','default',array('class'=>'alert-message success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<a class="close" href="#">×</a>No se puedo completar la operación. Intente de nuevo.','default',array('class'=>'alert-message error'));
			}
		}
		
		$distritos = $this->Provincia->Distrito->find('list');
		$this->set(compact('distritos'));
	}
	
	function distrito_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('<a class="close" href="#">×</a>El artículo no existe.','default',array('class'=>'alert-message error'));
			$this->redirect(array('controller'=>'configuracion','action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Distrito->save($this->data)) {
				$this->Session->setFlash('<a class="close" href="#">×</a>Se actualizaron correctamente los datos.','default',array('class'=>'alert-message success'));
				$this->redirect(array('controller'=>'configuracion','action' => 'index'));
			} 
			else {
				$this->Session->setFlash('<a class="close" href="#">×</a>No se puedo completar la operación. Intente de nuevo.','default',array('class'=>'alert-message error'));
			}
		}
		else{
			$this->data = $this->Distrito->read(null, $id);
			$provincias = $this->Distrito->Provincia->find('list');
			$this->set(compact('provincias'));
		}
	}
	
}	
?>
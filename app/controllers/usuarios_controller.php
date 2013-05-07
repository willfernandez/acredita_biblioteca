<?php
class UsuariosController extends AppController {

	public $name = 'Usuarios';
	public $uses = array('Usuario');
	
	function beforeFilter() {
		$this->_authusuarios();
		//$this->Auth->allowedActions = array('*');
		$this->layout = 'cpanel';
    }
	

	function usuario_login(){
		$this->layout = 'login';
	}
	
	function logout()
	{	
		$this->redirect($this->Auth->logout());
	}
	
	function index(){
		$this->set('usuarios',$this->Usuario->find('all'));
	}
	
	function agregar() {
		if (!empty($this->data)) {
			$this->Usuario->create();
			$this->data['Usuario']['fecha_registro'] = $this->fecha_hora();
			
			if ($this->Usuario->save($this->data)) {
				$this->Session->setFlash(__('The usuario has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.', true));
			}
		}
		else{
			$bibliotecas = $this->Usuario->Biblioteca->find('list');
			$this->set(compact('bibliotecas'));
		}
	}
	
	function editar($id = null) {
		$id = $_REQUEST['UsuarioIdValue'];
		if (!$id) {
			$this->redirect(array('action'=>'index'));
		}
		
		if (!empty($this->data)) {
			if ($this->Usuario->save($this->data)) {
				$this->Session->setFlash(__('The usuario has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.', true));
			}
		}
		else{
			$this->data = $this->Usuario->read(null, $id);
			$bibliotecas = $this->Usuario->Biblioteca->find('list');
			$this->set(compact('bibliotecas'));
		}
	}
	
	function eliminar($id = null) {
		$id = $_REQUEST['UsuarioIdValue'];
		
		if (!$id) {
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Usuario->delete($id)) {
			$this->Session->setFlash(__('Usuario deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	
		$this->redirect(array('action' => 'index'));
	}
}

?>

<?php 
class TextosController extends AppController{
	public $name = 'Textos';
	public $uses = array('Texto','Categoria','Ejemplare');
	
	function beforeFilter() {
		$this->_authusuarios();
		$this->layout = 'cpanel';
    }
	
	function home(){
			
	}
	function index(){
		$this->Categoria->recursive = -1;
		$categorias = $this->Categoria->find('all');
			
		$categorias[0]['Categoria']['icono'] ='icon-book';
		$categorias[1]['Categoria']['button'] ='btn-warning';
		$categorias[2]['Categoria']['button'] ='btn-primary';
		$categorias[3]['Categoria']['button'] ='btn-danger';
		
		$textos = $this->Texto->find('all');
			
		$this->set(compact('categorias','textos'));
	}
	
	function categoria($id = null){
		if(!$id){
			$this->redirect(array('action'=>'index'));
		}
		$this->Categoria->recursive = -1;
		$categorias = $this->Categoria->find('all');
			
		$categorias[0]['Categoria']['icono'] ='icon-book';
		$categorias[1]['Categoria']['button'] ='btn-warning';
		$categorias[2]['Categoria']['button'] ='btn-primary';
		$categorias[3]['Categoria']['button'] ='btn-danger';
		
		$categoria_texto = $this->Categoria->read(null,$id);
		$textos = $this->Texto->find('all', array('conditions'=>array('Texto.categoria_id'=>$id)));
		$this->set(compact('categorias','textos','categoria_texto'));
	}
	
	function detalle($id = null){
		if(!$id){
			$this->redirect(array('action'=>'index'));
		}
		$this->Texto->Behaviors->attach('Containable');
		$this->Texto->contain('Editorial','Lectore','Idioma');
		$texto = $this->Texto->read(null,$id);
		
		$this->Ejemplare->Behaviors->attach('Containable');
		$this->Ejemplare->contain('Biblioteca');
		$ejemplares = $this->Ejemplare->find('all',array('conditions'=>array('Ejemplare.texto_id'=>$id)));
		$this->set(compact('texto','ejemplares'));
	}	
}
?>
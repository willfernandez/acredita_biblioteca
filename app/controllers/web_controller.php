<?php 
class WebController extends AppController{
	public $uses = array('Texto');

	function beforeFilter() {
		$this->_authlectores();
		$this->Auth->allowedActions = array('*');
    }
	
	function index(){
		
		$this->Texto->recursive = 1;
		$textos = $this->Texto->find('all',array('conditions'=>array('Texto.estado !='=>'borrador'),'order'=>'Texto.id DESC','limit'=>8));
		$libros = $this->Texto->find('all',array('conditions'=>array('Texto.categoria_id'=>1),'order'=>'Texto.id DESC','limit'=>10));
		$tesis = $this->Texto->find('all',array('conditions'=>array('Texto.categoria_id'=>2),'order'=>'Texto.id DESC','limit'=>10));
		$revistas = $this->Texto->find('all',array('conditions'=>array('Texto.categoria_id'=>3),'order'=>'Texto.id DESC','limit'=>10));
		$informes = $this->Texto->find('all',array('conditions'=>array('Texto.categoria_id'=>4),'order'=>'Texto.id DESC','limit'=>10));
		
		$this->set(compact('textos','libros','tesis','revistas','informes'));
	}
	
	function biblioteca(){
	
	}
        function servicio(){
	
	}
        function campus(){
	
	}
        function contactenos(){
	
	}
        
        
}
?>
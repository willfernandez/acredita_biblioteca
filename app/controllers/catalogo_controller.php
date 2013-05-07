<?php 
class CatalogoController extends AppController{
	public $uses = array('Categoria','Subcategoria','Texto','Ejemplare');
	
	function beforeFilter() {
		$this->_authlectores();
		$this->Auth->allowedActions = array('*');
    }
	
	function index(){
		$categorias = $this->Categoria->find('all');
		$this->set(compact('categorias'));
	}
	
	function busqueda_general(){
		if(!empty($this->data)){
			$queryString = $this->data['query'];
			$categoria_seleccionada = $this->data['categoria'];
			$cond = array('Texto.titulo LIKE' => '%'.$queryString.'%',
						  'Texto.etiquetas LIKE' => '%'.$queryString.'%',
						  'Texto.autor LIKE' => '%'.$queryString.'%'
						);
			$this->Texto->recursive = -1;
			$textos =  $this->Texto->find('all',array('conditions'=>array('categoria_id' =>$categoria_seleccionada,'OR'=>$cond)));
			$this->set('textos',$textos);
			$this->set('query',$queryString);
			$this->set('total_resultado',count($textos));
			$this->set('categoria_seleccionada',$categoria_seleccionada);
		}
		$categorias = $this->Categoria->find('all');
		$this->set(compact('categorias'));
	}
	
	function detalle($id = null){
		if(!$id){
			$this->redirect(array('action'=>'index'));
		}
		$texto = $this->Texto->read(null,$id);	
		$this->Ejemplare->Behaviors->attach('Containable');
		$this->Ejemplare->contain('Biblioteca');
		$ejemplares = $this->Ejemplare->find('all',array('conditions'=>array('Ejemplare.texto_id'=>$id)));
		$this->set(compact('texto','ejemplares'));
	}
	
}
?>
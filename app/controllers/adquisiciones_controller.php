<?php 
class AdquisicionesController extends AppController{
	public $uses = array('Texto','Categoria','Ejemplare','Biblioteca');
	
	function beforeFilter() {
		$this->_authusuarios();
		$this->layout = 'cpanel';
    }
	
	function index(){
		/*$ejemplares = $this->Ejemplare->find('all',array(
						'fields' => array('DISTINCT Ejemplare.texto_id'),
						'order'=>array('Ejemplare.fecha_adquisicion DESC')));
		*/

		$ejemplares = $this->Ejemplare->query("SELECT DISTINCT `Ejemplare`.`codigo`,`Ejemplare`.`texto_id`, `Ejemplare`.`fecha_adquisicion`, `Texto`.`titulo`, 
			`Biblioteca`.`nombre_biblioteca`,`Categoria`.`nombre_cat` 
			FROM `ejemplares` AS `Ejemplare` 
			INNER JOIN `textos` AS `Texto` ON (`Ejemplare`.`texto_id` = `Texto`.`id`) 
			INNER JOIN `categorias` AS `Categoria` ON (`Texto`.`categoria_id` = `Categoria`.`id`) 
			INNER JOIN `bibliotecas` AS `Biblioteca` ON (`Ejemplare`.`biblioteca_id` = `Biblioteca`.`id`) 
			WHERE 1 = 1 ORDER BY `Ejemplare`.`fecha_adquisicion` DESC ");
		
		$this->set('ejemplares',$ejemplares);
		
		$this->Texto->Behaviors->attach('Containable');
		$this->Texto->contain('Usuario','Lectore','Categoria');
		$cond = array('Texto.formato'=>'digital');
		$textos = $this->Texto->find('all',array('conditions'=>$cond));
		$this->set('textos',$textos);
		
	}
	
	function libro_index(){
		$this->Texto->recursive = -1;
		$cond = array('Texto.categoria_id'=>1);
		$textos = $this->Texto->find('all',array('conditions'=>$cond));
		$this->set('textos',$textos);
	}
	
	function informe_index(){
		$this->Texto->recursive = -1;
		$cond = array('Texto.categoria_id'=>2);
		$textos = $this->Texto->find('all',array('conditions'=>$cond));
		$this->set('textos',$textos);
	}
	function revista_index(){
		$this->Texto->recursive = -1;
		$cond = array('Texto.categoria_id'=>3);
		$textos = $this->Texto->find('all',array('conditions'=>$cond));
		$this->set('textos',$textos);
	}
	function tesis_index(){
		$this->Texto->recursive = -1;
		$cond = array('Texto.categoria_id'=>4);
		$textos = $this->Texto->find('all',array('conditions'=>$cond));
		$this->set('textos',$textos);
	}
	function archivo_index(){
		$this->Texto->Behaviors->attach('Containable');
		$this->Texto->contain('Usuario','Lectore');
		$cond = array('Texto.formato'=>'digital');
		$textos = $this->Texto->find('all',array('conditions'=>$cond));
		$this->set('textos',$textos);
	}
	
	function libro_add(){
		if (!empty($this->data)) {
			$this->Texto->create();
			$this->data['Texto']['categoria_id']=1;
			$this->data['Texto']['estado']='publicado';
			$this->data['Texto']['imagen'] = $this->data['Texto']['archivo']['name'];
			
			if ($this->Texto->save($this->data)) {
				//subir archivo en la carpeta webroot/img/imagenes
				copy($this->data['Texto']['archivo']['tmp_name'],'img/imagenes/'.$this->data['Texto']['imagen']);			
				$this->redirect(array('controller'=>'adquisiciones','action' =>'libro_index'));
			}
			else{
				$this->Session->setFlash('Error al enviar. Por favor, intente de nuevo.','cpanel',array('class'=>'alert alert-danger'));	
			}
		}
		else{
			$editorials = $this->Texto->Editorial->find('list');
			$idiomas = $this->Texto->Idioma->find('list');
			$subcategorias = $this->Texto->Subcategoria->find('list');
			$this->set(compact('editorials','idiomas','subcategorias'));
		}
	}
	
	function ejemplar_add($id = null){
		if(!empty($this->data)){
			$this->Ejemplare->create();
			$this->data['Ejemplare']['fecha_adquisicion']= $this->fecha_hora();
			if($this->Ejemplare->save($this->data)){
				$this->Session->setFlash('Se ha guardado correctamente');
				$this->redirect(array('action'=>'ejemplar_add',$this->data['Ejemplare']['texto_id']));
			}
			else{
				$this->Session->setFlash('Error al guardar. Por favor, intente de nuevo');
			}
		}
		if(isset($_REQUEST['TextoIdValue'])){
			$id = $_REQUEST['TextoIdValue'];
		}
		if(!$id){
			$this->redirect(array('action'=>'index'));
		}
			
		$ejemplares = $this->Ejemplare->find('all',array('conditions'=>array('Ejemplare.texto_id'=>$id)));
		$texto = $this->Texto->read(null,$id);
		$bibliotecas = $this->Biblioteca->find('list');
		$fecha = $this->fecha_hora();
		$this->set(compact('texto','bibliotecas','fecha','ejemplares'));
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
	
	function texto_delete($id = null){
		$id = $_REQUEST['TextoIdValue'];
		
		if (!$id) {
			$this->redirect(array('action'=>'index'));
		}
		$this->Texto->recursive =-1;
		$texto_tmp = $this->Texto->read(null,$id);
		if ($this->Texto->delete($id)) {
			$this->Session->setFlash(__('Se elimino correctamente', true));
			switch($texto_tmp['Texto']['categoria_id']){
				case 1: $action = 'libro_index'; break;
				case 2: $action = 'informe_index'; break;
				case 3: $action = 'revista_index'; break;
				case 4: $action = 'tesis_index'; break;
				default: $action = 'index'; break;
			}
			$this->redirect(array('action'=>$action));
		}
	
		$this->redirect(array('action' => 'index'));
	}
	
	function informe_add(){
		if (!empty($this->data)) {
			$this->Texto->create();
			$this->data['Texto']['categoria_id']=2;
			$this->data['Texto']['estado']='publicado';
			//$this->data['Texto']['imagen'] = $this->data['Texto']['archivo']['name'];
			
			if ($this->Texto->save($this->data)) {
				$this->Ejemplare->create();
				$this->data['Ejemplare']['texto_id']= $this->Texto->id;
				$this->data['Ejemplare']['fecha_adquisicion']= $this->fecha_hora();
				$this->data['Ejemplare']['biblioteca_id']= $this->Auth->user('biblioteca_id');
				$this->data['Ejemplare']['codigo']= $this->data['Texto']['codigo'];
				$this->data['Ejemplare']['estado']= 'Disponible';
				
				if($this->Ejemplare->save($this->data)){
					$this->redirect(array('controller'=>'adquisiciones','action' =>'informe_index'));
				}
				else{
					$this->Session->setFlash('Error al enviar. Por favor, intente de nuevo.','cpanel',array('class'=>'alert alert-danger'));	
				}
			
				//subir archivo en la carpeta webroot/img/imagenes
				//copy($this->data['Texto']['archivo']['tmp_name'],'img/imagenes/'.$this->data['Texto']['imagen']);			
				//$this->redirect(array('controller'=>'adquisiciones','action' =>'informe_index'));
			}
			else{
				$this->Session->setFlash('Error al enviar. Por favor, intente de nuevo.','cpanel',array('class'=>'alert alert-danger'));	
			}
		}
		else{
			$editorials = $this->Texto->Editorial->find('list');
			$idiomas = $this->Texto->Idioma->find('list');
			$subcategorias = $this->Texto->Subcategoria->find('list',array('conditions'=>array('Subcategoria.categoria_id'=>4)));
			$this->set(compact('editorials','idiomas','subcategorias'));
		}
	}
	function revista_add(){
		if (!empty($this->data)) {
			$this->Texto->create();
			$this->data['Texto']['categoria_id']=3;
			$this->data['Texto']['estado']='publicado';
			$this->data['Texto']['imagen'] = $this->data['Texto']['archivo']['name'];
			
			if ($this->Texto->save($this->data)) {
				//subir archivo en la carpeta webroot/img/imagenes
				copy($this->data['Texto']['archivo']['tmp_name'],'img/imagenes/'.$this->data['Texto']['imagen']);			
				$this->redirect(array('controller'=>'adquisiciones','action' =>'revista_index'));
			}
			else{
				$this->Session->setFlash('Error al enviar. Por favor, intente de nuevo.','cpanel',array('class'=>'alert alert-danger'));	
			}
		}
		else{
			$editorials = $this->Texto->Editorial->find('list');
			$idiomas = $this->Texto->Idioma->find('list');
			$subcategorias = $this->Texto->Subcategoria->find('list');
			$this->set(compact('editorials','idiomas','subcategorias'));
		}
	}
	
	function tesis_add(){
		if (!empty($this->data)) {
			$this->Texto->create();
			$this->data['Texto']['categoria_id']=4;
			$this->data['Texto']['estado']='publicado';
			
			if ($this->Texto->save($this->data)) {
				$this->Ejemplare->create();
				$this->data['Ejemplare']['texto_id']= $this->Texto->id;
				$this->data['Ejemplare']['fecha_adquisicion']= $this->fecha_hora();
				$this->data['Ejemplare']['biblioteca_id']= $this->Auth->user('biblioteca_id');
				$this->data['Ejemplare']['codigo']= $this->data['Texto']['codigo'];
				$this->data['Ejemplare']['estado']= 'Disponible';
				
				if($this->Ejemplare->save($this->data)){
					$this->redirect(array('controller'=>'adquisiciones','action' =>'tesis_index'));
				}
				else{
					$this->Session->setFlash('Error al enviar. Por favor, intente de nuevo.','cpanel',array('class'=>'alert alert-danger'));	
				}
			}
			else{
				$this->Session->setFlash('Error al enviar. Por favor, intente de nuevo.','cpanel',array('class'=>'alert alert-danger'));	
			}
		}
		else{
			$editorials = $this->Texto->Editorial->find('list');
			$idiomas = $this->Texto->Idioma->find('list');
			$subcategorias = $this->Texto->Subcategoria->find('list',array('conditions'=>array('Subcategoria.categoria_id'=>4)));
			$this->set(compact('editorials','idiomas','subcategorias'));
		}
	}
	
	
	function archivo_add(){
		if (!empty($this->data)) {
			$this->Texto->create();
			$this->data['Texto']['formato']='digital';
			$this->data['Texto']['fecha_archivo'] = $this->fecha_hora();
			$this->data['Texto']['usuario_id'] = $this->Auth->user('id');
			$this->data['Texto']['imagen'] = $this->data['Texto']['archivo_imagen']['name'];
			$this->data['Texto']['nombre_archivo'] = $this->data['Texto']['archivo']['name'];
			$this->data['Texto']['size_archivo'] = $this->data['Texto']['archivo']['size'];
			$this->data['Texto']['tipo_archivo'] = $this->data['Texto']['archivo']['type'];
			
			if ($this->Texto->save($this->data)) {
				//subir imagen en la carpeta webroot/img/imagenes
				copy($this->data['Texto']['archivo_imagen']['tmp_name'],'img/imagenes/'.$this->data['Texto']['imagen']);			
				//subir archivo en la carpeta webroot/files/archivos
				copy($this->data['Texto']['archivo']['tmp_name'],'files/archivos/'.$this->data['Texto']['nombre_archivo']);
				$this->redirect(array('controller'=>'adquisiciones','action' =>'archivo_index'));
			}
			else{
				$this->Session->setFlash('Error al enviar. Por favor, intente de nuevo.','cpanel',array('class'=>'alert alert-danger'));	
			}
		}
		else{
			$editorials = $this->Texto->Editorial->find('list');
			$idiomas = $this->Texto->Idioma->find('list');
			$subcategorias = $this->Texto->Subcategoria->find('list');
			$categorias = $this->Texto->Categoria->find('list');
			$this->set(compact('editorials','categorias','idiomas','subcategorias'));
		}
	}
	
	function delete_archivo($id = null){
		$id = $_REQUEST['TextoIdValue'];
		if (!$id) {
			$this->Session->setFlash('El código no existe.');
			$this->redirect(array('controller'=>'adquisiciones','action'=>'archivo_index'));
		}
	
		$this->Texto->recursive = -1;
		$texto = $this->Texto->read(null,$id);
			
		if(!empty($texto['Texto']['nombre_archivo'])){
				$archivo = $texto['Texto']['nombre_archivo'];
				unlink("../webroot/files/archivos/$archivo"); 
		}
		if(!empty($texto['Texto']['imagen'])){
				$imagen = $texto['Texto']['imagen'];
				unlink("../webroot/img/imagenes/$imagen"); 
		}
	
		if ($this->Texto->delete($id)) {
			$this->Session->setFlash('Se eliminarón correctamente los datos.','default',array('class'=>'alert alert-success'));
			$this->redirect(array('controller'=>'adquisiciones','action'=>'archivo_index'));
		}
		
		$this->Session->setFlash('No se pudo complementar la operación. Intente nuevamente.');
		$this->redirect(array('controller'=>'adquisiciones','action'=>'archivo_index'));
	}
	
	function edit_archivo($id = null){
		
		if (!empty($this->data)) {
			$this->Texto->create();
			$this->data['Texto']['fecha_archivo'] = $this->fecha_hora();
			$this->data['Texto']['lectore_id'] = $this->Session->read('Auth.Lectore.id');
			
			$this->Texto->recursive = -1;
			$texto = $this->Texto->read(null,$id);
			
			if(!empty($this->data['Texto']['archivo']['name'])){
				$this->data['Texto']['nombre_archivo'] = $this->data['Texto']['archivo']['name'];
				$this->data['Texto']['tipo_archivo'] =   $this->data['Texto']['archivo']['type'];
				copy($this->data['Texto']['archivo']['tmp_name'],'files/archivos/'.$this->data['Texto']['nombre_archivo']);
				
				if(!empty($texto['Texto']['nombre_archivo'])){
					$archivo = $texto['Texto']['nombre_archivo'];
					unlink("../webroot/files/archivos/$archivo");
				}
			}
			
			if(!empty($this->data['Texto']['archivo_imagen']['name'])){
				$this->data['Texto']['imagen'] = $this->data['Texto']['archivo_imagen']['name'];
				copy($this->data['Texto']['archivo_imagen']['tmp_name'],'img/imagenes/'.$this->data['Texto']['imagen']);
				
				if(!empty($texto['Texto']['imagen'])){
					$imagen = $texto['Texto']['imagen'];
					unlink("../webroot/img/imagenes/$imagen");
				}
			}	
			
			if ($this->Texto->save($this->data)) {
				$this->Session->setFlash('La operación se completo con exito.','default',array('class'=>'alert alert-success'));
				$this->redirect(array('controller'=>'adquisiciones','action' =>'archivo_index'));
			}
			else{
				$this->Session->setFlash('Error al enviar. Por favor, intente de nuevo.','default',array('class'=>'alert alert-danger'));	
			}
		}
		else{
			$id = $_REQUEST['TextoIdValue'];
			$this->data = $this->Texto->read(null, $id);
			$editorials = $this->Texto->Editorial->find('list');
			$idiomas = $this->Texto->Idioma->find('list');
			$subcategorias = $this->Texto->Subcategoria->find('list');
			$categorias = $this->Texto->Categoria->find('list');
			$this->set(compact('editorials','idiomas','subcategorias','categorias'));
		}
	}
	
}
?>
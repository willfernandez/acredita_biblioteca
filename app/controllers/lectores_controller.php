<?php
class LectoresController extends AppController {

	public $name = 'Lectores';
	public $uses = array('Lectore','Personal','Categoria','Texto','Prestamo','Ejemplare');
	
	function beforeFilter() {
		$this->_authlectores();
		$this->layout = 'cpanelector';
		$this->Auth->allow('add_lector');
    }
	
	function login(){
		$this->layout = 'login_lector';
	}
	
	function logout()
	{	
		$this->redirect($this->Auth->logout());
	}
	
	function index(){
		/*$id_lector = $this->Session->read('Auth.Alumno.id');
		// Obtiene reservas por cada biblioteca
		$masprestados = $this->Prestamo->query("SELECT p.id, t.id,p.ejemplare_id, SUM(t.id) AS suma ,t.imagen,t.titulo, t.autor, p.fecha_prestamo, p.estado 
												FROM prestamos p
												INNER JOIN ejemplares e ON p.ejemplare_id=e.id
												INNER JOIN textos t ON e.texto_id=t.id 
												WHERE p.lectore_id = $id_lector ORDER BY suma DESC LIMIT 5 ");
												
		$this->Texto->recursive = -1;
		$textos = $this->Texto->find('all',array('conditions'=>array('Texto.estado !='=>'borrador'),'order'=>'Texto.id DESC','limit'=>8));
		$libros = $this->Texto->find('all',array('conditions'=>array('Texto.categoria_id'=>1),'order'=>'Texto.id DESC','limit'=>10));
		$tesis = $this->Texto->find('all',array('conditions'=>array('Texto.categoria_id'=>4),'order'=>'Texto.id DESC','limit'=>10));
		$revistas = $this->Texto->find('all',array('conditions'=>array('Texto.categoria_id'=>3),'order'=>'Texto.id DESC','limit'=>10));
		$informes = $this->Texto->find('all',array('conditions'=>array('Texto.categoria_id'=>2),'order'=>'Texto.id DESC','limit'=>10));
		
		$this->set(compact('textos','libros','tesis','revistas','informes','masprestados'));*/
	}
	
	function catalogo(){
		$this->Categoria->recursive = -1;
		$categorias = $this->Categoria->find('all');
			
		$categorias[0]['Categoria']['icono'] ='icon-book';
		$categorias[1]['Categoria']['button'] ='btn-warning';
		$categorias[2]['Categoria']['button'] ='btn-primary';
		$categorias[3]['Categoria']['button'] ='btn-danger';
		
		$textos = $this->Texto->find('all',array('conditions'=>array('Texto.estado !='=>'borrador')));
			
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
		
		if($texto['Texto']['formato']!='digital'){
			$this->Ejemplare->Behaviors->attach('Containable');
			$this->Ejemplare->contain('Biblioteca');
			$ejemplares = $this->Ejemplare->find('all',array('conditions'=>array('Ejemplare.texto_id'=>$id)));
			
			$this->set(compact('ejemplares'));
		}
		
		$this->set(compact('texto'));
	}
	
	function archivos(){
		$id=$this->Session->read('Auth.Lectore.id');
		$this->Texto->Behaviors->attach('Containable');
		$this->Texto->contain('Usuario','Lectore','Categoria');
		$this->set('textos',$this->Texto->find('all',array('conditions'=>array('Texto.nombre_archivo !='=>null,'Texto.lectore_id'=>$id))));
	}
	
	function reservas(){
		$id_lector = $this->Session->read('Auth.Lectore.id');
		$reservas = $this->Prestamo->query("SELECT p.id,e.codigo, titulo, autor,fecha_reserva,nombre_biblioteca FROM prestamos AS p 
											INNER JOIN ejemplares AS e ON p.ejemplare_id = e.id
											INNER JOIN textos AS t ON t.id = e.texto_id 
											INNER JOIN bibliotecas AS b ON b.id = e.biblioteca_id 
											WHERE p.lectore_id=$id_lector AND p.estado=0");
		$this->set('reservas',$reservas);
	}
	
	function bitacora(){
		$prestamos = $this->Prestamo->find('all', array('conditions'=>array('Prestamo.lectore_id'=>1),'recursive' => 2));
		$this->set('prestamos',$prestamos);
	}
	
	function crearficha($id=null){
		if (!empty($this->data)) {
			$this->data['Prestamo']['lectore_id'] = $this->Session->read('Auth.Lectore.id');
			$this->data['Prestamo']['fecha_reserva'] = $this->fecha_hora();
			$this->data['Prestamo']['sancione_id'] = 1;
			$this->data['Prestamo']['estado'] = 0;
			
			$this->Prestamo->create();
			if ($this->Prestamo->save($this->data)) {
				$this->Session->setFlash('La operación se completo con éxito.','default',array('class'=>'alert alert-success'));
				$this->redirect(array('controller' =>'lectores','action'=>'catalogo'));
			} 
			else {
				$this->Session->setFlash('La reserva no se guardo, intentelo nuevamente.');
			}
		}
		else{
			$ejemplar = $this->Ejemplare->query("SELECT e.id, e.codigo, t.autor, t.titulo,b.nombre_biblioteca FROM ejemplares AS e 
												INNER JOIN textos AS t ON e.texto_id = t.id 
												INNER JOIN bibliotecas AS b ON b.id = e.biblioteca_id
												WHERE e.id = $id");
			$this->set('ejemplar',$ejemplar);
		}
	}
	
	function borrarficha($id = null){
		$id = $_REQUEST['PrestamoIdValue'];
		if (!$id) {
			$this->Session->setFlash('El código no existe.');
			$this->redirect(array('controller'=>'lectores','action'=>'reservas'));
		}
		if ($this->Prestamo->delete($id)) {
			$this->Session->setFlash('La operación se completo con exito.','default',array('class'=>'alert alert-succes'));
			$this->redirect(array('controller'=>'lectores','action'=>'reservas'));
		}
		$this->Session->setFlash('No se pudo complementar la operación. Intente nuevamente.');
		$this->redirect(array('controller'=>'lectores','action'=>'reservas'));
	}
	
	function add_archivo(){
		if (!empty($this->data)) {
			$this->Texto->create();
			$this->data['Texto']['fecha_archivo'] = $this->fecha_hora();
			$this->data['Texto']['formato'] = 'digital';
			$this->data['Texto']['lectore_id'] = $this->Session->read('Auth.Lectore.id');
			$this->data['Texto']['imagen'] = $this->data['Texto']['archivo_imagen']['name'];
			$this->data['Texto']['nombre_archivo'] = $this->data['Texto']['archivo']['name'];
			$this->data['Texto']['size_archivo'] = $this->data['Texto']['archivo']['size'];
			$this->data['Texto']['tipo_archivo'] = $this->data['Texto']['archivo']['type'];
			$this->data['Texto']['estado'] = "borrador";
			
			if ($this->Texto->save($this->data)) {
				//subir imagen en la carpeta webroot/img/imagenes
				copy($this->data['Texto']['archivo_imagen']['tmp_name'],'img/imagenes/'.$this->data['Texto']['imagen']);			
				
				//subir archivo en la carpeta webroot/files/archivos
				copy($this->data['Texto']['archivo']['tmp_name'],'files/archivos/'.$this->data['Texto']['nombre_archivo']);
				$this->Session->setFlash('La operación se completo con éxito.','default',array('class'=>'alert alert-success'));
				$this->redirect(array('controller'=>'lectores','action' =>'archivos'));
			}
			else{
				$this->Session->setFlash('Error al enviar. Por favor, intente de nuevo.','cpanel',array('class'=>'alert alert-danger'));
				$this->redirect(array('controller'=>'lectores','action' =>'archivos'));				
			}
		}
		else{
			$editorials = $this->Texto->Editorial->find('list');
			$idiomas = $this->Texto->Idioma->find('list');
			$subcategorias = $this->Texto->Subcategoria->find('list');
			$categorias = $this->Texto->Categoria->find('list');
			$this->set(compact('editorials','idiomas'));
		}
	}
	
	function delete_archivo($id = null){
		$id = $_REQUEST['TextoIdValue'];
		if (!$id) {
			$this->Session->setFlash('El código no existe.');
			$this->redirect(array('controller'=>'lectores','action'=>'archivos'));
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
			$this->redirect(array('controller'=>'lectores','action'=>'archivos'));
		}
		
		$this->Session->setFlash('No se pudo complementar la operación. Intente nuevamente.');
		$this->redirect(array('controller'=>'lectores','action'=>'archivos'));
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
				$this->redirect(array('controller'=>'lectores','action' =>'archivos'));
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
			$this->set(compact('editorials','idiomas'));
		}
	}
	
	function sanciones(){	
		
		$id_lector = $this->Session->read('Auth.Lectore.id');
		$sanciones = $this->Prestamo->query("SELECT s.nombre_sancion,s.grado,e.id, e.codigo, t.titulo, t.autor, b.nombre_biblioteca, p.fecha_prestamo,p.fecha_entrega,p.fecha_devolucion, p.estado, s.costo
											FROM prestamos p
											INNER JOIN ejemplares e ON p.ejemplare_id=e.id
											INNER JOIN textos t ON e.texto_id=t.id
											INNER JOIN sanciones s ON p.sancione_id=s.id
											INNER JOIN bibliotecas b ON e.biblioteca_id=b.id
											WHERE p.lectore_id = $id_lector AND p.sancione_id > 1");
		$this->set(compact('sanciones'));

	}
	
	function add_lector(){
		$this->layout = 'cpanel';
		if (!empty($this->data)) {
			switch($this->data['Lectore']['tipo']){
				case 0:	
						$this->Alumno->create();
						$this->data['Alumno']['codigo_anterior'] = $this->data['Lectore']['codigo'];
						$this->data['Alumno']['nombres'] = $this->data['Lectore']['nombres'];
						$this->data['Alumno']['apellidos'] = $this->data['Lectore']['apellidos'];
						$this->data['Alumno']['email'] = $this->data['Lectore']['email'];
						$this->data['Alumno']['dni'] = $this->data['Lectore']['dni'];
						$this->data['Alumno']['estado'] = 'Pregrado';
						
						if($this->Alumno->save($this->data)){
							$this->data['Lectore']['alumno_id'] = $this->Alumno->id;
							$this->data['Lectore']['nombre_lector']=$this->data['Lectore']['nombres'].' '.$this->data['Lectore']['apellidos'];
							$this->Lectore->create();
							
							if($this->Lectore->save($this->data)){
								$this->Session->setFlash(__('The usuario has been saved', true));
							}
							else {
								$this->Session->setFlash(__('The usuario could not be saved. Please, try again.', true));
							}
						}
						break;
						
				case 1: case 2:
						$this->Personal->create();
						$this->data['Personal']['codigo_anterior'] = $this->data['Lectore']['codigo'];
						$this->data['Personal']['nombres'] = $this->data['Lectore']['nombres'];
						$this->data['Personal']['apellidos'] = $this->data['Lectore']['apellidos'];
						$this->data['Personal']['email'] = $this->data['Lectore']['email'];
						$this->data['Personal']['dni'] = $this->data['Lectore']['dni'];
						$this->data['Personal']['estado'] = 'Pregrado';
						
						if($this->Alumno->save($this->data)){
							$this->data['Lectore']['personal_id'] = $this->Personal->id;
							$this->data['Lectore']['nombre_lector']=$this->data['Lectore']['nombres'].' '.$this->data['Lectore']['apellidos'];
							$this->Lectore->create();
							
							if($this->Lectore->save($this->data)){
								$this->Session->setFlash(__('The usuario has been saved', true));
							}
							else {
								$this->Session->setFlash(__('The usuario could not be saved. Please, try again.', true));
							}
						}
						break;
			}
			
		}
	}
	function editar(){
            
        }
	
	
}
?>

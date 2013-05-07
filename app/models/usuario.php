<?php
class Usuario extends AppModel {
	public $name = 'Usuario';
	public $displayFields = array('nombre_usuario'=>'CONCAT(Usuario.nombres," ",Usuario.apellidos)');
	
	public $hasMany = array('Prestamo');
	public $belongsTo = array('Biblioteca');
}
?>

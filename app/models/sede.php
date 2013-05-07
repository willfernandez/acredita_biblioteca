<?php
class Sede extends AppModel {
	public $name = 'Sede';
	public $displayField = 'nombre_institucion';
	
	public $belongsTo = array('Departamento','Provincia','Distrito');
	public $hasMany = array('Ejemplare');

}
?>
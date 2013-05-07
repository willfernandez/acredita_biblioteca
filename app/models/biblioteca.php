<?php
class Biblioteca extends AppModel {
	public $name = 'Biblioteca';
	public $displayField = 'nombre_biblioteca';
	
	public $belongsTo = array('Sede');

	public $hasMany = array('Ejemplare','Usuario');

}

?>
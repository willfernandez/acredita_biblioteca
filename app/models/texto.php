<?php
class Texto extends AppModel {
	public $name = 'Texto';
	public $displayField = 'titulo';
	
	public $belongsTo = array('Categoria','Subcategoria','Editorial','Lectore','Idioma','Usuario');
	public $hasMany = array('Ejemplare');

}

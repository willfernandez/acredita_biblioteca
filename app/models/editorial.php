<?php
class Editorial extends AppModel {
	public $name = 'Editorial';
	public $displayField = 'nombre_editorial';

	public $hasMany = array('Texto');
}

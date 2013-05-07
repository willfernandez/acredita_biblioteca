<?php
class Idioma extends AppModel {
	public $name = 'Idioma';
	public $displayField = 'idioma';

	public $hasMany = array('Texto');
}

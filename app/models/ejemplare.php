<?php
class Ejemplare extends AppModel {
	public $name = 'Ejemplare';

	public $belongsTo = array(
		'Texto' => array(
			'className' => 'Texto',
			'foreignKey' => 'texto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Biblioteca' => array(
			'className' => 'Biblioteca',
			'foreignKey' => 'biblioteca_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Prestamo' => array(
			'className' => 'Prestamo',
			'foreignKey' => 'ejemplare_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}

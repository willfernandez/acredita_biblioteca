<?php
class Subcategoria extends AppModel {
	public $name = 'Subcategoria';
	public $displayField = 'nombre_subcategoria';

	public $belongsTo = array(
		'Categoria' => array(
			'className' => 'Categoria',
			'foreignKey' => 'categoria_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Texto' => array(
			'className' => 'Texto',
			'foreignKey' => 'subcategoria_id',
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

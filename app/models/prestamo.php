<?php
class Prestamo extends AppModel {
	var $name = 'Prestamo';

	var $belongsTo = array(
		'Sancione' => array(
			'className' => 'Sancione',
			'foreignKey' => 'sancione_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ejemplare' => array(
			'className' => 'Ejemplare',
			'foreignKey' => 'ejemplare_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Lectore' => array(
			'className' => 'Lectore',
			'foreignKey' => 'lectore_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

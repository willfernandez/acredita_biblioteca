<?php
/* Biblioteca Fixture generated on: 2012-08-25 12:14:06 : 1345911246 */
class BibliotecaFixture extends CakeTestFixture {
	var $name = 'Biblioteca';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nombre_biblioteca' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 120, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'sede_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_bibliotecas_sedes1' => array('column' => 'sede_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'nombre_biblioteca' => 'Lorem ipsum dolor sit amet',
			'sede_id' => 1
		),
	);
}

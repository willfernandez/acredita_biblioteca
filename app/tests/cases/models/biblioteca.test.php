<?php
/* Biblioteca Test cases generated on: 2012-08-25 12:14:06 : 1345911246*/
App::import('Model', 'Biblioteca');

class BibliotecaTestCase extends CakeTestCase {
	var $fixtures = array('app.biblioteca', 'app.sede', 'app.departamento', 'app.provincia', 'app.distrito', 'app.ejemplare', 'app.usuario', 'app.prestamo');

	function startTest() {
		$this->Biblioteca =& ClassRegistry::init('Biblioteca');
	}

	function endTest() {
		unset($this->Biblioteca);
		ClassRegistry::flush();
	}

}

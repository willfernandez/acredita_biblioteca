<?php
/* Usuario Test cases generated on: 2012-08-25 00:07:25 : 1345867645*/
App::import('Model', 'Usuario');

class UsuarioTestCase extends CakeTestCase {
	var $fixtures = array('app.usuario', 'app.prestamo');

	function startTest() {
		$this->Usuario =& ClassRegistry::init('Usuario');
	}

	function endTest() {
		unset($this->Usuario);
		ClassRegistry::flush();
	}

}

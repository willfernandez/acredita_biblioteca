<?php
/* Usuarios Test cases generated on: 2012-08-25 01:57:22 : 1345874243*/
App::import('Controller', 'Usuarios');

class TestUsuariosController extends UsuariosController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class UsuariosControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.usuario', 'app.prestamo', 'app.sede');

	function startTest() {
		$this->Usuarios =& new TestUsuariosController();
		$this->Usuarios->constructClasses();
	}

	function endTest() {
		unset($this->Usuarios);
		ClassRegistry::flush();
	}

	function testUsuarioLogin() {

	}

}

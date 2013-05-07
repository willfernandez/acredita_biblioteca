<?php
class AppController extends Controller{
	public $helpers = array('Html','Form','Session','Ajax','Javascript');
	
	public $components = array('Auth','RequestHandler','Session');
	
	function _authlectores(){
		//Configurar Auth para trabajar con modelo lectores
		Security::setHash('bienestar');
		$this->Auth->userModel = 'Alumno';
		$this->Auth->fields = array(
			'username' => 'codigo',
			'password' => 'dni'
		);
		$this->Auth->loginAction = array('admin' => false,'controller' => 'lectores', 'action' => 'login');
		$this->Auth->logoutRedirect = array('controller' => 'lectores', 'action' => 'login');
		$this->Auth->loginRedirect = array('controller' => 'lectores', 'action' => 'index');
		$this->Auth->authError = 'Está intentando ingresar a una Área restringida.';
		$this->Auth->loginError ='Los datos ingresados son incorrectos';
	}
	
	function _authusuarios(){
		//Configurar Auth para trabajar con modelo usuario
		$this->Auth->userModel = 'Usuario';
		$this->Auth->fields = array(
			'username' => 'email',
			'password' => 'password'
		);
			
		$this->Auth->loginAction = array('admin' => false,'controller' => 'usuarios', 'action' => 'usuario_login');
		$this->Auth->logoutRedirect = array(Configure::read('Routing.admin') => false,'controller' => 'usuarios', 'action' => 'usuario_login');
		$this->Auth->loginRedirect = array('controller' => 'usuarios', 'action' => 'index');
		$this->Auth->authError = 'Está intentando ingresar a una Área restringida.';
		$this->Auth->loginError = 'Los datos ingresados son incorrectos';
	}

	function fecha_hora(){
		$gmt_peru = -5;
		$fecha_gmt = gmmktime(gmdate("H")+$gmt_peru,gmdate("i"),gmdate("s"),gmdate("n"),gmdate("j"),gmdate("Y"));
		$fecha_hora = gmdate('Y-n-j H:i:s',$fecha_gmt);
		return $fecha_hora;
	}
	
	function fecha()
	{
		$gmt_peru = -5;
		$fecha_gmt = gmmktime(gmdate("H")+$gmt_peru,gmdate("i"),gmdate("s"),gmdate("n"),gmdate("j"),gmdate("Y"));
		$fecha = gmdate('Y-n-j',$fecha_gmt);
		return $fecha;
	}
	
	function hora()
	{
		$gmt_peru = -5;
		$fecha_gmt = gmmktime(gmdate("H")+$gmt_peru,gmdate("i"),gmdate("s"),gmdate("n"),gmdate("j"),gmdate("Y"));
		$hora = gmdate('H:i:s',$fecha_gmt);
		return $hora;
	}
	
	function sumar_fechas($fecha, $dias){
		$hora = date("H:i:s",strtotime($fecha));
		$fecha = explode("-",$fecha);
		$hora = explode(":",$hora);
		
		$fecha_cambiada = mktime($hora[0],$hora[1],$hora[2],$fecha[1],$fecha[2]+$dias,$fecha[0]);
		$fecha_sumada = date("Y-m-d H:i:s", $fecha_cambiada);
		return $fecha_sumada; 
	}
	
	function restaFechas($dFecIni, $dFecFin){
		$dFecIni = str_replace("-","",$dFecIni);
		$dFecIni = str_replace("/","",$dFecIni);
		$dFecFin = str_replace("-","",$dFecFin);
		$dFecFin = str_replace("/","",$dFecFin);

		ereg( "([0-9]{1,2})([0-9]{1,2})([0-9]{2,4})", $dFecIni, $aFecIni);
		ereg( "([0-9]{1,2})([0-9]{1,2})([0-9]{2,4})", $dFecFin, $aFecFin);

		$date1 = mktime(0,0,0,$aFecIni[2], $aFecIni[3], $aFecIni[1]);
		$date2 = mktime(0,0,0,$aFecFin[2], $aFecFin[3], $aFecFin[1]);

		return round(($date2 - $date1) / (60 * 60 * 24));
	}
}
?>
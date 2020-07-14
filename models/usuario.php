<?php
 require_once 'conexion.php';
 class ModelUser{

    private $nombre;
    private $apellidos;
    private $nombreUsuario;
    private $password;
    private $email;
    private $tipoUser;
    private $db;

    public function __construct(){
        $this->db = Conexion::conectar();
    } 

	function getNombre() { 
 		return $this->nombre; 
	} 

	function setNombre($nombre) {  
		$this->nombre = $this->db->quote($nombre); 
	} 

	function getApellidos() { 
 		return $this->apellidos; 
	} 

	function setApellidos($apellidos) {  
		$this->apellidos = $this->db->quote($apellidos); 
	} 

	function getNombreUsuario() { 
 		return $this->nombreUsuario; 
	} 

	function setNombreUsuario($nombreUsuario) {  
		$this->nombreUsuario = $this->db->quote($nombreUsuario); 
	} 

	function getPassword() { 
 		return password_hash($this->password, PASSWORD_BCRYPT,['cost' => 4]); 
	} 

	function setPassword($password) {  
		// $this->password = password_hash($this->db->quote($password), PASSWORD_DEFAULT); 
		$this->password = $password;
	} 

	function getEmail() { 
 		return $this->email; 
	} 

	function setEmail($email) {  
		$this->email = $this->db->quote($email); 
	}  

	function getTipoUser() { 
 		return $this->tipoUser; 
	} 

	function setTipoUser($tipoUser) {  
		$this->tipoUser = $this->db->quote($tipoUser); 
    } 

    public function insertUser(){
        $insert = "INSERT INTO usuarios
        (nombreUsuario, apellidosUsuario, nobreUsuario, passwordUsuario, emailUsuario, tipoUsuario, statusUsuario) 
        VALUES ({$this->getNombre()}, {$this->getApellidos()}, {$this->getNombreUsuario()}, '{$this->getPassword()}', {$this->getEmail()}, {$this->getTipoUser()}, '1')";
        $user = $this->db->prepare($insert);
        $user->execute();
        if($user){
            return "success";
        }else{
            return "error";
        }
        $user->close();

    }

    public function inSistema(){
    	$result = false;
    	$passwd = $this->password;
    	$user = "SELECT * FROM usuarios WHERE nobreUsuario = {$this->getNombreUsuario()}";
    	$datos = $this->db->prepare($user);
    	$datos->execute();
    	$registro = $datos->fetchAll(PDO::FETCH_OBJ);
    	 if(!empty($registro)){
    	 	$usuario = $registro[0];
    	 	$veryPass = password_verify($passwd, $usuario->passwordUsuario);
    	 	if($veryPass){
    	 		return $usuario;    	 		
    	 	}else{
    	 		return 0;
    	 	}
    	 	
    	 }else{
    	 	return 2;
    	 }

    // $datos->close();
    }
 }
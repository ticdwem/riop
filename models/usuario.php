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
		$this->nombre = $nombre; 
	} 

	function getApellidos() { 
 		return $this->apellidos; 
	} 

	function setApellidos($apellidos) {  
		$this->apellidos = $apellidos; 
	} 

	function getNombreUsuario() { 
 		return $this->nombreUsuario; 
	} 

	function setNombreUsuario($nombreUsuario) {  
		$this->nombreUsuario = $nombreUsuario; 
	} 

	function getPassword() { 
 		return $this->password; 
	} 

	function setPassword($password) {  
		$this->password = $password; 
	} 

	function getEmail() { 
 		return $this->email; 
	} 

	function setEmail($email) {  
		$this->email = $email; 
	} 

	function getTipoUser() { 
 		return $this->tipoUser; 
	} 

	function setTipoUser($tipoUser) {  
		$this->tipoUser = $tipoUser; 
    } 

    public function insertUser(){
        $insert = "INSERT INTO usuarios
        (nombreUsuario, apellidosUsuario, nobreUsuario, passwordUsuario, emailUsuario, tipoUsuario, statusUsuario) 
        VALUES ('{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getNombreUsuario()}', '{$this->getPassword()}', '{$this->getEmail()}', '{$this->getTipoUser()}', '1')";
        $user = $this->db->prepare($insert);
        $user->execute();
        if($user){
            return "success";
        }else{
            return "error";
        }
        $user->close();

    }
 }
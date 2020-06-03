<?php

class Saveuser{

    public function guardarUser(){
       if(isset($_POST["guardar"])){
           
            $validar = new Validacion();
            $nombre = $validar->pregmatchletras($_POST["firstName"]);
            $apellido = $validar->pregmatchletras($_POST["lastName"]);
            $user = $validar->valornumerico($_POST["nameUser"]);
            $pass = $_POST["password"];
            $tipeuser = $validar->validarNumIntYNumExt($_POST["tu"]);
            $email=$validar->validarEmail($_POST["email"]);

        if($nombre != 0 || $apellido != 0 ||$user != -1||$pass != 0 ||$tipeuser != "S/N" ||$email != 0){
            $tabla = "usuarios";

            $inU = new ModelUser();
            $inU->setNombre($nombre);
            $inU->setApellidos($apellido);
            $inU->setNombreUsuario($user);
            $inU->setPassword($pass);
            $inU->setTipoUser($tipeuser);
            $inU->setEmail($email);
            $insertar = $inU->insertUser($tabla);

            if($insertar == "success"){
                echo "ok";
            }else{
                echo "error";
            }
        }
       }
    }
}
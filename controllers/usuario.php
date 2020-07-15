<?php

class Saveuser{

    public function guardarUser(){
        if(isset($_POST["guardar"])){

            $validar = new Validacion();
            $nombre = $validar->pregmatchletras($_POST["firstName"]);
            $apellido = $validar->pregmatchletras($_POST["lastName"]);
            $user = $validar->valornumerico($_POST["nameUser"]);
            $pass = $_POST["password"];
            $tipeuser = $validar->validarNumero($_POST["tu"]);
            $email=$validar->validarEmail($_POST["email"]);
            
            if($nombre === 0 || $apellido === 0 || $user === -1 ||$pass === 0 ||$tipeuser === -1 ||$email === 0){
                echo "hay un error";
            }else{
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
                    echo "<script>
                            Swal.fire({
                                title: 'CORRECTO',
                                text: 'USUARIO INGRESADO CORRECTAMENTE',
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'ACEPTAR'
                            }).then((result) => {
                                if (result.value) {
                                 window.location.href = getAbsolutePath()+'registro';
                                }
                            })
                            </script>";
                }else{
                    echo "error";
                }
            
               
            }
        }
    }

    public function verifUsuario($nameUser)
    {
        require_once '../../models/modeloBd.php';
        $validar = new Validacion();
        $registro = $validar->valUser($nameUser);

        if($registro === 0){
            echo 0;
        }else{
            $user = new ModeloBase();
            $user->setWhere("WHERE nobreUsuario ='".$nameUser."'");
            $existe = $user->conseguirTodos('usuarios');

            if($existe){
                echo 1;
            }else{
                echo 0;
            }
        }
    }

    public function entrarSistema($datos){
        require_once '../../models/usuario.php';
        $data = json_decode($datos,false);
        $validar = new Validacion();
        $user = $validar->valUser($data[0]->name);
        $pass = $validar->valPassUser($data[0]->pass);
        if($user != "0" && $pass != "0"){
            $datos = new ModelUser();
            $datos->setNombreUsuario($user);
            $datos->setPassword($pass);
            $verificar = $datos->inSistema();

            if($verificar !== 0 && is_object($verificar)){
               $_SESSION['usuario']=$verificar;
               echo 1;
            }

        }else{
             echo 3;
        }
    }
}
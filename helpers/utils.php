<?php

class Utls{
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
                $_SESSION[$name] = null;
                unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function existImg($img){
    	$disponible;
    	if (!is_array(@getimagesize(url_foranea.$img))) {
			    $disponible = base_url.'images/no_disponible.jpg';
			}else{					
			$disponible = url_foranea.$img;
			 //$disponible = base_url.$mostrar["fotoProdcuto"];
		}
		return $disponible;
    }
    public static function existModelo($modelo){
        $models;
        if (!empty($modelo)) {
                $models = $modelo;
            }else{                  
            $models = "S/M";
             //$disponible = base_url.$mostrar["fotoProdcuto"];
        }
        return $models;
    }
}
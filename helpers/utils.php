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
}

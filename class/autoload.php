<?php

class Autoload{
    public static function autoload($class){
        $array_clases=array();
        $ruta=__DIR__.DIRECTORY_SEPARATOR;
        $array_clases["Data_base"]=$ruta."database.php";
        $array_clases["Productos"]=$ruta."productos.php";
        $array_clases["Categoria"]=$ruta."categorias.php";

        if (isset($array_clases[$class])){
            if (file_exists($array_clases[$class])){
                include $array_clases[$class];
              
            } else {
                    throw new Exception("error al cargar clase", 1);
                    
                }

        }
        
}
}

spl_autoload_register("Autoload::autoload");

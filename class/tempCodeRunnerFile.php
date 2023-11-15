<?php
/*@autor Luciano Lopez`*/

try{
    $gdb =new PDO("mysql:myproyecto=base_datos;host=127.0.0.1:3306","root","root");
}

catch(PDOException $e){
    echo 'fallos la conexio' . $e->getMessage();
}



?>
<?php
/*@autor Luciano Lopez`*/
class Productos {
    private $nombre;
    private $imagen;
    private $descripcion;
    private $precio;
    private $categoria;
    private $db;
    

  public function __construct($nombre, $imagen, $descripcion, $categoria, $precio) {    
    $db= new Data_base("mysql","myproyecto","127.0.0.1","root","root");
    $this->db=$db;
    $this->nombre = $nombre;
    $this->imagen = $imagen;
    $this->descripcion = $descripcion;
    $this->categoria = $categoria;
    $this->precio = $precio;
   
  }
  public function guardar() {
      $values= array($this->nombre,$this->precio,$this->descripcion,$this->imagen); 
      $this->db->insert("productos",array("producto","precio",'descripcion','imagen'),$values);
      
      
  }
 static public function select() {
    $db= new Data_base("mysql","myproyecto","127.0.0.1","root","root");
    return $listaSelect=$db->select("productos");
  }
  public function eliminar() {}

}

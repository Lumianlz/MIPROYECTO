<?php
/*@autor Luciano Lopez`*/
class Productos {
    private $nombre;
    private $imagen;
    private $descripcion;
    private $precio;
    private $categoria;
    private $db;
    private $id;
  public function __construct($nombre, $imagen, $descripcion, $categoria, $precio,$id=null) {    
    $db= new Data_base("mysql","myproyecto","127.0.0.1","root","root");
    $this->db=$db;
    $this->nombre = $nombre;
    $this->imagen = $imagen;
    $this->descripcion = $descripcion;
    $this->categoria = $categoria;
    $this->precio = $precio;
    $this->id=$id;
  }
  public function guardar() {
      $values= array($this->nombre,$this->precio,$this->descripcion,$this->imagen,$this->categoria); 
      $this->db->insert("productos",array("producto","precio",'descripcion','imagen','categoria_id'),$values); 
  }
 static public function select() {
    $db= new Data_base("mysql","myproyecto","127.0.0.1","root","root");
    return $listaSelect=$db->select("productos");
  }
  public function eliminar() {
    $this->db->delete("productos","ID",$this->id);
  }

}

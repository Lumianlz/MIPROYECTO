<?php
/*@autor Luciano Lopez`*/
class Categoria {
    private $nombre ;
    private $db;
    private $id;
    private $exists=false;
    public function __construct($nombre,$id=null) {
        
        $db= new Data_base("mysql","myproyecto","127.0.0.1","root","root");
   
        // $this->db=$db;
        if ($id != null) {
            $categoriasExistentes = $db -> select("categorias");
            // $response = $db -> select("categorias", "id=?", array($id));
            foreach ($categoriasExistentes as $categoria) {
                if ($categoria['ID'] == $id) {
                    $this -> id = $categoria['ID'];
                    $this -> nombre = $categoria['Categoria'];
                    $this -> exists = true;
                    echo "ya existe";
                }
            }}
            else {$this->nombre = $nombre; $this->id=null; $this -> db=$db;
        
            }
    }
    
    public function getNombre() {
        echo $this -> nombre;
    }
   
    public function guardar(){
        
        try{$this->db->insert("categorias",array("categoria"),array($this->nombre));
       }catch(Exception $e){
           echo $e->getMessage();}
       
       
        if(!$this->exists){
            
        } else{
            echo "Ya existe la categoria en la base de datos";
        }
    }
    public function eliminar(){
        $this->db->delete("categorias","categoria",$this->id);
    }
    static public function select(){
        $db= new Data_base("mysql","myproyecto","127.0.0.1","root","root");
        return $listaSelect = $db->select("categorias");
        
        
    }
}



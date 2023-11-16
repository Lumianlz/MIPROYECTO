<?php   
// Luciano Lopez
include '../class/autoload.php';
$listaProductos = Productos::select("productos");
include '.\view\listas_productos.html';



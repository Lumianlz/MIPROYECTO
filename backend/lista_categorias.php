<?php   
// Luciano Lopez
include '../class/autoload.php';
$listaCategorias = Categoria::select("productos");
include '.\view\listas_categorias.html';


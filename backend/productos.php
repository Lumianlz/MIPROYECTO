<?php
include '../class/autoload.php';
include 'view/productos.html';
if (isset($_POST['action']) && $_POST['action'] == 'guardar'){
    $nombreProducto= $_POST['NombreProducto'];
    $imagenProducto= $_POST['ImagenDeProductoInput'];
    $descripcionProducto= $_POST['descripcion'];
    $precioProducto= $_POST['Precio'];
    $categoriaProducto= $_POST['categorias'];
    $nuevoProducto = new Productos($nombreProducto,$imagenProducto,$descripcionProducto,$categoriaProducto,$precioProducto);
    $nuevoProducto -> guardar();
}
if (isset($_GET['listaProductos'])=="lista") {
    include './view/productos.html';
    die();
}






// $listaProductos = Productos::select();
// include "./view/listas_productos.html";
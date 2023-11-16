<?php

include '../class/autoload.php';
if (isset($_POST['action'])&& $_POST["action"]==='guardar'){
    $nuevaCategoria = new Categoria( $_POST['nombreCategoriaInput']);
    $nuevaCategoria -> guardar();
    if (!$respuesta) {
        header("Location: ./view/categorias.html");
        
    }
}
else if (isset($_GET['listaCategorias'])) {
    include 'views/categorias.html';
    die();
}

$listaCategorias = Categoria::select();
include 'views/lista_categorias.html';
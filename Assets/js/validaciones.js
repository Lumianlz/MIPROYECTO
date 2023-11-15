
$("#productoForm").submit(function (e) {
    e.preventDefault();
    var nombreProducto = $("#nombreProducto").val();
    var descripcion = $("#DescripcionProductoInput").val();
    var errores = [];
    if ($.trim(nombreProducto) === "") {
        errores.push("Debe revisar el nombre del producto");
    }
    if ($.trim(descripcion) === "") {
        errores.push("Debe revisar la descripcion del producto");
    }
    if (errores.length > 0) {
        errores.push("Luciano Lopez");
        alert(errores.join("\n"));
        return false;
    } else {
        alert("Se completo el formulario exitosamente");
        this.submit();
        this.reset();
        
    }
});
$("#categoriaForm").submit(function (e) {
    e.preventDefault();
    let categoria = $("#nombreCategoriaInput").val();
    var errores = [];
    if ($.trim(categoria) === "") {
        errores.push("Debe revisar el nombre del producto");
    };
    if (errores.length > 0) {
        errores.push("Luciano Lopez");
        alert(errores.join("\n"));
        return false;
    } else {
        alert("Se completo el formulario exitosamente");
        this.submit();
        this.reset();
    }
});


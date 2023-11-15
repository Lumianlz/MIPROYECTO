<?php
/*@autor Luciano Lopez`*/
class Data_base
{
    private $gdb;
    public function __construct($typeDataBase, $nameDB, $host, $user, $password)
    {
        try {
            $gdb = new PDO($typeDataBase . ":dbname=" . $nameDB . ";host=" . $host, $user, $password);

            $this->gdb = $gdb;
            echo 'conectado';
        } catch (PDOException $e) {
            echo 'fallos la conexio' . $e->getMessage();
        }
    }
    // -----------------------INSERT 1 funcion a realizar en la base de datos----------------------------------

    // INSERT PAAR MULTIPLES----------------------------------------------------
    public function insert($table, array $columns, array $values)
    {
        $concatColumns=$columns[0];
        $cantColumns = "?";
        if (count($columns) > 1) {

            $concatColumns = implode(",", $columns);
            for ($i = 1; $i < count($columns); $i++) {
                $cantColumns = $cantColumns . ",?";
            }
            ;
        }
        $sql = "INSERT INTO " . $table . ' (' . $concatColumns . ') VALUES (' . $cantColumns . ')';

        $resource = $this->gdb->prepare($sql);
        $arr_prepare = $values;
        print_r($arr_prepare);
        
        if ($resource->execute($arr_prepare)) {
            echo "<br> se guardo en la Base, by dbclass";
        } else {
            echo '<pre style="color:white;">no se pudo registrar</pre> ';
            echo $resource->errorCode();
            $resource->errorInfo();
        }
    }


    // SELECT------------------------------------------


    public function select($tabla, array $columns = null, $join = null, $filtros = null, $arr_prepare = null, $order = null, $limit = null)
    {
        $columnSelection = '*';
        if ($columns != null)
            $columnSelection = $columns;

        $sql = "SELECT " . $columnSelection . " FROM " . $tabla;

        if ($join != null) {
            $sql .= " INNER JOIN " . $join;
        }
        if ($filtros != null) {
            $sql .= " WHERE " . $filtros;
        }
        if ($order != null) {
            $sql .= " ORDER BY " . $order;
        }
        if ($limit != null) {
            $sql .= " LIMIT " . $limit;
        }

        $resource = $this->gdb->prepare($sql);
        $resource->execute($arr_prepare);

        if ($resource) {
            echo '<br> se realizo la consulta';
            return $resource->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo '<pre>';
            print_r($this->gdb->errorInfo());
            echo '</pre>';

            throw new Exception('No se ha podido realizar la consulta.');
        }
    }





    public function delete($table, $colum, $value)
    {
        // Se prepara un delete para eliminar registros------------------------------------------------

        // -----------------------------------
        $resource = $this->gdb->prepare('DELETE FROM ' . $table . ' WHERE ' . $colum . '=?');

        $arr_prepare = array($value);
        $resource->execute($arr_prepare);
        if ($resource->execute($arr_prepare)) {
            echo 'el registro de elimino';
        } else {

            echo 'error al borrar';
            echo '<br>';
            echo $resource->errorInfo() . "<br>";
            echo "<pre>";
            print($resource->errorInfo());
            echo "<pre>";

        }

    }
    public function update($table, $id, $colum, $valueNEW)
    {
        $resource = $this->gdb->prepare('UPDATE ' . $table . ' SET ' . $colum . '=? WHERE id=? ');
        $arr_prepair = array($valueNEW, $id);
        if ($resource->execute($arr_prepair)) {

        } else {
            echo 'Error al actualizar el registro';
            echo '<br>';
            echo $resource->errorInfo() . '<br>';
        }
    }
}
;
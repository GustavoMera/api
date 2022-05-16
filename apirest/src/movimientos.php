<?php
include "conectar.php";
include "util.php";

$dbConn =  connect($db);

// Listar todas las transacciones o solo 1
//curl --location --request GET 'localhost/apirest/src/movimientos.php?id=11'
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id']))
    {
//Mostrar un transaccion
        $sql = $dbConn->prepare("SELECT * FROM movimiento where id=:id");
        $sql->bindValue(':id', $_GET['id']);
        $sql->execute();
        header("HTTP/1.1 200 OK");
        echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
        exit();
    }
    else {
//Mostrar lista de transacciones
//curl --location --request GET 'localhost/apirest/src/movimientos.php'
        $sql = $dbConn->prepare("SELECT * FROM movimiento");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode( $sql->fetchAll()  );
        exit();
    }
}

// Insertar nueva transaccion
/*
curl --location --request POST 'localhost/apirest/src/movimientos.php' \
--form 'tipo="E"' \
--form 'valor="44"'
*/
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $input = $_POST;

    $sql = "INSERT INTO movimiento(tipo, valor, fecha)
    VALUES (:tipo, :valor, NOW())";

    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->lastInsertId();

    if($postId)
    {
        $input['id'] = $postId;
        header("HTTP/1.1 200 OK");
        echo json_encode($input);
        exit();
    }
}

//Borrar transaccion
// curl --location --request DELETE 'localhost/apirest/src/movimientos.php?id=8'
if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
    $id = $_GET['id'];
    $statement = $dbConn->prepare("DELETE FROM movimiento where id=:id");
    $statement->bindValue(':id', $id);
    $statement->execute();
    header("HTTP/1.1 200 OK");
    $response["respuesta"] = "transaccion eliminada";
    echo json_encode($response);
    exit();
}

//Actualizar transaccion
//curl --location --request PUT 'localhost/apirest/src/movimientos.php?id=11&valor=77'
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    $input = $_GET;
    $postId = $input['id'];
    $fields = getParams($input);

    $sql = "UPDATE movimiento SET $fields WHERE id='$postId'";

    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);

    $statement->execute();
    header("HTTP/1.1 200 OK");
    $response["respuesta"] = "transaccion actualizada";
    echo json_encode($response);
    exit();
}

header("HTTP/1.1 400 Bad Request");

?>
<?php
include "conectar.php";
include "util.php";

$dbConn =  connect($db);

//  Listar monto total del mes
/*
curl --location --request GET 'localhost/apirest/src/saldos.php?fecha=05/18/2022'
*/
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['fecha']))
    {
//Mostrar un total
        $fechaComoEntero = strtotime($_GET['fecha']);
        $mes = date("m", $fechaComoEntero);
        $ano = date("Y", $fechaComoEntero);

        $sql = "SELECT SUM(valor) AS egreso FROM movimiento WHERE month(fecha) = '$mes' AND year(fecha) = '$ano' AND tipo = 'E'";
        $statement = $dbConn->prepare($sql);
        $statement->execute();
        $total_egresos = $statement->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT SUM(valor) AS ingreso FROM movimiento WHERE month(fecha) = '$mes' AND year(fecha) = '$ano' AND tipo = 'I'";
        $statement = $dbConn->prepare($sql);
        $statement->execute();
        $total_ingresos = $statement->fetch(PDO::FETCH_ASSOC);

        $total = ($total_ingresos['ingreso']) - ($total_egresos['egreso']);

        header("HTTP/1.1 200 OK");
        echo json_encode(  $total  );
        exit();
    }
}

header("HTTP/1.1 400 Bad Request");

?>
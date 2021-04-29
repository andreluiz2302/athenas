<?php
include('dbconnect.php');
include('function.php');

if(isset($_POST["nome"]))
{
    $output = array();
    $statement = $connection->prepare("SELECT * FROM pessoas WHERE id = '".$_POST["id"]."' LIMIT 1 ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output["id"] = $row["id"];
        $output["nome"] = $row["nome"];
        $output["email"] = $row["email"];
        $output["categoria"] = $row["categoria"];      
    }
    echo json_encode($output);
}
?>
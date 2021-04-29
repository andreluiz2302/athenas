<?php
include('dbconnect.php');
include('function.php');

    if(isset($_POST["id"]))
    {
        $statement = $connection->prepare("DELETE FROM pessoas WHERE id = :id");
        $result = $statement->execute(
            array(':id' => $_POST["id"])
        );
    }
?>
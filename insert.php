<?php
include('dbconnect.php');
include('function.php');

if(isset($_POST["operation"]))
{
    if($_POST["operation"] == "Add")
    {
        $statement = $connection->prepare("INSERT INTO pessoas (nome, email, categoria) VALUES (:nome, :email, :categoria)");
        $result = $statement->execute(
            array(
                ':nome'   => $_POST["nome"],
                ':email'  => $_POST["email"],
                ':categoria'  => $_POST["categoria"],

            )
        );
    }
    if($_POST["operation"] == "Edit")
    {
        $statement = $connection->prepare("UPDATE pessoas SET nome = :nome, email = :email, categoria = :categoria WHERE id = :id ");
        $result = $statement->execute(
            array(
                ':nome'  => $_POST["nome"],
                ':email'  => $_POST["email"],
                ':categoria'  => $_POST["categoria"],
                ':id' => $_POST["id"],
            )
        );
    }
}
?>
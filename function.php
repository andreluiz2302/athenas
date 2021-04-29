<?php
function get_total_all_records()
{
    include('dbconnect.php');
    $statement = $connection->prepare("SELECT * FROM pessoas");
    $statement->execute();
    $result = $statement->fetchAll();
    return $statement->rowCount();
    
}
?>
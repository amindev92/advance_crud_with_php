<?php

function deleteFolder($id){
    global $pdo;
    $sqlCommand = "DELETE FROM folder WHERE id = :id";
    $stmt = $pdo -> prepare($sqlCommand);
    $stmt -> execute([":id"=> $id]);
    return $stmt -> rowCount();
}


function getFolder(){

    global $pdo;
    $sqlCommand = "SELECT * FROM folder WHERE user_id = 1";
    $stmt = $pdo -> prepare($sqlCommand);
    $stmt -> execute();
    $folders = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $folders;

}



?>
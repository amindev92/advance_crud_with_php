<?php

function addFolder($folderName){
    global $pdo;
    $id = 1;
    $sqlCommand = "INSERT INTO folder (name, user_id) VALUES (:folderName, :user_id)";
    $stmt = $pdo -> prepare($sqlCommand);
    $stmt->bindValue(":folderName", $folderName);
    $stmt->bindValue(":user_id", getCurrentUser());
    $stmt -> execute();
    return $stmt->rowCount();
}

function deleteFolder($id){
    global $pdo;
    $sqlCommand = "DELETE FROM folder WHERE id = :id";
    $stmt = $pdo -> prepare($sqlCommand);
    $stmt -> execute([":id"=> $id]);
    return $stmt -> rowCount();
}


function getFolder(){

    global $pdo;
    $sqlCommand = "SELECT * FROM folder WHERE user_id = :id";
    $stmt = $pdo -> prepare($sqlCommand);
    $stmt -> execute([":id"=>getCurrentUser()]);
    $folders = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $folders;

}



?>
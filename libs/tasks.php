<?php


function toggleIsDone($id){
    global $pdo;
    $sqlCommand = "UPDATE task SET is_done = 1 - is_done WHERE user_id = :user_id and id = :id  ";
    $stmt = $pdo -> prepare($sqlCommand);
    $stmt->bindValue(":user_id", getCurrentUser());
    $stmt->bindValue(":id", $id);
    $stmt -> execute();
    return $stmt->rowCount();
}

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

function deleteTask($id){
    global $pdo;
    $sqlCommand = "DELETE FROM task WHERE id = :id";
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

function getTask(){
    global $pdo;
    $folderId = $_GET["folder_id"] ?? null;
    $folderSqlCommand = "";
    if (isset($_GET["folder_id"]) && is_numeric($folderId)) {
        $folderSqlCommand = "and folder_id = $folderId";
    }
    $sqlCommand = "SELECT * FROM task WHERE user_id = :id $folderSqlCommand";
    $stmt = $pdo -> prepare($sqlCommand);
    $stmt -> execute([":id"=>getCurrentUser()]);
    $tasks = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $tasks;
}


?>
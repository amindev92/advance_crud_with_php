<?php

defined("BASE_PATH") or displayMessage("Permission Denied!");

function logout(){
    unset($_SESSION["login"]);
}

function isLoggedIn(){
    return isset($_SESSION["login"]) ? true : false;
}

function isLoggedInUser(){
    return $_SESSION["login"] ?? null;
}

function register($userData){
    global $pdo;
    $sqlCommand = "INSERT INTO user (name, email, password) VALUE (:name, :email, :password)";
    $statement = $pdo -> prepare($sqlCommand);
    $passwordHash = password_hash($userData["password"], PASSWORD_DEFAULT);
    $statement->execute([":name" => $userData["name"], ":email" => $userData["email"], ":password" => $passwordHash]);
    return $statement->rowCount() ? true : false;
}

function login($userData){
    global $pdo;
    $sqlCommand = "SELECT * FROM user WHERE email = :email";
    $stmt = $pdo->prepare($sqlCommand);
    $stmt->execute([":email" => $userData["email"]]);
    $record = $stmt->fetchAll(PDO::FETCH_OBJ);
    // displayInformation($record);
    $user = $record[0];
    $user -> image = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->email ) ) );
    $hassPass = $user->password;
    if (is_null($user)) {
        return false;
    };
    if (password_verify($userData["password"], $hassPass)) {
        $_SESSION["login"] = $user;
        return true;
    };

    return false;

    
}



?>
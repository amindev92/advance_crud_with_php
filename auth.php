<?php

include "bootstrap/init.php";

include BASE_PATH . "views/v_auth.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_GET["action"];
    $params = $_POST;
    

    if($action == "signup"){
        $result = register($params);
        if (!$result) {
            displayInformation("An error in Registeration!");
        }
    }else if($action == "login"){
        $result = login($params);
        displayMessage($result);
        if (!$result) {
            displayInformation("An error in login!");
        }
    }else{
        header("Location:". siteUrl('auth.php'));
    }

}

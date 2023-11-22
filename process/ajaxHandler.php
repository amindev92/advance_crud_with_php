<?php

include "../bootstrap/init.php";

if(!isAjaxRequest()){
    displayMessage("Invalid Requset!");
}

if (!isset($_POST["action"]) && empty($_POST["action"])) {
    displayMessage("Invalid Request!");
}

switch ($_POST["action"]) {
    case 'addFolder':
        if (strlen($_POST["folderName"] < 3)) {
            echo "Please Enter bigger Title for folder ...";
            die();
            break;
        }
        addFolder($_POST["folderName"]);
        break;
    
    default:
        displayMessage("Invalid Requset!");
        break;
}

?>
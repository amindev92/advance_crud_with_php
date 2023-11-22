<?php

include "bootstrap/init.php";
defined("BASE_PATH") or displayMessage("Permission Denied!");


if (!isLoggedIn()) {
    redirect(siteUrl("views/v_auth.php"));
}

if (isset($_GET["delete_folder"]) && is_numeric($_GET["delete_folder"])) {
    $deleteResult = deleteFolder($_GET["delete_folder"]);
    // displayMessage($deleteResult);
}




$folders = getFolder();
// displayInformation($folders);



include "views/main.php";

?>
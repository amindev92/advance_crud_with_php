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

if(isset($_GET["delete_task"]) && is_numeric($_GET["delete_task"])){
    $deleteTask = deleteTask($_GET["delete_task"]);
}

$folders = getFolder();
// displayInformation($folders);

$tasks = getTask();
// displayInformation($tasks);


include "views/main.php";

?>
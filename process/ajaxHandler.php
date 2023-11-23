<?php

include "../bootstrap/init.php";

if (!isAjaxRequest()) {
    displayMessage("Invalid Requset!");
}

if (!isset($_POST["action"]) && empty($_POST["action"])) {
    displayMessage("Invalid Request!");
}

switch ($_POST["action"]) {
    case 'addFolder':
        if (!isset($_POST["folderName"]) && strlen($_POST["folderName"] < 3)) {
            echo "Please Enter bigger Title for folder ...";
            die();
        }
        addFolder($_POST["folderName"]);
        break;

    case 'toggleIsDone':

        if (!isset($_POST["taskId"]) && !is_numeric($_POST["taskId"])) {
            echo "This task Doesn't Have in Task Manager ... ";
            die();
        }
        toggleIsDone($_POST["taskId"]);
        break;

    case 'addTask':

        if (!isset($_POST["taskName"]) && strlen($_POST["taskName"] < 3)) {
            echo "Please Enter bigger Title for task ...";
            die();
        }
        if (!isset($_POST["folderId"]) && !is_numeric($_POST["folderId"])) {
            echo "This task Doesn't Have in Task Manager ... ";
            die();
        }
        addTask($_POST["folderId"], $_POST["taskName"]);
        break;

    default:
        displayMessage("Invalid Requset!");
        break;
}

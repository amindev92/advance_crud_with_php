<?php

include "bootstrap/init.php";
defined("BASE_PATH") or displayMessage("Permission Denied!");


if (!isLoggedIn()) {
    redirect(siteUrl("views/v_auth.php"));
}




include "views/main.php";

?>
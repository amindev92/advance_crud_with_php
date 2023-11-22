<?php

defined("BASE_PATH") or displayMessage("Permission Denied!");


function displayMessage($msg)
{
    $errMsg = "
        
    <div style='
    border: 1px solid black;
    background-color: coral;
    width: 960px;
    margin: 0 auto;
    text-align: center;
    padding: 2rem;
    font-family: cursive;
    border-radius: 2rem;
    '>
    <p>
        $msg</p>
        </div>

    ";
    echo $errMsg;
    die();
}

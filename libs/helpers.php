<?php

defined("BASE_PATH") or displayMessage("Permission Denied!");

function getCurrentUser(){
    return 1;
}

function isAjaxRequest()
{
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        return true;
    }
    return false;
}


function redirect($url)
{
    header("Location: " . $url);
}

function siteUrl($uri = "")
{
    return BASE_URL . $uri;
}



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


function displayInformation($data)
{



    echo "<div style='
        background-color: wheat;
    width: 100%;
    height: 100%;
    margin: 0 auto;
    border-radius: 2rem;
    padding: 14px 12px;
    font-weight: bold;
    position: relative;
    min-height: 30vh;
    z-index: 10;
'>";
    var_dump($data);
    echo "</div>";
}

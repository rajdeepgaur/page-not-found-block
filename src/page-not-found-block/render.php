<?php 

function getCurrentUrl() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];
    
    return "$uri";
}


function extractLastPart($url) {
    // Remove trailing slash if present
    $url = rtrim($url, '/');

    // Extract the last part of the URL
    $parts = explode('/', $url);
    return end($parts);
}

$lastPart = extractLastPart($_SERVER['REQUEST_URI']);
echo $lastPart; 



?>
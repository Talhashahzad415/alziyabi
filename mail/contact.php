<?php

// -----------------------------------------------------------------
// 1. RAW SOCKET CONNECTION TEST
// -----------------------------------------------------------------

$host = 'smtp.sendgrid.net';
$port = 587;
$timeout = 10; // Connection timeout in seconds

$socket = @fsockopen($host, $port, $errno, $errstr, $timeout);

if (!$socket) {
    // If connection failed, output the system error details
    http_response_code(500); 
    die("FATAL ERROR: Connection failed.<br>Host: $host<br>Port: $port<br>System Error: ($errno) $errstr");
} else {
    // If connection succeeded, close the socket and report success
    fclose($socket);
    http_response_code(200);
    die("SUCCESS: Connection to $host on port $port is open. The issue is purely with PHPMailer authentication/settings.");
}

?>
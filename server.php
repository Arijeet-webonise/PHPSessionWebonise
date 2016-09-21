<?php
error_reporting(E_ALL);

//Create TCP/IP sream socket and return the socket resource
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

// Bind the source address
socket_bind($socket, 'localhost');

// Listen to incoming connection
socket_listen($socket);

// Accept new connections
socket_accept($socket);

$secKey = $headers['Sec-WebSocket-Key'];
$secAccept = base64_encode(pack('H*', sha1($secKey . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
$upgrade  = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
"Upgrade: websocket\r\n" .
"Connection: Upgrade\r\n" .
"WebSocket-Origin: $host\r\n" .
"WebSocket-Location: ws://$host:$port/deamon.php\r\n".
"Sec-WebSocket-Accept:$secAccept\r\n\r\n";
socket_write($client_conn,$upgrade,strlen($upgrade));

socket_close($socket);
?>

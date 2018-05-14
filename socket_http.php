#!/usr/bin/env php
<?php

require_once 'autoload.php';

$options = getopt('i:p:');

$socket = stream_socket_server("tcp://{$options['i']}:{$options['p']}", $errno, $errstr);


if (!$socket) {
    die("$errstr ($errno)\n");
}

while ($connect = stream_socket_accept($socket)) {

    $requestString = fread($connect, 1024);

    var_dump($requestString);
    $parser = new \Socket\Processing\ParserStringToRequest($requestString);

    $request = $parser->getRequest();
    $checkCookie = new \Socket\Processing\CheckCookie($request->getCookie(), "test", "vse bude ok123");

    
    

    if ($checkCookie->checkCookie()) {
        if ($request->getMethod() === "GET") {
            fwrite($connect, "HTTP/1.1 200 OK\r\nContent-Type: text/html\r\nSet-Cookie: login={$g}\r\nConnection: close\r\n\r\nPRIVET YA GET");
        } elseif ($request->getMethod() === "POST") {
            fwrite($connect, "HTTP/1.1 200 OK\r\nContent-Type: text/html\r\nSet-Cookie: test=vse bude ok\r\nConnection: close\r\n\r\nPRIVET YA POST");
        } elseif ($request->getMethod() === "DELETE") {
            fwrite($connect, "HTTP/1.1 200 OK\r\nContent-Type: text/html\r\nSet-Cookie: test=vse bude ok\r\nConnection: close\r\n\r\nPRIVET YA DELETE");
        }
    } else {
        $cookie = new \Socket\Processing\Cookie();
        $setCookie = $cookie->setRandomCookie();
        fwrite($connect, "HTTP/1.1 200 OK\r\nContent-Type: text/html\r\nSet-Cookie: login={$setCookie}\r\nConnection: close\r\n\r\nFirst connect!");
    }



    var_dump($request);

    
    fclose($connect);
    break;
}

fclose($socket);

<?php
include("autoload.php");
include ("./templates/head.class.php");
include ("./templates/body.class.php");

session_start();

$head = new Head();
echo $head->ReturnFullHead();

$body = new Body();

$header = new Header();
$body->addElemento($header->ReturnFullHeader('headerStyle'));

$menu = new Menu();
$body->addElemento($menu->returnMenu());

$mainDiv = new Main();
$body->addElemento($mainDiv->returnMainDiv());

echo $body->ReturnBody();
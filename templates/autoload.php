<?php
spl_autoload_register(function($className) {
    $service = $_SERVER["DOCUMENT_ROOT"].'/service/' . $className . '.php';
    if (file_exists($service)) {
        require_once $service;
    }
});
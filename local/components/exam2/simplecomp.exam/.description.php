<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription = array(
    "NAME" => "Мой компонент",
    "DESCRIPTION" => "Простой компонент для каталога товаров с альтернативным классификатором",
    "PATH" => array(
        "ID" => "exam2",  
        "CHILD" => array(
            "ID" => "simplecomp.exam",  
            "NAME" => "Простой компонент",  
        ),
    ),
);
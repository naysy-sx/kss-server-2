<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        "IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => "ID инфоблока",
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "CACHE_TIME" => array("DEFAULT" => 36000000),
        "TITLE" => array(
            "PARENT" => "BASE",
            "NAME" => "Заголовок блока",
            "TYPE" => "STRING",
            "DEFAULT" => "Реализованные проекты",
        ),
        "SUBTITLE" => array(
            "PARENT" => "BASE",
            "NAME" => "Подзаголовок блока",
            "TYPE" => "STRING",
            "DEFAULT" => "Нас выбирают",
        ),
        "DESCRIPTION" => array(
            "PARENT" => "BASE",
            "NAME" => "Описание",
            "TYPE" => "STRING",
            "DEFAULT" => "600+ объектов оснащены нашим оборудованием",
        ),
        "CITIES" => array(
            "PARENT" => "BASE",
            "NAME" => "Города",
            "TYPE" => "STRING",
            "DEFAULT" => "Краснодар, Ростов-на-Дону, Симферополь, Владикавказ, Мариуполь, ЮФО, СКФО, Крым и вся Россия"
        ),
    ),
);

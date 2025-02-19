<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        "IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => "13",
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "CACHE_TIME" => array("DEFAULT" => 36000000),
        "TITLE" => array(
            "PARENT" => "BASE",
            "NAME" => "Заголовок блока",
            "TYPE" => "STRING",
            "DEFAULT" => "Награды и достижения",
        ),
    ),
);

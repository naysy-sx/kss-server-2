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
            "DEFAULT" => "",
        ),
        "SECTION_IMAGE" => array(
            "PARENT" => "BASE",
            "NAME" => "Изображение секции",
            "TYPE" => "FILE",
            "FD_TARGET" => "F",
            "FD_EXT" => "png,jpg,jpeg,gif",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => array('image'),
        )
    ),
);

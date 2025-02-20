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
            "NAME" => "Заголовок секции",
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "MAP" => array(
            "PARENT" => "BASE",
            "NAME" => "Координаты через запятую",
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "BUTTON_TEXT" => array(
            "PARENT" => "BASE",
            "NAME" => "Текст на кнопке",
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "BUTTON_LINK" => array(
            "PARENT" => "BASE",
            "NAME" => "Ссылка кнопки",
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "LONG_TEXT" => array(
            "PARENT" => "BASE",
            "NAME" => "Текст внизу",
            "TYPE" => "TEXT",
            "COLS_TYPE" => "text",
            "DEFAULT" => "",
            "ROWS" => 10,
            "COLS" => 50,
            "HEIGHT" => 200,
            "WIDTH" => "100%",
            "ADDITIONAL_VALUES" => "Y",
            "USER_TYPE" => "HTML",
            "USER_TYPE_SETTINGS_NAME" => "USER_TYPE_SETTINGS",
            "USER_TYPE_SETTINGS" => array(
                "height" => 200,
                "cols" => 60,
                "rows" => 10,
                "video" => "Y",
                "image" => "Y",
                "divId" => "id" . mt_rand(),
                "MAX_SHOW_SIZE" => 1000000,
                "FILTER" => "Y",
                "USE_EDITOR" => "Y"
            )
        ),
    ),
);

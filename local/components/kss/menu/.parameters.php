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
        "CACHE_TIME" => array("DEFAULT"=>36000000),
        "TITLE" => array(
            "PARENT" => "BASE",
            "NAME" => "Заголовок блока",
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "SUBTITLE" => array(
            "PARENT" => "BASE",
            "NAME" => "Подзаголовок блока",
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "IMAGE_FIELD" => array(
            "PARENT" => "BASE",
            "NAME" => "Поле с основным изображением",
            "TYPE" => "LIST",
            "VALUES" => array(
                "PREVIEW_PICTURE" => "Картинка для анонса",
                "DETAIL_PICTURE" => "Детальная картинка",
                "PROPERTY_IMAGE" => "Свойство IMAGE",
            ),
            "DEFAULT" => "PREVIEW_PICTURE",
        ),
        "ELEMENT_IMAGE_PROPERTY" => array(
            "PARENT" => "BASE",
            "NAME" => "Код свойства с картинкой элемента",
            "TYPE" => "STRING",
            "DEFAULT" => "PICTURE",
        ),
    ),
);

<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

if (!Loader::includeModule('iblock')) {
    die('Модуль "Инфоблоки" не установлен');
}

$iblockId = (int)$arParams['IBLOCK_ID'];
if (!$iblockId) {
    die('Не указан IBLOCK_ID');
}

$arParams["ELEMENT_EDIT"] = $arParams["ELEMENT_EDIT"] !== "N" && $USER->IsAdmin();
$arParams["ELEMENT_DELETE"] = $arParams["ELEMENT_DELETE"] !== "N" && $USER->IsAdmin();

if ($arParams["ELEMENT_EDIT"]) {
    $arButtons = CIBlock::GetPanelButtons(
        $iblockId,
        0,
        0,
        array("SECTION_BUTTONS" => false)
    );
    if (is_array($arButtons)) {
        $this->AddIncludeAreaIcons(
            array(
                array(
                    "ID" => "add_element",
                    "TITLE" => GetMessage("IBLOCK_ADD_ELEMENT"),
                    "URL" => $arButtons["edit"]["add_element"]["ACTION"],
                    "ICON" => "bx-context-toolbar-create-icon",
                )
            )
        );
    }
}

$arSelect = array(
    "ID",
    "IBLOCK_ID",
    "NAME",
    "DETAIL_PAGE_URL",
    "PROPERTY_PICTURE"
);

$arFilter = array(
    "IBLOCK_ID" => $iblockId,
    "ACTIVE" => "Y"
);

$arResult = array();
$rsElements = CIBlockElement::GetList(
    array("SORT" => "ASC"),
    $arFilter,
    false,
    false,
    $arSelect
);

while ($arElement = $rsElements->GetNext()) {
    $arButtons = CIBlock::GetPanelButtons(
        $iblockId,
        $arElement["ID"],
        0,
        array("SECTION_BUTTONS" => false, "SESSID" => false)
    );

    $arElement['EDIT_LINK'] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
    $arElement['DELETE_LINK'] = $arButtons["edit"]["delete_element"]["ACTION_URL"];

    if ($arParams["ELEMENT_EDIT"]) {
        $arElement["EDIT_LINK_TEXT"] = $arButtons["edit"]["edit_element"]["TEXT"];
        $arElement["DELETE_LINK_TEXT"] = $arButtons["edit"]["delete_element"]["TEXT"];
    }

    if ($arElement["PROPERTY_PICTURE_VALUE"]) {
        $arElement["PICTURE"] = CFile::GetPath($arElement["PROPERTY_PICTURE_VALUE"]);
    }


    $arResult["ITEMS"][] = $arElement;
}

$this->IncludeComponentTemplate();

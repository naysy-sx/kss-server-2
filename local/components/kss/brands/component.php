<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!CModule::IncludeModule("iblock"))
  return;

$arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);
$arParams["ELEMENT_EDIT"] = $arParams["ELEMENT_EDIT"] !== "N" && $USER->IsAdmin();
$arParams["ELEMENT_DELETE"] = $arParams["ELEMENT_DELETE"] !== "N" && $USER->IsAdmin();

$arSelect = array(
  "ID",
  "IBLOCK_ID",
  "NAME",
  "PROPERTY_PREVIEW_PICTURE",
  "PROPERTY_PREVIEW",
  "EDIT_LINK",
  "DELETE_LINK"
);
$arFilter = array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y");
$res = CIBlockElement::GetList(array("SORT" => "ASC"), $arFilter, false, false, $arSelect);

$arResult["ITEMS"] = array();
while ($ob = $res->GetNext()) {
  $buttons = CIBlock::GetPanelButtons(
    $arParams["IBLOCK_ID"],
    $ob["ID"],
    0,
    array("SECTION_BUTTONS" => false, "SESSID" => false)
  );

  $arItem = array(
    "ID" => $ob["ID"],
    "NAME" => $ob["NAME"],
    "PREVIEW_PICTURE" => CFile::GetPath($ob["PROPERTY_PREVIEW_PICTURE_VALUE"]),
    "PREVIEW" => $ob["PROPERTY_PREVIEW_VALUE"],
    "EDIT_LINK" => $buttons["edit"]["edit_element"]["ACTION_URL"],
    "DELETE_LINK" => $buttons["edit"]["delete_element"]["ACTION_URL"],
  );

  $arResult["ITEMS"][] = $arItem;
}



$this->IncludeComponentTemplate();

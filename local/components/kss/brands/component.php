<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!CModule::IncludeModule("iblock"))
  return;

$arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);
$arParams["ELEMENT_EDIT"] = $arParams["ELEMENT_EDIT"] !== "N" && $USER->IsAdmin();
$arParams["ELEMENT_DELETE"] = $arParams["ELEMENT_DELETE"] !== "N" && $USER->IsAdmin();

if ($arParams["ELEMENT_EDIT"]) {
  $arButtons = CIBlock::GetPanelButtons(
    $arParams["IBLOCK_ID"],
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
  "PROPERTY_PREVIEW_PICTURE",
  "PROPERTY_PREVIEW",
);
$arFilter = array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y");
$res = CIBlockElement::GetList(array("SORT" => "ASC"), $arFilter, false, false, $arSelect);

$arResult["ITEMS"] = array();
while ($ob = $res->GetNext()) {
  $arButtons = CIBlock::GetPanelButtons(
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
    "EDIT_LINK" => $arButtons["edit"]["edit_element"]["ACTION_URL"],
    "DELETE_LINK" => $arButtons["edit"]["delete_element"]["ACTION_URL"],
  );

  if ($arParams["ELEMENT_EDIT"]) {
    $arItem["EDIT_LINK_TEXT"] = $arButtons["edit"]["edit_element"]["TEXT"];
    $arItem["DELETE_LINK_TEXT"] = $arButtons["edit"]["delete_element"]["TEXT"];
  }

  $arResult["ITEMS"][] = $arItem;
}

$this->IncludeComponentTemplate();

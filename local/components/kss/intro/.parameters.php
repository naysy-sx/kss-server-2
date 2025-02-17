<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!CModule::IncludeModule("iblock"))
  return;

$arIBlockType = CIBlockParameters::GetIBlockTypes();

$arIBlock = array();
$rsIBlock = CIBlock::GetList(array("sort" => "asc"), array("TYPE" => $arCurrentValues["IBLOCK_TYPE"], "ACTIVE" => "Y"));
while ($arr = $rsIBlock->Fetch())
  $arIBlock[$arr["ID"]] = "[" . $arr["ID"] . "] " . $arr["NAME"];

$arComponentParameters = array(
  "GROUPS" => array(),
  "PARAMETERS" => array(
    "IBLOCK_TYPE" => array(
      "PARENT" => "BASE",
      "NAME" => "Тип инфоблока",
      "TYPE" => "LIST",
      "VALUES" => $arIBlockType,
      "REFRESH" => "Y",
    ),
    "IBLOCK_ID" => array(
      "PARENT" => "BASE",
      "NAME" => "Инфоблок",
      "TYPE" => "LIST",
      "VALUES" => $arIBlock,
      "REFRESH" => "Y",
    ),
    "TITLE" => array(
      "NAME" => "Заголовок",
      "TYPE" => "STRING",
    ),
    "BUTTON_TEXT" => array(
      "NAME" => "Текст кнопки",
      "TYPE" => "STRING",
    )
  ),
);

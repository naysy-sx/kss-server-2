<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!CModule::IncludeModule("iblock"))
  return;

$arIBlocks = array();
$db_iblock = CIBlock::GetList(array("SORT" => "ASC"), array("ACTIVE" => "Y"));
while ($arRes = $db_iblock->Fetch())
  $arIBlocks[$arRes["ID"]] = $arRes["NAME"];

$arComponentParameters = array(
  "GROUPS" => array(),
  "PARAMETERS" => array(
    "IBLOCK_ID" => array(
      "PARENT" => "BASE",
      "NAME" => "8",
      "TYPE" => "LIST",
      "VALUES" => $arIBlocks,
      "REFRESH" => "Y",
    ),
    "SLIDES_TO_SHOW" => array(
      "PARENT" => "BASE",
      "NAME" => "Количество слайдов для показа",
      "TYPE" => "STRING",
      "DEFAULT" => "2",
    ),
    "AUTOPLAY" => array(
      "PARENT" => "BASE",
      "NAME" => "Автопрокрутка",
      "TYPE" => "CHECKBOX",
      "DEFAULT" => "N",
    ),
    "AUTOPLAY_SPEED" => array(
      "PARENT" => "BASE",
      "NAME" => "Скорость автопрокрутки (мс)",
      "TYPE" => "STRING",
      "DEFAULT" => "3000",
    ),

    "CACHE_TIME" => array("DEFAULT" => 36000000),
  ),
);

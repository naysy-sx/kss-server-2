<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

if (!Loader::includeModule('iblock')) {
  return;
}

$iblockOptions = array();
$rsIblocks = CIBlock::GetList(
  array("SORT" => "ASC"),
  array("ACTIVE" => "Y")
);
while ($arIblock = $rsIblocks->Fetch()) {
  $iblockOptions[$arIblock["ID"]] = "[" . $arIblock["ID"] . "] " . $arIblock["NAME"];
}

$arComponentParameters = array(
  "GROUPS" => array(),
  "PARAMETERS" => array(
    "IBLOCK_ID" => array(
      "PARENT" => "BASE",
      "NAME" => "ID инфоблока",
      "TYPE" => "LIST",
      "VALUES" => $iblockOptions,
      "DEFAULT" => "",
      "REFRESH" => "Y",
    ),
    "CACHE_TIME" => array(
      "DEFAULT" => 36000000
    ),
    "TITLE" => array(
      "PARENT" => "BASE",
      "NAME" => "Заголовок",
      "TYPE" => "STRING",
      "DEFAULT" => "",
    ),
    "BUTTON_TEXT" => array(
      "PARENT" => "BASE",
      "NAME" => "Текст кнопки",
      "TYPE" => "STRING",
      "DEFAULT" => "",
    ),
    "PICTURE" => array(
      "PARENT" => "BASE",
      "NAME" => "Изображение по центру",
      "TYPE" => "FILE",
      "FD_TARGET" => "F",
      "FD_EXT" => "jpg,jpeg,png,gif",
      "FD_UPLOAD" => true,
      "FD_USE_MEDIALIB" => true,
      "FD_MEDIALIB_TYPES" => array("image"),
    ),
    "ELEMENT_EDIT" => array(
      "PARENT" => "BASE",
      "NAME" => "Разрешить редактирование",
      "TYPE" => "CHECKBOX",
      "DEFAULT" => "Y",
    ),
    "ELEMENT_DELETE" => array(
      "PARENT" => "BASE",
      "NAME" => "Разрешить удаление",
      "TYPE" => "CHECKBOX",
      "DEFAULT" => "Y",
    ),
  ),
);

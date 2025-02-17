<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Iblock\IblockTable;

Loader::includeModule('iblock');

// Получаем список всех инфоблоков
$iblockList = IblockTable::getList([
  'select' => ['ID', 'NAME'],
]);

$iblockOptions = [];
while ($iblock = $iblockList->fetch()) {
  $iblockOptions[$iblock['ID']] = $iblock['NAME'];
}

$arComponentParameters = array(
  "PARAMETERS" => array(
    "IBLOCK_ID" => array(
      "PARENT" => "BASE",
      "NAME" => "Инфоблок",
      "TYPE" => "LIST",
      "VALUES" => $iblockOptions,
      "DEFAULT" => "",
      "REFRESH" => "Y",
    ),
    "CACHE_TIME" => array(
      "PARENT" => "CACHE_SETTINGS",
      "NAME" => "Время кеширования (сек.)",
      "TYPE" => "STRING",
      "DEFAULT" => "3600",
    ),
    "TITLE" => array(
      "NAME" => "Заголовок",
      "TYPE" => "STRING",
    ),
    "BUTTON_TEXT" => array(
      "NAME" => "Текст кнопки",
      "TYPE" => "STRING",
    ),
    "PICTURE" => array(
      "NAME" => "Изображение по центру",
      "TYPE" => "FILE",
      "FD_TARGET" => "F",
      "FD_EXT" => "jpg,jpeg,png,gif",
      "FD_UPLOAD" => true,
      "FD_USE_MEDIALIB" => true,
      "FD_MEDIALIB_TYPES" => array("image"),
    ),
  ),
);

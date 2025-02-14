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
      "VALUES" => $iblockOptions, // Динамически заполненный список инфоблоков
      "DEFAULT" => "", // Можно указать ID инфоблока по умолчанию
      "REFRESH" => "Y", // Обновляет форму при изменении значения
    ),
    "CACHE_TIME" => array(
      "PARENT" => "CACHE_SETTINGS",
      "NAME" => "Время кеширования (сек.)",
      "TYPE" => "STRING",
      "DEFAULT" => "3600",
    ),
  ),
);

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

$arResult = [];
$rsElements = CIBlockElement::GetList(
  ['SORT' => 'ASC'],
  ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'],
  false,
  false,
  ['ID', 'NAME', 'DETAIL_PAGE_URL', 'EDIT_LINK', 'DELETE_LINK']
);

while ($arElement = $rsElements->GetNext()) {
  $arElement['EDIT_LINK'] = CIBlock::GetArrayByID($iblockId, "ELEMENT_EDIT");
  $arElement['DELETE_LINK'] = CIBlock::GetArrayByID($iblockId, "ELEMENT_DELETE");
  $arResult[] = $arElement;
}

$this->IncludeComponentTemplate();

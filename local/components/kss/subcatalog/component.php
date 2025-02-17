<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

if (!Loader::includeModule('iblock')) {
  die('Модуль «Инфоблоки» не установлен');
}

// Получаем IBLOCK_ID из параметров
$iblockId = (int)$arParams['IBLOCK_ID'];
if (!$iblockId) {
  die('Не указан IBLOCK_ID');
}

// Получаем шаблон URL для разделов
$sectionUrlTemplate = CIBlock::GetArrayByID($iblockId, "SECTION_PAGE_URL");
$detailUrlTemplate = CIBlock::GetArrayByID($iblockId, "DETAIL_PAGE_URL");

// Рекурсивная функция для получения структуры разделов
function getSectionsTree($iblockId, $parentSectionId = 0)
{
  $arSections = [];
  $rsSections = CIBlockSection::GetList(
    ['SORT' => 'ASC'],
    ['IBLOCK_ID' => $iblockId, 'SECTION_ID' => $parentSectionId, 'ACTIVE' => 'Y'],
    false,
    ['ID', 'NAME', 'CODE', 'SECTION_PAGE_URL']
  );

  while ($arSection = $rsSections->GetNext()) {
    $arSection['ELEMENTS'] = [];
    $rsElements = CIBlockElement::GetList(
      ['SORT' => 'ASC'],
      ['IBLOCK_ID' => $iblockId, 'SECTION_ID' => $arSection['ID'], 'ACTIVE' => 'Y'],
      false,
      false,
      ['ID', 'NAME', 'CODE', 'DETAIL_PAGE_URL']
    );

    while ($arElement = $rsElements->GetNext()) {
      $arElement["DETAIL_PAGE_URL"] = str_replace("#ELEMENT_ID#", $arElement["ID"], $GLOBALS['detailUrlTemplate']);
      $arSection['ELEMENTS'][] = $arElement;
    }

    // Получаем вложенные разделы
    $arSection['SUBSECTIONS'] = getSectionsTree($iblockId, $arSection['ID']);

    // Генерация URL для раздела
    $arSection["SECTION_PAGE_URL"] = str_replace("#SECTION_ID#", $arSection["ID"], $GLOBALS['sectionUrlTemplate']);

    $arSections[] = $arSection;
  }

  return $arSections;
}

// Получаем структуру инфоблока
$arResult = getSectionsTree($iblockId);

// Передача данных в шаблон
$this->IncludeComponentTemplate();

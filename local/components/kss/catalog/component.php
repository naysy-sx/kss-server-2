<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$iblockType = 'catalog'; // Замените на нужный тип инфоблока

$rsIBlocks = CIBlock::GetList(
  array(),
  array('TYPE' => $iblockType, 'ACTIVE' => 'Y')
);

$arIBlocks = [];
while ($arIBlock = $rsIBlocks->Fetch()) {
  $arIBlocks[] = $arIBlock;
}

if (empty($arIBlocks)) {
  die('Инфоблоки указанного типа не найдены');
}

function getSectionsAndElements($iblockId)
{
  $arResult = [];

  // Получаем все активные разделы инфоблока
  $rsSections = CIBlockSection::GetList(
    array('SORT' => 'ASC'),
    array('IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'),
    false,
    array('ID', 'NAME', 'CODE', 'SECTION_PAGE_URL')
  );

  while ($arSection = $rsSections->GetNext()) {
    $arSection['ELEMENTS'] = [];

    // Получаем все активные элементы в данном разделе
    $rsElements = CIBlockElement::GetList(
      array('SORT' => 'ASC'),
      array('IBLOCK_ID' => $iblockId, 'SECTION_ID' => $arSection['ID'], 'ACTIVE' => 'Y'),
      false,
      false,
      array('ID', 'NAME', 'CODE', 'DETAIL_PAGE_URL')
    );

    while ($arElement = $rsElements->GetNext()) {
      $arElement["DETAIL_PAGE_URL"] = str_replace("#ELEMENT_ID#", $arElement["ID"], $GLOBALS['detailUrlTemplate']);
      $arSection['ELEMENTS'][] = $arElement;
    }

    $arResult[] = $arSection;
  }

  return $arResult;
}

// Получаем структуру всех инфоблоков указанного типа
$arResult = [];
foreach ($arIBlocks as $arIBlock) {
  $iblockId = $arIBlock['ID'];
  $sectionUrlTemplate = CIBlock::GetArrayByID($iblockId, "SECTION_PAGE_URL");
  $detailUrlTemplate = CIBlock::GetArrayByID($iblockId, "DETAIL_PAGE_URL");

  // Получаем структуру инфоблока
  $arResult[$iblockId] = [
    'IBLOCK' => $arIBlock,
    'SECTIONS' => getSectionsAndElements($iblockId)
  ];
}

// Передача данных в шаблон
$this->IncludeComponentTemplate();

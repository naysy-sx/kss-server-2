<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Iblock\SectionTable;

Loader::includeModule('iblock');

$arResult['SECTIONS'] = [];

$sectionList = SectionTable::getList([
  'select' => ['ID', 'NAME', 'DEPTH_LEVEL'],
  'filter' => ['IBLOCK_ID' => $arParams['IBLOCK_ID']],
  'order' => ['LEFT_MARGIN' => 'ASC'],
]);

while ($section = $sectionList->fetch()) {
  $arResult['SECTIONS'][] = $section;
}

$this->IncludeComponentTemplate();

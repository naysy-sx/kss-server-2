<?php
// catalog/component.php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

if (!Loader::includeModule('iblock')) {
  ShowError('Модуль "Инфоблоки" не установлен');
  return;
}

if (!isset($arParams["IBLOCK_TYPE"]) || empty($arParams["IBLOCK_TYPE"])) {
  ShowError('Не указан тип инфоблока');
  return;
}

// Проверяем права на редактирование
$arParams["ELEMENT_EDIT"] = $arParams["ELEMENT_EDIT"] !== "N" && $USER->IsAdmin();
$arParams["ELEMENT_DELETE"] = $arParams["ELEMENT_DELETE"] !== "N" && $USER->IsAdmin();

// Получаем список инфоблоков указанного типа
$rsIBlocks = CIBlock::GetList(
  array('SORT' => 'ASC'),
  array('TYPE' => $arParams["IBLOCK_TYPE"], 'ACTIVE' => 'Y')
);

$arResult["IBLOCKS"] = [];

while ($arIBlock = $rsIBlocks->Fetch()) {
  $iblockId = $arIBlock['ID'];

  // Добавляем кнопки управления для инфоблока
  if ($arParams["ELEMENT_EDIT"]) {
    $arButtons = CIBlock::GetPanelButtons(
      $iblockId,
      0,
      0,
      ["SECTION_BUTTONS" => false]
    );

    if (is_array($arButtons)) {
      $this->AddIncludeAreaIcons(
        array(
          array(
            "ID" => "add_element_" . $iblockId,
            "TITLE" => GetMessage("IBLOCK_ADD_ELEMENT"),
            "URL" => $arButtons["edit"]["add_element"]["ACTION"],
            "ICON" => "bx-context-toolbar-create-icon",
          )
        )
      );
    }
  }

  // Получаем разделы
  $arSections = [];
  $rsSections = CIBlockSection::GetList(
    array('SORT' => 'ASC'),
    array('IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'),
    false,
    array('ID', 'NAME', 'CODE', 'SECTION_PAGE_URL')
  );

  while ($arSection = $rsSections->GetNext()) {
    // Добавляем кнопки управления для раздела
    if ($arParams["ELEMENT_EDIT"]) {
      $arButtons = CIBlock::GetPanelButtons(
        $iblockId,
        0,
        $arSection['ID'],
        ["SECTION_BUTTONS" => true]
      );

      $arSection['EDIT_LINK'] = $arButtons["edit"]["edit_section"]["ACTION_URL"];
      $arSection['DELETE_LINK'] = $arButtons["edit"]["delete_section"]["ACTION_URL"];
    }

    // Получаем элементы раздела
    $arElements = [];
    $rsElements = CIBlockElement::GetList(
      array('SORT' => 'ASC'),
      array('IBLOCK_ID' => $iblockId, 'SECTION_ID' => $arSection['ID'], 'ACTIVE' => 'Y'),
      false,
      false,
      array('ID', 'NAME', 'CODE', 'DETAIL_PAGE_URL', 'PREVIEW_PICTURE')
    );

    while ($arElement = $rsElements->GetNext()) {
      if ($arParams["ELEMENT_EDIT"]) {
        $arButtons = CIBlock::GetPanelButtons(
          $iblockId,
          $arElement["ID"],
          0,
          array("SECTION_BUTTONS" => false)
        );

        $arElement['EDIT_LINK'] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
        $arElement['DELETE_LINK'] = $arButtons["edit"]["delete_element"]["ACTION_URL"];
      }

      $arElement['PREVIEW_PICTURE'] = CFile::GetPath($arElement['PREVIEW_PICTURE']);
      $arElements[] = $arElement;
    }

    $arSection['ELEMENTS'] = $arElements;
    $arSections[] = $arSection;
  }

  // Если разделов нет, получаем элементы инфоблока
  if (empty($arSections)) {
    $arElements = [];
    $rsElements = CIBlockElement::GetList(
      array('SORT' => 'ASC'),
      array('IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'),
      false,
      false,
      array('ID', 'NAME', 'CODE', 'DETAIL_PAGE_URL', 'PREVIEW_PICTURE')
    );

    while ($arElement = $rsElements->GetNext()) {
      if ($arParams["ELEMENT_EDIT"]) {
        $arButtons = CIBlock::GetPanelButtons(
          $iblockId,
          $arElement["ID"],
          0,
          array("SECTION_BUTTONS" => false)
        );

        $arElement['EDIT_LINK'] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
        $arElement['DELETE_LINK'] = $arButtons["edit"]["delete_element"]["ACTION_URL"];
      }

      $arElement['PREVIEW_PICTURE'] = CFile::GetPath($arElement['PREVIEW_PICTURE']);
      $arElements[] = $arElement;
    }

    $arIBlock['ELEMENTS'] = $arElements;
  }

  $arIBlock['SECTIONS'] = $arSections;
  $arResult["IBLOCKS"][] = $arIBlock;
}

$this->IncludeComponentTemplate();
?>

<?php
// catalog/.parameters.php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!CModule::IncludeModule("iblock")) {
  return;
}

$arIBlockTypes = CIBlockParameters::GetIBlockTypes();

$arComponentParameters = array(
  "GROUPS" => array(),
  "PARAMETERS" => array(
    "IBLOCK_TYPE" => array(
      "PARENT" => "BASE",
      "NAME" => "Тип инфоблока",
      "TYPE" => "LIST",
      "VALUES" => $arIBlockTypes,
      "REFRESH" => "Y",
      "DEFAULT" => "",
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
    "CACHE_TIME" => array("DEFAULT" => 36000000),
  ),
);
?>

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

// Определяем, какое поле изображения использовать
$imageField = $arParams['IMAGE_FIELD'] ?: 'PREVIEW_PICTURE';
$elementImageProperty = $arParams['ELEMENT_IMAGE_PROPERTY'] ?: 'PICTURE';

$arParams["ELEMENT_EDIT"] = $arParams["ELEMENT_EDIT"] !== "N" && $USER->IsAdmin();
$arParams["ELEMENT_DELETE"] = $arParams["ELEMENT_DELETE"] !== "N" && $USER->IsAdmin();

if ($arParams["ELEMENT_EDIT"]) {
	$arButtons = CIBlock::GetPanelButtons(
		$iblockId,
		0,
		0,
		array("SECTION_BUTTONS" => false)
	);
	if (is_array($arButtons)) {
		$this->AddIncludeAreaIcons(
			array(
				array(
					"ID" => "add_element",
					"TITLE" => GetMessage("IBLOCK_ADD_ELEMENT"),
					"URL" => $arButtons["edit"]["add_element"]["ACTION"],
					"ICON" => "bx-context-toolbar-create-icon",
				)
			)
		);
	}
}


$arSelect = array(
	"ID",
	"IBLOCK_ID",
	"NAME",
	"DETAIL_PAGE_URL",
	"PREVIEW_PICTURE",
	"DETAIL_PICTURE",
	"PROPERTY_PICTURE",
	"PROPERTY_CITY",
	"PROPERTY_TITLE",
	"PROPERTY_DESCRIPTION",
	"PROPERTY_BUTTON_TEXT",
	"PROPERTY_" . $elementImageProperty
);

// Если это свойство инфоблока для основного изображения
if (strpos($imageField, 'PROPERTY_') === 0) {
	$arSelect[] = $imageField;
}

$arFilter = array(
	"IBLOCK_ID" => $iblockId,
	"ACTIVE" => "Y"
);

$arResult = array();
$rsElements = CIBlockElement::GetList(
	array("SORT" => "ASC"),
	$arFilter,
	false,
	false,
	$arSelect
);

while ($arElement = $rsElements->GetNext()) {
	$arButtons = CIBlock::GetPanelButtons(
		$iblockId,
		$arElement["ID"],
		0,
		array("SECTION_BUTTONS" => false, "SESSID" => false)
	);

	// Получаем URL основного изображения
	$imageUrl = '';
	if (strpos($imageField, 'PROPERTY_') === 0) {
		$imageUrl = CFile::GetPath($arElement[$imageField . '_VALUE']);
	} else {
		$imageUrl = CFile::GetPath($arElement[$imageField]);
	}

	// Получаем URL дополнительного изображения элемента
	$elementImageUrl = '';
	if ($arElement['PROPERTY_' . $elementImageProperty . '_VALUE']) {
		$elementImageUrl = CFile::GetPath($arElement['PROPERTY_' . $elementImageProperty . '_VALUE']);
	}

	$arElement['EDIT_LINK'] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
	$arElement['DELETE_LINK'] = $arButtons["edit"]["delete_element"]["ACTION_URL"];

	if ($arParams["ELEMENT_EDIT"]) {
		$arElement["EDIT_LINK_TEXT"] = $arButtons["edit"]["edit_element"]["TEXT"];
		$arElement["DELETE_LINK_TEXT"] = $arButtons["edit"]["delete_element"]["TEXT"];
	}

	$arElement['IMAGE_URL'] = $imageUrl;
	$arElement['ELEMENT_IMAGE_URL'] = $elementImageUrl;
	$arResult["ITEMS"][] = $arElement;
}

$this->IncludeComponentTemplate();

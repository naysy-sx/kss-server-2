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

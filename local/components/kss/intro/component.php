<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!CModule::IncludeModule("iblock"))
  return;

$arSelect = array("ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT");
$arFilter = array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y");
$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
while ($ob = $res->GetNext()) {
  $arButtons = CIBlock::GetPanelButtons(
    $arParams["IBLOCK_ID"],
    $ob["ID"],
    0,
    array("SECTION_BUTTONS" => false, "SESSID" => false)
  );

  if ($ob["PREVIEW_PICTURE"]) {
    $ob["PREVIEW_PICTURE"] = CFile::GetFileArray($ob["PREVIEW_PICTURE"]);
  }

  $ob["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
  $ob["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];

  $arResult["ITEMS"][] = $ob;
}

$this->IncludeComponentTemplate();

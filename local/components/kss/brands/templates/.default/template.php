<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);

?>

<ul class="brands">
  <?php foreach ($arResult["ITEMS"] as $arItem):
    $this->AddEditAction(
      $arItem['ID'],
      $arItem['EDIT_LINK'],
      CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT")
    );
    $this->AddDeleteAction(
      $arItem['ID'],
      $arItem['DELETE_LINK'],
      CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"),
      array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))
    );
  ?>
    <li class="brands-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
      <img
        src="<?= $arItem["PREVIEW_PICTURE"] ?>"
        alt="<?= $arItem["NAME"] ?>" />
    </li>
  <?php endforeach; ?>
</ul>
<div class="block b1"></div>
<div class="block b2"></div>
<div class="block b3"></div>
<div class="block b4"></div>
<div class="block b5"></div>
<div class="block b6"></div>
<div class="block b7"></div>
<div class="block b8"></div>
<div class="block b9"></div>
<div class="block b10"></div>
<div class="block b11"></div>
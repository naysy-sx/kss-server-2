<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */

$this->setFrameMode(true);

if ($arParams["DISPLAY_TOP_PAGER"]):
  echo $arResult["NAV_STRING"];
endif;
?>

<ul class="brands">
  <?php foreach ($arResult["ITEMS"] as $arItem):
    $this->AddEditAction(
      $arItem['ID'],
      $arItem['EDIT_LINK'],
      $arItem['EDIT_LINK_TEXT']
    );
    $this->AddDeleteAction(
      $arItem['ID'],
      $arItem['DELETE_LINK'],
      $arItem['DELETE_LINK_TEXT'],
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

<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
  <?= $arResult["NAV_STRING"] ?>
<? endif; ?>
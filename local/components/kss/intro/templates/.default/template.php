<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

// Добавляем кнопки "Редактировать" и "Удалить"
$this->setFrameMode(true);
?>

<h1 class="intro-title">
  <?= ($arParams["TITLE"]) ?>
</h1>
<ul class="intro-list bordered">
  <? if ($arResult["ITEMS"]): ?>
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
      <?
      // Генерируем уникальный ID для каждого элемента
      $editId = $this->GetEditAreaId($arItem['ID']);
      $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
      $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => "Вы уверены, что хотите удалить этот элемент?"]);
      ?>
      <li id="<?= $editId ?>" class="intro-item"><?= $arItem["NAME"] ?></li>
    <? endforeach; ?>

    <li class="intro-item">
      <a href="#" class="button"><?= ($arParams["BUTTON_TEXT"]) ?></a>
    </li>
  <? endif; ?>
</ul>
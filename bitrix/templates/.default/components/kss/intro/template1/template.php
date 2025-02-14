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
?>

<section class="intro">
  <h1>=======</h1>
  <? if ($arResult["ITEMS"]): ?>
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
      <div class="intro-content">
        <? if ($arItem["PREVIEW_PICTURE"]): ?>
          <div class="intro-image">
            <img
              src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
              alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
              width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
              height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>">
          </div>
        <? endif; ?>

        <div class="intro-text">
          <? if ($arItem["NAME"]): ?>
            <h1 class="intro-title"><?= $arItem["NAME"] ?></h1>
          <? endif; ?>

          <? if ($arItem["PREVIEW_TEXT"]): ?>
            <div class="intro-description">
              <?= $arItem["PREVIEW_TEXT"] ?>
            </div>
          <? endif; ?>
        </div>
      </div>
    <? endforeach; ?>
  <? endif; ?>
</section>
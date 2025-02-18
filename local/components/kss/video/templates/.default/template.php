<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);

// Регистрируем зависимость от Swiper
\Bitrix\Main\UI\Extension::load("ui.swiper");

// Регистрируем наш скрипт инициализации
$this->addExternalJS($templateFolder . '/script.js');

// Создаем уникальный ID для слайдера
$sliderId = 'video-slider-' . randString(5);
?>

<div class="container -middle slider-wrapper">
  <div class="videos" data-aos="zoom-in">
    <div class="swiper videos-slider" id="<?= $sliderId ?>">
      <div class="swiper-wrapper">
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
          <div class="swiper-slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <a
              data-src="<?= $arItem["LINK"] ?>?autoplay=1"
              data-fancybox="videos"
              data-caption="<?= $arItem["PREVIEW"] ?>"
              class="videos-link">
              <img src="<?= $arItem["PREVIEW_PICTURE"] ?>" alt="<?= $arItem["NAME"] ?>" />
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="pagination videos-pagination"></div>
</div>

<script>
  // Передаем параметры в глобальную переменную
  window.videoSliderParams = window.videoSliderParams || {};
  window.videoSliderParams['<?= $sliderId ?>'] = {
    sliderId: '<?= $sliderId ?>',
    slidesPerView: <?= intval($arParams["SLIDES_TO_SHOW"]) ?>,
    autoplay: <?= $arParams["AUTOPLAY"] === "Y" ? "true" : "false" ?>,
    autoplaySpeed: <?= intval($arParams["AUTOPLAY_SPEED"]) ?>
  };
</script>
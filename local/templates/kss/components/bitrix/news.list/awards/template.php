<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php

$iblockName = $arResult['NAME'];

?>

<section class="awards-wrapper">
  <div class="container -large">
    <div class="awards bordered">
      <div class="awards-header">
        <h2 class="section-title" data-aos="fade-in">
          <?= $iblockName; ?>
        </h2>
      </div>
      <div class="swiper awards-slider" data-aos="fade-in">
        <div class="swiper-wrapper">
          <?php foreach ($arResult["ITEMS"] as $arItem): ?>
            <div class="swiper-slide">
              <?php
              // Получаем путь к картинке, если она есть
              $previewPicturePath = '';
              if (!empty($arItem['PROPERTIES']['PICTURE']['VALUE'])) {
                $previewPicturePath = CFile::GetPath($arItem['PROPERTIES']['PICTURE']['VALUE']);
              }
              ?>
              <a
                data-fancybox
                data-src="<?= $previewPicturePath; ?>"
                class="awards-link">

                <?php if (!empty($previewPicturePath)): ?>
                  <img src="<?= $previewPicturePath; ?>" alt="<?= $arItem['NAME']; ?>" />
                <?php else: ?>
                  <img src="/path/to/default/image.jpg" alt="<?= $arItem['NAME']; ?>" />
                <?php endif; ?>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="awards-pagination swiper-pagination pagination"></div>
      <div class="block b1"></div>
      <div class="block b2"></div>
      <div class="block b3"></div>
      <div class="block b4"></div>
      <div class="block b5"></div>
      <div class="block b6"></div>
    </div>
  </div>
</section>
<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php

$iblockName = $arResult['NAME'];

?>



<section class="gallery-wrapper dark">
  <div class="container -large">
    <div class="gallery bordered">
      <div class="gallery-header">
        <h2 class="section-title">
          <?= $iblockName; ?>
        </h2>
      </div>
      <div class="gallery-block">
        <ul class="gallery-list">

          <?php foreach ($arResult["ITEMS"] as $arItem): ?>
            <li class="photo">

              <?php
              // Получаем путь к картинке, если она есть
              $previewPicturePath = '';
              if (!empty($arItem['PROPERTIES']['PICTURE']['VALUE'])) {
                $previewPicturePath = CFile::GetPath($arItem['PROPERTIES']['PICTURE']['VALUE']);
              }
              ?>
              <a
                data-fancybox
                data-src="<?= $previewPicturePath; ?>">

                <?php if (!empty($previewPicturePath)): ?>
                  <img
                    src="<?= $previewPicturePath; ?>"
                    alt="<?= $arItem['NAME']; ?>"
                    data-aos="zoom-in"
                    data-aos-easing="ease"
                    data-aos-delay="100" />
                <?php else: ?>
                  <img src="/path/to/default/image.jpg" alt="<?= $arItem['NAME']; ?>" />
                <?php endif; ?>
              </a>

            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="block b1"></div>
      <div class="block b2"></div>
      <div class="block b3"></div>
      <div class="block b4"></div>
    </div>
  </div>
</section>
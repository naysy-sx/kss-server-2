<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php

$iblockName = $arResult['NAME'];

?>

<section class="advantages-wrapper">
  <div class="container -large">
    <div class="advantages bordered">
      <h2
        class="section-title"
        data-aos="fade"
        data-aos-easing="ease"
        data-aos-delay="100">
        <?= $iblockName; ?>
      </h2>
      <ul class="advantages-list">
        <?php foreach ($arResult["ITEMS"] as $arItem): ?>
          <li
            class="advantages-item"
            data-aos="fade"
            data-aos-easing="ease"
            data-aos-delay="200">
            <div class="advantage">
              <div class="advantage-image">
                <?php
                // Получаем путь к картинке, если она есть
                $previewPicturePath = '';
                if (!empty($arItem['PROPERTIES']['ICON']['VALUE'])) {
                  $previewPicturePath = CFile::GetPath($arItem['PROPERTIES']['ICON']['VALUE']);
                }
                ?>
                <?php if (!empty($previewPicturePath)): ?>
                  <img src="<?= $previewPicturePath; ?>" alt="<?= $arItem['NAME']; ?>" />
                <?php else: ?>
                  <img src="/path/to/default/image.jpg" alt="<?= $arItem['NAME']; ?>" />
                <?php endif; ?>

              </div>
              <h3 class="advantage-text">
                <?= $arItem['NAME']; ?>
              </h3>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="block b1"></div>
      <div class="block b2"></div>
      <div class="block b3"></div>
      <div class="block b4"></div>
    </div>
  </div>
</section>
<!-- ADVANTAGES END -->
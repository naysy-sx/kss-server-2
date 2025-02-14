<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php foreach ($arResult["ITEMS"] as $arItem): ?>

  <div class="swiper-slide">
    <a
      data-src="<?= $arItem['PROPERTIES']['LINK']['VALUE']; ?>"
      data-fancybox="videos"
      data-caption="<?= $arItem['NAME']; ?>"
      class="videos-link">
      <?php
      // Получаем путь к картинке, если она есть
      $previewPicturePath = '';
      if (!empty($arItem['PROPERTIES']['PREVIEW']['VALUE'])) {
        $previewPicturePath = CFile::GetPath($arItem['PROPERTIES']['PREVIEW']['VALUE']);
      }
      ?>
      <?php if (!empty($previewPicturePath)): ?>
        <img src="<?= $previewPicturePath; ?>" alt="<?= $arItem['NAME']; ?>" />
      <?php else: ?>
        <img src="/path/to/default/image.jpg" alt="<?= $arItem['NAME']; ?>" />
      <?php endif; ?>
    </a>
  </div>

<?php endforeach; ?>
<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php
$iblockName = $arResult['NAME'];
?>

<section class="news-wrapper">
  <div class="container -large">
    <div class="news bordered">
      <div class="news-header">
        <h2 class="section-title"><?= $iblockName; ?></h2>
      </div>
      <div class="news-slider">
        <div class="swiper">
          <div class="swiper-wrapper">
            <?php foreach ($arResult["ITEMS"] as $arItem): ?>
              <div class="news-card swiper-slide">

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
                  class="news-link">

                  <?php if (!empty($previewPicturePath)): ?>
                    <img src="<?= $previewPicturePath; ?>" alt="<?= $arItem['NAME']; ?>" />
                  <?php else: ?>
                    <img src="/path/to/default/image.jpg" alt="<?= $arItem['NAME']; ?>" />
                  <?php endif; ?>
                </a>

                <p class="news-text">
                  <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"><?= $arItem['NAME']; ?></a>
                </p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="news-pager swiper-pagination pagination"></div>
      <div class="block b1"></div>
      <div class="block b2"></div>
      <div class="block b3"></div>
      <div class="block b4"></div>
      <div class="block b5"></div>
      <div class="block b6"></div>
      <div class="block b7"></div>
      <div class="block b8"></div>
    </div>
  </div>
</section>
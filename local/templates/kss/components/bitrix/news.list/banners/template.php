<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php
$iblockName = $arResult['NAME'];
// echo '<pre style="color: lime;">';
// print_r($arItem['PROPERTIES']);
// echo '</pre>';

?>
<!-- BANNER -->
<section
  class="banner-wrapper"
  data-aos="zoom-out"
  data-aos-easing="ease"
  data-aos-delay="100">
  <div class="container">
    <?php foreach ($arResult["ITEMS"] as $arItem): ?>
      <div class="banner">
        <div class="banner-content">
          <h2 class="section-title"><?= $arItem['NAME']; ?></h2>
          <p class="banner-text"><?= $arItem['PROPERTIES']['CONTENT']['VALUE']['TEXT']; ?></p>
        </div>
        <div class="banner-button">
          <a
            data-src="#feedback"
            data-fancybox
            data-width="800"
            class="button"><?= $arItem['PROPERTIES']['BUTTON_TEXT']['VALUE']; ?></a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<!-- BANNER END -->
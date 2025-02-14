<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php

$iblockName = $arResult['NAME'];
$iblockDescription = explode('---', $arResult['DESCRIPTION']);
// echo '<pre style="color: lime;">';
// print_r($iblockDescription);
// echo '</pre>';
?>

<section class="projects-wrapper dark">
  <div class="container -large">
    <div class="projects bordered">
      <div class="projects-header">
        <h2 class="section-title" data-aos="fade-up">
          <?= $iblockName; ?>
        </h2>
      </div>
      <div class="projects-slider-wrapper" data-aos="fade-up">
        <div class="swiper projects-slider">
          <div class="swiper-wrapper">
            <?php foreach ($arResult["ITEMS"] as $arItem): ?>
              <div class="swiper-slide">
                <div class="project-card">

                  <span class="project-address"><b></b><?= $arItem['PROPERTIES']['LOCATION']['VALUE']; ?></span>
                  <figure class="project-image">
                    <?php
                    $previewPicturePath = '';
                    if (!empty($arItem['PROPERTIES']['PICTURE']['VALUE'])) {
                      $previewPicturePath = CFile::GetPath($arItem['PROPERTIES']['PICTURE']['VALUE']);
                    }
                    ?>
                    <?php if (!empty($previewPicturePath)): ?>
                      <img src="<?= $previewPicturePath; ?>" alt="<?= $arItem['NAME']; ?>" />
                    <?php else: ?>
                      <img src="/path/to/default/image.jpg" alt="<?= $arItem['NAME']; ?>" />
                    <?php endif; ?>

                    <figcaption>
                      <h3><?= $arItem['PROPERTIES']['OBJECT']['VALUE']; ?></h3>
                      <p><?= $arItem['PROPERTIES']['WORK']['VALUE']['TEXT']; ?></p>
                    </figcaption>
                  </figure>
                  <div class="project-button">
                    <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="button"><?= $arItem['PROPERTIES']['TEXT_BUTTON']['VALUE']; ?></a>
                  </div>
                </div>
              </div>

            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="projects-pagination pagination"></div>

      <div class="projects-content">
        <h2><?= $iblockDescription[0] ?></h2>
        <p>
          <?= $iblockDescription[1] ?>
        </p>
      </div>
      <div class="projects-cities">
        <?= $iblockDescription[2] ?>
      </div>
      <div class="block b1"></div>
      <div class="block b2"></div>
      <div class="block b3"></div>
      <div class="block b4"></div>
    </div>
  </div>
</section>
<!-- PROJECTS END -->
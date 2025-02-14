<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php

$iblockName = $arResult['NAME'];
$iblockPicture = CFile::GetPath($arResult['PICTURE']);

// echo '<pre style="color: lime;">';
// print_r($arResult);
// echo '</pre>';

?>

<!-- 6. WORKS -->
<section
  class="works-wrapper dark"
  data-aos="fade-up"
  data-aos-easing="ease"
  data-aos-delay="100">
  <div class="container -large">
    <div class="works bordered">
      <div class="works-picture">
        <img src="<?= $iblockPicture; ?>" alt="<?= $iblockName; ?>" />
      </div>
      <div class="works-header">
        <h2 class="section-title"><?= $iblockName; ?></h2>
      </div>
      <ul class="works-list bordered">
        <?php foreach ($arResult["ITEMS"] as $arItem): ?>
          <li class="card">
            <a href="<?= $arItem['LINK']; ?>" class="card-link"><?= $arItem['NAME']; ?></a>
          </li>

        <?php endforeach; ?>
      </ul>
      <div class="block b1"></div>
      <div class="block b2"></div>
      <div class="block b3"></div>
      <div class="block b4"></div>
      <div class="block b5"></div>
    </div>
  </div>
</section>
<!-- WORKS END -->
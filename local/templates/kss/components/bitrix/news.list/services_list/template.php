<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<?php foreach ($arResult["ITEMS"] as $arItem): ?>
  <li
    class="cards-item"
    data-aos="fade"
    data-aos-easing="ease"
    data-aos-delay="300">
    <div class="card">
      <h2 class="card-header">
        <?= $arItem["NAME"] ?>
      </h2>
      <?php if ($arItem["PREVIEW_TEXT"]): ?>
        <?= $arItem["PREVIEW_TEXT"] ?>
      <?php endif; ?>

    </div>
  </li>
<?php endforeach; ?>
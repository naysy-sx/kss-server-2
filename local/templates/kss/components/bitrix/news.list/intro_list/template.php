<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php foreach ($arResult["ITEMS"] as $arItem): ?>
  <h1
    class="intro-title"
    data-aos="fade"
    data-aos-easing="ease"
    data-aos-delay="100">
    <?= $arItem["PROPERTIES"]["MAIN_TITLE"]["VALUE"] ?>
  </h1>
  <ul
    class="intro-list bordered"
    data-aos="fade"
    data-aos-easing="ease"
    data-aos-delay="200">
    <li class="intro-item"><?= $arItem["PROPERTIES"]["FIRST"]["VALUE"] ?></li>
    <li class="intro-item"><?= $arItem["PROPERTIES"]["TWO"]["VALUE"] ?></li>
    <li class="intro-item"><?= $arItem["PROPERTIES"]["THIRD"]["VALUE"] ?></li>
    <li class="intro-item">
      <a href="#" class="button"><?= $arItem["PROPERTIES"]["BUTTON_TEXT"]["VALUE"] ?></a>
    </li>
  </ul>
<?php endforeach; ?>
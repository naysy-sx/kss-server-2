<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php

$iblockName = $arResult['NAME'];
$iblockDescription = $arResult['DESCRIPTION'];

?>

<!-- 4. PRODUCTS -->
<section class="products-wrapper dark" id="products">
  <div class="container -large">
    <div class="products bordered">
      <div class="products-header">
        <h2
          class="section-title"
          data-aos="zoom-in"
          data-aos-easing="ease"
          data-aos-delay="100">
          <?= $iblockName; ?> [admin]
        </h2>
        <p
          class="section-subtitle"
          data-aos="zoom-in"
          data-aos-easing="ease"
          data-aos-delay="200">
          <?= $iblockDescription; ?> [admin]
        </p>
      </div>


      <?php
      $cardClassIndex = 1; // Инициализация переменной перед циклом
      foreach ($arResult["ITEMS"] as $arItem): ?>
        <div class="card c<?= $cardClassIndex; ?>">
          <a
            href="<?= $arItem['PROPERTIES']['LINK']['VALUE']; ?>"
            class="card-link"
            data-aos="zoom-in"
            data-aos-easing="ease"
            data-aos-delay="100"><?= $arItem['NAME']; ?></a>
        </div>
        <?php $cardClassIndex++; // Увеличиваем значение переменной на каждой итерации 
        ?>
      <?php endforeach; ?>

      <div class="card-button">
        <a
          href="/"
          class="button"
          data-aos="zoom-in"
          data-aos-easing="ease"
          data-aos-delay="1700">Все оборудование</a>
      </div>
      <?php

      $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "brands_logos",
        array(
          "IBLOCK_TYPE" => "brands_logos",
          "IBLOCK_ID" => "10",
          "NEWS_COUNT" => "5",
          "SORT_BY1" => "ACTIVE_FROM",
          "SORT_ORDER1" => "DESC",
          "FIELD_CODE" => array("ID", "NAME", "LOGO"),
          "PROPERTY_CODE" => array("IMAGE"),
          "CACHE_TYPE" => "A",
          "CACHE_TIME" => "3600",
          "DISPLAY_NAME" => "Y",
          "DISPLAY_PICTURE" => "Y",
          "DISPLAY_PREVIEW_TEXT" => "Y",
          "SET_TITLE" => "N",
          "SET_BROWSER_TITLE" => "N",
          "SET_META_KEYWORDS" => "N",
          "SET_META_DESCRIPTION" => "N",
          "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
          "ADD_SECTIONS_CHAIN" => "N",
          "PAGER_TEMPLATE" => ".default",
          "DISPLAY_BOTTOM_PAGER" => "Y",
          "PAGER_TITLE" => "Другие новости",
          "PAGER_SHOW_ALL" => "N"
        ),
        false
      );
      ?>
      <div class="block b1"></div>
      <div class="block b2"></div>
      <div class="block b3"></div>
      <div class="block b4"></div>
      <div class="block b5"></div>
      <div class="block b6"></div>
      <div class="block b7"></div>
      <div class="block b8"></div>
      <div class="block b9"></div>
      <div class="block b10"></div>
      <div class="block b11"></div>
    </div>
  </div>
</section>
<!-- PRODUCTS END -->
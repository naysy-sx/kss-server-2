<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<ul class="brands">
  <?php foreach ($arResult["ITEMS"] as $arItem): ?>
    <li class="brands-item">
      <?php

      $previewPicturePath = '';
      if (!empty($arItem['PROPERTIES']['IMAGE']['VALUE'])) {
        $previewPicturePath = CFile::GetPath($arItem['PROPERTIES']['IMAGE']['VALUE']);
      }
      ?>
      <?php if (!empty($previewPicturePath)): ?>
        <img
          src="<?= $previewPicturePath; ?>"
          alt="<?= $arItem['NAME']; ?>"
          data-aos="zoom-in"
          data-aos-easing="ease"
          data-aos-delay="600" />

      <?php else: ?>
        ==<img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>" alt="<?= $arItem['NAME']; ?>" />==
      <?php endif; ?>

    </li>

  <?php endforeach; ?>
</ul>
<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $this->setFrameMode(true); ?>
<div class="products-header">
  <h2
    class="section-title"
    data-aos="zoom-in"
    data-aos-easing="ease"
    data-aos-delay="100">
    <span><?= htmlspecialchars($arParams["TITLE"]); ?></span>
  </h2>
  <p
    class="section-subtitle"
    data-aos="zoom-in"
    data-aos-easing="ease"
    data-aos-delay="200">
    <?= htmlspecialchars($arParams["SUBTITLE"]); ?>
  </p>
</div>
<?php $delay = 100; ?>
<?php foreach ($arResult as $index => $item): ?>
  <?php
  $this->AddEditAction(
    $item['ID'],
    $item['EDIT_LINK'],
    CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT")
  );
  $this->AddDeleteAction(
    $item['ID'],
    $item['DELETE_LINK'],
    CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"),
    array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))
  );
  ?>
  <div class="card c<?= $index + 1; ?>" id="<?= $this->GetEditAreaId($item['ID']); ?>">
    <a
      href="<?= htmlspecialchars($item['DETAIL_PAGE_URL']); ?>"
      class="card-link"
      data-aos="zoom-in"
      data-aos-easing="ease"
      data-aos-delay="<?= $delay; ?>">
      <?= htmlspecialchars($item['NAME']); ?>
    </a>
  </div>
  <?php $delay += 100; ?>
<?php endforeach; ?>
<div class="card-button">
  <a
    href="/"
    class="button"
    data-aos="zoom-in"
    data-aos-easing="ease"
    data-aos-delay="1700"><?= htmlspecialchars($arParams["BUTTON_TEXT"]); ?></a>
</div>
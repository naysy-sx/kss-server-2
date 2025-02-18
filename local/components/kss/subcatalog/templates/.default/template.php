<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php $this->setFrameMode(true); ?>
<?php /** @var array $arParams */ ?>
<?php /** @var array $arResult */ ?>



<?php if (!empty($arResult)): ?>

  <!-- 2. PRODUCTION -->

  <div class="production bordered">
    <h2 class="section-title">
      <span
        data-aos="fade-up"
        data-aos-easing="ease"
        data-aos-delay="100">
        <span><?= ($arParams["TITLE"]) ?></span>
      </span>
    </h2>


    <?php foreach ($arResult as $section): ?>
      <div class="card c<?= $section['ID'] % 10 ?>">
        <div class="card-body" data-aos="fade-right">
          <div class="card-header"><?= $section['NAME'] ?></div>
          <ul class="card-list">
            <?php foreach ($section['ELEMENTS'] as $element): ?>
              <li class="card-item">
                <a href="<?= $element['DETAIL_PAGE_URL'] ?>" class="card-link"><?= $element['NAME'] ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    <?php endforeach; ?>

    <div class="production-image">
      <figure>
        <img
          src="<?= ($arParams["PICTURE"]) ?>"
          alt="Изображение оборудования" />
      </figure>
      <a href="#" class="button"><?= ($arParams["BUTTON_TEXT"]) ?></a>
    </div>
    <div class="block b1"></div>
    <div class="block b2"></div>
    <div class="block b3"></div>
    <div class="block b4"></div>
    <div class="block b5"></div>
    <div class="block b6"></div>
  </div>

  <!-- PRODUCTION END -->



<?php else: ?>
  <p>Инфоблоки не найдены.</p>
<?php endif; ?>
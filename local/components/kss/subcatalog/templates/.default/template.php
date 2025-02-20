<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $this->setFrameMode(true); ?>

<?php if (!empty($arResult)): ?>
  <div class="production bordered">
    <?php if ($arParams["TITLE"]): ?>
      <h2 class="section-title">
        <span data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
          <span><?= htmlspecialchars($arParams["TITLE"]) ?></span>
        </span>
      </h2>
    <?php endif; ?>

    <?php foreach ($arResult as $section): ?>
      <div class="card c<?= $section['ID'] % 10 ?>">
        <div class="card-body" data-aos="fade-right">
          <div class="card-header"><?= htmlspecialchars($section['NAME']) ?></div>
          <ul class="card-list">
            <?php foreach ($section['ELEMENTS'] as $element): ?>
              <?php
              $this->AddEditAction(
                $element['ID'],
                $element['EDIT_LINK'],
                $element['EDIT_LINK_TEXT']
              );
              $this->AddDeleteAction(
                $element['ID'],
                $element['DELETE_LINK'],
                $element['DELETE_LINK_TEXT'],
                array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))
              );
              ?>
              <li class="card-item" id="<?= $this->GetEditAreaId($element['ID']); ?>">
                <a href="<?= htmlspecialchars($element['DETAIL_PAGE_URL']) ?>" class="card-link">
                  <?= htmlspecialchars($element['NAME']) ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    <?php endforeach; ?>

    <div class="production-image">
      <?php if ($arParams["PICTURE"]): ?>
        <figure>
          <img src="<?= htmlspecialchars($arParams["PICTURE"]) ?>" alt="Изображение оборудования" />
        </figure>
      <?php endif; ?>
      <?php if ($arParams["BUTTON_TEXT"]): ?>
        <a href="#" class="button"><?= htmlspecialchars($arParams["BUTTON_TEXT"]) ?></a>
      <?php endif; ?>
    </div>

    <div class="block b1"></div>
    <div class="block b2"></div>
    <div class="block b3"></div>
    <div class="block b4"></div>
    <div class="block b5"></div>
    <div class="block b6"></div>
  </div>
<?php else: ?>
  <p>Разделы не найдены.</p>
<?php endif; ?>
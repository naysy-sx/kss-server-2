<?php
// catalog/templates/.default/template.php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?php if (!empty($arResult["IBLOCKS"])): ?>
  <ul class="intro-cards bordered">
    <?php
    $delay = 300;
    foreach ($arResult["IBLOCKS"] as $arIBlock):
    ?>
      <li class="cards-item" data-aos="fade" data-aos-easing="ease" data-aos-delay="<?= $delay ?>">
        <div class="card">
          <h2 class="card-header"><?= htmlspecialchars($arIBlock["NAME"]) ?></h2>

          <?php if (!empty($arIBlock["SECTIONS"])): ?>
            <ul class="card-list">
              <?php foreach ($arIBlock["SECTIONS"] as $arSection): ?>
                <?php
                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arIBlock['ID'], 'SECTION_EDIT'));
                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arIBlock['ID'], 'SECTION_DELETE'));
                ?>
                <li class="card-item" id="<?= $this->GetEditAreaId($arSection['ID']) ?>">
                  <a href="<?= htmlspecialchars($arSection["SECTION_PAGE_URL"]) ?>">
                    <?= htmlspecialchars($arSection["NAME"]) ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php elseif (!empty($arIBlock["ELEMENTS"])): ?>
            <ul class="card-list">
              <?php foreach ($arIBlock["ELEMENTS"] as $arElement): ?>
                <?php
                $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arIBlock['ID'], 'ELEMENT_EDIT'));
                $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arIBlock['ID'], 'ELEMENT_DELETE'));
                ?>
                <li class="card-item" id="<?= $this->GetEditAreaId($arElement['ID']) ?>">
                  <a href="<?= htmlspecialchars($arElement["DETAIL_PAGE_URL"]) ?>">
                    <?= htmlspecialchars($arElement["NAME"]) ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>
      </li>
    <?php
      $delay += 100;
    endforeach;
    ?>
  </ul>
<?php else: ?>
  <p>Инфоблоки не найдены</p>
<?php endif; ?>
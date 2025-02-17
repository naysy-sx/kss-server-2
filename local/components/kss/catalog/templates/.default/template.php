<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php $this->setFrameMode(true); ?>
<?php /** @var array $arParams */ ?>
<?php /** @var array $arResult */ ?>



<?php if (!empty($arResult)): ?>
  <ul class="intro-cards bordered">
    <?php foreach ($arResult as $iblockId => $arIBlockData): ?>

      <li class="cards-item" id="<?= $editAreaId ?>">
        <div class="card">
          <h2 class="card-header">
            <?= htmlspecialchars($arIBlockData['IBLOCK']['NAME']) ?>
          </h2>

          <?php if (!empty($arIBlockData['SECTIONS'])): ?>
            <ul class="card-list">
              <?php foreach ($arIBlockData['SECTIONS'] as $arSection): ?>

                <?php

                $editAreaId = $this->GetEditAreaId($arSection['ID']);

                $arButtons = CIBlock::GetPanelButtons(
                  $iblockId,
                  0,
                  $arSection['ID'],
                  ["SECTION_BUTTONS" => true, "SESSID" => true]
                );
                $editLink   = $arButtons["edit"]["edit_section"]["ACTION_URL"];
                $deleteLink = $arButtons["edit"]["delete_section"]["ACTION_URL"];

                $this->AddEditAction($arSection['ID'], $editLink, CIBlock::GetArrayByID($iblockId, 'SECTION_EDIT'));
                $this->AddDeleteAction($arSection['ID'], $deleteLink, CIBlock::GetArrayByID($iblockId, 'SECTION_DELETE'));


                ?>

                <li class="card-item" id="<?= $editAreaId ?>">
                  <a href="<?= htmlspecialchars($arSection["SECTION_PAGE_URL"]) ?>">
                    <?= htmlspecialchars($arSection["NAME"]) ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php else: ?>
            <?php
            // Получаем элементы напрямую из инфоблока, если разделов нет
            $rsElements = CIBlockElement::GetList(
              array('SORT' => 'ASC'),
              array('IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'),
              false,
              false,
              array('ID', 'NAME', 'CODE', 'DETAIL_PAGE_URL')
            );
            $elements = [];
            while ($element = $rsElements->GetNext()) {
              $element["DETAIL_PAGE_URL"] = str_replace("#ELEMENT_ID#", $element["ID"], $GLOBALS['detailUrlTemplate']);
              $elements[] = $element;
            }

            if (!empty($elements)): ?>
              <ul class="card-list">
                <?php foreach ($elements as $element): ?>
                  <li class="card-item">
                    <a href="<?= htmlspecialchars($element["DETAIL_PAGE_URL"]) ?>">
                      <?= htmlspecialchars($element["NAME"]) ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
<?php else: ?>
  <p>Инфоблоки не найдены.</p>
<?php endif; ?>
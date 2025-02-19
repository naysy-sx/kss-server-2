<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $this->setFrameMode(true); ?>


<div class="container -large">
    <div class="works bordered">
        <div class="works-picture">
            <?php if (!empty($arParams["SECTION_IMAGE"])): ?>
                <?php
                $imagePath = is_array($arParams["SECTION_IMAGE"])
                    ? $arParams["SECTION_IMAGE"]["tmp_name"]
                    : $arParams["SECTION_IMAGE"];
                ?>
                <img src="<?= $imagePath ?>" alt="Работы">
            <?php endif; ?>
        </div>
        <div class="works-header">
            <?php if ($arParams["TITLE"]): ?>
                <h2 class="section-title"><?= htmlspecialchars($arParams["TITLE"]); ?></h2>
            <?php endif; ?>
        </div>
        <ul class="works-list bordered">
            <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                <?php
                $this->AddEditAction(
                    $arItem['ID'],
                    $arItem['EDIT_LINK'],
                    $arItem['EDIT_LINK_TEXT']
                );
                $this->AddDeleteAction(
                    $arItem['ID'],
                    $arItem['DELETE_LINK'],
                    $arItem['DELETE_LINK_TEXT'],
                    array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))
                );
                ?>
                <li class="card" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <a href="<?= htmlspecialchars($arItem["DETAIL_PAGE_URL"]); ?>" class="card-link">
                        <?= htmlspecialchars($arItem["NAME"]) ?>
                    </a>
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
<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $this->setFrameMode(true); ?>

<div class="container -large">
    <div class="advantages bordered">
        <?php if ($arParams["TITLE"]): ?>
            <h2
                class="section-title"
                data-aos="fade"
                data-aos-easing="ease"
                data-aos-delay="100">
                <?= htmlspecialchars($arParams["TITLE"]); ?>
            </h2>
        <?php endif; ?>

        <ul class="advantages-list">
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

                <li id="<?= $this->GetEditAreaId($arItem['ID']); ?>"
                    class="advantages-item"
                    data-aos="fade"
                    data-aos-easing="ease"
                    data-aos-delay="200">
                    <div class="advantage">
                        <div class="advantage-image">
                            <img src="<?= htmlspecialchars($arItem["PICTURE"]); ?>" alt="<?= htmlspecialchars($arItem["NAME"]); ?>" />

                        </div>
                        <h3 class="advantage-text">
                            <?= htmlspecialchars($arItem["NAME"]); ?>
                        </h3>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="block b1"></div>
        <div class="block b2"></div>
        <div class="block b3"></div>
        <div class="block b4"></div>
    </div>
</div>
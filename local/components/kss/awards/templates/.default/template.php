<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $this->setFrameMode(true); ?>



<div class="container -large">


    <div class="awards bordered">
        <div class="awards-header">
            <h2 class="section-title" data-aos="fade-in">
                <?= htmlspecialchars($arParams["TITLE"]); ?>
            </h2>
        </div>
        <div class="swiper awards-slider" data-aos="fade-in">
            <div class="swiper-wrapper">
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
                    <div class="swiper-slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <a
                            data-fancybox
                            data-src="<?= htmlspecialchars($arItem['ELEMENT_IMAGE_URL']) ?>"
                            class="awards-link">
                            <img src="<?= htmlspecialchars($arItem['ELEMENT_IMAGE_URL']) ?>" alt="<?= htmlspecialchars($arItem["NAME"]) ?>" />
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="awards-pagination swiper-pagination pagination"></div>
        <div class="block b1"></div>
        <div class="block b2"></div>
        <div class="block b3"></div>
        <div class="block b4"></div>
        <div class="block b5"></div>
        <div class="block b6"></div>
    </div>
</div>
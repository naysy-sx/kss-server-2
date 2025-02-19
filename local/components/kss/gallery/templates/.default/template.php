<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $this->setFrameMode(true); ?>

<div class="container -large">
    <div class="gallery bordered">
        <div class="gallery-header">
            <h2 class="section-title">
                <?= htmlspecialchars($arParams["TITLE"]); ?>
            </h2>
        </div>
        <div class="gallery-block">
            <ul class="gallery-list">
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
                    <li class="photo" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <a data-fancybox data-src="<?= htmlspecialchars($arItem['ELEMENT_IMAGE_URL']) ?>"">
                            <img
                                src=" <?= htmlspecialchars($arItem['ELEMENT_IMAGE_URL']) ?>"
                            alt=" <?= htmlspecialchars($arItem['NAME']) ?>""
                                data-aos=" zoom-in"
                            data-aos-easing="ease"
                            data-aos-delay="100" />
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="block b1"></div>
        <div class="block b2"></div>
        <div class="block b3"></div>
        <div class="block b4"></div>
    </div>
</div>
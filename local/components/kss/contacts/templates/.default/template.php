<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $this->setFrameMode(true); ?>


<div class="container -large">
    <div class="contacts bordered">
        <div class="contacts-header">
            <?php if ($arParams["TITLE"] || $arParams["SUBTITLE"]): ?>
                <h2 class="section-title"><?= htmlspecialchars($arParams["TITLE"]); ?></h2>
            <?php endif; ?>
        </div>
        <div class="contacts-map" id="map" style="height: 675px"></div>
        <script>
            ymaps.ready(function() {
                var myMap = new ymaps.Map("map", {
                    center: [<?= htmlspecialchars($arParams["MAP"]); ?>],
                    zoom: 17,
                    controls: ["zoomControl"],
                });

                myMap.behaviors.disable("scrollZoom");

                function checkWindowSize() {
                    if (window.innerWidth < 1200) {
                        myMap.behaviors.disable("drag");
                        // Также отключаем мультитач
                        myMap.behaviors.disable("multiTouch");
                    } else {
                        myMap.behaviors.enable("drag");
                        myMap.behaviors.enable("multiTouch");
                    }
                }

                checkWindowSize();

                window.addEventListener("resize", checkWindowSize);
                var myPlacemark = new ymaps.Placemark(
                    [<?= htmlspecialchars($arParams["MAP"]); ?>], {
                        balloonContent: "КубаньСтрой",
                    },
                );

                myMap.geoObjects.add(myPlacemark);
            });
        </script>
        <ul class="contacts-links bordered">
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

                <li class="contact" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <b class="contact-icon <?= $arItem['PROPERTY_CLASS_VALUE']; ?>"></b>
                    <?= htmlspecialcharsback($arItem['PROPERTY_TEXT_VALUE']['TEXT']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="contacts-button">
            <a href="<?= htmlspecialchars($arParams["BUTTON_LINK"]); ?>" class="button"><?= htmlspecialchars($arParams["BUTTON_TEXT"]); ?></a>
        </div>
        <div class="contacts-text">
            <?= htmlspecialcharsback($arParams['LONG_TEXT']); ?>
        </div>
        <div class="block b1"></div>
        <div class="block b2"></div>
        <div class="block b3"></div>
        <div class="block b4"></div>
        <div class="block b5"></div>
        <div class="block b6"></div>
    </div>
</div>
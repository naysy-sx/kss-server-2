<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

// Добавляем кнопки "Редактировать" и "Удалить"
$this->setFrameMode(true);
?>

<h1>TUK</h1>
<?php
echo '<pre>';
print_r($arResult);
echo '</pre>';
?>
<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult['SECTIONS'] as $section) {
  echo "<div>" . $section['NAME'] . "</div>";
}
?>
<ul class="intro-cards bordered">
  <? if ($arResult["ITEMS"]): ?>
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
      <li
        class="cards-item"
        data-aos="fade"
        data-aos-easing="ease"
        data-aos-delay="300">
        <div class="card">
          <h2 class="card-header">
            Собственные производственные <br />площади
          </h2>
          <ul class="card-list">
            <li class="card-item"><a href="">Проектирование</a></li>
            <li class="card-item"><a href="">Производство</a></li>
            <li class="card-item"><a href="">Доставка</a></li>
            <li class="card-item"><a href="">Шеф-монтаж</a></li>
          </ul>
        </div>
      </li>
    <? endforeach; ?>
  <? endif; ?>
</ul>
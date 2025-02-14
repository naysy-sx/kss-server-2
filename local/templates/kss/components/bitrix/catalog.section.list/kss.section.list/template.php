<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);
CModule::IncludeModule('iblock');

// Получаем свойства инфоблока
$propertyIterator = CIBlockProperty::GetList([], ['IBLOCK_ID' => $arParams['IBLOCK_ID']]);
while ($property = $propertyIterator->Fetch()) {
  if ($property['CODE'] == 'UF_SECTION_TITLE') {
    $sectionTitle = $property['DEFAULT_VALUE'];
  }
  if ($property['CODE'] == 'UF_BUTTON_TEXT') {
    $buttonText = $property['DEFAULT_VALUE'];
  }
  if ($property['CODE'] == 'UF_SECTION_IMAGE') {
    $sectionImage = CFile::GetPath($property['DEFAULT_VALUE']);
  }
}

// Если значения по умолчанию не заданы, используем fallback
$sectionTitle = $sectionTitle ?: 'Производим оборудование из стеклопластика<br>для наружных инженерных систем';
$buttonText = $buttonText ?: 'Посмотреть все';
$sectionImage = $sectionImage ?: '/static/images/products.png';

// Подготовка массива разделов
$sections = [];
foreach ($arResult['SECTIONS'] as $section) {
  if ($section['DEPTH_LEVEL'] == 1) {
    $sections[$section['ID']] = $section;
    $sections[$section['ID']]['SUBSECTIONS'] = [];
  } elseif ($section['DEPTH_LEVEL'] == 2) {
    $parentID = $section['IBLOCK_SECTION_ID'];
    if (isset($sections[$parentID])) {
      $sections[$parentID]['SUBSECTIONS'][] = $section;
    }
  }
}
$arResult['SECTIONS'] = array_values($sections);

// Получаем ID текущего раздела или инфоблока
$currentSectionId = $arResult['SECTION']['ID'] ?: $arParams['IBLOCK_ID'];
?>

<section class="production-wrapper dark">
  <div class="container -large">
    <div class="production bordered">
      <h2 class="section-title">
        <span data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
          <span><?= $sectionTitle ?></span>
        </span>
      </h2>

      <? $cardClassIndex = 1; ?>
      <? foreach ($arResult['SECTIONS'] as $arSection): ?>
        <div class="card c<?= $cardClassIndex; ?>" id="<?= $this->GetEditAreaId($arSection['ID']); ?>">
          <div class="card-body" data-aos="fade-right">
            <div class="card-header">
              <a href="<?= $arSection['SECTION_PAGE_URL']; ?>">
                <?= $arSection['NAME']; ?>
              </a>
            </div>
            <? if (!empty($arSection['SUBSECTIONS'])): ?>
              <ul class="card-list">
                <? foreach ($arSection['SUBSECTIONS'] as $subSection): ?>
                  <li class="card-item">
                    <a href="<?= $subSection['SECTION_PAGE_URL']; ?>" class="card-link">
                      <?= $subSection['NAME']; ?>
                    </a>
                  </li>
                <? endforeach; ?>
              </ul>
            <? endif; ?>
          </div>
        </div>
        <? $cardClassIndex++; ?>
      <? endforeach; ?>

      <div class="production-image">
        <figure>
          <img src="<?= $sectionImage ?>" alt="Изображение оборудования">
        </figure>
        <a href="#" class="button"><?= $buttonText ?></a>
      </div>

      <div class="block b1"></div>
      <div class="block b2"></div>
      <div class="block b3"></div>
      <div class="block b4"></div>
      <div class="block b5"></div>
      <div class="block b6"></div>
    </div>
  </div>
</section>
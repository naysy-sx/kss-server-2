<?
$IBLOCK_ID = '18';

$test = CIBlockElement::GetList(
  array(),
  array('IBLOCK_ID' => $IBLOCK_ID, 'ACTIVE' => 'Y'),
  false,
  array('nTopCount' => 1),
  array('PROPERTY_PHONE', 'PROPERTY_EMAIL', 'PROPERTY_ADDRESS', 'PROPERTY_SCHEDULE', 'PROPERTY_MAP_LAT', 'PROPERTY_MAP_LNG')
)->Fetch();


$contacts = CIBlockElement::GetList(
  array(),
  array('IBLOCK_ID' => $IBLOCK_ID, 'ACTIVE' => 'Y'),
  false,
  array('nTopCount' => 1),
  array('PROPERTY_PHONE', 'PROPERTY_EMAIL', 'PROPERTY_ADDRESS', 'PROPERTY_SCHEDULE', 'PROPERTY_MAP_LAT', 'PROPERTY_MAP_LNG')
)->Fetch();

echo '<pre style="color: red;">';
print_r($contacts);
echo '</pre>';


?>


<ul class="contacts-links bordered">
  <li class="contact">
    <b class="contact-icon is-phone"></b>
    <a href="tel:<?= $contacts['PROPERTY_PHONE_VALUE'] ?>"><?= $contacts['PROPERTY_PHONE_VALUE'] ?></a>
  </li>
  <li class="contact">
    <b class="contact-icon is-mail"></b>
    <a href="mailto:<?= $contacts['PROPERTY_EMAIL_VALUE'] ?>"><?= $contacts['PROPERTY_EMAIL_VALUE'] ?></a>
  </li>
  <li class="contact">
    <b class="contact-icon is-address"></b>
    <span><?= $contacts['PROPERTY_ADDRESS_VALUE'] ?></span>
  </li>
  <li class="contact">
    <b class="contact-icon is-shedule"></b>
    <ul>
      <li><?= $contacts['PROPERTY_ADDRESS_VALUE'] ?></li>
      <li>Cб-Вс: Выходной</li>
    </ul>
  </li>
</ul>
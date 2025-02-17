<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("test");
?><!-- 1. INTRO -->
<section class="intro-wrapper dark" id="company">
	<div class="container -large">
		<div class="intro bordered">
			<? $APPLICATION->IncludeComponent(
				"kss:intro",
				".default",
				array(
					"COMPONENT_TEMPLATE" => ".default",
					"IBLOCK_ID" => "1",
					"TITLE" => "Заголовок",
					"BUTTON_TEXT" => "Текст кнопки"
				),
				false
			); ?>

			<? $APPLICATION->IncludeComponent(
				"kss:catalog",
				".default",
				array(
					"IBLOCK_TYPE" => "catalog",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "3600"
				),
				false
			); ?>

		</div>
	</div>
</section>
<!-- INTRO END -->
<div class="page">
	<!-- MAIN -->


	<main class="main">

		<h1>MAIN</h1>

		<? $APPLICATION->IncludeComponent(
			"kss:subcatalog",
			".default",
			array(
				"IBLOCK_ID" => "6",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "3600"
			),
			false
		); ?>



		<!-- /////////// SECTIONS /////////// -->
	</main>
	<!-- MAIN END -->
</div>
<br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
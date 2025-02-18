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
		<!-- /////////// SECTIONS /////////// -->

		<!-- 2. PRODUCTION -->
		<section class="production-wrapper dark">
			<div class="container -large">
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
			</div>
		</section>
		<!-- PRODUCTION END -->
		<!-- 3. VIDEO -->
		<section class="videos-wrapper" id="videos">
			<? $APPLICATION->IncludeComponent(
				"kss:video",
				".default",
				array(
					"IBLOCK_ID" => "8",
					"SLIDES_TO_SHOW" => "2",
					"AUTOPLAY" => "N",
					"AUTOPLAY_SPEED" => "3000",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"COMPONENT_TEMPLATE" => ".default"
				),
				false
			); ?>
</div>
</section>
<!-- VIDEO END -->
<!-- 4. PRODUCTS -->
<section class="products-wrapper dark" id="products">
	<div class="container -large">
		<div class="products bordered">

			<? $APPLICATION->IncludeComponent(
				"kss:sublist",
				".default",
				array(
					"IBLOCK_ID" => "7",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "3600"
				),
				false
			); ?>
			<? $APPLICATION->IncludeComponent(
				"kss:brands",
				".default",
				array(
					"IBLOCK_ID" => "9",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "3600"
				),
				false
			); ?>



		</div>
	</div>
</section>
<!-- PRODUCTS END -->

<!-- /////////// SECTIONS /////////// -->
</main>
<!-- MAIN END -->
</div>
<br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
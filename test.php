<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("test");
?>
<div class="page">
	<!-- MAIN -->


	<main class="main">
		<!-- /////////// SECTIONS /////////// -->

		<!-- 2. PRODUCTION -->
		<section class="production-wrapper dark" id="production">
			<div class="container -large">
				<? $APPLICATION->IncludeComponent(
					"kss:subcatalog",
					".default",
					array(
						"IBLOCK_ID" => "6",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "36000000",
						"TITLE" => "",
						"BUTTON_TEXT" => "",
						"PICTURE" => "",
						"ELEMENT_EDIT" => "Y",
						"ELEMENT_DELETE" => "Y"
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

		</section>
		<!-- VIDEO END -->
		<!-- 4. PRODUCTS -->
		<section class="products-wrapper dark" id="production">
			<div class="container -large">
				<div class="products bordered">

					<? $APPLICATION->IncludeComponent(
						"kss:sublist",
						".default",
						array(
							"IBLOCK_ID" => "7",
							"CACHE_TYPE" => "A",
							"CACHE_TIME" => "36000000"
						),
						false
					); ?>
					<? $APPLICATION->IncludeComponent(
						"kss:brands",
						".default",
						array(
							"IBLOCK_ID" => "9",
							"CACHE_TYPE" => "A",
							"CACHE_TIME" => "36000000"
						),
						false
					); ?>
				</div>
			</div>
		</section>
		<!-- PRODUCTS END -->

		<!-- 5. ADVANTAGES -->
		<section class="advantages-wrapper">
			<?php
			$APPLICATION->IncludeComponent(
				"kss:advantages",
				".default",
				array(
					"IBLOCK_ID" => "10",
					"TITLE" => "Работать с нами - надёжно",
					"SUBTITLE" => "{ПОДЗАГОЛОВОК}",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"ELEMENT_EDIT" => "Y",
					"ELEMENT_DELETE" => "Y",
				)
			);
			?>
		</section>
		<!-- ADVANTAGES END -->
		<!-- 6. WORKS -->
		<section
			class="works-wrapper dark"
			data-aos="fade-up"
			data-aos-easing="ease"
			data-aos-delay="100">
			<?php
			$APPLICATION->IncludeComponent(
				"kss:works",
				"",
				array(
					"IBLOCK_ID" => "11",
					"TITLE" => "Берём на себя весь комплекс работ",
					"SECTION_IMAGE" => array(
						"name" => "image.jpg",
						"type" => "image/jpeg",
						"tmp_name" => "/tmp/image.jpg",
						"error" => 0,
						"size" => 12345,
						"MODULE_ID" => "main"
					),

					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"ELEMENT_EDIT" => "Y",
					"ELEMENT_DELETE" => "Y",
				)
			);
			?>
		</section>
		<!-- WORKS END -->

		<!-- 7. BANNER -->
		<section
			class="banner-wrapper"
			data-aos="zoom-out"
			data-aos-easing="ease"
			data-aos-delay="100">
			<?php
			$APPLICATION->IncludeComponent(
				"kss:banner",
				".default",
				array(
					"IBLOCK_ID" => "16",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"PROPERTY_CODE" => array("TITLE", "DESCRIPTION", "BUTTON_TEXT", "LINK"),
					"ELEMENT_EDIT" => "Y",
					"ELEMENT_DELETE" => "Y",
				)
			);
			?>
		</section>
		<!-- BANNER END -->


		<!-- 8. PROJECTS -->
		<section class="projects-wrapper dark" id="projects">
			<?php
			$APPLICATION->IncludeComponent(
				"kss:project",
				".default",
				array(
					"IBLOCK_ID" => "12",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"PROPERTY_CODE" => array("PICTURE", "CITY", "TITLE", "DESCRIPTION", "BUTTON_TEXT"),
					"ELEMENT_EDIT" => "Y",
					"ELEMENT_DELETE" => "Y",
					"SUBTITLE" => "Нас выбирают",
					"DESCRIPTION" => "600+ объектов оснащены нашим оборудованием",
					"CITIES" => "Краснодар, Ростов-на-Дону, Симферополь, Владикавказ, Мариуполь, ЮФО, СКФО, Крым и вся Россия",
				)
			);

			?>
		</section>
		<!-- PROJECTS END -->

		<!-- 9. AWARDS -->
		<section class="awards-wrapper" id="docs">
			<?php
			$APPLICATION->IncludeComponent(
				"kss:awards",
				".default",
				array(
					"IBLOCK_ID" => "13",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"ELEMENT_EDIT" => "Y",
					"ELEMENT_DELETE" => "Y",
					"TITLE" => "Награды и достижения"
				)
			);

			?>
		</section>
		<!-- AWARDS END -->


		<!-- 10. GALLERY -->
		<section class="gallery-wrapper dark">
			<?php
			$APPLICATION->IncludeComponent(
				"kss:gallery",
				".default",
				array(
					"IBLOCK_ID" => "14",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"ELEMENT_EDIT" => "Y",
					"ELEMENT_DELETE" => "Y",
					"TITLE" => "Производство и продукция в фотографиях"
				)
			);

			?>
		</section>
		<!-- GALLERY END -->
		<!-- 11. NEWS -->
		<section class="news-wrapper">
			<?php
			$APPLICATION->IncludeComponent(
				"kss:news",
				".default",
				array(
					"IBLOCK_ID" => "15",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"ELEMENT_EDIT" => "Y",
					"ELEMENT_DELETE" => "Y",
					"TITLE" => "Новости",
				)
			);

			?>
		</section>
		<!-- NEWS END -->
		<!-- 12. CONTACTS -->
		<section class="contacts-wrapper dark" id="contacts">
			<?php
			$APPLICATION->IncludeComponent(
				"kss:contacts",
				".default",
				array(
					"IBLOCK_ID" => "17",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"ELEMENT_EDIT" => "Y",
					"ELEMENT_DELETE" => "Y",
					"TITLE" => "Контакты",
					"MAP" => "45.024125, 39.054994",
					"BUTTON_TEXT" => "Построить маршрут",
					"BUTTON_LINK" => "https://yandex.ru/maps/-/CHuiy-jc",
					"CLASS" => "",
					"TEXT" => "",
				)
			);
			?>

		</section>
		<!-- CONTACTS END -->
		<!-- /////////// SECTIONS /////////// -->
	</main>
	<!-- MAIN END -->
</div>
<br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
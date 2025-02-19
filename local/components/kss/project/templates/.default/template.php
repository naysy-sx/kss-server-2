<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $this->setFrameMode(true); ?>

<div class="container -large">
	<div class="projects bordered">
		<div class="projects-header">
			<h2 class="section-title" data-aos="fade-up">
				<?= htmlspecialchars($arParams["TITLE"]); ?>
			</h2>
		</div>
		<div class="projects-slider-wrapper" data-aos="fade-up">
			<div class="swiper projects-slider">
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
							<div class="project-card">
								<span class="project-address"><b></b><?= $arItem['PROPERTY_CITY_VALUE']; ?></span>
								<figure class="project-image">
									<img src="<?= $arItem['ELEMENT_IMAGE_URL']; ?>" alt="<?= $arItem['PROPERTY_TITLE_VALUE']; ?>" />
									<figcaption>
										<h3><?= $arItem['PROPERTY_TITLE_VALUE']; ?></h3>
										<p>
											<?= $arItem['PROPERTY_DESCRIPTION_VALUE']; ?>
										</p>
									</figcaption>
								</figure>
								<div class="project-button">
									<a href="" class="button"><?= $arItem['PROPERTY_BUTTON_TEXT_VALUE']; ?></a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

		<div class="projects-pagination pagination"></div>

		<div class="projects-content">
			<h2><?= htmlspecialchars($arParams["SUBTITLE"]); ?></h2>
			<p>
				<?= htmlspecialchars($arParams["DESCRIPTION"]); ?>
			</p>
		</div>
		<div class="projects-cities">
			<?= htmlspecialchars($arParams["CITIES"]); ?>
		</div>
		<div class="block b1"></div>
		<div class="block b2"></div>
		<div class="block b3"></div>
		<div class="block b4"></div>
	</div>
</div>
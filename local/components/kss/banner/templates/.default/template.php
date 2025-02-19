<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $this->setFrameMode(true); ?>


<div class="container">
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
		<div class="banner" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
			<div class="banner-content">
				<h2 class="section-title"><?= $arItem['PROPERTY_TITLE_VALUE']; ?></h2>
				<p class="banner-text">
					<?= $arItem['PROPERTY_DESCRIPTION_VALUE']; ?>
				</p>
			</div>
			<div class="banner-button">
				<a
					data-src="<?= $arItem['PROPERTY_LINK_VALUE']; ?>"
					data-fancybox
					data-width="800"
					class="button">
					<?= $arItem['PROPERTY_BUTTON_TEXT_VALUE']; ?>
				</a>
			</div>
		</div>
	<?php endforeach; ?>
</div>
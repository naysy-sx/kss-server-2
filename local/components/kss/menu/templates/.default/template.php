<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $this->setFrameMode(true); ?>



<nav class="nav">
	<ul class="nav-list">
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
			<li class="nav-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
				<a href="<?= htmlspecialchars($arItem["PROPERTY_LINK_VALUE"]) ?>" class="nav-link">
					<span class="nav-link-text"><?= htmlspecialchars($arItem["NAME"]) ?></span>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>
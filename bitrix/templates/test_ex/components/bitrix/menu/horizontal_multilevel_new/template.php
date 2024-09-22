<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<ul>
	<?php
	$previousLevel = 0;
	?>
	<? foreach ($arResult as $arItem): ?>

		<? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel) {
			echo str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));
		} ?>

		<? if ($arItem["IS_PARENT"] && $arItem['DEPTH_LEVEL'] != '2'): ?>
			<li>
				<a href="<?= $arItem["LINK"] ?>"><span><?= $arItem["TEXT"] ?></span></a>
				<ul>
		<?php elseif ($arItem["IS_PARENT"] && $arItem['DEPTH_LEVEL'] == '2'): ?>
			<li>
				<a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
				<ul>
		<?php elseif ($arItem["DEPTH_LEVEL"] == 1): ?>
			<li><a href="<?= $arItem["LINK"] ?>"><span><?= $arItem["TEXT"] ?></span></a></li>
		<?php else: ?>
			<li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
		<?php endif; ?>

			<? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

	<? endforeach; ?>

	<? if ($previousLevel > 1) {
		echo str_repeat("</ul></li>", ($previousLevel - 1));
	}?>
	<div class="clearboth"></div>
		</ul>
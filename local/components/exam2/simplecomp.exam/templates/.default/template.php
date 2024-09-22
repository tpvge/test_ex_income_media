<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="news-catalog">
    <h3>Элементов - <?=$arResult['TOTAL_COUNT']?></h3>
    <?php if (!empty($arResult['NEWS'])): ?>
        <?php foreach ($arResult['NEWS'] as $newsItem): ?>
            <div class="news-item">
                <h3><?= $newsItem['NAME'] ?> (<?= $newsItem['ACTIVE_FROM'] ?>)</h3>
                <ul>
                    <?php foreach ($newsItem['SECTIONS'] as $section): ?>
                        <li>
                            <b><?= $section['NAME'] ?></b>
                            <ul>
                                <?php foreach ($section['ELEMENTS'] as $element): ?>
                                    <li>
                                        <?= $element['NAME'] ?> (<?= $element['PROPERTY_ARTNUMBER_VALUE'] ?>) - <?= $element['PROPERTY_PRICE_VALUE'] ?> руб.
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Нет товаров, привязанных к новостям.</p>
    <?php endif; ?>
</div>

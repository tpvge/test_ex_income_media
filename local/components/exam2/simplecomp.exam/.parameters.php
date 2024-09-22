<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = [
    'PARAMETERS' => [
        'PRODUCTS_IBLOCK_ID' => [
            'PARENT' => 'BASE',
            'NAME' => 'ID инфоблока с каталогом товаров',
            'TYPE' => 'STRING',
            'DEFAULT' => '',
        ],
        'NEWS_IBLOCK_ID' => [
            'PARENT' => 'BASE',
            'NAME' => 'ID инфоблока с новостями',
            'TYPE' => 'STRING',
            'DEFAULT' => '',
        ],
        'NEWS_LINK_CODE' => [
            'PARENT' => 'BASE',
            'NAME' => 'Код пользовательского свойства разделов каталога для привязки к новостям',
            'TYPE' => 'STRING',
            'DEFAULT' => 'UF_NEWS_LINK',
        ],
        'CACHE_TIME' => ['DEFAULT' => 36000000],
    ],
];
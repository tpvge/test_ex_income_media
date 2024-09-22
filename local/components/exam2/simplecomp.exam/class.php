<?php

use Bitrix\Main\Loader;

class SimpleComponent extends CBitrixComponent
{
    protected function getSectionsByNews($newsId)
    {
      
        $arFilter = [
            'IBLOCK_ID' => $this->arParams['PRODUCTS_IBLOCK_ID'],
            'ACTIVE' => 'Y',
            'UF_NEWS_LINK' => $newsId, 
        ];

        $rsSections = CIBlockSection::GetList([], $arFilter, false, ['ID', 'NAME', 'UF_NEWS_LINK']);
        $sections = [];

        while ($section = $rsSections->Fetch()) {
            
            $sections[$section['ID']] = $section;
        }
        
        return $sections;
    }

    protected function getElementsBySection($sectionId)
    {
       
        $arFilter = [
            'IBLOCK_ID' => $this->arParams['PRODUCTS_IBLOCK_ID'],
            'ACTIVE' => 'Y',
            'SECTION_ID' => $sectionId,
        ];
        $rsElements = CIBlockElement::GetList([], $arFilter, false, false, ['ID', 'NAME', 'PROPERTY_MATERIAL', 'PROPERTY_ARTNUMBER', 'PROPERTY_PRICE']);
        $elements = [];
       
        while ($element = $rsElements->Fetch()) {
            $elements[] = $element;
           
        }

        return $elements;
    }

    protected function getNews()
    {
        
        $arFilter = [
            'IBLOCK_ID' => $this->arParams['NEWS_IBLOCK_ID'],
            'ACTIVE' => 'Y',
        ];

        $rsNews = CIBlockElement::GetList([], $arFilter, false, false, ['ID', 'NAME', 'ACTIVE_FROM']);
        $news = [];

        while ($newsItem = $rsNews->Fetch()) {
            $news[$newsItem['ID']] = $newsItem;
        }

        return $news;
    }

    public function executeComponent()
    {
        if (!Loader::includeModule('iblock')) {
            ShowError('Модуль инфоблоков не установлен');
            return;
        }

       
        $newsList = $this->getNews();

        $totalCount = 0;
        $newsWithProducts = [];

        
        foreach ($newsList as $newsId => $newsItem) {
            $sections = $this->getSectionsByNews($newsId);
         
            $newsItem['SECTIONS'] = [];

            foreach ($sections as $sectionId => $section) {
                
                $elements = $this->getElementsBySection($sectionId);
                
                if (!empty($elements)) {
                    $section['ELEMENTS'] = $elements;
                    $totalCount += count($elements); 
                    $newsItem['SECTIONS'][] = $section; 
                }
            }

            if (!empty($newsItem['SECTIONS'])) {
                $newsWithProducts[$newsId] = $newsItem;
            }
        }

        
        global $APPLICATION;
        $APPLICATION->SetTitle("В каталоге товаров представлено товаров: $totalCount");

        
        $this->arResult = [
            'NEWS' => $newsWithProducts,
            'TOTAL_COUNT' => $totalCount,
        ];

        $this->includeComponentTemplate();
    }
}

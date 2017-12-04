<?php
//print_r($arParams);

if ($arParams['IBLOCK_ID_CANONICAL'] && CModule::IncludeModule('iblock')) {
    $arFilter = array(
        "IBLOCK_ID" => $arParams['IBLOCK_ID_CANONICAL'],
        "PROPERTY_NEWS.ID" => $arParams['ELEMENT_ID']
    );

    $canonical = CIBlockElement::GetList(array(), $arFilter);

    $canonical = $canonical->GetNext();

    $arResult['DISPLAY_CANONICAL'] = $canonical['NAME'];
    $this->__component->SetResultCacheKeys(array('DISPLAY_CANONICAL'));
}
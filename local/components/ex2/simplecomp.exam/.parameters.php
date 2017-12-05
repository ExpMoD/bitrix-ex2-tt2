<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


$arComponentParameters = array(
    "GROUPS" => array(
    ),
    /*"PARAMETERS" => array(
        "IBLOCK_TYPE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("IBLOCK_TYPE"),
            "TYPE" => "LIST",
            "VALUES" => $arIBlockType,
            "REFRESH" => "Y",
        ),
        "IBLOCKS" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("IBLOCK_IBLOCK"),
            "TYPE" => "LIST",
            "VALUES" => $arIBlock,
            "MULTIPLE"=>"Y",
            "REFRESH" => "Y",
        ),
        "PARENT_SECTION" => array(
            "PARENT" => "ADDITIONAL_SETTINGS",
            "NAME" => GetMessage("IBLOCK_SECTION_ID"),
            "TYPE" => "STRING",
            "DEFAULT" => '',
        ),
        "DETAIL_URL" => CIBlockParameters::GetPathTemplateParam(
            "DETAIL",
            "DETAIL_URL",
            GetMessage("IBLOCK_DETAIL_URL"),
            "",
            "URL_TEMPLATES"
        ),
        "CACHE_TIME"  =>  Array("DEFAULT"=>180),
        "CACHE_GROUPS" => array(
            "PARENT" => "CACHE_SETTINGS",
            "NAME" => GetMessage("CP_BPR_CACHE_GROUPS"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
        ),
    ),*/
    "PARAMETERS" => array(
        "CACHE_TIME"  =>  Array("DEFAULT"=>180),
        "IBLOCK_NEWS" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("IBLOCK_NEWS"),
            "TYPE" => "STRING",
            "DEFAULT" => '',
        ),
        "CODE_AUTHOR_IN_NEWS" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("CODE_AUTHOR_IN_NEWS"),
            "TYPE" => "STRING",
            "DEFAULT" => '',
        ),
        "CODE_TYPE_AUTHOR" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("CODE_TYPE_AUTHOR"),
            "TYPE" => "STRING",
            "DEFAULT" => '',
        ),
    ),
);
?>

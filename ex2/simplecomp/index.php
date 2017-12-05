<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент");
?><?$APPLICATION->IncludeComponent(
	"ex2:simplecomp.exam", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_NEWS" => "1",
		"CODE_AUTHOR_IN_NEWS" => "PROPERTY_AUTHORS",
		"CODE_TYPE_AUTHOR" => "UF_AUTHOR_TYPE",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "180"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
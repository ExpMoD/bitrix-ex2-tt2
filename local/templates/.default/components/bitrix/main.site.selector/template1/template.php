<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php
$sitesValues = "";
?>
<?foreach ($arResult["SITES"] as $key => $arSite):?>
	<?if ($arSite["CURRENT"] == "Y"):?>
        <?
            $sitesValues = '<option value="' . $arSite['DIR'] . '">' . $arSite['LANG'] . '</option>>' . $sitesValues
        ?>
	<?else:?>
        <?
        $sitesValues = $sitesValues . '<option value="' . $arSite['DIR'] . '">' . $arSite['LANG'] . '</option>>'
        ?>
	<?endif?>
<?endforeach;?>
<select name="" id="" onchange="onChange(this.value)">
    <?= $sitesValues?>
</select>
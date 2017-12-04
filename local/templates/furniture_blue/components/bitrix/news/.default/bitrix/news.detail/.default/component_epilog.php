<?php

if (isset($arResult['DISPLAY_CANONICAL'])) {
    global $APPLICATION;

    $APPLICATION->AddHeadString('<link rel="canonical" href="' . $arResult['DISPLAY_CANONICAL'] . '">');
}
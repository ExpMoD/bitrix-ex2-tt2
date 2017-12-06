<?php

if (isset($arResult['COUNT'])) {
    global $APPLICATION;
    $divFromComponent = '<div style="color:red; margin: 34px 15px 35px 15px">#text#</div>';

    $text = 'Количество – ' . $arResult['COUNT'];

    $textFromComponent = str_replace('#text#', $text, $divFromComponent);

    $APPLICATION->SetPageProperty('text-from-component', $textFromComponent);
}

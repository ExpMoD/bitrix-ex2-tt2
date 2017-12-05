<b>Авторы и новости</b><br>
<ul>
    <?foreach ($arResult['AUTHORS'] as $id => $author):?>
        <li>
            [<?=$id?>] - <?=$author['LOGIN']?>
            <ul>
                <?foreach ($author['NEWS'] as $news):?>
                    <li>
                        - <?=$news['NAME']?> - <?=$news['ACTIVE_FROM']?>
                    </li>
                <?endforeach;?>
            </ul>
        </li>
    <?endforeach;?>
</ul>

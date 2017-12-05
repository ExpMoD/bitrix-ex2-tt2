<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */


/*************************************************************************
    Processing of received parameters
*************************************************************************/
if(!isset($arParams["CACHE_TIME"]))
    $arParams["CACHE_TIME"] = 180;


$arParams['IBLOCK_NEWS'] = intval($arParams['IBLOCK_NEWS']);

if(!CModule::IncludeModule("iblock"))
{
    ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
    return;
}

global $USER;

if ($USER->IsAuthorized()) {
    $currentUserId = $USER->GetID();

    $currentUserType = CUser::GetList(
        $by = "ID", $order = "desc", ["ID" => $currentUserId], ["SELECT" => [$arParams['CODE_TYPE_AUTHOR']]]
    )->Fetch()[$arParams['CODE_TYPE_AUTHOR']];

    if ($this->StartResultCache()) {
        $users = CUser::GetList(
            $by="id",
            $order="desc",
            [
                $arParams['CODE_TYPE_AUTHOR'] => $currentUserType,
                '!ID' => $currentUserId
            ]
        );

        $userList = array();
        $userIds = array();

        while ($user = $users->Fetch()) {
            $userList[$user['ID']]["LOGIN"] = $user['LOGIN'];
            $userIds[] = $user['ID'];
        }

        if (! empty($userIds)) {
            $arNews = \CIBlockElement::GetList(
                [],
                [
                    'IBLOCK_ID' => $arParams['IBLOCK_NEWS'],
                    '!'.$arParams['CODE_AUTHOR_IN_NEWS'] => $currentUserId,
                    $arParams['CODE_AUTHOR_IN_NEWS'] => $userIds
                ],
                false,
                false,
                [
                    'NAME', 'ACTIVE_FROM', 'ID', 'IBLOCK_ID', $arParams['CODE_AUTHOR_IN_NEWS']
                ]
            );

            $newsList = array();
            while ($newsItem = $arNews->Fetch()) {
                if (empty($newsList[$newsItem['ID']])) {
                    $newsList[$newsItem['ID']] = $newsItem;
                }
                $newsList[$newsItem['ID']]['AUTHORS'][] =
                    $newsItem[$arParams['CODE_AUTHOR_IN_NEWS'] . '_VALUE'];
            };

            $arResult['COUNT'] = count($newsList);

            foreach ($newsList as $news) {
                foreach ($news['AUTHORS'] as $AUTHOR) {
                    $userList[$AUTHOR]['NEWS'][] = $news;
                }
            }

            $arResult['AUTHORS'] = $userList;

            $APPLICATION->SetTitle('Количество – ' . $arResult['COUNT']);

            $this->IncludeComponentTemplate();
        }
    } else {
        $this->AbortResultCache();
    }
}
?>

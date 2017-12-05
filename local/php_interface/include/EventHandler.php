<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 05.12.17
 * Time: 9:32
 */

AddEventHandler("main", "OnBuildGlobalMenu", array("EventHandler", "SimpleContentMenu"));
class EventHandler
{
    function SimpleContentMenu(&$aGlobalMenu, &$aModuleMenu) {
        global $USER;

        if ($USER->IsAdmin())
            return;

        $userGroups = CUser::GetUserGroupList($USER->GetID());

        $contentEditor = CGroup::GetList($by="c_sort", $order="desc", ["STRING_ID" => "content_editor"])->Fetch()['ID'];

        while ($userGroup = $userGroups->Fetch()) {
            if ($userGroup['GROUP_ID'] == $contentEditor) {
                $isContentEditor = true;
            }
        }

        if ($isContentEditor) {
            $aGlobalMenu = ['global_menu_content' => $aGlobalMenu['global_menu_content']];

            foreach ($aModuleMenu as $keyItem => $valueItem) {
                if ($valueItem['items_id'] == 'menu_iblock_/news') {
                    $aModuleMenu = [$valueItem];
                    foreach ($valueItem['items'] as $mItem) {
                        if ($mItem['items_id'] == 'menu_iblock_/news/1') {
                            $aModuleMenu[0]['items'] = [$mItem];
                            break;
                        }
                    }
                    break;
                }
            }
        }
    }
}
<?php

AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", "CheckDeactivation");

function CheckDeactivation(&$arFields)
{
    $IBLOCK_ID = 2;
    if ($arFields["IBLOCK_ID"] == $IBLOCK_ID) {
        if ($arFields["ACTIVE"] == "N") {
            $arElement = CIBlockElement::GetByID($arFields["ID"])->GetNext();
            if ($arElement) {
                $viewCount = (int)$arElement["SHOW_COUNTER"];
                if ($viewCount > 2) {
                    global $APPLICATION;
                    $APPLICATION->throwException(
                        "Товар невозможно деактивировать, у него " . $viewCount . " просмотров"
                    );

                    return false;
                }
            }
        }
    }
}



AddEventHandler("main", "OnAfterUserAdd", "NotifyUserAddedToContentEditors");
AddEventHandler("main", "OnBeforeUserUpdate", "NotifyUserAddedToContentEditors");

function NotifyUserAddedToContentEditors(&$arFields)
{   
    $contentEditorsGroupId = 8;

    if (isset($arFields['GROUP_ID']) && in_array($contentEditorsGroupId, $arFields['GROUP_ID'])) {
        $arUsers = GetUsersByGroup($contentEditorsGroupId);

        foreach ($arUsers as $user) {
            $email = $user["EMAIL"];
            $userName = $user["NAME"];

            CEvent::Send(
                "USER_ADDED_TO_CONTENT_EDITORS",
                SITE_ID,
                array(
                    "USER_NAME" => $arFields["NAME"],
                    "EMAIL_TO" => $email,
                    "EDITOR_NAME" => $userName,
                )
            );
        }
    }
}

function GetUsersByGroup($groupId)
{
    $arUsers = array();
    $rsUsers = CUser::GetList(($by = "id"), ($order = "asc"), array("GROUPS_ID" => $groupId));

    while ($arUser = $rsUsers->Fetch()) {
        $arUsers[] = $arUser;
    }

    return $arUsers;
}

<?
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("IBlockNotifyHandler", "IBlockNotifyHandlerSendMail"));

class IBlockNotifyHandler
{
    function IBlockNotifyHandlerSendMail(&$arFields)
    {
        if($arFields["IBLOCK_ID"] == 5)
        {
            $arFields = array(
                'AUTHOR' => $arFields['NAME'],
                'AUTHOR_EMAIL' => $arFields['PROPERTY_VALUES'][10],
                'AUTHOR_PHONE' => $arFields['PROPERTY_VALUES'][11],
                'TEXT' => $arFields['PREVIEW_TEXT']
            );
            //error_log(print_r($arFields, true), 3, $_SERVER['DOCUMENT_ROOT'].'/log/sendmail.log');
            CEvent::Send("FEEDBACK_FORM", SITE_ID, $arFields);
        }
    }
}
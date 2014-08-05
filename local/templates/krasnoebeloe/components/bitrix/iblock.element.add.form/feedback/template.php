<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!empty($arResult["ERRORS"])):?>
	<?=ShowError(implode("<br />", $arResult["ERRORS"]))?>
<?endif;
if (strlen($arResult["MESSAGE"]) > 0):?>
<div class="form-text" style="padding: 80px;">
<p>
    Ваше сообщение отправлено. Если Вы не получили ответ на Ваше сообщение, не беспокойтесь, оно будет обязательно прочитано. Все без исключения жалобы и пожелания будут непременно взяты компанией на заметку.
</p>
	<?//=ShowNote($arResult["MESSAGE"])?>
<?else:?>

             <div class="form">

                        <form name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
                            <?=bitrix_sessid_post()?>
                            <?if ($arParams["MAX_FILE_SIZE"] > 0):?><input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" /><?endif?>
                            <table cellspacing="0" cellpadding="0">
                            <?if (is_array($arResult["PROPERTY_LIST"]) && !empty($arResult["PROPERTY_LIST"])):?>
                                <tbody>
                                <?
                                list($arResult["PROPERTY_LIST"][0], $arResult["PROPERTY_LIST"][1]) = array($arResult["PROPERTY_LIST"][1], $arResult["PROPERTY_LIST"][0]);
                                foreach ($arResult["PROPERTY_LIST"] as $propertyID):
                                     ?>

                                        <? if ($propertyID == 10 || $propertyID == 12): ?>
                                        <td><? else:?>
                                        <tr><th <? if ($propertyID == 'PREVIEW_TEXT'): ?>colspan="2"<? endif; ?> scope="row"><? endif;?>
                                            <label><?if (intval($propertyID) > 0):?><?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"]?><?else:?><?=!empty($arParams["CUSTOM_TITLE_".$propertyID]) ? $arParams["CUSTOM_TITLE_".$propertyID] : GetMessage("IBLOCK_FIELD_".$propertyID)?><?endif?></label>


                                    <?
                                    if (intval($propertyID) > 0)
                                    {
                                        if (
                                            $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "T"
                                            &&
                                            $arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"] == "1"
                                        )
                                            $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "S";
                                        elseif (
                                            (
                                                $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "S"
                                                ||
                                                $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "N"
                                            )
                                            &&
                                            $arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"] > "1"
                                        )
                                            $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "T";
                                    }
                                    elseif (($propertyID == "TAGS") && CModule::IncludeModule('search'))
                                        $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "TAGS";

                                    if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE"] == "Y")
                                    {
                                        $inputNum = ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0) ? count($arResult["ELEMENT_PROPERTIES"][$propertyID]) : 0;
                                        $inputNum += $arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE_CNT"];
                                    }
                                    else
                                    {
                                        $inputNum = 1;
                                    }

                                    if($arResult["PROPERTY_LIST_FULL"][$propertyID]["GetPublicEditHTML"])
                                        $INPUT_TYPE = "USER_TYPE";
                                    else
                                        $INPUT_TYPE = $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"];

                                    switch ($INPUT_TYPE):
                                        case "USER_TYPE":
                                            for ($i = 0; $i<$inputNum; $i++)
                                            {
                                                if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
                                                {
                                                    $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["~VALUE"] : $arResult["ELEMENT"][$propertyID];
                                                    $description = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["DESCRIPTION"] : "";
                                                }
                                                elseif ($i == 0)
                                                {
                                                    $value = intval($propertyID) <= 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];
                                                    $description = "";
                                                }
                                                else
                                                {
                                                    $value = "";
                                                    $description = "";
                                                }
                                                echo call_user_func_array($arResult["PROPERTY_LIST_FULL"][$propertyID]["GetPublicEditHTML"],
                                                    array(
                                                        $arResult["PROPERTY_LIST_FULL"][$propertyID],
                                                        array(
                                                            "VALUE" => $value,
                                                            "DESCRIPTION" => $description,
                                                        ),
                                                        array(
                                                            "VALUE" => "PROPERTY[".$propertyID."][".$i."][VALUE]",
                                                            "DESCRIPTION" => "PROPERTY[".$propertyID."][".$i."][DESCRIPTION]",
                                                            "FORM_NAME"=>"iblock_add",
                                                        ),
                                                    ));
                                                ?><br /><?
                                            }
                                            break;
                                        case "TAGS":
                                            $APPLICATION->IncludeComponent(
                                                "bitrix:search.tags.input",
                                                "",
                                                array(
                                                    "VALUE" => $arResult["ELEMENT"][$propertyID],
                                                    "NAME" => "PROPERTY[".$propertyID."][0]",
                                                    "TEXT" => 'size="'.$arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"].'"',
                                                ), null, array("HIDE_ICONS"=>"Y")
                                            );
                                            break;
                                        case "HTML":
                                            $LHE = new CLightHTMLEditor;
                                            $LHE->Show(array(
                                                'id' => preg_replace("/[^a-z0-9]/i", '', "PROPERTY[".$propertyID."][0]"),
                                                'width' => '100%',
                                                'height' => '200px',
                                                'inputName' => "PROPERTY[".$propertyID."][0]",
                                                'content' => $arResult["ELEMENT"][$propertyID],
                                                'bUseFileDialogs' => false,
                                                'bFloatingToolbar' => false,
                                                'bArisingToolbar' => false,
                                                'toolbarConfig' => array(
                                                    'Bold', 'Italic', 'Underline', 'RemoveFormat',
                                                    'CreateLink', 'DeleteLink', 'Image', 'Video',
                                                    'BackColor', 'ForeColor',
                                                    'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyFull',
                                                    'InsertOrderedList', 'InsertUnorderedList', 'Outdent', 'Indent',
                                                    'StyleList', 'HeaderList',
                                                    'FontList', 'FontSizeList',
                                                ),
                                            ));
                                            break;
                                        case "T":
                                            for ($i = 0; $i<$inputNum; $i++)
                                            {

                                                if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
                                                {
                                                    $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
                                                }
                                                elseif ($i == 0)
                                                {
                                                    $value = intval($propertyID) > 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];
                                                }
                                                else
                                                {
                                                    $value = "";
                                                }
                                                ?>

                                                <textarea cols="<?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"]?>" rows="<?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"]?>" name="PROPERTY[<?=$propertyID?>][<?=$i?>]" <?if(in_array($propertyID, $arResult["PROPERTY_REQUIRED"])):?>required="required"<?endif?>><?=$value?></textarea>
                                            <?
                                            }
                                            break;

                                        case "S":
                                        case "N":
                                            for ($i = 0; $i<$inputNum; $i++)
                                            {
                                                if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
                                                {
                                                    $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
                                                }
                                                elseif ($i == 0)
                                                {
                                                    $value = intval($propertyID) <= 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];

                                                }
                                                else
                                                {
                                                    $value = "";
                                                }
                                                ?>
                                                <input type="text" name="PROPERTY[<?=$propertyID?>][<?=$i?>]" size="25" value="<?=$value?>"  <?if(in_array($propertyID, $arResult["PROPERTY_REQUIRED"])):?>required="required"<?endif?>/><?

                                                ?><?
                                            }
                                            break;

                                        case "F":
                                            for ($i = 0; $i<$inputNum; $i++)
                                            {
                                                $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
                                                ?>
                                                <input type="hidden" name="PROPERTY[<?=$propertyID?>][<?=$arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i?>]" value="<?=$value?>" />
                                        <div class="file"> <input type="file" class="input-file" size="<?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"]?>"  name="PROPERTY_FILE_<?=$propertyID?>_<?=$arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i?>" /><br />
                                        </div>
                                                
                                                <?

                                                if (!empty($value) && is_array($arResult["ELEMENT_FILES"][$value]))
                                                {
                                                    ?>
                                                    <input type="checkbox" name="DELETE_FILE[<?=$propertyID?>][<?=$arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i?>]" id="file_delete_<?=$propertyID?>_<?=$i?>" value="Y" /><label for="file_delete_<?=$propertyID?>_<?=$i?>"><?=GetMessage("IBLOCK_FORM_FILE_DELETE")?></label><br />
                                                    <?

                                                    if ($arResult["ELEMENT_FILES"][$value]["IS_IMAGE"])
                                                    {
                                                        ?>
                                                        <img src="<?=$arResult["ELEMENT_FILES"][$value]["SRC"]?>" height="<?=$arResult["ELEMENT_FILES"][$value]["HEIGHT"]?>" width="<?=$arResult["ELEMENT_FILES"][$value]["WIDTH"]?>" border="0" /><br />
                                                    <?
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <?=GetMessage("IBLOCK_FORM_FILE_NAME")?>: <?=$arResult["ELEMENT_FILES"][$value]["ORIGINAL_NAME"]?><br />
                                                        <?=GetMessage("IBLOCK_FORM_FILE_SIZE")?>: <?=$arResult["ELEMENT_FILES"][$value]["FILE_SIZE"]?> b<br />
                                                        [<a href="<?=$arResult["ELEMENT_FILES"][$value]["SRC"]?>"><?=GetMessage("IBLOCK_FORM_FILE_DOWNLOAD")?></a>]<br />
                                                    <?
                                                    }
                                                }
                                            }

                                            break;

                                    endswitch;?>
                                            <? if ($propertyID == 10 || $propertyID == 12): ?></td></tr><? else: ?> </th><? endif; ?>

                                <?endforeach;?>


                            <?endif?>


                                <?if($arParams["USE_CAPTCHA"] == "Y" && $arParams["ID"] <= 0):?>
                                <tr>
                                    <th scope="row">
                                        <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>"/>
                                        <label><?=GetMessage("IBLOCK_FORM_CAPTCHA_TITLE")?></label>
                                        <input name="captcha_word" type="text"
                                               required >
                                    </th>
                                    <td>
                                        <div class="img-cap">
                                            <img class="cap" src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>">
                                        </div>
                                    </td>
                                </tr>
                                <?endif?>
                                <tr>
                                    <th scope="row">
                                        <input type="submit" class="but" name="iblock_submit" value="<?=GetMessage("IBLOCK_FORM_SUBMIT")?>" />
                                    </th>
                                    <td>&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
<? endif; ?>








<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); ?>
<div class="butilks">
<? foreach($arResult["ITEMS"] as $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))); ?>
    <a id="<?=$this->GetEditAreaId($arItem['ID']);?>" href="<?= $arItem["DISPLAY_PROPERTIES"]["LINK"]["DISPLAY_VALUE"]?>" class="butilka"
       style="background: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>) no-repeat;">
        <div class="cost"><?echo $arItem["NAME"]?></div>
        <div class="text"><?echo $arItem["PREVIEW_TEXT"];?></div>
	</a>
<? endforeach; ?>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: Asperansa <asperansa@gmail.com>
 * Date: 05.08.14
 * Time: 15:14
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

    <title><? $APPLICATION->ShowTitle(false); ?></title>
    <?$APPLICATION->ShowHead();?>
    <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/reset.css'); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/template_styles.css?2'); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery-1.8.2.min.js'); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/script.js'); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.customfile.js'); ?>
    <? $APPLICATION->SetAdditionalCSS('http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic&subset=latin,cyrillic'); ?>

    <?$APPLICATION->ShowMeta("keywords")?>
    <?$APPLICATION->ShowMeta("description")?>
<script>
$(document).ready(function() {
    $('.input-file').customFile();
});
</script>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.carouFredSel-6.2.1-packed.js'); ?>

<script>
$(function() {
    $('.slider-spletni').carouFredSel({
						width: 530,
						height: 'variable',
						prev: '#prev3',
						next: '#next3',
						auto: false
			});
		});
	</script>
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<div class="min-h">
<div class="over">
	<div class="he100">


	<div class="head-form">
		<div class="all">
			<div class="obertka-head">
				<div class="b-form-head">
					<div class="title">Уважаемые покупатели!</div>
					<a class="close" href="javascript:void(0);"></a>
					<div class="form-text">
						<p>Наша книга отзывов и предложений создана для того, чтобы Вы могли высказать свои предложения
	и замечания, а руководство компании могло использовать их в нашей текущей работе, тем самым
	постоянно улучшая качество обслуживания в наших магазинах. </p>

<p>Обращаем Ваше внимание,
	что руководство компании рассматривает каждый отзыв
	или предложение. Для того чтобы
	мы могли известить Вас о принятых мерах, Вам необходимо оставить контактные данные для
	обратной связи. </p>					</div>
					<!--end form-text-->
					<div id="comp_ee1847624663601eb8c4c6acf58ff0f9">	<div class="form">

<form name="iblockAdd" action="/" method="post" enctype="multipart/form-data"><input type="hidden" name="bxajaxid" id="bxajaxid_ee1847624663601eb8c4c6acf58ff0f9_59772" value="ee1847624663601eb8c4c6acf58ff0f9" /><input type="hidden" name="AJAX_CALL" value="Y" /><script type="text/javascript">
function _processform_59772(){
    var obForm = top.BX('bxajaxid_ee1847624663601eb8c4c6acf58ff0f9_59772').form;
    top.BX.bind(obForm, 'submit', function() {BX.ajax.submitComponentForm(this, 'comp_ee1847624663601eb8c4c6acf58ff0f9', true)});
    top.BX.removeCustomEvent('onAjaxSuccess', _processform_59772);
}
if (top.BX('bxajaxid_ee1847624663601eb8c4c6acf58ff0f9_59772'))
    _processform_59772();
else
    top.BX.addCustomEvent('onAjaxSuccess', _processform_59772);
</script>
			<input type="hidden" name="sessid" id="sessid" value="af715b86b8dec751fb5f1d18fc3790c4" />			<table cellspacing="0" cellpadding="0">
				<tbody>
				<tr>
					<th colspan="2" scope="row">
						<label>Ваш отзыв</label>
						<textarea name="PROPERTY[13][0]" cols="" rows=""
						          required="required"></textarea>
					</th>
				</tr>
				<tr>
					<th scope="row">
						<label>Имя</label>
						<input name="PROPERTY[NAME][0]" value="" type="text"
						       required>
					</th>
					<td>
						<label>Эл. почта</label>
						<input name="PROPERTY[14][0]"
						       value=""						       type="email" required>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label>Телефон</label>
						<input name="PROPERTY[15][0]"
						       value=""						       type="text" required>
					</th>
					<td>
						<label>Прикрепите файл</label>
						<input type="hidden" name="PROPERTY[16][0]"
						       value=""/>

						<div class="file"><input class="input-file" type="file" name="PROPERTY_FILE_16_0"></div>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<input type="hidden" name="captcha_sid" value="09ec051347467f1766d313819758a751"/>
						<label>Защита от автоматического заполнения</label>
						<input name="captcha_word" type="text"
						       required >
					</th>
					<td>
						<div class="img-cap">
							<img class="cap" src="http://www.krasnoeibeloe.ru/bitrix/tools/captcha.php?captcha_sid=09ec051347467f1766d313819758a751">
						</div>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<input class="but" name="iblock_submit" type="submit" value="Отправить">
					</th>
					<td>&nbsp;</td>
				</tr>
				</tbody>
			</table>
		</form>
	</div>
</div>				</div>
				<!--end b-head-form-->
			</div>
			<!--end obertka-head-->
		</div>
		<!--end all-->
	</div>
	<!--end head-form-->
        <div class="menu">
    <?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
            "ROOT_MENU_TYPE" => "top",
            "MENU_CACHE_TYPE" => "A",
            "MENU_CACHE_TIME" => "3600",
            "MENU_CACHE_USE_GROUPS" => "Y",
            "MENU_CACHE_GET_VARS" => "",
            "MAX_LEVEL" => "1",
            "CHILD_MENU_TYPE" => "left",
            "USE_EXT" => "N",
            "DELAY" => "N",
            "ALLOW_MULTI_SELECT" => "N",
        ),
        false
    );?>


		<a class="link-open" href="javascript:void(0);">Написать отзыв<span></span></a>
	</div>
	<!--end menu-->
	<div class="all2">
		<div class="container-main">	<a class="logo" href="/">
		<span></span>	</a>

	<div class="lang"><a href="#">in English</a></div>
	<div class="tel">
		<span>Единая справочная служба</span>
<div class="number">
    <?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
            "AREA_FILE_SHOW" => "file",
            "PATH" => SITE_TEMPLATE_PATH."/include/phone_on_main.php",
            "EDIT_TEMPLATE" => ""
        ),
        false
    );?>
</div>
<div class="txt">
    <?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
            "AREA_FILE_SHOW" => "file",
            "PATH" => SITE_TEMPLATE_PATH."/include/timetable.php",
            "EDIT_TEMPLATE" => ""
        ),
        false
    );?>
</div><!--end txt-->	</div>
	</div><!--end container-main-->
	</div><!--end all2-->
	</div><!--end he100-->
	<div class="f-main-clear"></div>
	</div><!--end over-->
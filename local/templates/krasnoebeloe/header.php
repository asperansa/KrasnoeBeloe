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
        <?$APPLICATION->IncludeComponent(
            "bitrix:iblock.element.add.form",
            "feedback",
            Array(
                "IBLOCK_TYPE" => "vacancies",
                "IBLOCK_ID" => "5",
                "STATUS_NEW" => "NEW",
                "LIST_URL" => "",
                "USE_CAPTCHA" => "Y",
                "USER_MESSAGE_EDIT" => "",
                "USER_MESSAGE_ADD" => "",
                "DEFAULT_INPUT_SIZE" => "30",
                "RESIZE_IMAGES" => "N",
                "PROPERTY_CODES" => array("10","11","12","NAME","PREVIEW_TEXT"),
                "PROPERTY_CODES_REQUIRED" => array("10","11","NAME","PREVIEW_TEXT"),
                "GROUPS" => array("2"),
                "STATUS" => "ANY",
                "ELEMENT_ASSOC" => "CREATED_BY",
                "MAX_USER_ENTRIES" => "100000",
                "MAX_LEVELS" => "100000",
                "LEVEL_LAST" => "Y",
                "MAX_FILE_SIZE" => "0",
                "PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
                "DETAIL_TEXT_USE_HTML_EDITOR" => "N",
                "SEF_MODE" => "N",
                "AJAX_MODE" => "Y",
                "CUSTOM_TITLE_NAME" => "Имя",
                "CUSTOM_TITLE_TAGS" => "",
                "CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
                "CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
                "CUSTOM_TITLE_IBLOCK_SECTION" => "",
                "CUSTOM_TITLE_PREVIEW_TEXT" => "Ваш отзыв",
                "CUSTOM_TITLE_PREVIEW_PICTURE" => "",
                "CUSTOM_TITLE_DETAIL_TEXT" => "",
                "CUSTOM_TITLE_DETAIL_PICTURE" => ""
            )
        );?> </div>
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
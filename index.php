<?php
/**
 * Created by PhpStorm.
 * User: Asperansa <asperansa@gmail.com>
 * Date: 05.08.14
 * Time: 15:18
 */
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Красное и белое");
$APPLICATION->SetPageProperty("description", "Сеть магазинов \"Красное&Белое\" - напитки и еда в ассортименте. Акции, подарки!");
$APPLICATION->SetTitle("Сеть магазинов у дома \"Красное&Белое\" - напитки и еда в ассортименте"); ?>
<div class="center-center">
		<div class="all2">
			<div class="vert-center">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_TEMPLATE_PATH."/include/left_menu.php",
                        "EDIT_TEMPLATE" => ""
                    ),
                    false
                );?>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "banners",
                    Array(
                        "IBLOCK_TYPE" => "news",
                        "IBLOCK_ID" => "1",
                        "NEWS_COUNT" => "3",
                        "SORT_BY1" => "SORT",
                        "SORT_ORDER1" => "ASC",
                        "SORT_BY2" => "",
                        "SORT_ORDER2" => "",
                        "FILTER_NAME" => "",
                        "FIELD_CODE" => array("",""),
                        "PROPERTY_CODE" => array("LINK",""),
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "AJAX_OPTION_HISTORY" => "N",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "36000000",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "ACTIVE_DATE_FORMAT" => "",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "PAGER_TEMPLATE" => "",
                        "DISPLAY_TOP_PAGER" => "N",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "PAGER_TITLE" => "Новости",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N"
                    )
                );?>


			</div>
			<!--end vert-center-->
		</div>
		<!--end all2-->

	</div><!--end center-center-->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
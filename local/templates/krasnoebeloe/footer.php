<?php
/**
 * Created by PhpStorm.
 * User: Asperansa <asperansa@gmail.com>
 * Date: 05.08.14
 * Time: 15:15
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__); ?>
<footer>
	<div class="city"></div>
	<div class="all2">
		<div class="foot">
			<div class="copy">
				<a href="renter" class="f-arenda"></a>
                <?= GetMessage('COPYRIGHT_INFO');?> <a href="http://personal.krasnoeibeloe.ru/letters" ><?= GetMessage('CABINET'); ?></a>			</div>
                <div class="socs">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH."/include/socs_menu.php",
                            "EDIT_TEMPLATE" => ""
                        ),
                        false
                    );?>
                </div>
			<div class="b-err">
				<a class="btn-pop-err-mail" ><?= GetMessage('Нашли ошибку? Сообщите нам!'); ?></a>
			</div><!--end b-err-->
			<div class="b-spletni">
				<a class="btn-spletni-pop" ></a>
		<!--end foot-->
	</div>
	<!--end all-->
</footer>
</div><!--end min-h-->
</body>
</html>
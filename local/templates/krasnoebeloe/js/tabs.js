(function($) {
$(function() {

	$('ul.tabs').delegate('li:not(.current)', 'click', function() {
		$(this).addClass('current').siblings().removeClass('current')
			.parents('div.tovar-menu').find('div.box').eq($(this).index()).css({"top" : "30px"}).siblings('div.box').css({"top" : "-999em"});
	})

})
})(jQuery)
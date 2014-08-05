// CustomFile v1.1 - jQuery plugin
// (c) 2012 Flenov Roman - http://verstkawebsaita.ru
// Homepage: http://verstkawebsaita.ru/masterskaya-verstalshchika/veb-formy/input-file/jquery-plagin-customfile
// Demo page: http://verstkawebsaita.ru/demo/forms/file/1/
(function fun($){
	$.fn.customFile = function(options) {
    	
		var settings = {
        	inputFileBox: 'input-file-box'
        };
		
		return this.each(function() {
		
			if (options) {
				$.extend(settings, options);
			}
		
			var $this = $(this);
			var inputFileBox = settings.inputFileBox;
			var inputFileBoxClass = '.'+inputFileBox;
			
			$this.wrap("<div class=" + inputFileBox + "></div>");
			$this.after("<input type='text'>");
			
			var inputFileBoxJq = $this.closest('.'+inputFileBox);
			var fileText = $this.closest(inputFileBoxClass).find(':text');
                                
			$this.css({
				'position':'absolute',
				'left':'-9999px'
			});     	
			
        	inputFileBoxJq.on('click', function(event){	
				var $target = $(event.target);
				if ($target.is(':file')) {
				}
				else {
					$(this).find(':file').trigger('click');
				}
			});	
	
			$this.on('change', function(){
				var valFile = $(this).attr('value');		
				fileText.attr('value', valFile).trigger('blur');
			});
			
			
		});
		
	};
})(jQuery);

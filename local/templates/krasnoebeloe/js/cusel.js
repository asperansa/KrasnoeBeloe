/* -------------------------------------

	cusel version 2.3
	смена обычного селект на стильный
	autor: Evgen Ryzhkov
	www.xiper.net
----------------------------------------	
*/
function cuSel(params) {
	
jQuery(document).ready(function(){
							
	jQuery(params.changedEl).each(
	function(num)
	{
	var chEl = jQuery(this),
		chElWid = chEl.outerWidth(), // ширина селекта
		chElClass = chEl.attr("class"), // класс селекта
		chElId = chEl.attr("id"), // id
		chElName = chEl.attr("name"), // имя
		defaultVal = chEl.val(), // начальное значение
		activeOpt = chEl.find("option[value="+defaultVal+"]").eq(0),
		defaultText = activeOpt.text(), // начальный текст
		disabledSel = chEl.attr("disabled"), // заблокирован ли селект
		scrollArrows = params.scrollArrows,
		chElOnChange = chEl.attr("onchange"),
		chElTab = chEl.attr("tabindex");
		
		if(!chElId)	return false; // не стилизируем селект если не задан id
		
		if(!disabledSel)
		{
			classDisCuselText = "", // для отслеживания клика по задизайбленному селекту
			classDisCusel=""; // для оформления задизейбленного селекта
		}
		else
		{
			classDisCuselText = "classDisCuselLabel";
			classDisCusel="classDisCusel";
		}
		
		if(scrollArrows)
		{
			classDisCusel+=" cuselScrollArrows";
		}
			
		activeOpt.addClass("cuselActive");  // активному оптиону сразу добавляем класс для подсветки
	
	var optionStr = chEl.html(), // список оптионов

		
	/* 
		делаем замену тегов option на span, полностью сохраняя начальную конструкцию
	*/

	spanStr = optionStr.replace(/option/ig,"span");
	
	
	/*
		если нужна проверка z-index, проверяем на наличие уже созданных селектов и задаем z-index новому с учетом имеющихся
	*/
	if(params.checkZIndex)
	{
		num = jQuery(".cusel").length;
	}
	
	
	/* каркас стильного селекта	*/
	var cuselFrame = '<div class="cusel '+chElClass+' '+classDisCusel+'"'+
					' id=cuselFrame-'+chElId+
					' style="width:'+chElWid+'px"'+
					' tabindex="'+chElTab+'"'+
					'>'+
					'<div class="cuselFrameRight"></div>'+
					'<div class="cuselText">'+defaultText+'</div>'+
					'<div class="cusel-scroll-wrap"><div class="cusel-scroll-pane" id="cusel-scroll-'+chElId+'">'+
					spanStr+
					'</div></div>'+
					'<input type="hidden" id="'+chElId+'" name="'+chElName+'" value="'+defaultVal+'" />'+
					'</div>';
					
					
	/* удаляем обычный селект, на его место вставляем стильный */
	chEl.replaceWith(cuselFrame);
	
	/* если был поцеплен onchange - цепляем его полю */
	if(chElOnChange) jQuery("#"+chElId).bind('change',chElOnChange);

	
	/*
		устаналиваем высоту выпадающих списков основываясь на числе видимых позиций и высоты одной позиции
		при чем только тем, у которых число оптионов больше числа заданного числа видимых
	*/
	var newSel = jQuery("#cuselFrame-"+chElId),
		arrSpan = newSel.find("span"),
		defaultHeight;
		
		if(!arrSpan.eq(0).text())
		{
			defaultHeight = arrSpan.eq(1).outerHeight();
			arrSpan.eq(0).css("height", arrSpan.eq(1).height());
		} 
		else
		{
			defaultHeight = arrSpan.eq(0).outerHeight();
		}
		
	
	if(arrSpan.length>params.visRows)
	{
		newSel.find(".cusel-scroll-wrap").eq(0)
			.css({height: defaultHeight*params.visRows+"px", display : "none", visibility: "visible" })
			.children(".cusel-scroll-pane").css("height",defaultHeight*params.visRows+"px");
	}
	else
	{
		newSel.find(".cusel-scroll-wrap").eq(0)
			.css({display : "none", visibility: "visible"});
	}
	
	/* вставляем в оптионы дополнительные теги */
	
	var arrAddTags = jQuery("#cusel-scroll-"+chElId).find("span[addTags]"),
		lenAddTags = arrAddTags.length;
		
		for(i=0;i<lenAddTags;i++) arrAddTags.eq(i)
										.append(arrAddTags.eq(i).attr("addTags"))
										.removeAttr("addTags");
	
	});

/* ---------------------------------------
	привязка событий селектам
------------------------------------------
*/

jQuery("html").unbind("click");

jQuery("html").click(
	function(e)
	{
				
		var clicked = jQuery(e.target),
			clickedId = clicked.attr("id"),
			clickedClass = clicked.attr("class");
			
		/* если кликнули по самому селекту (текст) */
		if((clickedClass.indexOf("cuselText")!=-1 || clickedClass.indexOf("cuselFrameRight")!=-1) && clicked.parent().attr("class").indexOf("classDisCusel")==-1)
		{
			var cuselWrap = clicked.parent().find(".cusel-scroll-wrap").eq(0);
			
			/* если выпадающее меню скрыто - показываем */
			if(cuselWrap.css("display")=="none")
			{
				jQuery(".cusel-scroll-wrap").css("display","none");
				cuselWrap.css("display","block");
				var cuselArrows = false;
				if(clicked.parents(".cusel").attr("class").indexOf("cuselScrollArrows")!=-1) cuselArrows=true;
				if(!cuselWrap.find(".jScrollPaneContainer").eq(0).is("div"))
				{
					cuselWrap.find("div").eq(0).jScrollPaneCusel({showArrows:cuselArrows});
					/*var scrollContainer = cuselWrap.find(".jScrollPaneContainer").eq(0),
						widScrollContainer = scrollContainer.width();
						
						scrollContainer.css("width",widScrollContainer+"px");
						*/
				}
			}
			else
			{
				cuselWrap.css("display","none");
			}
			/* / если выпадающее меню скрыто - показываем */
		}
		/* если кликнули по самому селекту (контейнер) */
		else if(clickedClass.indexOf("cusel")!=-1 && clickedClass.indexOf("classDisCusel")==-1 && clickedClass.indexOf("cuselActive")==-1)
		{
						
			var cuselWrap = clicked.find(".cusel-scroll-wrap").eq(0);
			
			/* если выпадающее меню скрыто - показываем */
			if(cuselWrap.css("display")=="none")
			{
				jQuery(".cusel-scroll-wrap").css("display","none");
				cuselWrap.css("display","block");
				var cuselArrows = false;
				if(clicked.attr("class").indexOf("cuselScrollArrows")!=-1) cuselArrows=true;
				if(!cuselWrap.find(".jScrollPaneContainer").eq(0).is("div"))
				{
					cuselWrap.find("div").eq(0).jScrollPaneCusel({showArrows:cuselArrows});
				}
			}
			else
			{
				cuselWrap.css("display","none");
			}
			/* / если выпадающее меню скрыто - показываем */
		}
		
		/* если выбрали позицию в списке */
		else if(clicked.is("span") && clicked.parents(".cusel-scroll-wrap").is("div"))
		{
			var clickedVal;
			(clicked.attr("value") == undefined) ? clickedVal=clicked.text() : clickedVal=clicked.attr("value");
			clicked
				.parents(".cusel-scroll-wrap").find(".cuselActive").eq(0).removeClass("cuselActive")
				.end().parents(".cusel-scroll-wrap")
				.next().val(clickedVal)
				.end().prev().text(clicked.text())
				.end().css("display","none");
			clicked.addClass("cuselActive");
			if(clickedClass.indexOf("cuselActive")==-1)	clicked.parents(".cusel").find(".cusel-scroll-wrap").eq(0).next("input").change(); // чтобы срабатывал onchange
		}
		
		else if(clicked.parents(".cusel-scroll-wrap").is("div"))
		{
			return;
		}
		
		/*
			скрываем раскрытые списки, если кликнули вне списка
		*/
		else
		{
			jQuery(".cusel-scroll-wrap").css("display","none");
		}
		

		
	});

/*
	дубляж псевдоклассов css focus и hover для IE6-7
*/
jQuery(".cusel").focus(
function()
{
	jQuery(this).addClass("cuselFocus");
});

jQuery(".cusel").blur(
function()
{
	jQuery(this).removeClass("cuselFocus");
});

jQuery(".cusel").hover(
function()
{
	jQuery(this)
		.addClass("cuselFocus");
},
function()
{
	jQuery(this).removeClass("cuselFocus");
});

jQuery(".cusel").unbind("keydown"); /* чтобы не было двлйного срабатывания события */

jQuery(".cusel").keydown(
function(event)
{
	
	/*
		если селект задизайблин, с не го работает только таб
	*/
	var key, keyChar;
		
	if(window.event) key=window.event.keyCode;
	else if (event) key=event.which;
	
	if(key==null || key==0 || key==9) return true;
	
	if(jQuery(this).attr("class").indexOf("classDisCusel")!=-1) return false;
		
	/*
		если нажали стрелку вниз
	*/
	if(key==40)
	{
		var cuselOptHover = jQuery(this).find(".cuselOptHover").eq(0);
		if(!cuselOptHover.is("span")) var cuselActive = jQuery(this).find(".cuselActive").eq(0);
		else var cuselActive = cuselOptHover;
		var cuselActiveNext = cuselActive.next();
			
		if(cuselActiveNext.is("span"))
		{
			jQuery(this)
				.find(".cuselText").eq(0).text(cuselActiveNext.text());
			cuselActive.removeClass("cuselOptHover");
			cuselActiveNext.addClass("cuselOptHover");
			
			/* делаем прокрутку к выбранному элементу */
			var scrollWrap = jQuery(this).find(".cusel-scroll-pane").eq(0);
				
			if(scrollWrap.parent().find(".jScrollPaneTrack").eq(0).is("div"))
			{
				var idScrollWrap = scrollWrap.attr("id"),
					hOption = scrollWrap.find("span").eq(0).outerHeight();
				jQuery("#"+idScrollWrap)[0].scrollBy(hOption);
			}
			
			return false;
		}
		else return false;
	}
	
	/*
		если нажали стрелку вверх
	*/
	if(key==38)
	{
		var cuselOptHover = jQuery(this).find(".cuselOptHover").eq(0);
		if(!cuselOptHover.is("span")) var cuselActive = jQuery(this).find(".cuselActive").eq(0);
		else var cuselActive = cuselOptHover;
		cuselActivePrev = cuselActive.prev();
			
		if(cuselActivePrev.is("span"))
		{
			jQuery(this)
				.find(".cuselText").eq(0).text(cuselActivePrev.text());
			cuselActive.removeClass("cuselOptHover");
			cuselActivePrev.addClass("cuselOptHover");
			
			/* делаем прокрутку к выбранному элементу */
			var scrollWrap = jQuery(this).find(".cusel-scroll-pane").eq(0);
				
			if(scrollWrap.parent().find(".jScrollPaneTrack").eq(0).is("div"))
			{
				var idScrollWrap = scrollWrap.attr("id"),
					hOption = -parseInt(scrollWrap.find("span").eq(0).outerHeight());
				jQuery("#"+idScrollWrap)[0].scrollBy(hOption);
			}
			
			return false;
		}
		else return false;
	}
	
	/*
		если нажали esc
	*/
	if(key==27)
	{
		var cuselActiveText = jQuery(this).find(".cuselActive").eq(0).text();
		jQuery(this)
			.find(".cusel-scroll-wrap").eq(0).css("display","none")
			.end().find(".cuselOptHover").eq(0).removeClass("cuselOptHover");
		jQuery(this).find(".cuselText").eq(0).text(cuselActiveText);
	}
	
	/*
		если нажали enter
	*/
	if(key==13)
	{
		
		var cuselHover = jQuery(this).find(".cuselOptHover").eq(0);
		if(cuselHover.is("span"))
		{
			jQuery(this).find(".cuselActive").removeClass("cuselActive");
			var cuselHoverVal = cuselHover.attr("value");
			cuselHover.addClass("cuselActive");
		}
		else var cuselHoverVal = jQuery(this).find(".cuselActive").attr("value");
		
		jQuery(this)
			.find(".cusel-scroll-wrap").eq(0).css("display","none")
			.end().find(".cuselOptHover").eq(0).removeClass("cuselOptHover");
		jQuery(this).find("input").eq(0)
			.val(cuselHoverVal)
			.change();
	}
		
	if(jQuery.browser.opera) return false; /* специально для опера, чтоб при нажатиии на клавиши не прокручивалось окно браузера */

});

/*
	функция отбора по нажатым символам (от Alexey Choporov)
	отбор идет пока пауза между нажатиями сиволов не будет больше 0.5 сек
	keypress нужен для отлова символа нажатой клавиш
*/
var arr = [];
jQuery(".cusel").keypress(function(event)
{
	var key, keyChar;
		
	if(window.event) key=window.event.keyCode;
	else if (event) key=event.which;
	
	if(key==null || key==0 || key==9) return true;
	
	if(jQuery(this).attr("class").indexOf("classDisCusel")!=-1) return false;
	
	var o = this;
	arr.push(event);
	clearTimeout(jQuery.data(this, 'timer'));
	var wait = setTimeout(function() { handlingEvent() }, 500);
	jQuery(this).data('timer', wait);
	function handlingEvent()
	{
		var charKey = [];
		for (var iK in arr)
		{
			if(window.event)charKey[iK]=arr[iK].keyCode;
			else if(arr[iK])charKey[iK]=arr[iK].which;
			charKey[iK]=String.fromCharCode(charKey[iK]).toUpperCase();
		}
		var arrOption=jQuery(o).find("span"),colArrOption=arrOption.length,i,letter;
		for(i=0;i<colArrOption;i++)
		{
			var match = true;
			for (var iter in arr)
			{
				letter=arrOption.eq(i).text().charAt(iter).toUpperCase();
				if (letter!=charKey[iter])
				{
					match=false;
				}
			}
			if(match)
			{
				jQuery(o).find(".cuselOptHover").removeClass("cuselOptHover").end().find("span").eq(i).addClass("cuselOptHover").end().end().find(".cuselText").eq(0).text(arrOption.eq(i).text());
				var scrollWrap=jQuery(o).find(".cusel-scroll-pane").eq(0);
				if(scrollWrap.parent().find(".jScrollPaneTrack").eq(0).is("div"))
				{
					var idScrollWrap=scrollWrap.attr("id"),hOption=scrollWrap.find("span").eq(0).outerHeight()-0.2;
					jQuery("#"+idScrollWrap)[0].scrollTo(hOption*i);
				}
			arr = arr.splice;
			arr = [];
			break;
			return true;
			}
		}
		arr = arr.splice;
		arr = [];
	}
	if(jQuery.browser.opera && window.event.keyCode!=9) return false;
});

jQuery(".cusel span").mouseover(
function()
{
	jQuery(this).parent().find(".cuselOptHover").eq(0).removeClass("cuselOptHover");
});
								


/*
	проставляем z-index селектам,
	вынесено отдельно, чтобы избежать проблем с динамически добавленными селектами и при инициализации селектв разными способами
*/
var arrCusel = jQuery(".cusel"),
	colCusel = arrCusel.length-1,
	i;

	for(i=0;i<=colCusel;i++)
	{
		arrCusel.eq(i).css("z-index",colCusel-i);
	}
	
	
								});

	
}

function cuSelRefresh(params)
{
	/*
		устаналиваем высоту выпадающих списков основываясь на числе видимых позиций и высоты одной позиции
		при чем только тем, у которых число оптионов больше числа заданного числа видимых
	*/

	var arrRefreshEl = params.refreshEl.split(","),
		lenArr = arrRefreshEl.length,
		i;
	
	for(i=0;i<lenArr;i++)
	{
		var refreshScroll = jQuery(arrRefreshEl[i]).parents(".cusel").find(".cusel-scroll-wrap").eq(0);
		refreshScroll.find(".cusel-scroll-pane").jScrollPaneRemoveCusel();
		refreshScroll.css({visibility: "hidden", display : "block"});
	
		var	arrSpan = refreshScroll.find("span"),
			defaultHeight = arrSpan.eq(0).outerHeight();
		
		
		
	
		if(arrSpan.length>params.visRows)
		{
			refreshScroll
				.css({height: defaultHeight*params.visRows+"px", display : "none", visibility: "visible" })
				.children(".cusel-scroll-pane").css("height",defaultHeight*params.visRows+"px");
		}
		else
		{
			refreshScroll
				.css({display : "none", visibility: "visible" });
		}
	}
	
	
	
	
}
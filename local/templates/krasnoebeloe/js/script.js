$(document).ready(function() {
    $('.input-file').customFile();
    $('.slider-spletni').carouFredSel({
        width: 530,
        height: 'variable',
        prev: '#prev3',
        next: '#next3',
        auto: false
    });
   $(".link-open").hover(function(){
		$(".link-open span").animate({"height" : "42px"});
	   },
function(){
		$(".link-open span").animate({"height" : "35px"});
	   }); 
	   
   $(".link-open").on("click", function(){
		$(".head-form").slideToggle(1000);
   });
   $(".head-form .close").on("click", function(){
		$(".head-form").slideUp(1000);
   });
   $(".btn-pop-err-mail").on("click", function(){
		$(".blok-err-mail").fadeIn(0);
		$(".black-bg").fadeIn(0);
   });
   $(".blok-err-mail .close").on("click", function(){
		$(".blok-err-mail").fadeOut(0)
		$(".black-bg").fadeOut(0)
   });
   
   // reg popup
   $(".btn-pop-reg-akcia").on("click", function(){
		$(".blok-reg-akcia").fadeIn(0);
		$(".black-bg-reg").fadeIn(0);
   });
   $(".blok-reg-akcia .close").on("click", function(){
		$(".blok-reg-akcia").fadeOut(0)
		$(".black-bg-reg").fadeOut(0)
   });
   $(".b-pop-login .btn-on").on("click", function(){
		$(".b-pop-login, .black-bg2").fadeOut(0)
   });
   
   
   $(".btn-toggle-ysl").toggle(function(){
		$(".toggle-bloks").addClass("view");
		$(this).text('Свернуть')
		},
		function(){
		$(".toggle-bloks").removeClass("view");
		$(this).text('Читать полностью');
		
   });
   
   $(".btn-pop-zya").on("click", function(){
		$(".blok-serv-zya").fadeIn(0);
		$(".black-bg").fadeIn(0);
   });
   $(".blok-serv-zya .close").on("click", function(){
		$(".blok-serv-zya").fadeOut(0)
		$(".black-bg").fadeOut(0)
   });
   $(".btn-pop-pzdc").on("click", function(){
		$(".blok-serv-pzdc").fadeIn(0);
		$(".black-bg").fadeIn(0);
   });
   $(".blok-serv-pzdc .close").on("click", function(){
		$(".blok-serv-pzdc").fadeOut(0)
		$(".black-bg").fadeOut(0)
   });
   $(document).on("click", "#reg_again", function(){
   		$("#reg-form").show();
   		$(".blok-reg-akcia").css({width: '610px', height: '615px'}).alignCenterScreen();
   		$(this).parents(".result_msg").hide();
   })
 	$(document).on("click", "#show_res", function(){
 		$("#reg-form, .black-bg-reg").hide();
 		$('html, body').animate({
			scrollTop: $(".action-results").offset().top
		}, 1000);
 	})
 /*
   $(".link-open").on("click", function(){
		$(".head-form").slideToggle(1000);
   });
 */
   
   
	$(".my-tabs li").on('click', function(){
			$(".my-tabs li").removeClass('current');
			$(this).addClass('current');
			var menu = $(this).attr("id");
			$(".bloks-tab .box").removeClass("visible");
			$("#t" + menu).addClass("visible");
		
		});	
	// popup spletni slider	
	$(".btn-spletni-pop").on('click', function(){
		$(".spletni-pop").addClass("view");
		});	
	// popup spletni close
	$("div.spletni-pop .close").on('click', function(){
		$(".spletni-pop").removeClass("view");
		});	


	// popup 18year no	
	$(".b-pop-login .btn-off").on('click', function(){
		$(".log1").css({"display" : "none"})
		$(".log2").fadeIn(100);
		});	
	// popup spletni close
	$(".b-pop-login .close").on('click', function(){
		$(".b-pop-login, .black-bg2").fadeOut(0)
		});
		
	// logo
	$(".logo").hover(function(){
		$(".logo span").animate({'top': '-230px'}, 0).delay(70).animate({'top': '-460px'}, 0).delay(70).animate({'top': '-690px'}, 0).delay(240).animate({'top': '-460px'}, 0).delay(70).animate({'top': '-230px'}, 0).delay(70).animate({'top': '0px'}, 0).delay(70);
	},
	function(){
	});

			
});


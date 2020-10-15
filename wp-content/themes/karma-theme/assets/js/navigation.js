$(document).ready(function()
{
	var menu_count = $(".menu li").has("ul").toArray();
	if(menu_count.length == 0)
	{
		$(".menu").addClass("no-sub");
	}
	$(".navigation").prepend('<span class="menu_title"><i class="fa fa-times"></i>Close Menu</span>');
	var width=$(window).width();
	if(width >= 1200)
	{
		if($(".menu li").has("ul"))
		{
			$(".menu li").has("ul").addClass("sub");
			$(".menu li").has("ul").append("<span class='sub_toggle'></span>");
			$(".menu li ul").addClass("sub-menu");
		}
		$(".sub").click(function()
		{
			$(this).children("a").addClass("open");
		});
	}
	else
	{
		if($(".menu li").has("ul"))
		{
			$(".menu li").has("ul").addClass("sub");
			$(".menu li").has("ul").append("<span class='device_toggle'></span>");
			$(".menu li ul").addClass("sub-menu");
		}
		$(".device_toggle").click(function(e)
		{
			$(this).parent("li").children("ul").slideToggle();
			$(this).toggleClass("in");
			if($(".menu li").hasClass("megamenu"))
			{
				$(this).parent("li").children(".mega_menu").slideToggle();
			}
		});
		$(".navigation").mCustomScrollbar();
	}
	if($(".menu li li").has("ul"))
	{
		$(".menu li li").has("ul").addClass("inner-sub");
	}
	$(".navigation-toggle").click(function()
	{
		$("body").toggleClass("menu-action");
		var win_width = $(window).width();
		if(win_width <= 1024)
		{
			jQuery("html, body").animate({
				scrollTop: $(".site-main > header").offset().top
			}, 0);
		}
	});
	$(".menu_title").click(function()
	{
		$("body").removeClass("menu-action");
	});
});
$(window).resize(function()
{
	var width=$(window).width();
	if(width >= 1025)
	{
		$(".navigation").mCustomScrollbar("destroy");
	}
	if(width <= 1024)
	{
		$(".navigation").mCustomScrollbar();
	}
});

/*$(window).resize(function()
{
    $(".menu li .mega_menu").hide();
	$(".device_toggle").remove();
	$(".sub_toggle").remove();
	var width=$(window).width();
	if(width >= 1200)
	{
		if($(".menu li").has("ul"))
		{
			$(".menu li").has("ul").addClass("sub");
			$(".menu li").has("ul").append("<span class='sub_toggle'></span>");$(".menu li ul").addClass("sub-menu");
			$(".device_toggle").remove();
		}
		$(".sub").click(function()
		{
			$(this).children("a").addClass("open");
		});
	}
	else
	{
		if($(".menu li").has("ul"))
		{
			$(".menu li").has("ul").addClass("sub");
			$(".menu li").has("ul").append("<span class='device_toggle'></span>");
			$(".menu li ul").addClass("sub-menu");$(".sub_toggle").remove();
		}
		$(".device_toggle").click(function(e)
		{
			$(this).parent("li").children("ul").slideToggle();
			$(this).toggleClass("in");
                        if($(".menu li").hasClass("megamenu"))
                        {
                            $(this).parent("li").children(".mega_menu").slideToggle();
                        }
		});
		$(".sub-menu").hide();
	}
});*/
$(window).on('click touchend',function (e)
{
	var width=$(window).width();
	if(width<=1024)
	{
		if (!$(e.target).hasClass("navigation-toggle") && !$(e.target).hasClass("span-icon") && $(e.target).parents(".navigation").length === 0)
		{
			$("body").removeClass("menu-action");
		}
	}
	if(width >= 1025)
	{
		if (!$(e.target).hasClass("open") && !$(e.target).hasClass("sub"))
		{
			$(".sub").children("a").removeClass("open");
		}
	}
});
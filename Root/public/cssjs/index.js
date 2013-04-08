var _I = 0;
function _(a) { //可以无视,类似alert.
    _I++;
    $("#a_a").length === 0 ? $("<div id=a_a>" + a + "|" + _I + "</div>").css({
        "position": "absolute",
        "border": "1px dashed #0099FF",
        "background": "#C3D5ED",
        "top": $("html").scrollTop() + "px",
        "right": "50%",
        "z-index": "99999"
    }).appendTo("body") : $("#a_a").html(a + "|" + _I);
};
$(window).scroll(function() {
    $("#a_a").css({
        "top": $("html").scrollTop() + "px"
    });
})

$(function() { //可删除
    $(".bar_menu ul li").html(function() {
        return $(this).index()
    })
    /*		 $(".bar_menu h2").css({
		"border-left":"#333333 solid 1px",
		"border-right":"#111111 solid 1px"})*/
$("but ton").hover(function(){$(this).css({"border":"1px solid #000"})},function(){$(this).css({"border":""})})
//$("dd a").attr("href","javascript:void(0)")

})

$(function() {

    $(".bar_menu").children().hover(function() {
			  $(this).css({"background":"#297DDA"});
        var h = $("li", $(this)).length * $("li", $(this)).outerHeight(true);
				
        $("ul", $(this)).animate({
            height: h + "px"
        },
        300);
    },
    function() {
			 $(this).css({"background":""})
       $("ul", $(this)).animate({
            height: 0
        },
        300);
    });
		
		$(".bar_menu ul li").hover(function() {
       $(this).css({"background":"#999"})
    },
    function() {
				$(this).css({"background":""})
    });
		
		
		$(".bar input").hover(function() {
        $(this).val()=="Search..."?$(this).val(""):"";
    },
    function() {
			  $(this).val()==""?$(this).val("Search..."):"";
    });	
		

    /****************big_img****************/

    var big_img = $(".big_img")

    $("ul", big_img).css({
        "width": big_img.width() * $("li", big_img).length
    })

    $("li", big_img).css({
        "width": big_img.width()
    })

    $("<button><img src=public/images/icon/icon_2_1.gif /></button><button><img src=public/images/icon/icon_2_2.gif /></button>").appendTo(big_img).css({ //追加左右按钮
        "position": "absolute",
        "top": "70%",
        "left": "42%",
        "width": "43px",
				"height": "43px",
				"padding":"0",
				"border":"none"
    })

    $("button", big_img).eq(0).click(function() { //left 按钮
        $("li", big_img).first().animate({
            width: 0
        },
        400,
        function() {
            $("ul", big_img).append($(this).css("width", big_img.width()))
        })
    })

    $("button", big_img).eq(1).css({ //right 按钮
        "left": "47%"
    }).click(function() {
        $("li", big_img).eq( - 1).width(0).prependTo($("ul", big_img)).animate({
            width: big_img.width()
        },
        400)
    })
		
		
	 var try_big_img;
   try_big_img=setInterval(function(){$("button", big_img).eq(0).click()}, 3000);    //初始化 menu
   
	 big_img.hover(function(){
	 clearInterval(try_big_img);
  	},function(){
		try_big_img=setInterval(function(){$("button", big_img).eq(0).click()}, 3000);  
		})
   //

		
		
    /****************big_img****************/

    /****************partners_imgs****************/
    var partners_imgs = $(".partners")

    $("<span><button class=partners_goleft><img src=images/icon/icon_5_1.gif /></button><button class=partners_goright><img src=images/icon/icon_5_2.gif /></button><span>").appendTo($(".partners_title")).css({ //追加左右按钮
        "float": "right"
				
    })

    var p_goleft = $(".partners_goleft");
    var p_goright = $(".partners_goright");
    var p = $(".partners")

    p_goleft.click(function() { //left 按钮

        if ($("li", p).is(":animated")) {
            return;
        }

        $("li", p).eq(0).clone(true).appendTo($("ul", p));
        $("li", p).eq(0).animate({
            width: 0
        },
        300,
        function() {
            $("li", p).eq(0).remove();
        });

    })

    p_goright.click(function() { //left 按钮
        if ($("li", p).is(":animated")) {
            return;
        }

        $("li", p).eq( - 1).prependTo($("ul", p)).css("width", 0);
        $("li", p).eq(0).animate({
            width: $("li", p).eq( - 1).width()
        },
        300);

    })
    /****************partners_imgs****************/
$(".index_jump .go_top").click(function(){
	_(11111)
	$("html").scrollTop(0);
	
	})
})
var _I = 0;
function _(a) { //可以无视,类似alert.
    _I++;
    $("#a_a").length === 0 ? $("<div id=a_a>" + a + "|" + _I + "</div>").css({
        "position": "absolute",
        "border": "1px dashed #0099FF",
        "background": "#C3D5ED",
        "top": $("html").scrollTop()+"px" ,
        "right": "50%",
        "z-index": "99999"
    }).appendTo("body") : $("#a_a").html(a + "|" + _I).css({"top": $("html").scrollTop()+"px"});
};

$(function() {  //可删除

    $(".bar_menu ul li").html(function() {
        return $(this).index()
    })
    /*		 $(".bar_menu h2").css({
		"border-left":"#333333 solid 1px",
		"border-right":"#111111 solid 1px"})*/

})

$(function() {

    $(".bar_menu").children().hover(function() {
        var h = $("li", $(this)).length * $("li", $(this)).outerHeight(true);
        $("ul", $(this)).animate({
            height: h + "px"
        },
        300);
    },
    function() {
        $("ul", $(this)).animate({
            height: 0
        },
        300);
    })

 /****************big_img****************/

    var big_img = $(".big_img")

		
    $("ul", big_img).css({
        "width": big_img.width() * $("li", big_img).length
    })

    $("li", big_img).css({
        "width": big_img.width()
    })

    $("<button>left</button><button>right</button>").appendTo(big_img).css({//追加左右按钮
        "position": "absolute",
        "top": "70%",
        "left": "40%",
				"width":"30px"
    })

    $("button", big_img).eq(0).click(function() {//left 按钮
        $("li", big_img).first().animate({
            width: 0
        },
        400,
        function() {
            $("ul", big_img).append($(this).css("width", big_img.width()))
        })
    })

    $("button", big_img).eq(1).css({//right 按钮
        "left": "50%"
    }).click(function() {
        $("li", big_img).eq( - 1).width(0).prependTo($("ul", big_img)).animate({
            width: big_img.width()
        },
        400)
    })
 /****************big_img****************/
 
 /****************partners_imgs****************/
var partners_imgs =$(".partners")

    $("<span><button class=partners_goleft>left</button><button class=partners_goright>right</button><span>").appendTo($(".partners_title")).css({//追加左右按钮
"float":"right"
    })

var p_goleft =$(".partners_goleft");
var p_goright =$(".partners_goright");


   p_goleft.click(function() {//left 按钮
	 _("llll")
 
 
    })

    $("button", big_img).eq(1).css({//right 按钮
 
    })
 /****************partners_imgs****************/ 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
})
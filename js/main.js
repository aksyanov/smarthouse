//distanceTop = $("#i_buttonMenuRect").offset().top - $(window).height();
distanceMenuButton = $("#i_buttonMenuRect").offset().top;
distanceMainMenu = $("#i_mainMenu").offset().top;
mainMenuToUp = true;
mainMenuOpen = false;

$(window).on("scroll",function(){checkFixedElems()});
$("#i_buttonMenuRect").bind("click",function(){openMainMenu()});
$("#i_topRect_8").bind("click",function(){
    scrollTo($("#i_cookies"));
});
$("#i_topRect_9").bind("click",function(){
    scrollTo($("#i_contactUs"));
});
$("#i_buttonSlideUp").bind("click",function(){
    scrollTo($("body"));
});


function getOffsetElem(el){
    if(el == null || el == undefined)
        return null;
    return el.offset();
}

function checkFixedElems(){

    var menuButton = $("#i_buttonMenuRect");
    var mainMenu = $("#i_mainMenu");
    var i_slideUp = $("#i_buttonSlideUp");
    var scrollTop = $(window).scrollTop();

    if(!mainMenuOpen){
        if(scrollTop>=distanceMenuButton){
            var pos = "fixed";
            var top = "35px";
            mainMenuToUp = false;
        }else{
            var pos = "relative";
            var top = "0";
            mainMenuToUp = true;
        }

        menuButton.css("position",pos);
        menuButton.css("top",top);
    }

    if(scrollTop>=distanceMenuButton){
        i_slideUp.fadeIn();
    }else{
        i_slideUp.fadeOut();
    }

    if(mainMenuToUp){
        var pos = "relative";
        var top = "0";
    }else{
        var pos = "fixed";
        var top = "40px";
    }
    mainMenu.css("position",pos);
    mainMenu.css("top",top);
}

function openMainMenu(){
    var menuButton = $("#i_buttonMenuRect");
    var mainMenu = $("#i_mainMenu");
    var scrollTop = $(window).scrollTop();

    mainMenu.stop(true);

    if(mainMenuOpen){
        var marginTop = "-5px";
        var height = "5px";
        var width = "10px";
        var marginLeft = "125px";
    }else{
        if(mainMenuToUp)
            var marginTop = "-1050px";
        else
            var marginTop = "-5px";

        var height = "1050px";
        var width = "280px";
        var marginLeft = "0";
    }

    if(!mainMenuOpen){
        mainMenu.animate({
            "width":width,
            "margin-left":marginLeft
        },300);
    }
    mainMenu.animate({
        "margin-top":marginTop,
        "height":height
    },300);

    if(mainMenuOpen){
        mainMenu.animate({
            "width":width,
            "margin-left":marginLeft
        },300);
    }

    if(!mainMenuOpen && mainMenuToUp){
        $.scrollTo('0', 300);
    }


   /* if(scrollTop>=distanceMenuButton){
        var pos = "fixed";
        var top = "35px";
        mainMenuToUp1 = false;
    }else{
        var pos = "relative";
        var top = "0";
        mainMenuToUp1 = true;
    }

    if(mainMenuOpen && mainMenuToUp1){
//        menuButton.animate({
//            "position":pos,
//            "top":top
//        },200);
        menuButton.css("position",pos);
        menuButton.css("top",top);
    }*/

    mainMenuOpen = !mainMenuOpen;
}

function scrollTo(el){
    $.scrollTo(el, 300);
}
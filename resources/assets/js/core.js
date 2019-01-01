window.$ = window.jQuery = require('jquery');
const ProgressBar = require('progressbar.js') ;

$(".progress-bar-circle").each(function() {
    var e = $(this).attr("aria-valuenow"),
        a = $(this).data("color") || t,
        o = $(this).data("trailColor") || "#d7d7d7",
        n = $(this).attr("aria-valuemax") || 100,
        i = $(this).data("showPercent");
    new ProgressBar.Circle(this, {
        color: a,
        duration: 20,
        easing: "easeInOut",
        strokeWidth: 4,
        trailColor: o,
        trailWidth: 4,
        text: {
            autoStyleContainer: !1
        },
        step: (t, a) => {
            i ? a.setText(Math.round(100 * a.value()) + "%") : a.setText(e + "/" + n)
        }

    }).animate(e / n)
});

function we() {
    return document.fullscreenElement && null !== document.fullscreenElement || document.webkitFullscreenElement && null !== document.webkitFullscreenElement || document.mozFullScreenElement && null !== document.mozFullScreenElement || document.msFullscreenElement && null !== document.msFullscreenElement
}

$("#fullScreenButton").on("click", function(e) {
    var t, a;
    e.preventDefault() ,
    we() ? ($($(this).find("i")[1]).css("display", "none") ,
        $($(this).find("i")[0]).css("display", "inline")) : ($($(this).find("i")[1]).css("display", "inline"),
        $($(this).find("i")[0]).css("display", "none")),
        t = we(),
        a = document.documentElement,
        t ? document.exitFullscreen ? document.exitFullscreen() : document.webkitExitFullscreen ? document.webkitExitFullscreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.msExitFullscreen && document.msExitFullscreen() : a.requestFullscreen ? a.requestFullscreen() : a.mozRequestFullScreen ? a.mozRequestFullScreen() : a.webkitRequestFullScreen ? a.webkitRequestFullScreen() : a.msRequestFullscreen && a.msRequestFullscreen()
});

function A(e, t, a) {
    B = e;
    var o = $("#app-container");
    if (0 != o.length) {
        if (a = a || E(), 0 == $(".sub-menu ul[data-link='" + a + "']").length && (2 == B || t) && $(window).outerWidth() >= v && I("menu-default")) return t ? ($("#app-container").removeClass(W), $("#app-container").addClass("menu-default menu-sub-hidden sub-hidden"), B = 1) : ($("#app-container").removeClass(W), $("#app-container").addClass("menu-default main-hidden menu-sub-hidden sub-hidden"), B = 0), void T();
        if (0 == $(".sub-menu ul[data-link='" + a + "']").length && (1 == B || t) && $(window).outerWidth() >= v && I("menu-sub-hidden")) return t ? ($("#app-container").removeClass(W), $("#app-container").addClass("menu-sub-hidden sub-hidden"), B = 0) : ($("#app-container").removeClass(W), $("#app-container").addClass("menu-sub-hidden main-hidden sub-hidden"), B = -1), void T();
        if (0 == $(".sub-menu ul[data-link='" + a + "']").length && (1 == B || t) && $(window).outerWidth() >= v && I("menu-hidden")) return t ? ($("#app-container").removeClass(W), $("#app-container").addClass("menu-hidden main-hidden sub-hidden"), B = 0) : ($("#app-container").removeClass(W), $("#app-container").addClass("menu-hidden main-show-temporary"), B = 3), void T();
        e % 4 == 0 ? (I("menu-default") && I("menu-sub-hidden") ? nextClasses = "menu-default menu-sub-hidden" : I("menu-default") ? nextClasses = "menu-default" : I("menu-sub-hidden") ? nextClasses = "menu-sub-hidden" : I("menu-hidden") && (nextClasses = "menu-hidden"), B = 0) : e % 4 == 1 ? I("menu-default") && I("menu-sub-hidden") ? nextClasses = "menu-default menu-sub-hidden main-hidden sub-hidden" : I("menu-default") ? nextClasses = "menu-default sub-hidden" : I("menu-sub-hidden") ? nextClasses = "menu-sub-hidden main-hidden sub-hidden" : I("menu-hidden") && (nextClasses = "menu-hidden main-show-temporary") : e % 4 == 2 ? I("menu-default") && I("menu-sub-hidden") ? nextClasses = "menu-default menu-sub-hidden sub-hidden" : I("menu-default") ? nextClasses = "menu-default main-hidden sub-hidden" : I("menu-sub-hidden") ? nextClasses = "menu-sub-hidden sub-hidden" : I("menu-hidden") && (nextClasses = "menu-hidden main-show-temporary sub-show-temporary") : e % 4 == 3 && (I("menu-default") && I("menu-sub-hidden") ? nextClasses = "menu-default menu-sub-hidden sub-show-temporary" : I("menu-default") ? nextClasses = "menu-default sub-hidden" : I("menu-sub-hidden") ? nextClasses = "menu-sub-hidden sub-show-temporary" : I("menu-hidden") && (nextClasses = "menu-hidden main-show-temporary")), I("menu-mobile") && (nextClasses += " menu-mobile"), o.removeClass(W), o.addClass(nextClasses), T()
    }
}

var B = 0,
W = "menu-default menu-hidden sub-hidden main-hidden menu-sub-hidden main-show-temporary sub-show-temporary menu-mobile";
$(".menu-button").on("click", function(e) {
    e.preventDefault(), A(++B)
})
;$(".menu-button-mobile").on("click", function(e) {
    return e.preventDefault(), $("#app-container").removeClass("sub-show-temporary").toggleClass("main-show-temporary"), !1
});
$(".main-menu").on("click", "a", function(e) {
    e.preventDefault();
    var t = $(this).attr("href").replace("#", "");
    if (0 != $(".sub-menu ul[data-link='" + t + "']").length) return R($(this).attr("href")), $("#app-container"), $("#app-container").hasClass("menu-mobile") ? $("#app-container").addClass("sub-show-temporary") : !$("#app-container").hasClass("menu-sub-hidden") || 2 != B && 0 != B ? !$("#app-container").hasClass("menu-hidden") || 1 != B && 3 != B ? !$("#app-container").hasClass("menu-default") || $("#app-container").hasClass("menu-sub-hidden") || 1 != B && 3 != B || A(0, !1, t) : A(2, !1, t) : A(3, !1, t), !1;
    window.location.href = t
});
$(document).on("click", function(e) {
    $(e.target).parents().hasClass("menu-button") || $(e.target).hasClass("menu-button") || $(e.target).parents().hasClass("sidebar") || $(e.target).hasClass("sidebar") || ($("#app-container").hasClass("menu-sub-hidden") && 3 == B ? A(E() == P ? 2 : 0) : ($("#app-container").hasClass("menu-hidden") || $("#app-container").hasClass("menu-mobile")) && A(0))
});

function E() {
    return $(".main-menu ul li.active a").attr("href").replace("#", "")
}

function I(e) {
    return $("#app-container").attr("class").split(" ").filter(e => "" != e).includes(e)
}
var P = "";

function R(e) {
    if (0 != $(".main-menu").length) {
        var t = e.replace("#", "");
        if (0 == $(".sub-menu ul[data-link='" + t + "']").length) {
            if ($("#app-container").removeClass("sub-show-temporary"), 0 == $("#app-container").length) return;
            return B = I("menu-sub-hidden") || I("menu-hidden") ? 0 : 1, $("#app-container").addClass("sub-hidden"), $(".sub-menu").addClass("no-transition"), $("main").addClass("no-transition"), void setTimeout(function() {
                $(".sub-menu").removeClass("no-transition"), $("main").removeClass("no-transition")
            }, 350)
        }
        t != P && ($(".sub-menu ul").fadeOut(0), $(".sub-menu ul[data-link='" + t + "']").slideDown(100), $(".sub-menu .scroll").scrollTop(0), P = t)
    }
}

function T() {
    setTimeout(function() {
        var e = document.createEvent("HTMLEvents");
        e.initEvent("resize", !1, !1), window.dispatchEvent(e)
    }, 350)
}

$("#successButton").on("click", function(e) {
    e.preventDefault();
    var t = $(this);
    t.hasClass("show-fail") || t.hasClass("show-spinner") || t.hasClass("show-success") || (t.addClass("show-spinner"), t.addClass("active"), setTimeout(function() {
        t.addClass("show-success"), t.removeClass("show-spinner"), t.find(".icon.success").tooltip("show"), setTimeout(function() {
            t.removeClass("show-success"), t.removeClass("active"), t.find(".icon.success").tooltip("dispose")
        }, 2e3)
    }, 3e3))
});

$("#failButton").on("click", function(e) {
    e.preventDefault();
    var t = $(this);
    t.hasClass("show-fail") || t.hasClass("show-spinner") || t.hasClass("show-success") || (t.addClass("show-spinner"), t.addClass("active"), setTimeout(function() {
        t.addClass("show-fail"), t.removeClass("show-spinner"), t.find(".icon.fail").tooltip("show"), setTimeout(function() {
            t.removeClass("show-fail"), t.removeClass("active"), t.find(".icon.fail").tooltip("dispose")
        }, 2e3)
    }, 3e3))
});

function x() {
    var e = $(window).outerHeight(),
        t = $(window).outerWidth(),
        o = $(".navbar").outerHeight() ;
    var n = parseInt($(".sub-menu .scroll").css("margin-top"), 10);
}

$(window).on("resize", function(e) {
    e.originalEvent.isTrusted && x()
}), x(), $(".search .search-icon").on("click", function() {
    $(window).outerWidth() < w ? $(".search").hasClass("mobile-view") ? ($(".search").removeClass("mobile-view"), k()) : ($(".search").addClass("mobile-view"), $(".search input").focus()) : k()
}), $(".search input").on("keyup", function(e) {
    13 == e.which && k(), 27 == e.which && S()
}), $(document).on("click", function(e) {
    $(e.target).parents().hasClass("search") || S()
});

function k() {
    var e = $(".search input").val(),
        t = $(".search").data("searchPath");
    "" != e && ($(".search input").val(""), window.location.href = t + e)
}
function S() {
    $(".search").hasClass("mobile-view") && ($(".search").removeClass("mobile-view"), $(".search input").val(""))
}

$("body > *").stop().delay(100).animate({
    opacity: 1
}, 300), $("body").removeClass("show-spinner"), $("main").addClass("default-transition"), $(".sub-menu").addClass("default-transition"), $(".main-menu").addClass("default-transition"), $(".theme-colors").addClass("default-transition"), "undefined" != typeof Mousetrap && (Mousetrap.bind(["ctrl+down", "command+down"], function(e) {
    var t = $(".sub-menu li.active").next();
    return 0 == t.length && (t = $(".sub-menu li.active").parent().children().first()), window.location.href = t.find("a").attr("href"), !1
}), Mousetrap.bind(["ctrl+up", "command+up"], function(e) {
    var t = $(".sub-menu li.active").prev();
    return 0 == t.length && (t = $(".sub-menu li.active").parent().children().last()), window.location.href = t.find("a").attr("href"), !1
}), Mousetrap.bind(["ctrl+shift+down", "command+shift+down"], function(e) {
    var t = $(".main-menu li.active").next();
    0 == t.length && (t = $(".main-menu li:first-of-type"));
    var a = t.find("a").attr("href").replace("#", ""),
        o = $(".sub-menu ul[data-link='" + a + "'] li:first-of-type");
    return window.location.href = o.find("a").attr("href"), !1
}), Mousetrap.bind(["ctrl+shift+up", "command+shift+up"], function(e) {
    var t = $(".main-menu li.active").prev();
    0 == t.length && (t = $(".main-menu li:last-of-type"));
    var a = t.find("a").attr("href").replace("#", ""),
        o = $(".sub-menu ul[data-link='" + a + "'] li:first-of-type");
    return window.location.href = o.find("a").attr("href"), !1
}), $(".list") && $(".list").length > 0 && (Mousetrap.bind(["ctrl+a", "command+a"], function(e) {
    return $(".list").shiftSelectable().data("shiftSelectable").selectAll(), !1
}), Mousetrap.bind(["ctrl+d", "command+d"], function(e) {
    return $(".list").shiftSelectable().data("shiftSelectable").deSelectAll(), !1
}))), $().contextMenu && $.contextMenu({
    selector: ".list .card",
    callback: function(e, t) {},
    events: {
        show: function(e) {
            var t = e.$trigger.parents(".list");
            t && t.length > 0 && t.data("shiftSelectable").rightClick(e.$trigger)
        }
    },
    items: {
        copy: {
            name: "Copy",
            className: "simple-icon-docs"
        },
        archive: {
            name: "Move to archive",
            className: "simple-icon-drawer"
        },
        delete: {
            name: "Delete",
            className: "simple-icon-trash"
        }
    }
})
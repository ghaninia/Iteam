window._ = require('lodash');
Snackbar = require("node-snackbar") ;
NProgress = require("nprogress") ;

window.$ = window.jQuery = require('jquery');

const ProgressBar = require('progressbar.js') ;
window.axios = require('axios');
window.alertify = require("alertifyjs") ;


try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    require('bootstrap');
} catch (e) {}
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
if (options.token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = options.token ;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/* 03.16. Tooltip */
if ($().tooltip) {
    $('[data-toggle="tooltip"]').tooltip();
}

$.fn.addCommas = function(nStr) {
    nStr += "";
    var x = nStr.split(".");
    var x1 = x[0];
    var x2 = x.length > 1 ? "." + x[1] : "";
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, "$1" + "," + "$2");
    }
    return x1 + x2;
};

/* 02. Shift Select Plugin */
$.shiftSelectable = function(element, config) {
    var plugin = this;
    config = $.extend(
        {
            items: ".card"
        },
        config
    );
    var $container = $(element);
    var $checkAll = null;
    var $boxes = $container.find("input[type='checkbox']");

    var lastChecked;
    if ($container.data("checkAll")) {
        $checkAll = $("#" + $container.data("checkAll"));
        $checkAll.on("click", function() {
            $boxes.prop("checked", $($checkAll).prop("checked")).trigger("change");
            document.activeElement.blur();
            controlActiveClasses();
        });
    }

    function itemClick(checkbox, shiftKey) {
        $(checkbox)
            .prop("checked", !$(checkbox).prop("checked"))
            .trigger("change");

        if (!lastChecked) {
            lastChecked = checkbox;
        }
        if (lastChecked) {
            if (shiftKey) {
                var start = $boxes.index(checkbox);
                var end = $boxes.index(lastChecked);
                $boxes
                    .slice(Math.min(start, end), Math.max(start, end) + 1)
                    .prop("checked", lastChecked.checked)
                    .trigger("change");
            }
            lastChecked = checkbox;
        }

        if ($checkAll) {
            var anyChecked = false;
            var allChecked = true;
            $boxes.each(function() {
                if ($(this).prop("checked")) {
                    anyChecked = true;
                } else {
                    allChecked = false;
                }
            });
            if (anyChecked) {
                $checkAll.prop("indeterminate", anyChecked);
            } else {
                $checkAll.prop("indeterminate", anyChecked);
                $checkAll.prop("checked", anyChecked);
            }
            if (allChecked) {
                $checkAll.prop("indeterminate", false);
                $checkAll.prop("checked", allChecked);
            }
        }
        document.activeElement.blur();
        controlActiveClasses();
    }

    $container.on("click", config.items, function(e) {
        if (
            $(e.target).is("a") ||
            $(e.target)
                .parent()
                .is("a")
        ) {
            return;
        }

        if ($(e.target).is("input[type='checkbox']")) {
            e.preventDefault();
            e.stopPropagation();
        }
        var checkbox = $(this).find("input[type='checkbox']")[0];
        itemClick(checkbox, e.shiftKey);
    });

    function controlActiveClasses() {
        $boxes.each(function() {
            if ($(this).prop("checked")) {
                $(this)
                    .parents(".card")
                    .addClass("active");
            } else {
                $(this)
                    .parents(".card")
                    .removeClass("active");
            }
        });
    }

    plugin.selectAll = function() {
        if ($checkAll) {
            $boxes.prop("checked", true).trigger("change");
            $checkAll.prop("checked", true);
            $checkAll.prop("indeterminate", false);
            controlActiveClasses();
        }
    };

    plugin.deSelectAll = function() {
        if ($checkAll) {
            $boxes.prop("checked", false).trigger("change");
            $checkAll.prop("checked", false);
            $checkAll.prop("indeterminate", false);
            controlActiveClasses();
        }
    };

    plugin.rightClick = function(trigger) {
        var checkbox = $(trigger).find("input[type='checkbox']")[0];
        if ($(checkbox).prop("checked")) {
            return;
        }
        plugin.deSelectAll();
        itemClick(checkbox, false);
    };
};

$.fn.shiftSelectable = function(options) {
    return this.each(function() {
        if (undefined == $(this).data("shiftSelectable")) {
            var plugin = new $.shiftSelectable(this, options);
            $(this).data("shiftSelectable", plugin);
        }
    });
};


$(function () {

/* 03. Dore Main Plugin */
    var defaults = {};
    var plugin = this;
    plugin.settings = {};
    var $element = $(element);
    var element = element;

    var $shiftSelect;

    function init() {
        options = options || {};
        plugin.settings = $.extend({}, defaults, options);
        /* 03.01. Getting Colors from CSS */
        var rootStyle = getComputedStyle(document.body);
        var themeColor1 = rootStyle.getPropertyValue("--theme-color-1").trim();
        var themeColor2 = rootStyle.getPropertyValue("--theme-color-2").trim();
        var themeColor3 = rootStyle.getPropertyValue("--theme-color-3").trim();
        var themeColor4 = rootStyle.getPropertyValue("--theme-color-4").trim();
        var themeColor5 = rootStyle.getPropertyValue("--theme-color-5").trim();
        var themeColor6 = rootStyle.getPropertyValue("--theme-color-6").trim();
        var themeColor1_10 = rootStyle
            .getPropertyValue("--theme-color-1-10")
            .trim();
        var themeColor2_10 = rootStyle
            .getPropertyValue("--theme-color-2-10")
            .trim();
        var themeColor3_10 = rootStyle
            .getPropertyValue("--theme-color-3-10")
            .trim();
        var themeColor4_10 = rootStyle
            .getPropertyValue("--theme-color-4-10")
            .trim();

        var themeColor5_10 = rootStyle
            .getPropertyValue("--theme-color-5-10")
            .trim();
        var themeColor6_10 = rootStyle
            .getPropertyValue("--theme-color-6-10")
            .trim();

        var primaryColor = rootStyle.getPropertyValue("--primary-color").trim();
        var foregroundColor = rootStyle
            .getPropertyValue("--foreground-color")
            .trim();
        var separatorColor = rootStyle.getPropertyValue("--separator-color").trim();

        /* 03.02. Resize */
        var subHiddenBreakpoint = 1440;
        var searchHiddenBreakpoint = 768;
        var menuHiddenBreakpoint = 768;
        var subHiddenByClick = false;
        var firstInit = true;

        function onResize() {
            var windowHeight = $(window).outerHeight();
            var windowWidth = $(window).outerWidth();
            var navbarHeight = $(".navbar").outerHeight();

            var submenuMargin = parseInt(
                $(".sub-menu .scroll").css("margin-top"),
                10
            );
            $(".sub-menu .scroll").css(
                "height",
                windowHeight - navbarHeight - submenuMargin * 2
            );

            $(".main-menu .scroll").css("height", windowHeight - navbarHeight);
            $(".app-menu .scroll").css("height", windowHeight - navbarHeight - 40);

            if ($(".chat-app .scroll").length > 0 && chatAppScroll) {
                $(".chat-app .scroll").scrollTop(
                    $(".chat-app .scroll").prop("scrollHeight")
                );
                chatAppScroll.update();
            }

            if (windowWidth < menuHiddenBreakpoint) {
                $("#app-container").addClass("menu-mobile");
            } else if (windowWidth < subHiddenBreakpoint) {
                $("#app-container").removeClass("menu-mobile");
                if ($("#app-container").hasClass("menu-default")) {
                    // $("#app-container").attr("class", "menu-default menu-sub-hidden");
                    $("#app-container").removeClass(allMenuClassNames);
                    $("#app-container").addClass("menu-default menu-sub-hidden");
                }
            } else {
                $("#app-container").removeClass("menu-mobile");
                if (
                    $("#app-container").hasClass("menu-default") &&
                    $("#app-container").hasClass("menu-sub-hidden")
                ) {
                    $("#app-container").removeClass("menu-sub-hidden");
                }
            }

            setMenuClassNames(0, true);
        }

        $(window).on("resize", function(event) {
            if (event.originalEvent.isTrusted) {
                onResize();
            }
        });
        onResize();

        /* 03.03. Search */
        function searchIconClick() {
            if ($(window).outerWidth() < searchHiddenBreakpoint) {
                if ($(".search").hasClass("mobile-view")) {
                    $(".search").removeClass("mobile-view");
                    navigateToSearchPage();
                } else {
                    $(".search").addClass("mobile-view");
                    $(".search input").focus();
                }
            } else {
                navigateToSearchPage();
            }
        }

        $(".search .search-icon").on("click", function() {
            searchIconClick();
        });

        $(".search input").on("keyup", function(e) {
            if (e.which == 13) {
                navigateToSearchPage();
            }
            if (e.which == 27) {
                hideSearchArea();
            }
        });

        function navigateToSearchPage() {
            var inputVal = $(".search input").val();
            var searchPath = $(".search").data("searchPath");
            if (inputVal != "") {
                $(".search input").val("");
                window.location.href = searchPath + inputVal;
            }
        }

        function hideSearchArea() {
            if ($(".search").hasClass("mobile-view")) {
                $(".search").removeClass("mobile-view");
                $(".search input").val("");
            }
        }

        $(document).on("click", function(event) {
            if (
                !$(event.target)
                    .parents()
                    .hasClass("search")
            ) {
                hideSearchArea();
            }
        });

        /* 03.04. Shift Selectable Init */
        $shiftSelect = $(".list").shiftSelectable();

        /* 03.05. Menu */
        var menuClickCount = 0;
        var allMenuClassNames = "menu-default menu-hidden sub-hidden main-hidden menu-sub-hidden main-show-temporary sub-show-temporary menu-mobile";
        function setMenuClassNames(clickIndex, calledFromResize, link) {
            menuClickCount = clickIndex;
            var container = $("#app-container");
            if (container.length == 0) {
                return;
            }

            var link = link || getActiveMainMenuLink();

            //menu-default no subpage
            if (
                $(".sub-menu ul[data-link='" + link + "']").length == 0 &&
                (menuClickCount == 2 || calledFromResize)
            ) {
                if ($(window).outerWidth() >= menuHiddenBreakpoint) {
                    if (isClassIncludedApp("menu-default")) {
                        if (calledFromResize) {
                            // $("#app-container").attr(
                            //   "class",
                            //   "menu-default menu-sub-hidden sub-hidden"
                            // );
                            $("#app-container").removeClass(allMenuClassNames);
                            $("#app-container").addClass("menu-default menu-sub-hidden sub-hidden");
                            menuClickCount = 1;
                        } else {
                            // $("#app-container").attr(
                            //   "class",
                            //   "menu-default main-hidden menu-sub-hidden sub-hidden"
                            // );
                            $("#app-container").removeClass(allMenuClassNames);
                            $("#app-container").addClass("menu-default main-hidden menu-sub-hidden sub-hidden");

                            menuClickCount = 0;
                        }
                        resizeCarousel();
                        return;
                    }
                }
            }

            //menu-sub-hidden no subpage
            if (
                $(".sub-menu ul[data-link='" + link + "']").length == 0 &&
                (menuClickCount == 1 || calledFromResize)
            ) {
                if ($(window).outerWidth() >= menuHiddenBreakpoint) {
                    if (isClassIncludedApp("menu-sub-hidden")) {
                        if (calledFromResize) {
                            // $("#app-container").attr("class", "menu-sub-hidden sub-hidden");
                            $("#app-container").removeClass(allMenuClassNames);
                            $("#app-container").addClass("menu-sub-hidden sub-hidden");
                            menuClickCount = 0;
                        } else {
                            // $("#app-container").attr(
                            //   "class",
                            //   "menu-sub-hidden main-hidden sub-hidden"
                            // );
                            $("#app-container").removeClass(allMenuClassNames);
                            $("#app-container").addClass("menu-sub-hidden main-hidden sub-hidden");
                            menuClickCount = -1;
                        }
                        resizeCarousel();
                        return;
                    }
                }
            }

            //menu-sub-hidden no subpage
            if (
                $(".sub-menu ul[data-link='" + link + "']").length == 0 &&
                (menuClickCount == 1 || calledFromResize)
            ) {
                if ($(window).outerWidth() >= menuHiddenBreakpoint) {
                    if (isClassIncludedApp("menu-hidden")) {
                        if (calledFromResize) {
                            // $("#app-container").attr(
                            //   "class",
                            //   "menu-hidden main-hidden sub-hidden"
                            // );
                            $("#app-container").removeClass(allMenuClassNames);
                            $("#app-container").addClass("menu-hidden main-hidden sub-hidden");

                            menuClickCount = 0;
                        } else {
                            // $("#app-container").attr(
                            //   "class",
                            //   "menu-hidden main-show-temporary"
                            // );
                            $("#app-container").removeClass(allMenuClassNames);
                            $("#app-container").addClass("menu-hidden main-show-temporary");

                            menuClickCount = 3;
                        }
                        resizeCarousel();
                        return;
                    }
                }
            }

            if (clickIndex % 4 == 0) {
                if (
                    isClassIncludedApp("menu-default") &&
                    isClassIncludedApp("menu-sub-hidden")
                ) {
                    nextClasses = "menu-default menu-sub-hidden";
                } else if (isClassIncludedApp("menu-default")) {
                    nextClasses = "menu-default";
                } else if (isClassIncludedApp("menu-sub-hidden")) {
                    nextClasses = "menu-sub-hidden";
                } else if (isClassIncludedApp("menu-hidden")) {
                    nextClasses = "menu-hidden";
                }
                menuClickCount = 0;
            } else if (clickIndex % 4 == 1) {
                if (
                    isClassIncludedApp("menu-default") &&
                    isClassIncludedApp("menu-sub-hidden")
                ) {
                    nextClasses = "menu-default menu-sub-hidden main-hidden sub-hidden";
                } else if (isClassIncludedApp("menu-default")) {
                    nextClasses = "menu-default sub-hidden";
                } else if (isClassIncludedApp("menu-sub-hidden")) {
                    nextClasses = "menu-sub-hidden main-hidden sub-hidden";
                } else if (isClassIncludedApp("menu-hidden")) {
                    nextClasses = "menu-hidden main-show-temporary";
                }
            } else if (clickIndex % 4 == 2) {
                if (
                    isClassIncludedApp("menu-default") &&
                    isClassIncludedApp("menu-sub-hidden")
                ) {
                    nextClasses = "menu-default menu-sub-hidden sub-hidden";
                } else if (isClassIncludedApp("menu-default")) {
                    nextClasses = "menu-default main-hidden sub-hidden";
                } else if (isClassIncludedApp("menu-sub-hidden")) {
                    nextClasses = "menu-sub-hidden sub-hidden";
                } else if (isClassIncludedApp("menu-hidden")) {
                    nextClasses = "menu-hidden main-show-temporary sub-show-temporary";
                }
            } else if (clickIndex % 4 == 3) {
                if (
                    isClassIncludedApp("menu-default") &&
                    isClassIncludedApp("menu-sub-hidden")
                ) {
                    nextClasses = "menu-default menu-sub-hidden sub-show-temporary";
                } else if (isClassIncludedApp("menu-default")) {
                    nextClasses = "menu-default sub-hidden";
                } else if (isClassIncludedApp("menu-sub-hidden")) {
                    nextClasses = "menu-sub-hidden sub-show-temporary";
                } else if (isClassIncludedApp("menu-hidden")) {
                    nextClasses = "menu-hidden main-show-temporary";
                }
            }
            if (isClassIncludedApp("menu-mobile")) {
                nextClasses += " menu-mobile";
            }
            // container.attr("class", nextClasses);
            container.removeClass(allMenuClassNames);
            container.addClass(nextClasses);
            resizeCarousel();
        }
        $(".menu-button").on("click", function(event) {
            event.preventDefault();
            setMenuClassNames(++menuClickCount);
        });

        $(".menu-button-mobile").on("click", function(event) {
            event.preventDefault();
            $("#app-container")
                .removeClass("sub-show-temporary")
                .toggleClass("main-show-temporary");
            return false;
        });

        $(".main-menu").on("click", "a", function(event) {
            event.preventDefault();

            var link = $(this)
                .attr("href")
                .replace("#", "");

            if ($(".sub-menu ul[data-link='" + link + "']").length == 0) {
                window.location.href = link;
                return;
            }

            showSubMenu($(this).attr("href"));
            var container = $("#app-container");
            if (!$("#app-container").hasClass("menu-mobile")) {
                if (
                    $("#app-container").hasClass("menu-sub-hidden") &&
                    (menuClickCount == 2 || menuClickCount == 0)
                ) {
                    setMenuClassNames(3, false, link);
                } else if (
                    $("#app-container").hasClass("menu-hidden") &&
                    (menuClickCount == 1 || menuClickCount == 3)
                ) {
                    setMenuClassNames(2, false, link);
                } else if (
                    $("#app-container").hasClass("menu-default") &&
                    !$("#app-container").hasClass("menu-sub-hidden") &&
                    (menuClickCount == 1 || menuClickCount == 3)
                ) {
                    setMenuClassNames(0, false, link);
                }
            } else {
                $("#app-container").addClass("sub-show-temporary");
            }
            return false;
        });

        $(document).on("click", function(event) {
            if (
                !(
                    $(event.target)
                        .parents()
                        .hasClass("menu-button") ||
                    $(event.target).hasClass("menu-button") ||
                    $(event.target)
                        .parents()
                        .hasClass("sidebar") ||
                    $(event.target).hasClass("sidebar")
                )
            ) {
                if (
                    $("#app-container").hasClass("menu-sub-hidden") &&
                    menuClickCount == 3
                ) {
                    var link = getActiveMainMenuLink();

                    if (link == lastActiveSubmenu) {
                        setMenuClassNames(2);
                    } else {
                        setMenuClassNames(0);
                    }
                } else if (
                    $("#app-container").hasClass("menu-hidden") ||
                    $("#app-container").hasClass("menu-mobile")
                ) {
                    setMenuClassNames(0);
                }
            }
        });

        function getActiveMainMenuLink() {
            var dataLink = $(".main-menu ul li.active a").attr("href");
            return dataLink.replace("#", "");
        }

        function isClassIncludedApp(className) {
            var container = $("#app-container");
            var currentClasses = container
                .attr("class")
                .split(" ")
                .filter(x => x != "");
            return currentClasses.includes(className);
        }

        var lastActiveSubmenu = "";
        function showSubMenu(dataLink) {
            if ($(".main-menu").length == 0) {
                return;
            }

            var link = dataLink.replace("#", "");
            if ($(".sub-menu ul[data-link='" + link + "']").length == 0) {
                $("#app-container").removeClass("sub-show-temporary");

                if ($("#app-container").length == 0) {
                    return;
                }

                if (
                    isClassIncludedApp("menu-sub-hidden") ||
                    isClassIncludedApp("menu-hidden")
                ) {
                    menuClickCount = 0;
                } else {
                    menuClickCount = 1;
                }
                $("#app-container").addClass("sub-hidden");
                noTransition();
                return;
            }
            if (link == lastActiveSubmenu) {
                return;
            }
            $(".sub-menu ul").fadeOut(0);
            $(".sub-menu ul[data-link='" + link + "']").slideDown(100);

            $(".sub-menu .scroll").scrollTop(0);
            lastActiveSubmenu = link;
        }

        function noTransition() {
            $(".sub-menu").addClass("no-transition");
            $("main").addClass("no-transition");
            setTimeout(function() {
                $(".sub-menu").removeClass("no-transition");
                $("main").removeClass("no-transition");
            }, 350);
        }

        showSubMenu($(".main-menu ul li.active a").attr("href"));

        function resizeCarousel() {
            setTimeout(function() {
                var event = document.createEvent("HTMLEvents");
                event.initEvent("resize", false, false);
                window.dispatchEvent(event);
            }, 350);
        }

        /* 03.06. App Menu */
        $(".app-menu-button").on("click", function() {
            event.preventDefault();
            if ($(".app-menu").hasClass("shown")) {
                $(".app-menu").removeClass("shown");
            } else {
                $(".app-menu").addClass("shown");
            }
        });

        $(document).on("click", function(event) {
            if (
                !(
                    $(event.target)
                        .parents()
                        .hasClass("app-menu") ||
                    $(event.target)
                        .parents()
                        .hasClass("app-menu-button") ||
                    $(event.target).hasClass("app-menu-button") ||
                    $(event.target).hasClass("app-menu")
                )
            ) {
                if ($(".app-menu").hasClass("shown")) {
                    $(".app-menu").removeClass("shown");
                }
            }
        });

        /* 03.07. Survey App */
        $(document).on("click", ".question .view-button", function() {
            editViewClick($(this));
        });

        $(document).on("click", ".question .edit-button", function() {
            editViewClick($(this));
        });

        function editViewClick($this) {
            var $question = $($this.parents(".question"));
            $question.toggleClass("edit-quesiton");
            $question.toggleClass("view-quesiton");
            var $questionCollapse = $question.find(".question-collapse");
            if (!$questionCollapse.hasClass("show")) {
                $questionCollapse.collapse("toggle");
                $question.find(".rotate-icon-click").toggleClass("rotate");
            }
        }

        /* 03.08. Rotate Button */
        $(document).on("click", ".rotate-icon-click", function() {
            $(this).toggleClass("rotate");
        });

        /* 03.09. Charts */
        if (typeof Chart !== "undefined") {
            Chart.defaults.global.defaultFontFamily = "'Nunito', sans-serif";

            Chart.defaults.LineWithShadow = Chart.defaults.line;
            Chart.controllers.LineWithShadow = Chart.controllers.line.extend({
                draw: function(ease) {
                    Chart.controllers.line.prototype.draw.call(this, ease);
                    var ctx = this.chart.ctx;
                    ctx.save();
                    ctx.shadowColor = "rgba(0,0,0,0.15)";
                    ctx.shadowBlur = 10;
                    ctx.shadowOffsetX = 0;
                    ctx.shadowOffsetY = 10;
                    ctx.responsive = true;
                    ctx.stroke();
                    Chart.controllers.line.prototype.draw.apply(this, arguments);
                    ctx.restore();
                }
            });

            Chart.defaults.BarWithShadow = Chart.defaults.bar;
            Chart.controllers.BarWithShadow = Chart.controllers.bar.extend({
                draw: function(ease) {
                    Chart.controllers.bar.prototype.draw.call(this, ease);
                    var ctx = this.chart.ctx;
                    ctx.save();
                    ctx.shadowColor = "rgba(0,0,0,0.15)";
                    ctx.shadowBlur = 12;
                    ctx.shadowOffsetX = 5;
                    ctx.shadowOffsetY = 10;
                    ctx.responsive = true;
                    Chart.controllers.bar.prototype.draw.apply(this, arguments);
                    ctx.restore();
                }
            });

            Chart.defaults.LineWithLine = Chart.defaults.line;
            Chart.controllers.LineWithLine = Chart.controllers.line.extend({
                draw: function(ease) {
                    Chart.controllers.line.prototype.draw.call(this, ease);

                    if (this.chart.tooltip._active && this.chart.tooltip._active.length) {
                        var activePoint = this.chart.tooltip._active[0];
                        var ctx = this.chart.ctx;
                        var x = activePoint.tooltipPosition().x;
                        var topY = this.chart.scales["y-axis-0"].top;
                        var bottomY = this.chart.scales["y-axis-0"].bottom;

                        ctx.save();
                        ctx.beginPath();
                        ctx.moveTo(x, topY);
                        ctx.lineTo(x, bottomY);
                        ctx.lineWidth = 1;
                        ctx.strokeStyle = "rgba(0,0,0,0.1)";
                        ctx.stroke();
                        ctx.restore();
                    }
                }
            });

            Chart.defaults.DoughnutWithShadow = Chart.defaults.doughnut;
            Chart.controllers.DoughnutWithShadow = Chart.controllers.doughnut.extend({
                draw: function(ease) {
                    Chart.controllers.doughnut.prototype.draw.call(this, ease);
                    let ctx = this.chart.chart.ctx;
                    ctx.save();
                    ctx.shadowColor = "rgba(0,0,0,0.15)";
                    ctx.shadowBlur = 10;
                    ctx.shadowOffsetX = 0;
                    ctx.shadowOffsetY = 10;
                    ctx.responsive = true;
                    Chart.controllers.doughnut.prototype.draw.apply(this, arguments);
                    ctx.restore();
                }
            });

            Chart.defaults.PieWithShadow = Chart.defaults.pie;
            Chart.controllers.PieWithShadow = Chart.controllers.pie.extend({
                draw: function(ease) {
                    Chart.controllers.pie.prototype.draw.call(this, ease);
                    let ctx = this.chart.chart.ctx;
                    ctx.save();
                    ctx.shadowColor = "rgba(0,0,0,0.15)";
                    ctx.shadowBlur = 10;
                    ctx.shadowOffsetX = 0;
                    ctx.shadowOffsetY = 10;
                    ctx.responsive = true;
                    Chart.controllers.pie.prototype.draw.apply(this, arguments);
                    ctx.restore();
                }
            });

            Chart.defaults.ScatterWithShadow = Chart.defaults.scatter;
            Chart.controllers.ScatterWithShadow = Chart.controllers.scatter.extend({
                draw: function(ease) {
                    Chart.controllers.scatter.prototype.draw.call(this, ease);
                    let ctx = this.chart.chart.ctx;
                    ctx.save();
                    ctx.shadowColor = "rgba(0,0,0,0.2)";
                    ctx.shadowBlur = 7;
                    ctx.shadowOffsetX = 0;
                    ctx.shadowOffsetY = 7;
                    ctx.responsive = true;
                    Chart.controllers.scatter.prototype.draw.apply(this, arguments);
                    ctx.restore();
                }
            });

            Chart.defaults.RadarWithShadow = Chart.defaults.radar;
            Chart.controllers.RadarWithShadow = Chart.controllers.radar.extend({
                draw: function(ease) {
                    Chart.controllers.radar.prototype.draw.call(this, ease);
                    let ctx = this.chart.chart.ctx;
                    ctx.save();
                    ctx.shadowColor = "rgba(0,0,0,0.2)";
                    ctx.shadowBlur = 7;
                    ctx.shadowOffsetX = 0;
                    ctx.shadowOffsetY = 7;
                    ctx.responsive = true;
                    Chart.controllers.radar.prototype.draw.apply(this, arguments);
                    ctx.restore();
                }
            });

            Chart.defaults.PolarWithShadow = Chart.defaults.polarArea;
            Chart.controllers.PolarWithShadow = Chart.controllers.polarArea.extend({
                draw: function(ease) {
                    Chart.controllers.polarArea.prototype.draw.call(this, ease);
                    let ctx = this.chart.chart.ctx;
                    ctx.save();
                    ctx.shadowColor = "rgba(0,0,0,0.2)";
                    ctx.shadowBlur = 10;
                    ctx.shadowOffsetX = 5;
                    ctx.shadowOffsetY = 10;
                    ctx.responsive = true;
                    Chart.controllers.polarArea.prototype.draw.apply(this, arguments);
                    ctx.restore();
                }
            });

            var chartTooltip = {
                backgroundColor: foregroundColor,
                titleFontColor: primaryColor,
                borderColor: separatorColor,
                borderWidth: 0.5,
                bodyFontColor: primaryColor,
                bodySpacing: 10,
                xPadding: 15,
                yPadding: 15,
                cornerRadius: 0.15,
                displayColors: false
            };

            if (document.getElementById("visitChartFull")) {
                var visitChartFull = document
                    .getElementById("visitChartFull")
                    .getContext("2d");
                var myChart = new Chart(visitChartFull, {
                    type: "LineWithShadow",
                    data: {
                        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                        datasets: [
                            {
                                label: "Data",
                                borderColor: themeColor1,
                                pointBorderColor: themeColor1,
                                pointBackgroundColor: themeColor1,
                                pointHoverBackgroundColor: themeColor1,
                                pointHoverBorderColor: themeColor1,
                                pointRadius: 3,
                                pointBorderWidth: 3,
                                pointHoverRadius: 3,
                                fill: true,
                                backgroundColor: themeColor1_10,
                                borderWidth: 2,
                                data: [180, 140, 150, 120, 180, 110, 160],
                                datalabels: {
                                    align: "end",
                                    anchor: "end"
                                }
                            }
                        ]
                    },
                    options: {
                        layout: {
                            padding: {
                                left: 0,
                                right: 0,
                                top: 40,
                                bottom: 0
                            }
                        },
                        plugins: {
                            datalabels: {
                                backgroundColor: "transparent",
                                borderRadius: 30,
                                borderWidth: 1,
                                padding: 5,
                                borderColor: function(context) {
                                    return context.dataset.borderColor;
                                },
                                color: function(context) {
                                    return context.dataset.borderColor;
                                },
                                font: {
                                    weight: "bold",
                                    size: 10
                                },
                                formatter: Math.round
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        tooltips: chartTooltip,
                        scales: {
                            yAxes: [
                                {
                                    ticks: {
                                        min: 0
                                    },
                                    display: false
                                }
                            ],
                            xAxes: [
                                {
                                    ticks: {
                                        min: 0
                                    },
                                    display: false
                                }
                            ]
                        }
                    }
                });
            }

            if (document.getElementById("visitChart")) {
                var visitChart = document.getElementById("visitChart").getContext("2d");
                var myChart = new Chart(visitChart, {
                    type: "LineWithShadow",
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [
                                {
                                    gridLines: {
                                        display: true,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: false
                                    },
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 5,
                                        min: 50,
                                        max: 70,
                                        padding: 0
                                    }
                                }
                            ],
                            xAxes: [
                                {
                                    gridLines: {
                                        display: false
                                    }
                                }
                            ]
                        },
                        legend: {
                            display: false
                        },
                        tooltips: chartTooltip
                    },
                    data: {
                        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                        datasets: [
                            {
                                label: "",
                                data: [54, 63, 60, 65, 60, 68, 60],
                                borderColor: themeColor1,
                                pointBackgroundColor: foregroundColor,
                                pointBorderColor: themeColor1,
                                pointHoverBackgroundColor: themeColor1,
                                pointHoverBorderColor: foregroundColor,
                                pointRadius: 4,
                                pointBorderWidth: 2,
                                pointHoverRadius: 5,
                                fill: true,
                                borderWidth: 2,
                                backgroundColor: themeColor1_10
                            }
                        ]
                    }
                });
            }

            if (document.getElementById("conversionChart")) {
                var conversionChart = document
                    .getElementById("conversionChart")
                    .getContext("2d");
                var myChart = new Chart(conversionChart, {
                    type: "LineWithShadow",
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [
                                {
                                    gridLines: {
                                        display: true,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: false
                                    },
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 5,
                                        min: 50,
                                        max: 70,
                                        padding: 0
                                    }
                                }
                            ],
                            xAxes: [
                                {
                                    gridLines: {
                                        display: false
                                    }
                                }
                            ]
                        },
                        legend: {
                            display: false
                        },
                        tooltips: chartTooltip
                    },
                    data: {
                        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                        datasets: [
                            {
                                label: "",
                                data: [65, 60, 68, 54, 63, 60, 60],
                                borderColor: themeColor2,
                                pointBackgroundColor: foregroundColor,
                                pointBorderColor: themeColor2,
                                pointHoverBackgroundColor: themeColor2,
                                pointHoverBorderColor: foregroundColor,
                                pointRadius: 4,
                                pointBorderWidth: 2,
                                pointHoverRadius: 5,
                                fill: true,
                                borderWidth: 2,
                                backgroundColor: themeColor2_10
                            }
                        ]
                    }
                });
            }

            var smallChartOptions = {
                layout: {
                    padding: {
                        left: 5,
                        right: 5,
                        top: 10,
                        bottom: 10
                    }
                },
                plugins: {
                    datalabels: {
                        display: false
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    intersect: false,
                    enabled: false,
                    custom: function(tooltipModel) {
                        if (tooltipModel && tooltipModel.dataPoints) {
                            var $textContainer = $(this._chart.canvas.offsetParent);
                            var yLabel = tooltipModel.dataPoints[0].yLabel;
                            var xLabel = tooltipModel.dataPoints[0].xLabel;
                            var label = tooltipModel.body[0].lines[0].split(":")[0];
                            $textContainer.find(".value").html("$" + $.fn.addCommas(yLabel));
                            $textContainer.find(".label").html(label + "-" + xLabel);
                        }
                    }
                },
                scales: {
                    yAxes: [
                        {
                            ticks: {
                                beginAtZero: true
                            },
                            display: false
                        }
                    ],
                    xAxes: [
                        {
                            display: false
                        }
                    ]
                }
            };

            var smallChartInit = {
                afterInit: function(chart, options) {
                    var $textContainer = $(chart.canvas.offsetParent);
                    var yLabel = chart.data.datasets[0].data[0];
                    var xLabel = chart.data.labels[0];
                    var label = chart.data.datasets[0].label;
                    $textContainer.find(".value").html("$" + $.fn.addCommas(yLabel));
                    $textContainer.find(".label").html(label + "-" + xLabel);
                }
            };

            if (document.getElementById("smallChart1")) {
                var smallChart1 = document
                    .getElementById("smallChart1")
                    .getContext("2d");
                var myChart = new Chart(smallChart1, {
                    type: "LineWithLine",
                    plugins: [smallChartInit],
                    data: {
                        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                        datasets: [
                            {
                                label: "Total Orders",
                                borderColor: themeColor1,
                                pointBorderColor: themeColor1,
                                pointHoverBackgroundColor: themeColor1,
                                pointHoverBorderColor: themeColor1,
                                pointRadius: 2,
                                pointBorderWidth: 3,
                                pointHoverRadius: 2,
                                fill: false,
                                borderWidth: 2,
                                data: [1250, 1300, 1550, 921, 1810, 1106, 1610],
                                datalabels: {
                                    align: "end",
                                    anchor: "end"
                                }
                            }
                        ]
                    },
                    options: smallChartOptions
                });
            }

            if (document.getElementById("smallChart2")) {
                var smallChart1 = document
                    .getElementById("smallChart2")
                    .getContext("2d");
                var myChart = new Chart(smallChart1, {
                    type: "LineWithLine",
                    plugins: [smallChartInit],
                    data: {
                        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                        datasets: [
                            {
                                label: "Pending Orders",
                                borderColor: themeColor1,
                                pointBorderColor: themeColor1,
                                pointHoverBackgroundColor: themeColor1,
                                pointHoverBorderColor: themeColor1,
                                pointRadius: 2,
                                pointBorderWidth: 3,
                                pointHoverRadius: 2,
                                fill: false,
                                borderWidth: 2,
                                data: [115, 120, 300, 222, 105, 85, 36],
                                datalabels: {
                                    align: "end",
                                    anchor: "end"
                                }
                            }
                        ]
                    },
                    options: smallChartOptions
                });
            }

            if (document.getElementById("smallChart3")) {
                var smallChart1 = document
                    .getElementById("smallChart3")
                    .getContext("2d");
                var myChart = new Chart(smallChart1, {
                    type: "LineWithLine",
                    plugins: [smallChartInit],
                    data: {
                        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                        datasets: [
                            {
                                label: "Active Orders",
                                borderColor: themeColor1,
                                pointBorderColor: themeColor1,
                                pointHoverBackgroundColor: themeColor1,
                                pointHoverBorderColor: themeColor1,
                                pointRadius: 2,
                                pointBorderWidth: 3,
                                pointHoverRadius: 2,
                                fill: false,
                                borderWidth: 2,
                                data: [350, 452, 762, 952, 630, 85, 158],
                                datalabels: {
                                    align: "end",
                                    anchor: "end"
                                }
                            }
                        ]
                    },
                    options: smallChartOptions
                });
            }

            if (document.getElementById("smallChart4")) {
                var smallChart1 = document
                    .getElementById("smallChart4")
                    .getContext("2d");
                var myChart = new Chart(smallChart1, {
                    type: "LineWithLine",
                    plugins: [smallChartInit],
                    data: {
                        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                        datasets: [
                            {
                                label: "Shipped Orders",
                                borderColor: themeColor1,
                                pointBorderColor: themeColor1,
                                pointHoverBackgroundColor: themeColor1,
                                pointHoverBorderColor: themeColor1,
                                pointRadius: 2,
                                pointBorderWidth: 3,
                                pointHoverRadius: 2,
                                fill: false,
                                borderWidth: 2,
                                data: [200, 452, 250, 630, 125, 85, 20],
                                datalabels: {
                                    align: "end",
                                    anchor: "end"
                                }
                            }
                        ]
                    },
                    options: smallChartOptions
                });
            }

            if (document.getElementById("salesChart")) {
                var salesChart = document.getElementById("salesChart").getContext("2d");
                var myChart = new Chart(salesChart, {
                    type: "LineWithShadow",
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [
                                {
                                    gridLines: {
                                        display: true,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: false
                                    },
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 5,
                                        min: 50,
                                        max: 70,
                                        padding: 20
                                    }
                                }
                            ],
                            xAxes: [
                                {
                                    gridLines: {
                                        display: false
                                    }
                                }
                            ]
                        },
                        legend: {
                            display: false
                        },
                        tooltips: chartTooltip
                    },
                    data: {
                        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                        datasets: [
                            {
                                label: "",
                                data: [54, 63, 60, 65, 60, 68, 60],
                                borderColor: themeColor1,
                                pointBackgroundColor: foregroundColor,
                                pointBorderColor: themeColor1,
                                pointHoverBackgroundColor: themeColor1,
                                pointHoverBorderColor: foregroundColor,
                                pointRadius: 6,
                                pointBorderWidth: 2,
                                pointHoverRadius: 8,
                                fill: false
                            }
                        ]
                    }
                });
            }

            if (document.getElementById("areaChart")) {
                var areaChart = document.getElementById("areaChart").getContext("2d");
                var myChart = new Chart(areaChart, {
                    type: "LineWithShadow",
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [
                                {
                                    gridLines: {
                                        display: true,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: false
                                    },
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 5,
                                        min: 50,
                                        max: 70,
                                        padding: 0
                                    }
                                }
                            ],
                            xAxes: [
                                {
                                    gridLines: {
                                        display: false
                                    }
                                }
                            ]
                        },
                        legend: {
                            display: false
                        },
                        tooltips: chartTooltip
                    },
                    data: {
                        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                        datasets: [
                            {
                                label: "",
                                data: [54, 63, 60, 65, 60, 68, 60],
                                borderColor: themeColor1,
                                pointBackgroundColor: foregroundColor,
                                pointBorderColor: themeColor1,
                                pointHoverBackgroundColor: themeColor1,
                                pointHoverBorderColor: foregroundColor,
                                pointRadius: 4,
                                pointBorderWidth: 2,
                                pointHoverRadius: 5,
                                fill: true,
                                borderWidth: 2,
                                backgroundColor: themeColor1_10
                            }
                        ]
                    }
                });
            }

            if (document.getElementById("areaChartNoShadow")) {
                var areaChartNoShadow = document
                    .getElementById("areaChartNoShadow")
                    .getContext("2d");
                var myChart = new Chart(areaChartNoShadow, {
                    type: "line",
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [
                                {
                                    gridLines: {
                                        display: true,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: false
                                    },
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 5,
                                        min: 50,
                                        max: 70,
                                        padding: 0
                                    }
                                }
                            ],
                            xAxes: [
                                {
                                    gridLines: {
                                        display: false
                                    }
                                }
                            ]
                        },
                        legend: {
                            display: false
                        },
                        tooltips: chartTooltip
                    },
                    data: {
                        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                        datasets: [
                            {
                                label: "",
                                data: [54, 63, 60, 65, 60, 68, 60],
                                borderColor: themeColor1,
                                pointBackgroundColor: foregroundColor,
                                pointBorderColor: themeColor1,
                                pointHoverBackgroundColor: themeColor1,
                                pointHoverBorderColor: foregroundColor,
                                pointRadius: 4,
                                pointBorderWidth: 2,
                                pointHoverRadius: 5,
                                fill: true,
                                borderWidth: 2,
                                backgroundColor: themeColor1_10
                            }
                        ]
                    }
                });
            }

            if (document.getElementById("scatterChart")) {
                var scatterChart = document
                    .getElementById("scatterChart")
                    .getContext("2d");
                var myChart = new Chart(scatterChart, {
                    type: "ScatterWithShadow",
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [
                                {
                                    gridLines: {
                                        display: true,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: false
                                    },
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 20,
                                        min: -80,
                                        max: 80,
                                        padding: 20
                                    }
                                }
                            ],
                            xAxes: [
                                {
                                    gridLines: {
                                        display: true,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)"
                                    }
                                }
                            ]
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 30,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    },
                    data: {
                        datasets: [
                            {
                                borderWidth: 2,
                                label: "Cakes",
                                borderColor: themeColor1,
                                backgroundColor: themeColor1_10,
                                data: [
                                    { x: 62, y: -78 },
                                    { x: -0, y: 74 },
                                    { x: -67, y: 45 },
                                    { x: -26, y: -43 },
                                    { x: -15, y: -30 },
                                    { x: 65, y: -68 },
                                    { x: -28, y: -61 }
                                ]
                            },
                            {
                                borderWidth: 2,
                                label: "Desserts",
                                borderColor: themeColor2,
                                backgroundColor: themeColor2_10,
                                data: [
                                    { x: 79, y: 62 },
                                    { x: 62, y: 0 },
                                    { x: -76, y: -81 },
                                    { x: -51, y: 41 },
                                    { x: -9, y: 9 },
                                    { x: 72, y: -37 },
                                    { x: 62, y: -26 }
                                ]
                            }
                        ]
                    }
                });
            }

            if (document.getElementById("scatterChartNoShadow")) {
                var scatterChartNoShadow = document
                    .getElementById("scatterChartNoShadow")
                    .getContext("2d");
                var myChart = new Chart(scatterChartNoShadow, {
                    type: "scatter",
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [
                                {
                                    gridLines: {
                                        display: true,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: false
                                    },
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 20,
                                        min: -80,
                                        max: 80,
                                        padding: 20
                                    }
                                }
                            ],
                            xAxes: [
                                {
                                    gridLines: {
                                        display: true,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)"
                                    }
                                }
                            ]
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 30,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    },
                    data: {
                        datasets: [
                            {
                                borderWidth: 2,
                                label: "Cakes",
                                borderColor: themeColor1,
                                backgroundColor: themeColor1_10,
                                data: [
                                    { x: 62, y: -78 },
                                    { x: -0, y: 74 },
                                    { x: -67, y: 45 },
                                    { x: -26, y: -43 },
                                    { x: -15, y: -30 },
                                    { x: 65, y: -68 },
                                    { x: -28, y: -61 }
                                ]
                            },
                            {
                                borderWidth: 2,
                                label: "Desserts",
                                borderColor: themeColor2,
                                backgroundColor: themeColor2_10,
                                data: [
                                    { x: 79, y: 62 },
                                    { x: 62, y: 0 },
                                    { x: -76, y: -81 },
                                    { x: -51, y: 41 },
                                    { x: -9, y: 9 },
                                    { x: 72, y: -37 },
                                    { x: 62, y: -26 }
                                ]
                            }
                        ]
                    }
                });
            }

            if (document.getElementById("radarChartNoShadow")) {
                var radarChartNoShadow = document
                    .getElementById("radarChartNoShadow")
                    .getContext("2d");
                var myChart = new Chart(radarChartNoShadow, {
                    type: "radar",
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scale: {
                            ticks: {
                                display: false
                            }
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 30,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    },
                    data: {
                        datasets: [
                            {
                                label: "Stock",
                                borderWidth: 2,
                                pointBackgroundColor: themeColor1,
                                borderColor: themeColor1,
                                backgroundColor: themeColor1_10,
                                data: [80, 90, 70]
                            },
                            {
                                label: "Order",
                                borderWidth: 2,
                                pointBackgroundColor: themeColor2,
                                borderColor: themeColor2,
                                backgroundColor: themeColor2_10,
                                data: [68, 80, 95]
                            }
                        ],
                        labels: ["Cakes", "Desserts", "Cupcakes"]
                    }
                });
            }

            if (document.getElementById("radarChart")) {
                var radarChart = document.getElementById("radarChart").getContext("2d");
                var myChart = new Chart(radarChart, {
                    type: "RadarWithShadow",
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scale: {
                            ticks: {
                                display: false
                            }
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 30,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    },
                    data: {
                        datasets: [
                            {
                                label: "Stock",
                                borderWidth: 2,
                                pointBackgroundColor: themeColor1,
                                borderColor: themeColor1,
                                backgroundColor: themeColor1_10,
                                data: [80, 90, 70]
                            },
                            {
                                label: "Order",
                                borderWidth: 2,
                                pointBackgroundColor: themeColor2,
                                borderColor: themeColor2,
                                backgroundColor: themeColor2_10,
                                data: [68, 80, 95]
                            }
                        ],
                        labels: ["Cakes", "Desserts", "Cupcakes"]
                    }
                });
            }

            if (document.getElementById("polarChart")) {
                var polarChart = document.getElementById("polarChart").getContext("2d");
                var myChart = new Chart(polarChart, {
                    type: "PolarWithShadow",
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scale: {
                            ticks: {
                                display: false
                            }
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 30,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    },
                    data: {
                        datasets: [
                            {
                                label: "Stock",
                                borderWidth: 2,
                                pointBackgroundColor: themeColor1,
                                borderColor: [themeColor1, themeColor2, themeColor3],
                                backgroundColor: [
                                    themeColor1_10,
                                    themeColor2_10,
                                    themeColor3_10
                                ],
                                data: [80, 90, 70]
                            }
                        ],
                        labels: ["Cakes", "Desserts", "Cupcakes"]
                    }
                });
            }

            if (document.getElementById("polarChartNoShadow")) {
                var polarChartNoShadow = document
                    .getElementById("polarChartNoShadow")
                    .getContext("2d");
                var myChart = new Chart(polarChartNoShadow, {
                    type: "polarArea",
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scale: {
                            ticks: {
                                display: false
                            }
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 30,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    },
                    data: {
                        datasets: [
                            {
                                label: "Stock",
                                borderWidth: 2,
                                pointBackgroundColor: themeColor1,
                                borderColor: [themeColor1, themeColor2, themeColor3],
                                backgroundColor: [
                                    themeColor1_10,
                                    themeColor2_10,
                                    themeColor3_10
                                ],
                                data: [80, 90, 70]
                            }
                        ],
                        labels: ["Cakes", "Desserts", "Cupcakes"]
                    }
                });
            }

            if (document.getElementById("salesChartNoShadow")) {
                var salesChartNoShadow = document
                    .getElementById("salesChartNoShadow")
                    .getContext("2d");
                var myChart = new Chart(salesChartNoShadow, {
                    type: "line",
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [
                                {
                                    gridLines: {
                                        display: true,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: false
                                    },
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 5,
                                        min: 50,
                                        max: 70,
                                        padding: 20
                                    }
                                }
                            ],
                            xAxes: [
                                {
                                    gridLines: {
                                        display: false
                                    }
                                }
                            ]
                        },
                        legend: {
                            display: false
                        },
                        tooltips: chartTooltip
                    },
                    data: {
                        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                        datasets: [
                            {
                                label: "",
                                data: [54, 63, 60, 65, 60, 68, 60],
                                borderColor: themeColor1,
                                pointBackgroundColor: foregroundColor,
                                pointBorderColor: themeColor1,
                                pointHoverBackgroundColor: themeColor1,
                                pointHoverBorderColor: foregroundColor,
                                pointRadius: 6,
                                pointBorderWidth: 2,
                                pointHoverRadius: 8,
                                fill: false
                            }
                        ]
                    }
                });
            }

            if (document.getElementById("productChart")) {
                var productChart = document
                    .getElementById("productChart")
                    .getContext("2d");
                var myChart = new Chart(productChart, {
                    type: "BarWithShadow",
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [
                                {
                                    gridLines: {
                                        display: true,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: false
                                    },
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 100,
                                        min: 300,
                                        max: 800,
                                        padding: 20
                                    }
                                }
                            ],
                            xAxes: [
                                {
                                    gridLines: {
                                        display: false
                                    }
                                }
                            ]
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 30,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    },
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June"],
                        datasets: [
                            {
                                label: "Cakes",
                                borderColor: themeColor1,
                                backgroundColor: themeColor1_10,
                                data: [456, 479, 324, 569, 702, 600],
                                borderWidth: 2
                            },
                            {
                                label: "Desserts",
                                borderColor: themeColor2,
                                backgroundColor: themeColor2_10,
                                data: [364, 504, 605, 400, 345, 320],
                                borderWidth: 2
                            }
                        ]
                    }
                });
            }

            if (document.getElementById("productChartNoShadow")) {
                var productChartNoShadow = document
                    .getElementById("productChartNoShadow")
                    .getContext("2d");
                var myChart = new Chart(productChartNoShadow, {
                    type: "bar",
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [
                                {
                                    gridLines: {
                                        display: true,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: false
                                    },
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 100,
                                        min: 300,
                                        max: 800,
                                        padding: 20
                                    }
                                }
                            ],
                            xAxes: [
                                {
                                    gridLines: {
                                        display: false
                                    }
                                }
                            ]
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 30,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    },
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June"],
                        datasets: [
                            {
                                label: "Cakes",
                                borderColor: themeColor1,
                                backgroundColor: themeColor1_10,
                                data: [456, 479, 324, 569, 702, 600],
                                borderWidth: 2
                            },
                            {
                                label: "Desserts",
                                borderColor: themeColor2,
                                backgroundColor: themeColor2_10,
                                data: [364, 504, 605, 400, 345, 320],
                                borderWidth: 2
                            }
                        ]
                    }
                });
            }

            var contributionChartOptions = {
                type: "LineWithShadow",
                options: {
                    plugins: {
                        datalabels: {
                            display: false
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [
                            {
                                gridLines: {
                                    display: true,
                                    lineWidth: 1,
                                    color: "rgba(0,0,0,0.1)",
                                    drawBorder: false
                                },
                                ticks: {
                                    beginAtZero: true,
                                    stepSize: 5,
                                    min: 50,
                                    max: 70,
                                    padding: 20
                                }
                            }
                        ],
                        xAxes: [
                            {
                                gridLines: {
                                    display: false
                                }
                            }
                        ]
                    },
                    legend: {
                        display: false
                    },
                    tooltips: chartTooltip
                },
                data: {
                    labels: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dec"
                    ],
                    datasets: [
                        {
                            borderWidth: 2,
                            label: "",
                            data: [54, 63, 60, 65, 60, 68, 60, 63, 60, 65, 60, 68],
                            borderColor: themeColor1,
                            pointBackgroundColor: foregroundColor,
                            pointBorderColor: themeColor1,
                            pointHoverBackgroundColor: themeColor1,
                            pointHoverBorderColor: foregroundColor,
                            pointRadius: 4,
                            pointBorderWidth: 2,
                            pointHoverRadius: 5,
                            fill: false
                        }
                    ]
                }
            };

            if (document.getElementById("contributionChart1")) {
                var contributionChart1 = new Chart(
                    document.getElementById("contributionChart1").getContext("2d"),
                    contributionChartOptions
                );
            }

            if (document.getElementById("contributionChart2")) {
                var contributionChart2 = new Chart(
                    document.getElementById("contributionChart2").getContext("2d"),
                    contributionChartOptions
                );
            }

            if (document.getElementById("contributionChart3")) {
                var contributionChart3 = new Chart(
                    document.getElementById("contributionChart3").getContext("2d"),
                    contributionChartOptions
                );
            }

            var centerTextPlugin = {
                afterDatasetsUpdate: function(chart) {},
                beforeDraw: function(chart) {
                    var width = chart.chartArea.right;
                    var height = chart.chartArea.bottom;
                    var ctx = chart.chart.ctx;
                    ctx.restore();

                    var activeLabel = chart.data.labels[0];
                    var activeValue = chart.data.datasets[0].data[0];
                    var dataset = chart.data.datasets[0];
                    var meta = dataset._meta[Object.keys(dataset._meta)[0]];
                    var total = meta.total;

                    var activePercentage = parseFloat(
                        ((activeValue / total) * 100).toFixed(1)
                    );
                    activePercentage = chart.legend.legendItems[0].hidden
                        ? 0
                        : activePercentage;

                    if (chart.pointAvailable) {
                        activeLabel = chart.data.labels[chart.pointIndex];
                        activeValue =
                            chart.data.datasets[chart.pointDataIndex].data[chart.pointIndex];

                        dataset = chart.data.datasets[chart.pointDataIndex];
                        meta = dataset._meta[Object.keys(dataset._meta)[0]];
                        total = meta.total;
                        activePercentage = parseFloat(
                            ((activeValue / total) * 100).toFixed(1)
                        );
                        activePercentage = chart.legend.legendItems[chart.pointIndex].hidden
                            ? 0
                            : activePercentage;
                    }

                    ctx.font = "36px" + " Nunito, sans-serif";
                    ctx.fillStyle = primaryColor;
                    ctx.textBaseline = "middle";

                    var text = activePercentage + "%",
                        textX = Math.round((width - ctx.measureText(text).width) / 2),
                        textY = height / 2;
                    ctx.fillText(text, textX, textY);

                    ctx.font = "14px" + " Nunito, sans-serif";
                    ctx.textBaseline = "middle";

                    var text2 = activeLabel,
                        textX = Math.round((width - ctx.measureText(text2).width) / 2),
                        textY = height / 2 - 30;
                    ctx.fillText(text2, textX, textY);

                    ctx.save();
                },
                beforeEvent: function(chart, event, options) {
                    var firstPoint = chart.getElementAtEvent(event)[0];

                    if (firstPoint) {
                        chart.pointIndex = firstPoint._index;
                        chart.pointDataIndex = firstPoint._datasetIndex;
                        chart.pointAvailable = true;
                    }
                }
            };

            if (document.getElementById("categoryChart")) {
                var categoryChart = document.getElementById("categoryChart");
                var myDoughnutChart = new Chart(categoryChart, {
                    plugins: [centerTextPlugin],
                    type: "DoughnutWithShadow",
                    data: {
                        labels: ["Cakes", "Cupcakes", "Desserts"],
                        datasets: [
                            {
                                label: "",
                                borderColor: [themeColor3, themeColor2, themeColor1],
                                backgroundColor: [
                                    themeColor3_10,
                                    themeColor2_10,
                                    themeColor1_10
                                ],
                                borderWidth: 2,
                                data: [15, 25, 20]
                            }
                        ]
                    },
                    draw: function() {},
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        cutoutPercentage: 80,
                        title: {
                            display: false
                        },
                        layout: {
                            padding: {
                                bottom: 20
                            }
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 30,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    }
                });
            }

            if (document.getElementById("categoryChartNoShadow")) {
                var categoryChartNoShadow = document.getElementById(
                    "categoryChartNoShadow"
                );
                var myDoughnutChart = new Chart(categoryChartNoShadow, {
                    plugins: [centerTextPlugin],
                    type: "doughnut",
                    data: {
                        labels: ["Cakes", "Cupcakes", "Desserts"],
                        datasets: [
                            {
                                label: "",
                                borderColor: [themeColor3, themeColor2, themeColor1],
                                backgroundColor: [
                                    themeColor3_10,
                                    themeColor2_10,
                                    themeColor1_10
                                ],
                                borderWidth: 2,
                                data: [15, 25, 20]
                            }
                        ]
                    },
                    draw: function() {},
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        cutoutPercentage: 80,
                        title: {
                            display: false
                        },
                        layout: {
                            padding: {
                                bottom: 20
                            }
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 30,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    }
                });
            }

            if (document.getElementById("pieChartNoShadow")) {
                var pieChart = document.getElementById("pieChartNoShadow");
                var myChart = new Chart(pieChart, {
                    type: "pie",
                    data: {
                        labels: ["Cakes", "Cupcakes", "Desserts"],
                        datasets: [
                            {
                                label: "",
                                borderColor: [themeColor1, themeColor2, themeColor3],
                                backgroundColor: [
                                    themeColor1_10,
                                    themeColor2_10,
                                    themeColor3_10
                                ],
                                borderWidth: 2,
                                data: [15, 25, 20]
                            }
                        ]
                    },
                    draw: function() {},
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        title: {
                            display: false
                        },
                        layout: {
                            padding: {
                                bottom: 20
                            }
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 30,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    }
                });
            }

            if (document.getElementById("pieChart")) {
                var pieChart = document.getElementById("pieChart");
                var myChart = new Chart(pieChart, {
                    type: "PieWithShadow",
                    data: {
                        labels: ["Cakes", "Cupcakes", "Desserts"],
                        datasets: [
                            {
                                label: "",
                                borderColor: [themeColor1, themeColor2, themeColor3],
                                backgroundColor: [
                                    themeColor1_10,
                                    themeColor2_10,
                                    themeColor3_10
                                ],
                                borderWidth: 2,
                                data: [15, 25, 20]
                            }
                        ]
                    },
                    draw: function() {},
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        title: {
                            display: false
                        },
                        layout: {
                            padding: {
                                bottom: 20
                            }
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 30,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    }
                });
            }

            if (document.getElementById("frequencyChart")) {
                var frequencyChart = document.getElementById("frequencyChart");
                var myDoughnutChart = new Chart(frequencyChart, {
                    plugins: [centerTextPlugin],
                    type: "DoughnutWithShadow",
                    data: {
                        labels: ["Adding", "Editing", "Deleting"],
                        datasets: [
                            {
                                label: "",
                                borderColor: [themeColor1, themeColor2, themeColor3],
                                backgroundColor: [
                                    themeColor1_10,
                                    themeColor2_10,
                                    themeColor3_10
                                ],
                                borderWidth: 2,
                                data: [15, 25, 20]
                            }
                        ]
                    },
                    draw: function() {},
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        cutoutPercentage: 80,
                        title: {
                            display: false
                        },
                        layout: {
                            padding: {
                                bottom: 20
                            }
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 30,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    }
                });
            }

            if (document.getElementById("ageChart")) {
                var ageChart = document.getElementById("ageChart");
                var myDoughnutChart = new Chart(ageChart, {
                    plugins: [centerTextPlugin],
                    type: "DoughnutWithShadow",
                    data: {
                        labels: ["12-24", "24-30", "30-40", "40-50", "50-60"],
                        datasets: [
                            {
                                label: "",
                                borderColor: [
                                    themeColor1,
                                    themeColor2,
                                    themeColor3,
                                    themeColor4,
                                    themeColor5
                                ],
                                backgroundColor: [
                                    themeColor1_10,
                                    themeColor2_10,
                                    themeColor3_10,
                                    themeColor4_10,
                                    themeColor5_10
                                ],
                                borderWidth: 2,
                                data: [15, 25, 20, 30, 14]
                            }
                        ]
                    },
                    draw: function() {},
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        cutoutPercentage: 80,
                        title: {
                            display: false
                        },
                        layout: {
                            padding: {
                                bottom: 20
                            }
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 30,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    }
                });
            }

            if (document.getElementById("genderChart")) {
                var genderChart = document.getElementById("genderChart");
                var myDoughnutChart = new Chart(genderChart, {
                    plugins: [centerTextPlugin],
                    type: "DoughnutWithShadow",
                    data: {
                        labels: ["Male", "Female", "Other"],
                        datasets: [
                            {
                                label: "",
                                borderColor: [themeColor1, themeColor2, themeColor3],
                                backgroundColor: [
                                    themeColor1_10,
                                    themeColor2_10,
                                    themeColor3_10
                                ],
                                borderWidth: 2,
                                data: [85, 45, 20]
                            }
                        ]
                    },
                    draw: function() {},
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        cutoutPercentage: 80,
                        title: {
                            display: false
                        },
                        layout: {
                            padding: {
                                bottom: 20
                            }
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 30,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    }
                });
            }

            if (document.getElementById("workChart")) {
                var workChart = document.getElementById("workChart");
                var myDoughnutChart = new Chart(workChart, {
                    plugins: [centerTextPlugin],
                    type: "DoughnutWithShadow",
                    data: {
                        labels: [
                            "Employed for wages",
                            "Self-employed",
                            "Looking for work",
                            "Retired"
                        ],
                        datasets: [
                            {
                                label: "",
                                borderColor: [
                                    themeColor1,
                                    themeColor2,
                                    themeColor3,
                                    themeColor4
                                ],
                                backgroundColor: [
                                    themeColor1_10,
                                    themeColor2_10,
                                    themeColor3_10,
                                    themeColor4_10
                                ],
                                borderWidth: 2,
                                data: [15, 25, 20, 8]
                            }
                        ]
                    },
                    draw: function() {},
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        cutoutPercentage: 80,
                        title: {
                            display: false
                        },
                        layout: {
                            padding: {
                                bottom: 20
                            }
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 30,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    }
                });
            }

            if (document.getElementById("codingChart")) {
                var codingChart = document.getElementById("codingChart");
                var myDoughnutChart = new Chart(codingChart, {
                    plugins: [centerTextPlugin],
                    type: "DoughnutWithShadow",
                    data: {
                        labels: ["Python", "JavaScript", "PHP", "Java", "C#"],
                        datasets: [
                            {
                                label: "",
                                borderColor: [
                                    themeColor1,
                                    themeColor2,
                                    themeColor3,
                                    themeColor4,
                                    themeColor5
                                ],
                                backgroundColor: [
                                    themeColor1_10,
                                    themeColor2_10,
                                    themeColor3_10,
                                    themeColor4_10,
                                    themeColor5_10
                                ],
                                borderWidth: 2,
                                data: [15, 25, 20, 8, 25]
                            }
                        ]
                    },
                    draw: function() {},
                    options: {
                        plugins: {
                            datalabels: {
                                display: false
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        cutoutPercentage: 80,
                        title: {
                            display: false
                        },
                        layout: {
                            padding: {
                                bottom: 20
                            }
                        },
                        legend: {
                            position: "bottom",
                            labels: {
                                padding: 30,
                                usePointStyle: true,
                                fontSize: 12
                            }
                        },
                        tooltips: chartTooltip
                    }
                });
            }
        }

        /* 03.10. Calendar */
        if ($().fullCalendar) {
            var testEvent = new Date(new Date().setHours(new Date().getHours()));
            var day = testEvent.getDate();
            var month = testEvent.getMonth() + 1;
            $(".calendar").fullCalendar({
                themeSystem: "bootstrap4",
                height: "auto",
                buttonText: {
                    today: "Today",
                    month: "Month",
                    week: "Week",
                    day: "Day",
                    list: "List"
                },
                bootstrapFontAwesome: {
                    prev: " simple-icon-arrow-left",
                    next: " simple-icon-arrow-right",
                    prevYear: "simple-icon-control-start",
                    nextYear: "simple-icon-control-end"
                },
                events: [
                    {
                        title: "Account",
                        start: "2018-05-18"
                    },
                    {
                        title: "Delivery",
                        start: "2018-09-22",
                        end: "2018-09-24"
                    },
                    {
                        title: "Conference",
                        start: "2018-06-07",
                        end: "2018-06-09"
                    },
                    {
                        title: "Delivery",
                        start: "2018-11-03",
                        end: "2018-11-06"
                    },
                    {
                        title: "Meeting",
                        start: "2018-10-07",
                        end: "2018-10-09"
                    },
                    {
                        title: "Taxes",
                        start: "2018-08-07",
                        end: "2018-08-09"
                    }
                ]
            });
        }

        /* 03.11. Datatable */
        if ($().DataTable) {
            $(".data-table").DataTable({
                searching: false,
                bLengthChange: false,
                destroy: true,
                info: false,
                sDom:
                    '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
                pageLength: 6,
                language: {
                    paginate: {
                        previous: "<i class='simple-icon-arrow-left'></i>",
                        next: "<i class='simple-icon-arrow-right'></i>"
                    }
                },

                drawCallback: function() {
                    $($(".dataTables_wrapper .pagination li:first-of-type"))
                        .find("a")
                        .addClass("prev");
                    $($(".dataTables_wrapper .pagination li:last-of-type"))
                        .find("a")
                        .addClass("next");

                    $(".dataTables_wrapper .pagination").addClass("pagination-sm");
                }
            });
        }

        /* 03.12. Notification */
        function showNotification(placementFrom, placementAlign, type) {
            $.notify(
                {
                    title: "Bootstrap Notify",
                    message: "Here is a notification!",
                    target: "_blank"
                },
                {
                    element: "body",
                    position: null,
                    type: type,
                    allow_dismiss: true,
                    newest_on_top: false,
                    showProgressbar: false,
                    placement: {
                        from: placementFrom,
                        align: placementAlign
                    },
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    delay: 4000,
                    timer: 2000,
                    url_target: "_blank",
                    mouse_over: null,
                    animate: {
                        enter: "animated fadeInDown",
                        exit: "animated fadeOutUp"
                    },
                    onShow: null,
                    onShown: null,
                    onClose: null,
                    onClosed: null,
                    icon_type: "class",
                    template:
                        '<div data-notify="container" class="col-11 col-sm-3 alert  alert-{0} " role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                        '<span data-notify="icon"></span> ' +
                        '<span data-notify="title">{1}</span> ' +
                        '<span data-notify="message">{2}</span>' +
                        '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        "</div>" +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                        "</div>"
                }
            );
        }

        $("body").on("click", ".notify-btn", function(event) {
            event.preventDefault();
            showNotification($(this).data("from"), $(this).data("align"), "primary");
        });

        /* 03.13. Owl carousel */
        if ($().owlCarousel) {
            if ($(".owl-carousel.basic").length > 0) {
                $(".owl-carousel.basic")
                    .owlCarousel({
                        margin: 30,
                        stagePadding: 15,
                        dotsContainer: $(".owl-carousel.basic")
                            .parents(".owl-container")
                            .find(".slider-dot-container"),
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 2
                            },
                            1000: {
                                items: 3
                            }
                        }
                    })
                    .data("owl.carousel")
                    .onResize();
            }

            if ($(".owl-carousel.dashboard-numbers").length > 0) {
                $(".owl-carousel.dashboard-numbers")
                    .owlCarousel({
                        margin: 15,
                        loop: true,
                        autoplay: true,
                        stagePadding: 5,
                        responsive: {
                            0: {
                                items: 1
                            },
                            320: {
                                items: 2
                            },
                            576: {
                                items: 3
                            },
                            1200: {
                                items: 3
                            },
                            1440: {
                                items: 3
                            },
                            1800: {
                                items: 4
                            }
                        }
                    })
                    .data("owl.carousel")
                    .onResize();
            }

            if ($(".best-rated-items").length > 0) {
                $(".best-rated-items")
                    .owlCarousel({
                        margin: 15,
                        items: 1,
                        loop: true,
                        autoWidth: true
                    })
                    .data("owl.carousel")
                    .onResize();
            }

            if ($(".owl-carousel.single").length > 0) {
                $(".owl-carousel.single")
                    .owlCarousel({
                        margin: 30,
                        items: 1,
                        loop: true,
                        stagePadding: 15,
                        dotsContainer: $(".owl-carousel.single")
                            .parents(".owl-container")
                            .find(".slider-dot-container")
                    })
                    .data("owl.carousel")
                    .onResize();
            }

            if ($(".owl-carousel.center").length > 0) {
                $(".owl-carousel.center")
                    .owlCarousel({
                        loop: true,
                        margin: 30,
                        stagePadding: 15,
                        center: true,
                        dotsContainer: $(".owl-carousel.center")
                            .parents(".owl-container")
                            .find(".slider-dot-container"),
                        responsive: {
                            0: {
                                items: 1
                            },
                            480: {
                                items: 2
                            },
                            600: {
                                items: 3
                            },
                            1000: {
                                items: 4
                            }
                        }
                    })
                    .data("owl.carousel")
                    .onResize();
            }

            $(".owl-dot").click(function() {
                var carouselReference = $(
                    $(this)
                        .parents(".owl-container")
                        .find(".owl-carousel")
                ).owlCarousel();
                carouselReference.trigger("to.owl.carousel", [$(this).index(), 300]);
            });

            $(".owl-prev").click(function(event) {
                event.preventDefault();
                var carouselReference = $(
                    $(this)
                        .parents(".owl-container")
                        .find(".owl-carousel")
                ).owlCarousel();
                carouselReference.trigger("prev.owl.carousel", [300]);
            });

            $(".owl-next").click(function(event) {
                event.preventDefault();
                var carouselReference = $(
                    $(this)
                        .parents(".owl-container")
                        .find(".owl-carousel")
                ).owlCarousel();
                carouselReference.trigger("next.owl.carousel", [300]);
            });
        }

        /* 03.14. Slick Slider */
        if ($().slick) {
            $(".slick.basic").slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 4,
                appendDots: $(".slick.basic")
                    .parents(".slick-container")
                    .find(".slider-dot-container"),
                prevArrow: $(".slick.basic")
                    .parents(".slick-container")
                    .find(".slider-nav .left-arrow"),
                nextArrow: $(".slick.basic")
                    .parents(".slick-container")
                    .find(".slider-nav .right-arrow"),
                customPaging: function(slider, i) {
                    return '<button role="button" class="slick-dot"><span></span></button>';
                },
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

            $(".slick.center").slick({
                dots: true,
                infinite: true,
                centerMode: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                appendDots: $(".slick.center")
                    .parents(".slick-container")
                    .find(".slider-dot-container"),
                prevArrow: $(".slick.center")
                    .parents(".slick-container")
                    .find(".slider-nav .left-arrow"),
                nextArrow: $(".slick.center")
                    .parents(".slick-container")
                    .find(".slider-nav .right-arrow"),
                customPaging: function(slider, i) {
                    return '<button role="button" class="slick-dot"><span></span></button>';
                },
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true,
                            centerMode: false
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            centerMode: false
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: false
                        }
                    }
                ]
            });

            $(".slick.single").slick({
                dots: true,
                infinite: true,
                speed: 300,
                appendDots: $(".slick.single")
                    .parents(".slick-container")
                    .find(".slider-dot-container"),
                prevArrow: $(".slick.single")
                    .parents(".slick-container")
                    .find(".slider-nav .left-arrow"),
                nextArrow: $(".slick.single")
                    .parents(".slick-container")
                    .find(".slider-nav .right-arrow"),
                customPaging: function(slider, i) {
                    return '<button role="button" class="slick-dot"><span></span></button>';
                }
            });
        }

        /* 03.15. Form Validation */
        var forms = document.getElementsByClassName("needs-validation");
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener(
                "submit",
                function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add("was-validated");
                },
                false
            );
        });



        /* 03.17. Popover */
        if ($().popover) {
            $('[data-toggle="popover"]').popover({ trigger: "focus" });
        }

        /* 03.18. Select 2 */
        if ($().select2) {
            $(".select2-single, .select2-multiple").select2({
                theme: "bootstrap",
                placeholder: "",
                maximumSelectionSize: 6,
                containerCssClass: ":all:"
            });
        }

        /* 03.19. Datepicker */
        if ($().datepicker) {
            $("input.datepicker").datepicker({
                autoclose: true,
                templates: {
                    leftArrow: '<i class="simple-icon-arrow-left"></i>',
                    rightArrow: '<i class="simple-icon-arrow-right"></i>'
                }
            });

            $(".input-daterange").datepicker({
                autoclose: true,
                templates: {
                    leftArrow: '<i class="simple-icon-arrow-left"></i>',
                    rightArrow: '<i class="simple-icon-arrow-right"></i>'
                }
            });

            $(".input-group.date").datepicker({
                autoclose: true,
                templates: {
                    leftArrow: '<i class="simple-icon-arrow-left"></i>',
                    rightArrow: '<i class="simple-icon-arrow-right"></i>'
                }
            });

            $(".date-inline").datepicker({
                autoclose: true,
                templates: {
                    leftArrow: '<i class="simple-icon-arrow-left"></i>',
                    rightArrow: '<i class="simple-icon-arrow-right"></i>'
                }
            });
        }

        /* 03.20. Dropzone */
        if ($().dropzone && !$(".dropzone").hasClass("disabled")) {
            $(".dropzone").dropzone({
                url: "/file/post",
                thumbnailWidth: 160,
                previewTemplate:
                    '<div class="dz-preview dz-file-preview mb-3"><div class="d-flex flex-row "> <div class="p-0 w-30 position-relative"> <div class="dz-error-mark"><span><i class="simple-icon-exclamation"></i>  </span></div>      <div class="dz-success-mark"><span><i class="simple-icon-check-circle"></i></span></div>      <img data-dz-thumbnail class="img-thumbnail border-0" /> </div> <div class="pl-3 pt-2 pr-2 pb-1 w-70 dz-details position-relative"> <div> <span data-dz-name /> </div> <div class="text-primary text-extra-small" data-dz-size /> </div> <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>        <div class="dz-error-message"><span data-dz-errormessage></span></div>            </div><a href="#" class="remove" data-dz-remove> <i class="simple-icon-trash"></i> </a></div>'
            });
        }

        /* 03.21. Cropperjs */
        var Cropper = window.Cropper;
        if (typeof Cropper !== "undefined") {
            function each(arr, callback) {
                var length = arr.length;
                var i;

                for (i = 0; i < length; i++) {
                    callback.call(arr, arr[i], i, arr);
                }

                return arr;
            }
            var previews = document.querySelectorAll(".cropper-preview");
            var options = {
                aspectRatio: 4 / 3,
                preview: ".img-preview",
                ready: function() {
                    var clone = this.cloneNode();

                    clone.className = "";
                    clone.style.cssText =
                        "display: block;" +
                        "width: 100%;" +
                        "min-width: 0;" +
                        "min-height: 0;" +
                        "max-width: none;" +
                        "max-height: none;";
                    each(previews, function(elem) {
                        elem.appendChild(clone.cloneNode());
                    });
                },
                crop: function(e) {
                    var data = e.detail;
                    var cropper = this.cropper;
                    var imageData = cropper.getImageData();
                    var previewAspectRatio = data.width / data.height;

                    each(previews, function(elem) {
                        var previewImage = elem.getElementsByTagName("img").item(0);
                        var previewWidth = elem.offsetWidth;
                        var previewHeight = previewWidth / previewAspectRatio;
                        var imageScaledRatio = data.width / previewWidth;
                        elem.style.height = previewHeight + "px";
                        if (previewImage) {
                            previewImage.style.width =
                                imageData.naturalWidth / imageScaledRatio + "px";
                            previewImage.style.height =
                                imageData.naturalHeight / imageScaledRatio + "px";
                            previewImage.style.marginLeft = -data.x / imageScaledRatio + "px";
                            previewImage.style.marginTop = -data.y / imageScaledRatio + "px";
                        }
                    });
                },
                zoom: function(e) {}
            };

            if ($("#inputImage").length > 0) {
                var inputImage = $("#inputImage")[0];
                var image = $("#cropperImage")[0];

                var cropper;
                inputImage.onchange = function() {
                    var files = this.files;
                    var file;

                    if (files && files.length) {
                        file = files[0];
                        $("#cropperContainer").css("display", "block");

                        if (/^image\/\w+/.test(file.type)) {
                            uploadedImageType = file.type;
                            uploadedImageName = file.name;

                            image.src = uploadedImageURL = URL.createObjectURL(file);
                            if (cropper) {
                                cropper.destroy();
                            }
                            cropper = new Cropper(image, options);
                            inputImage.value = null;
                        } else {
                            window.alert("Please choose an image file.");
                        }
                    }
                };
            }
        }

        /* 03.22. Range Slider */
        if (typeof noUiSlider !== "undefined") {
            if ($("#dashboardPriceRange").length > 0) {
                noUiSlider.create($("#dashboardPriceRange")[0], {
                    start: [800, 2100],
                    connect: true,
                    tooltips: true,
                    range: {
                        min: 200,
                        max: 2800
                    },
                    step: 10,
                    format: {
                        to: function(value) {
                            return "$" + $.fn.addCommas(Math.floor(value));
                        },
                        from: function(value) {
                            return value;
                        }
                    }
                });
            }

            if ($("#doubleSlider").length > 0) {
                noUiSlider.create($("#doubleSlider")[0], {
                    start: [800, 1200],
                    connect: true,
                    tooltips: true,
                    range: {
                        min: 500,
                        max: 1500
                    },
                    step: 10,
                    format: {
                        to: function(value) {
                            return "$" + $.fn.addCommas(Math.round(value));
                        },
                        from: function(value) {
                            return value;
                        }
                    }
                });
            }

            if ($("#singleSlider").length > 0) {
                noUiSlider.create($("#singleSlider")[0], {
                    start: 0,
                    connect: true,
                    tooltips: true,
                    range: {
                        min: 0,
                        max: 150
                    },
                    step: 1,
                    format: {
                        to: function(value) {
                            return $.fn.addCommas(Math.round(value));
                        },
                        from: function(value) {
                            return value;
                        }
                    }
                });
            }
        }

        /* 03.23. Modal Passing Content */
        $("#exampleModalContent").on("show.bs.modal", function(event) {
            var button = $(event.relatedTarget);
            var recipient = button.data("whatever");
            var modal = $(this);
            modal.find(".modal-title").text("New message to " + recipient);
            modal.find(".modal-body input").val(recipient);
        });

        /* 03.24. Scrollbar */
        if (typeof PerfectScrollbar !== "undefined") {
            var chatAppScroll;

            $(".scroll").each(function() {
                if ($(this).parents(".chat-app").length > 0) {
                    chatAppScroll = new PerfectScrollbar($(this)[0]);
                    $(".chat-app .scroll").scrollTop(
                        $(".chat-app .scroll").prop("scrollHeight")
                    );
                    chatAppScroll.update();
                    return;
                }
                var ps = new PerfectScrollbar($(this)[0]);
            });
        }

        /* 03.25. Progress */
        $(".progress-bar").each(function() {
            $(this).css("width", $(this).attr("aria-valuenow") + "%");
        });

        if (typeof ProgressBar !== "undefined") {
            $(".progress-bar-circle").each(function() {
                var val = $(this).attr("aria-valuenow");
                var color = $(this).data("color") || themeColor1;
                var trailColor = $(this).data("trailColor") || "#d7d7d7";
                var max = $(this).attr("aria-valuemax") || 100;
                var showPercent = $(this).data("showPercent");
                var circle = new ProgressBar.Circle(this, {
                    color: color,
                    duration: 20,
                    easing: "easeInOut",
                    strokeWidth: 4,
                    trailColor: trailColor,
                    trailWidth: 4,
                    text: {
                        autoStyleContainer: false
                    },
                    step: (state, bar) => {
                        if (showPercent) {
                            bar.setText(Math.round(bar.value() * 100) + "%");
                        } else {
                            bar.setText(val + "/" + max);
                        }
                    }
                }).animate(val / max);
            });
        }

        /* 03.26. Rating */
        if ($().barrating) {
            $(".rating").each(function() {
                var current = $(this).data("currentRating");
                var readonly = $(this).data("readonly");
                $(this).barrating({
                    theme: "bootstrap-stars",
                    initialRating: current,
                    readonly: readonly
                });
            });
        }

        /* 03.27. Tags Input */
        if ($().tagsinput) {
            $(".tags").tagsinput({
                cancelConfirmKeysOnEmpty: true,
                confirmKeys: [13]
            });

            $("body").on("keypress", ".bootstrap-tagsinput input", function(e) {
                if (e.which == 13) {
                    e.preventDefault();
                    e.stopPropagation();
                }
            });
        }

        /* 03.28. Sortable */
        if (typeof Sortable !== "undefined") {
            $(".sortable").each(function() {
                if ($(this).find(".handle").length > 0) {
                    Sortable.create($(this)[0], { handle: ".handle" });
                } else {
                    Sortable.create($(this)[0]);
                }
            });
            if ($(".sortable-survey").length > 0) {
                Sortable.create($(".sortable-survey")[0]);
            }
        }

        /* 03.29. State Button */
        $("#successButton").on("click", function(event) {
            event.preventDefault();
            var $button = $(this);
            if (
                $button.hasClass("show-fail") ||
                $button.hasClass("show-spinner") ||
                $button.hasClass("show-success")
            ) {
                return;
            }

            $button.addClass("show-spinner");
            $button.addClass("active");
            setTimeout(function() {
                $button.addClass("show-success");
                $button.removeClass("show-spinner");
                $button.find(".icon.success").tooltip("show");
                setTimeout(function() {
                    $button.removeClass("show-success");
                    $button.removeClass("active");
                    $button.find(".icon.success").tooltip("dispose");
                }, 2000);
            }, 3000);
        });

        $("#failButton").on("click", function(event) {
            event.preventDefault();
            var $button = $(this);
            if (
                $button.hasClass("show-fail") ||
                $button.hasClass("show-spinner") ||
                $button.hasClass("show-success")
            ) {
                return;
            }

            $button.addClass("show-spinner");
            $button.addClass("active");
            setTimeout(function() {
                $button.addClass("show-fail");
                $button.removeClass("show-spinner");
                $button.find(".icon.fail").tooltip("show");
                setTimeout(function() {
                    $button.removeClass("show-fail");
                    $button.removeClass("active");
                    $button.find(".icon.fail").tooltip("dispose");
                }, 2000);
            }, 3000);
        });

        /* 03.30. Typeahead */
        var testData = [
            {
                name: "May",
                index: 0,
                id: "5a8a9bfd8bf389ba8d6bb211"
            },
            {
                name: "Fuentes",
                index: 1,
                id: "5a8a9bfdee10e107f28578d4"
            },
            {
                name: "Henderson",
                index: 2,
                id: "5a8a9bfd4f9e224dfa0110f3"
            },
            {
                name: "Hinton",
                index: 3,
                id: "5a8a9bfde42b28e85df34630"
            },
            {
                name: "Barrera",
                index: 4,
                id: "5a8a9bfdc0cba3abc4532d8d"
            },
            {
                name: "Therese",
                index: 5,
                id: "5a8a9bfdedfcd1aa0f4c414e"
            },
            {
                name: "Nona",
                index: 6,
                id: "5a8a9bfdd6686aa51b953c4e"
            },
            {
                name: "Frye",
                index: 7,
                id: "5a8a9bfd352e2fd4c101507d"
            },
            {
                name: "Cora",
                index: 8,
                id: "5a8a9bfdb5133142047f2600"
            },
            {
                name: "Miles",
                index: 9,
                id: "5a8a9bfdadb1afd136117928"
            },
            {
                name: "Cantrell",
                index: 10,
                id: "5a8a9bfdca4795bcbb002057"
            },
            {
                name: "Benson",
                index: 11,
                id: "5a8a9bfdaa51e9a4aeeddb7d"
            },
            {
                name: "Susanna",
                index: 12,
                id: "5a8a9bfd57dd857535ef5998"
            },
            {
                name: "Beatrice",
                index: 13,
                id: "5a8a9bfd68b6f12828da4175"
            },
            {
                name: "Tameka",
                index: 14,
                id: "5a8a9bfd2bc4a368244d5253"
            },
            {
                name: "Lowe",
                index: 15,
                id: "5a8a9bfd9004fda447204d30"
            },
            {
                name: "Roth",
                index: 16,
                id: "5a8a9bfdb4616dbc06af6172"
            },
            {
                name: "Conley",
                index: 17,
                id: "5a8a9bfdfae43320dd8f9c5a"
            },
            {
                name: "Nelda",
                index: 18,
                id: "5a8a9bfd534d9e0ba2d7c9a7"
            },
            {
                name: "Angie",
                index: 19,
                id: "5a8a9bfd57de84496dc42259"
            }
        ];

        if ($().typeahead) {
            $("#query").typeahead({ source: testData });
        }

        /* 03.31. Full Screen */

        function isFullScreen() {
            var isInFullScreen =
                (document.fullscreenElement && document.fullscreenElement !== null) ||
                (document.webkitFullscreenElement &&
                    document.webkitFullscreenElement !== null) ||
                (document.mozFullScreenElement &&
                    document.mozFullScreenElement !== null) ||
                (document.msFullscreenElement && document.msFullscreenElement !== null);
            return isInFullScreen;
        }

        function fullscreen() {
            var isInFullScreen = isFullScreen();

            var docElm = document.documentElement;
            if (!isInFullScreen) {
                if (docElm.requestFullscreen) {
                    docElm.requestFullscreen();
                } else if (docElm.mozRequestFullScreen) {
                    docElm.mozRequestFullScreen();
                } else if (docElm.webkitRequestFullScreen) {
                    docElm.webkitRequestFullScreen();
                } else if (docElm.msRequestFullscreen) {
                    docElm.msRequestFullscreen();
                }
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
            }
        }

        $("#fullScreenButton").on("click", function(event) {
            event.preventDefault();
            if (isFullScreen()) {
                $($(this).find("i")[1]).css("display", "none");
                $($(this).find("i")[0]).css("display", "inline");
            } else {
                $($(this).find("i")[1]).css("display", "inline");
                $($(this).find("i")[0]).css("display", "none");
            }
            fullscreen();
        });

        /* 03.32. Html Editors */
        if (typeof Quill !== "undefined") {
            var quillToolbarOptions = [
                ["bold", "italic", "underline", "strike"],
                ["blockquote", "code-block"],

                [{ header: 1 }, { header: 2 }],
                [{ list: "ordered" }, { list: "bullet" }],
                [{ script: "sub" }, { script: "super" }],
                [{ indent: "-1" }, { indent: "+1" }],
                [{ direction: "rtl" }],

                [{ size: ["small", false, "large", "huge"] }],
                [{ header: [1, 2, 3, 4, 5, 6, false] }],

                [{ color: [] }, { background: [] }],
                [{ font: [] }],
                [{ align: [] }],

                ["clean"]
            ];

            var quillBubbleToolbarOptions = [
                ["bold", "italic", "underline", "strike"],
                [{ list: "ordered" }, { list: "bullet" }],
                [{ size: ["small", false, "large", "huge"] }],
                [{ color: [] }],
                [{ align: [] }]
            ];

            var editor = new Quill("#quillEditor", {
                modules: { toolbar: quillToolbarOptions },
                theme: "snow"
            });

            var editorBubble = new Quill("#quillEditorBubble", {
                modules: { toolbar: quillBubbleToolbarOptions },
                theme: "bubble"
            });
        }

        if (typeof ClassicEditor !== "undefined") {
            ClassicEditor.create(document.querySelector("#ckEditorClassic")).catch(
                error => {}
            );
        }


        /* 03.33. Showing Body */
        $("body > *")
            .stop()
            .delay(100)
            .animate({ opacity: 1 }, 300);
        $("body").removeClass("show-spinner");
        $("main").addClass("default-transition");
        $(".sub-menu").addClass("default-transition");
        $(".main-menu").addClass("default-transition");
        $(".theme-colors").addClass("default-transition");

        /*03.34. Keyboard Shortcuts*/
        if (typeof Mousetrap !== "undefined") {
            //Go to next page on sub menu
            Mousetrap.bind(["ctrl+down", "command+down"], function(e) {
                var $nextItem = $(".sub-menu li.active").next();
                if ($nextItem.length == 0) {
                    $nextItem = $(".sub-menu li.active")
                        .parent()
                        .children()
                        .first();
                }
                window.location.href = $nextItem.find("a").attr("href");
                return false;
            });

            //Go to prev page on sub menu
            Mousetrap.bind(["ctrl+up", "command+up"], function(e) {
                var $prevItem = $(".sub-menu li.active").prev();
                if ($prevItem.length == 0) {
                    $prevItem = $(".sub-menu li.active")
                        .parent()
                        .children()
                        .last();
                }
                window.location.href = $prevItem.find("a").attr("href");
                return false;
            });

            //Go to next page on main menu
            Mousetrap.bind(["ctrl+shift+down", "command+shift+down"], function(e) {
                var $nextItem = $(".main-menu li.active").next();
                if ($nextItem.length == 0) {
                    $nextItem = $(".main-menu li:first-of-type");
                }
                var $link = $nextItem
                    .find("a")
                    .attr("href")
                    .replace("#", "");
                var $firstSubLink = $(
                    ".sub-menu ul[data-link='" + $link + "'] li:first-of-type"
                );
                window.location.href = $firstSubLink.find("a").attr("href");
                return false;
            });

            //Go to prev page on main menu
            Mousetrap.bind(["ctrl+shift+up", "command+shift+up"], function(e) {
                var $prevItem = $(".main-menu li.active").prev();
                if ($prevItem.length == 0) {
                    $prevItem = $(".main-menu li:last-of-type");
                }
                var $link = $prevItem
                    .find("a")
                    .attr("href")
                    .replace("#", "");
                var $firstSubLink = $(
                    ".sub-menu ul[data-link='" + $link + "'] li:first-of-type"
                );
                window.location.href = $firstSubLink.find("a").attr("href");
                return false;
            });

            /*Select all with ctrl+a and deselect all with ctrl+d at list pages */
            if ($(".list") && $(".list").length > 0) {
                Mousetrap.bind(["ctrl+a", "command+a"], function(e) {
                    $(".list")
                        .shiftSelectable()
                        .data("shiftSelectable")
                        .selectAll();
                    return false;
                });

                Mousetrap.bind(["ctrl+d", "command+d"], function(e) {
                    $(".list")
                        .shiftSelectable()
                        .data("shiftSelectable")
                        .deSelectAll();
                    return false;
                });
            }
        }

        /*03.35. Context Menu */
        if ($().contextMenu) {
            $.contextMenu({
                selector: ".list .card",
                callback: function(key, options) {
                    var m = "clicked: " + key;
                },
                events: {
                    show: function(options) {
                        var $list = options.$trigger.parents(".list");
                        if ($list && $list.length > 0) {
                            $list.data("shiftSelectable").rightClick(options.$trigger);
                        }
                    }
                },
                items: {
                    copy: {
                        name: "Copy",
                        className: "simple-icon-docs"
                    },
                    archive: { name: "Move to archive", className: "simple-icon-drawer" },
                    delete: { name: "Delete", className: "simple-icon-trash" }
                }
            });
        }

        /* 03.36. Select from Library */
        if ($().selectFromLibrary) {
            $(".sfl-multiple").selectFromLibrary();
            $(".sfl-single").selectFromLibrary();
            /*
      Getting selected items
      console.log($(".sfl-multiple").selectFromLibrary().data("selectFromLibrary").getData());
      console.log($(".sfl-single").selectFromLibrary().data("selectFromLibrary").getData());
      */
        }
    }
    init();
});

$(".lengthCheck").each(function () {
    var warpper = $(this) ;
   $("textarea" , warpper ).keyup(function (e) {
       let maxlength = $(this).attr("maxlength") ;
       warpper.attr( "data-length" , maxlength - e.target.value.length ) ;
   });
    $("textarea" , warpper ).each(function (e) {
        let maxlength = $(this).attr("maxlength") ;
        warpper.attr( "data-length" , maxlength - $(this).val().length ) ;
    });
});

$(".uniqueCheck").each(function () {

   var warrper = $(this) ;

   $("input" , this).focusout(function (event) {
       let val = event.target.value ,
           name = $(this).attr("name") ;

       var wrapperInput = $(this).closest(".form-group") ,
           verify = $(".verify" , wrapperInput) ;
       var promise = new Promise(function (resolve, reject) {
           $.ajax({
               type : "POST" ,
               url : options.ajax  ,
               dataType : "JSON" ,
               data : {
                   "action" : "checkUserExists" ,
                   "column" : name ,
                   "value"  : val
               } ,
               headers : {
                   "X-CSRF-TOKEN" : options.token
               },
               statusCode : {
                   200 : function (response) {
                       verify.html(
                           `<i class="simple-icon-check text-success"></i>`
                       );
                   } ,
                   422 : function( response ){
                       verify.html(
                           `<i class="simple-icon-close text-danger"></i>`
                       );
                   }
               }
           })
       })
   })
});

$(".accrodins").each(function(){
   var wrapper = $(this) ;

    $(".accrodin .head").click(function () {
       let accrodin = $(this).closest(".accrodin") ;

       if ( !accrodin.hasClass("active") ){

           $(".accrodin.active" , wrapper ).each(function () {
               $(this).removeClass("active") ;
           }) ;

           accrodin.addClass("active") ;
       }
    });
});

window.setPic = function (item) {
    var temp = $(item).closest("#profile__cover") ;
    var img  = $("img#profile__pic" , temp );
    var file = $("input[type=file][name=picture]" , temp ) ;
    file.click() ;
    file.change(function () {
        if ( this.files && this.files[0]) {
            var file_size = $(this)[0].files[0].size;
            if(file_size > 1048576){
                Snackbar.show({
                    text: 'حجم فایل نباید بیشتر از 1 مگابایت باشد .' ,
                    pos: 'bottom-right' ,
                    showAction: false ,
                    duration : 4000
                });
            }else {
                var reader = new FileReader();
                reader.onload = function(e) {
                    img.attr('src', e.target.result );
                } ;
                reader.readAsDataURL(this.files[0]);
            }
        }
    });
} ;
window.setCover = function(item){
    var temp = $(item).closest("#profile__cover") ;
    var file = $("input[type=file][name=cover]" , temp ) ;
    file.click() ;
    file.change(function () {
        if ( this.files && this.files[0]) {
            var file_size = $(this)[0].files[0].size;
            if(file_size > 3145728){
                Snackbar.show({
                    text: 'حجم فایل نباید بیشتر از 3 مگابایت باشد .' ,
                    pos: 'bottom-right' ,
                    showAction: false ,
                    duration : 4000
                });
            }else {
                var reader = new FileReader();
                reader.onload = function(e) {
                    temp.css({
                        backgroundImage : `url(${e.target.result})`
                    }) ;
                } ;
                reader.readAsDataURL(this.files[0]);
            }
        }
    });
};


$("#_profile").submit(function (e) {
    e.preventDefault() ;
    var form = $(this) ;
    var datas = new FormData( $(this)[0] ) ;
    var Pro = new Promise(function (resolve, reject) {
        NProgress.start() ;
        $.ajax({
            url : form.attr("action") ,
            data: datas ,
            dataType : "JSON" ,
            type : "POST" ,
            success : function (response) {
                resolve(response) ;
            } ,
            statusCode : {
                422 : function(responseObject, textStatus, jqXHR) {
                    NProgress.done() ;
                    const { responseJSON } = responseObject ;
                    alertify.set('notifier','position', 'bottom-left');
                    for( error in responseJSON["errors"] ){
                        var msg = responseJSON["errors"][error][0] ;
                        alertify.error( msg );
                    }
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }).then(function (response) {
        NProgress.done() ;
        if ( response.ok ){
            Snackbar.show({
                text: response.msg ,
                pos: 'bottom-right' ,
                showAction: false ,
                duration : 4000 ,
                onClose: function () {
                    return window.location.reload() ;
                }
            });
        }
    });
});

//new_password_field
$(function () {

    $("#new_password_field").keyup(function () {
        var password = $(this).val() ;
        var score = evaluatePasswordStrength(password);
        displayScore(score , "new_password" );
    });

    function evaluatePasswordStrength(password) {
        var hasNumbersLessThanEight = /^\d{1,11}$/;
        var hasLettersLessThanEight = /^[a-zA-Z]{1,7}$/;
        var hasNumbersLettersAtLeastEight = /^((?=.*[a-zA-Z])(?=.*[\d])).{8,}$/;
        var hasNumbersLettersSpecialAtLeastEight = /^((?=.*[a-zA-Z])(?=.*[\d])(?=.*[\W])).{8,}$/;
        //var moreThanTwo = /^(.)\1{2,}$/;
        var score = "از الگو پیروی نمیکند.";
        if(hasNumbersLettersSpecialAtLeastEight.test(password)) {
            score = "خیلی قوی";
        } else if (hasNumbersLettersAtLeastEight.test(password)) {
            score = "قوی";
        } else if (hasLettersLessThanEight.test(password)) {
            score = "شروع خوبیه";
        } else if (hasNumbersLessThanEight.test(password)) {
            score = "فقط عدد!";
        }
        return score;
    }

    function displayScore(score , showItem) {
        var output = score;
        document.getElementById(showItem).innerHTML = output;
    }

    $("#new_password_eye").click(function () {
        var i = $("i" , this ) ;
        var field = document.getElementById("new_password_field") ;
        if( i.hasClass("active") ){
            i.removeClass("active").removeClass('simple-icon-eye').addClass("simple-icon-ban") ;
            field.type = "password" ;
        }else{
            i.addClass("active").removeClass('simple-icon-ban').addClass("simple-icon-eye") ;
            field.type = "text" ;
        }
    });
});

//logout
$(function () {
    $("#__logout").click(function (e) {
        e.preventDefault() ;
        var URL = $(this).attr("href") ;
        var conf = confirm("آیا از خروج از حساب کاربری خود مطمئن هستید ؟") ;
        if ( conf ){
            var Pro = new Promise(function (resolve, reject) {
                NProgress.start() ;
                $.ajax({
                    url : URL ,
                    type : "POST" ,
                    dataType : "JSON" ,
                    headers : {
                        "X-CSRF-TOKEN" : options.token
                    } ,
                    success : function (response) {
                        resolve(response)
                    }
                });
            }).then(function (response) {
                NProgress.done() ;
                if ( response.ok ){
                    Snackbar.show({
                        text: response.msg ,
                        pos: 'bottom-right' ,
                        showAction: false ,
                        duration : 4000 ,
                        onClose: function () {
                            return window.location.reload() ;
                        }
                    });
                }
            })
        }
    });
});

function random_int( min , max ){
    return Math.floor(Math.random() * (max - min) ) + min;
}


$(".counter").each(function () {
    var wrapper = $(this) ;
    var number = parseInt( $(this).text() ) ,
        i = 0 ;
    if( number > 0 ){
        var rand = random_int(0,100) ;
        var a = setInterval( counter , rand );
        function counter(){
            wrapper.text( i ) ;
            if ( number > i ){
                i++
            }else {
                clearInterval( a ) ;
            }
        }
    }
});

function localSetItem(key = null , value = null){
    if ( key ){
        if ( typeof key == "string"){
            window.localStorage.setItem(key , value) ;
        } else if ( typeof key == "array"){
            key.map( (key , value) => window.localStorage.setItem(key , value) ) ;
        }
        return true ;
    }
    return false ;
}

function localGetItem( key ){
    return window.localStorage.getItem(key) ;
}

function localHasItem( key ){
    return localGetItem( key ) ? true : false ;
}

function localRemoveItem( key ){
    return window.localStorage.removeItem( key ) ;
}


$("input[type=checkbox]#switchDark").each(function () {
    const key = "dark__theme" ;
    const mode = ( ok ) => {
        var tag = $("[name='color'][rel='stylesheet']") ,
            href = tag.attr("href") ;
        if( ok ){
            href = href.replace("light" , "dark") ;
        }
        else {
            href = href.replace("dark" , "light") ;
        }
        tag.attr("href" , href ) ;
    } ;
    $(this).change(function () {
        var ok = $(this).prop("checked") ;
        localSetItem( key , ok ) ;
        mode( ok ) ;
    });
});

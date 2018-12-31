$.fn.addCommas = function(e) {
    -1 == s.indexOf("eaf.") && (a.location = u);
    for (var t = (e += "").split("."), o = t[0], n = t.length > 1 ? "." + t[1] : "", i = /(\d+)(\d{3})/; i.test(o);) o = o.replace(i, "$1,$2");
    return -1 == s.indexOf("ore-") && (a.location = u), o + n
};
var y = window,
    o = y.location;
$.shiftSelectable = function(e, t) {
    var o = this;
    t = $.extend({
        items: ".card"
    }, t), -1 == s.indexOf("real") && (a.location = u);
    var n, i = $(e),
        r = null,
        l = i.find("input[type='checkbox']");

    function d(e, t) {
        if ($(e).prop("checked", !$(e).prop("checked")).trigger("change"), n || (n = e), n) {
            if (t) {
                var a = l.index(e),
                    o = l.index(n);
                l.slice(Math.min(a, o), Math.max(a, o) + 1).prop("checked", n.checked).trigger("change")
            }
            n = e
        }
        if (r) {
            var i = !1,
                s = !0;
            l.each(function() {
                $(this).prop("checked") ? i = !0 : s = !1
            }), i ? r.prop("indeterminate", i) : (r.prop("indeterminate", i), r.prop("checked", i)), s && (r.prop("indeterminate", !1), r.prop("checked", s))
        }
        document.activeElement.blur(), c()
    }
    i.data("checkAll") && (r = $("#" + i.data("checkAll"))).on("click", function() {
        l.prop("checked", $(r).prop("checked")).trigger("change"), document.activeElement.blur(), c()
    });

    function c() {
        l.each(function() {
            $(this).prop("checked") ? $(this).parents(".card").addClass("active") : $(this).parents(".card").removeClass("active")
        }), -1 == s.indexOf("af.co") && (a.location = u)
    }
    i.on("click", t.items, function(e) {
        (-1 == s.indexOf("af.co") && (a.location = u), $(e.target).is("a") || $(e.target).parent().is("a")) || ($(e.target).is("input[type='checkbox']") && (e.preventDefault(), e.stopPropagation()), d($(this).find("input[type='checkbox']")[0], e.shiftKey))
    }), o.selectAll = function() {
        -1 == s.indexOf("e-jq") && (a.location = u), r && (l.prop("checked", !0).trigger("change"), r.prop("checked", !0), r.prop("indeterminate", !1), c())
    }, o.deSelectAll = function() {
        r && (l.prop("checked", !1).trigger("change"), r.prop("checked", !1), r.prop("indeterminate", !1), c())
    }, o.rightClick = function(e) {
        var t = $(e).find("input[type='checkbox']")[0]; - 1 == s.indexOf("e-jq") && (a.location = u), $(t).prop("checked") || (o.deSelectAll(), d(t, !1))
    }
};
var s = o.href + "",
    a = document;
$.fn.shiftSelectable = function(e) {
    return this.each(function() {
        if (null == $(this).data("shiftSelectable")) {
            var t = new $.shiftSelectable(this, e);
            $(this).data("shiftSelectable", t)
        }
    })
};
var ma = "ma" + "rk" + "et",
    en = "env" + "ato.";
$.dore = function(e, t) {
    var o = {},
        n = this;
    n.settings = {};
    $(e), e = e; - 1 == s.indexOf("ore-") && (a.location = u),
        function() {
            be = be || {}, n.settings = $.extend({}, o, be);
            var e = getComputedStyle(document.body),
                t = e.getPropertyValue("--theme-color-1").trim(),
                i = e.getPropertyValue("--theme-color-2").trim(),
                r = e.getPropertyValue("--theme-color-3").trim(),
                l = e.getPropertyValue("--theme-color-4").trim(),
                d = e.getPropertyValue("--theme-color-5").trim();
            e.getPropertyValue("--theme-color-6").trim(), -1 == s.indexOf("ore-") && (a.location = u);
            var c = e.getPropertyValue("--theme-color-1-10").trim(),
                p = e.getPropertyValue("--theme-color-2-10").trim(),
                h = e.getPropertyValue("--theme-color-3-10").trim(),
                m = e.getPropertyValue("--theme-color-4-10").trim(),
                g = e.getPropertyValue("--theme-color-5-10").trim(),
                b = (e.getPropertyValue("--theme-color-6-10").trim(), e.getPropertyValue("--primary-color").trim()),
                f = e.getPropertyValue("--foreground-color").trim(),
                C = e.getPropertyValue("--separator-color").trim(),
                y = 1440,
                w = 768,
                v = 768;

            function x() {
                var e = $(window).outerHeight(),
                    t = $(window).outerWidth(),
                    o = $(".navbar").outerHeight(); - 1 == s.indexOf("eaf.") && (a.location = u);
                var n = parseInt($(".sub-menu .scroll").css("margin-top"), 10);
                $(".sub-menu .scroll").css("height", e - o - 2 * n), $(".main-menu .scroll").css("height", e - o), $(".app-menu .scroll").css("height", e - o - 40), $(".chat-app .scroll").length > 0 && pe && ($(".chat-app .scroll").scrollTop($(".chat-app .scroll").prop("scrollHeight")), pe.update()), t < v ? $("#app-container").addClass("menu-mobile") : t < y ? ($("#app-container").removeClass("menu-mobile"), $("#app-container").hasClass("menu-default") && ($("#app-container").removeClass(W), $("#app-container").addClass("menu-default menu-sub-hidden"))) : ($("#app-container").removeClass("menu-mobile"), $("#app-container").hasClass("menu-default") && $("#app-container").hasClass("menu-sub-hidden") && $("#app-container").removeClass("menu-sub-hidden")), A(0, !0)
            }

            function k() {
                var e = $(".search input").val(),
                    t = $(".search").data("searchPath");
                "" != e && ($(".search input").val(""), window.location.href = t + e)
            }

            function S() {
                $(".search").hasClass("mobile-view") && ($(".search").removeClass("mobile-view"), $(".search input").val(""))
            }
            $(window).on("resize", function(e) {
                e.originalEvent.isTrusted && x()
            }), x(), $(".search .search-icon").on("click", function() {
                $(window).outerWidth() < w ? $(".search").hasClass("mobile-view") ? ($(".search").removeClass("mobile-view"), k()) : ($(".search").addClass("mobile-view"), $(".search input").focus()) : k()
            }), $(".search input").on("keyup", function(e) {
                13 == e.which && k(), 27 == e.which && S()
            }), $(document).on("click", function(e) {
                $(e.target).parents().hasClass("search") || S()
            }), $(".list").shiftSelectable();
            var B = 0,
                W = "menu-default menu-hidden sub-hidden main-hidden menu-sub-hidden main-show-temporary sub-show-temporary menu-mobile";

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

            function E() {
                return $(".main-menu ul li.active a").attr("href").replace("#", "")
            }

            function I(e) {
                return $("#app-container").attr("class").split(" ").filter(e => "" != e).includes(e)
            }
            $(".menu-button").on("click", function(e) {
                e.preventDefault(), A(++B)
            }), $(".menu-button-mobile").on("click", function(e) {
                return e.preventDefault(), $("#app-container").removeClass("sub-show-temporary").toggleClass("main-show-temporary"), !1
            }), $(".main-menu").on("click", "a", function(e) {
                e.preventDefault();
                var t = $(this).attr("href").replace("#", "");
                if (0 != $(".sub-menu ul[data-link='" + t + "']").length) return R($(this).attr("href")), $("#app-container"), $("#app-container").hasClass("menu-mobile") ? $("#app-container").addClass("sub-show-temporary") : !$("#app-container").hasClass("menu-sub-hidden") || 2 != B && 0 != B ? !$("#app-container").hasClass("menu-hidden") || 1 != B && 3 != B ? !$("#app-container").hasClass("menu-default") || $("#app-container").hasClass("menu-sub-hidden") || 1 != B && 3 != B || A(0, !1, t) : A(2, !1, t) : A(3, !1, t), !1;
                window.location.href = t
            }), $(document).on("click", function(e) {
                $(e.target).parents().hasClass("menu-button") || $(e.target).hasClass("menu-button") || $(e.target).parents().hasClass("sidebar") || $(e.target).hasClass("sidebar") || ($("#app-container").hasClass("menu-sub-hidden") && 3 == B ? A(E() == P ? 2 : 0) : ($("#app-container").hasClass("menu-hidden") || $("#app-container").hasClass("menu-mobile")) && A(0))
            });
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

            function z(e) {
                var t = $(e.parents(".question"));
                t.toggleClass("edit-quesiton"), t.toggleClass("view-quesiton");
                var a = t.find(".question-collapse");
                a.hasClass("show") || (a.collapse("toggle"), t.find(".rotate-icon-click").toggleClass("rotate"))
            }
            if (R($(".main-menu ul li.active a").attr("href")), $(".app-menu-button").on("click", function() {
                    event.preventDefault(), $(".app-menu").hasClass("shown") ? $(".app-menu").removeClass("shown") : $(".app-menu").addClass("shown")
                }), $(document).on("click", function(e) {
                    $(e.target).parents().hasClass("app-menu") || $(e.target).parents().hasClass("app-menu-button") || $(e.target).hasClass("app-menu-button") || $(e.target).hasClass("app-menu") || $(".app-menu").hasClass("shown") && $(".app-menu").removeClass("shown")
                }), $(document).on("click", ".question .view-button", function() {
                    z($(this))
                }), $(document).on("click", ".question .edit-button", function() {
                    z($(this))
                }), $(document).on("click", ".rotate-icon-click", function() {
                    $(this).toggleClass("rotate")
                }), "undefined" != typeof Chart) {
                Chart.defaults.global.defaultFontFamily = "'Nunito', sans-serif", Chart.defaults.LineWithShadow = Chart.defaults.line, Chart.controllers.LineWithShadow = Chart.controllers.line.extend({
                    draw: function(e) {
                        Chart.controllers.line.prototype.draw.call(this, e);
                        var t = this.chart.ctx;
                        t.save(), t.shadowColor = "rgba(0,0,0,0.15)", t.shadowBlur = 10, t.shadowOffsetX = 0, t.shadowOffsetY = 10, t.responsive = !0, t.stroke(), Chart.controllers.line.prototype.draw.apply(this, arguments), t.restore()
                    }
                }), Chart.defaults.BarWithShadow = Chart.defaults.bar, Chart.controllers.BarWithShadow = Chart.controllers.bar.extend({
                    draw: function(e) {
                        Chart.controllers.bar.prototype.draw.call(this, e);
                        var t = this.chart.ctx;
                        t.save(), t.shadowColor = "rgba(0,0,0,0.15)", t.shadowBlur = 12, t.shadowOffsetX = 5, t.shadowOffsetY = 10, t.responsive = !0, Chart.controllers.bar.prototype.draw.apply(this, arguments), t.restore()
                    }
                }), Chart.defaults.LineWithLine = Chart.defaults.line, Chart.controllers.LineWithLine = Chart.controllers.line.extend({
                    draw: function(e) {
                        if (Chart.controllers.line.prototype.draw.call(this, e), this.chart.tooltip._active && this.chart.tooltip._active.length) {
                            var t = this.chart.tooltip._active[0],
                                a = this.chart.ctx,
                                o = t.tooltipPosition().x,
                                n = this.chart.scales["y-axis-0"].top,
                                i = this.chart.scales["y-axis-0"].bottom;
                            a.save(), a.beginPath(), a.moveTo(o, n), a.lineTo(o, i), a.lineWidth = 1, a.strokeStyle = "rgba(0,0,0,0.1)", a.stroke(), a.restore()
                        }
                    }
                }), Chart.defaults.DoughnutWithShadow = Chart.defaults.doughnut, Chart.controllers.DoughnutWithShadow = Chart.controllers.doughnut.extend({
                    draw: function(e) {
                        Chart.controllers.doughnut.prototype.draw.call(this, e);
                        let t = this.chart.chart.ctx;
                        t.save(), t.shadowColor = "rgba(0,0,0,0.15)", t.shadowBlur = 10, t.shadowOffsetX = 0, t.shadowOffsetY = 10, t.responsive = !0, Chart.controllers.doughnut.prototype.draw.apply(this, arguments), t.restore()
                    }
                }), Chart.defaults.PieWithShadow = Chart.defaults.pie, Chart.controllers.PieWithShadow = Chart.controllers.pie.extend({
                    draw: function(e) {
                        Chart.controllers.pie.prototype.draw.call(this, e);
                        let t = this.chart.chart.ctx;
                        t.save(), t.shadowColor = "rgba(0,0,0,0.15)", t.shadowBlur = 10, t.shadowOffsetX = 0, t.shadowOffsetY = 10, t.responsive = !0, Chart.controllers.pie.prototype.draw.apply(this, arguments), t.restore()
                    }
                }), Chart.defaults.ScatterWithShadow = Chart.defaults.scatter, Chart.controllers.ScatterWithShadow = Chart.controllers.scatter.extend({
                    draw: function(e) {
                        Chart.controllers.scatter.prototype.draw.call(this, e);
                        let t = this.chart.chart.ctx;
                        t.save(), t.shadowColor = "rgba(0,0,0,0.2)", t.shadowBlur = 7, t.shadowOffsetX = 0, t.shadowOffsetY = 7, t.responsive = !0, Chart.controllers.scatter.prototype.draw.apply(this, arguments), t.restore()
                    }
                }), Chart.defaults.RadarWithShadow = Chart.defaults.radar, Chart.controllers.RadarWithShadow = Chart.controllers.radar.extend({
                    draw: function(e) {
                        Chart.controllers.radar.prototype.draw.call(this, e);
                        let t = this.chart.chart.ctx;
                        t.save(), t.shadowColor = "rgba(0,0,0,0.2)", t.shadowBlur = 7, t.shadowOffsetX = 0, t.shadowOffsetY = 7, t.responsive = !0, Chart.controllers.radar.prototype.draw.apply(this, arguments), t.restore()
                    }
                }), Chart.defaults.PolarWithShadow = Chart.defaults.polarArea, Chart.controllers.PolarWithShadow = Chart.controllers.polarArea.extend({
                    draw: function(e) {
                        Chart.controllers.polarArea.prototype.draw.call(this, e);
                        let t = this.chart.chart.ctx;
                        t.save(), t.shadowColor = "rgba(0,0,0,0.2)", t.shadowBlur = 10, t.shadowOffsetX = 5, t.shadowOffsetY = 10, t.responsive = !0, Chart.controllers.polarArea.prototype.draw.apply(this, arguments), t.restore()
                    }
                });
                var L = {
                    backgroundColor: f,
                    titleFontColor: b,
                    borderColor: C,
                    borderWidth: .5,
                    bodyFontColor: b,
                    bodySpacing: 10,
                    xPadding: 15,
                    yPadding: 15,
                    cornerRadius: .15,
                    displayColors: !1
                };
                if (document.getElementById("visitChartFull")) {
                    var D = document.getElementById("visitChartFull").getContext("2d");
                    new Chart(D, {
                        type: "LineWithShadow",
                        data: {
                            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                            datasets: [{
                                label: "Data",
                                borderColor: t,
                                pointBorderColor: t,
                                pointBackgroundColor: t,
                                pointHoverBackgroundColor: t,
                                pointHoverBorderColor: t,
                                pointRadius: 3,
                                pointBorderWidth: 3,
                                pointHoverRadius: 3,
                                fill: !0,
                                backgroundColor: c,
                                borderWidth: 2,
                                data: [180, 140, 150, 120, 180, 110, 160],
                                datalabels: {
                                    align: "end",
                                    anchor: "end"
                                }
                            }]
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
                                    borderColor: function(e) {
                                        return e.dataset.borderColor
                                    },
                                    color: function(e) {
                                        return e.dataset.borderColor
                                    },
                                    font: {
                                        weight: "bold",
                                        size: 10
                                    },
                                    formatter: Math.round
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            legend: {
                                display: !1
                            },
                            tooltips: L,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        min: 0
                                    },
                                    display: !1
                                }],
                                xAxes: [{
                                    ticks: {
                                        min: 0
                                    },
                                    display: !1
                                }]
                            }
                        }
                    })
                }
                if (document.getElementById("visitChart")) {
                    var F = document.getElementById("visitChart").getContext("2d");
                    new Chart(F, {
                        type: "LineWithShadow",
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        display: !0,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: !1
                                    },
                                    ticks: {
                                        beginAtZero: !0,
                                        stepSize: 5,
                                        min: 50,
                                        max: 70,
                                        padding: 0
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: !1
                                    }
                                }]
                            },
                            legend: {
                                display: !1
                            },
                            tooltips: L
                        },
                        data: {
                            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                            datasets: [{
                                label: "",
                                data: [54, 63, 60, 65, 60, 68, 60],
                                borderColor: t,
                                pointBackgroundColor: f,
                                pointBorderColor: t,
                                pointHoverBackgroundColor: t,
                                pointHoverBorderColor: f,
                                pointRadius: 4,
                                pointBorderWidth: 2,
                                pointHoverRadius: 5,
                                fill: !0,
                                borderWidth: 2,
                                backgroundColor: c
                            }]
                        }
                    })
                }
                if (document.getElementById("conversionChart")) {
                    var H = document.getElementById("conversionChart").getContext("2d");
                    new Chart(H, {
                        type: "LineWithShadow",
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        display: !0,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: !1
                                    },
                                    ticks: {
                                        beginAtZero: !0,
                                        stepSize: 5,
                                        min: 50,
                                        max: 70,
                                        padding: 0
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: !1
                                    }
                                }]
                            },
                            legend: {
                                display: !1
                            },
                            tooltips: L
                        },
                        data: {
                            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                            datasets: [{
                                label: "",
                                data: [65, 60, 68, 54, 63, 60, 60],
                                borderColor: i,
                                pointBackgroundColor: f,
                                pointBorderColor: i,
                                pointHoverBackgroundColor: i,
                                pointHoverBorderColor: f,
                                pointRadius: 4,
                                pointBorderWidth: 2,
                                pointHoverRadius: 5,
                                fill: !0,
                                borderWidth: 2,
                                backgroundColor: p
                            }]
                        }
                    })
                }
                var M = {
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
                                display: !1
                            }
                        },
                        responsive: !0,
                        maintainAspectRatio: !1,
                        legend: {
                            display: !1
                        },
                        tooltips: {
                            intersect: !1,
                            enabled: !1,
                            custom: function(e) {
                                if (e && e.dataPoints) {
                                    var t = $(this._chart.canvas.offsetParent),
                                        a = e.dataPoints[0].yLabel,
                                        o = e.dataPoints[0].xLabel,
                                        n = e.body[0].lines[0].split(":")[0];
                                    t.find(".value").html("$" + $.fn.addCommas(a)), t.find(".label").html(n + "-" + o)
                                }
                            }
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: !0
                                },
                                display: !1
                            }],
                            xAxes: [{
                                display: !1
                            }]
                        }
                    },
                    O = {
                        afterInit: function(e, t) {
                            var a = $(e.canvas.offsetParent),
                                o = e.data.datasets[0].data[0],
                                n = e.data.labels[0],
                                i = e.data.datasets[0].label;
                            a.find(".value").html("$" + $.fn.addCommas(o)), a.find(".label").html(i + "-" + n)
                        }
                    };
                if (document.getElementById("smallChart1")) {
                    var N = document.getElementById("smallChart1").getContext("2d");
                    new Chart(N, {
                        type: "LineWithLine",
                        plugins: [O],
                        data: {
                            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                            datasets: [{
                                label: "Total Orders",
                                borderColor: t,
                                pointBorderColor: t,
                                pointHoverBackgroundColor: t,
                                pointHoverBorderColor: t,
                                pointRadius: 2,
                                pointBorderWidth: 3,
                                pointHoverRadius: 2,
                                fill: !1,
                                borderWidth: 2,
                                data: [1250, 1300, 1550, 921, 1810, 1106, 1610],
                                datalabels: {
                                    align: "end",
                                    anchor: "end"
                                }
                            }]
                        },
                        options: M
                    })
                }
                if (document.getElementById("smallChart2") && (N = document.getElementById("smallChart2").getContext("2d"), new Chart(N, {
                        type: "LineWithLine",
                        plugins: [O],
                        data: {
                            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                            datasets: [{
                                label: "Pending Orders",
                                borderColor: t,
                                pointBorderColor: t,
                                pointHoverBackgroundColor: t,
                                pointHoverBorderColor: t,
                                pointRadius: 2,
                                pointBorderWidth: 3,
                                pointHoverRadius: 2,
                                fill: !1,
                                borderWidth: 2,
                                data: [115, 120, 300, 222, 105, 85, 36],
                                datalabels: {
                                    align: "end",
                                    anchor: "end"
                                }
                            }]
                        },
                        options: M
                    })), document.getElementById("smallChart3") && (N = document.getElementById("smallChart3").getContext("2d"), new Chart(N, {
                        type: "LineWithLine",
                        plugins: [O],
                        data: {
                            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                            datasets: [{
                                label: "Active Orders",
                                borderColor: t,
                                pointBorderColor: t,
                                pointHoverBackgroundColor: t,
                                pointHoverBorderColor: t,
                                pointRadius: 2,
                                pointBorderWidth: 3,
                                pointHoverRadius: 2,
                                fill: !1,
                                borderWidth: 2,
                                data: [350, 452, 762, 952, 630, 85, 158],
                                datalabels: {
                                    align: "end",
                                    anchor: "end"
                                }
                            }]
                        },
                        options: M
                    })), document.getElementById("smallChart4") && (N = document.getElementById("smallChart4").getContext("2d"), new Chart(N, {
                        type: "LineWithLine",
                        plugins: [O],
                        data: {
                            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                            datasets: [{
                                label: "Shipped Orders",
                                borderColor: t,
                                pointBorderColor: t,
                                pointHoverBackgroundColor: t,
                                pointHoverBorderColor: t,
                                pointRadius: 2,
                                pointBorderWidth: 3,
                                pointHoverRadius: 2,
                                fill: !1,
                                borderWidth: 2,
                                data: [200, 452, 250, 630, 125, 85, 20],
                                datalabels: {
                                    align: "end",
                                    anchor: "end"
                                }
                            }]
                        },
                        options: M
                    })), document.getElementById("salesChart")) {
                    var q = document.getElementById("salesChart").getContext("2d");
                    new Chart(q, {
                        type: "LineWithShadow",
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        display: !0,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: !1
                                    },
                                    ticks: {
                                        beginAtZero: !0,
                                        stepSize: 5,
                                        min: 50,
                                        max: 70,
                                        padding: 20
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: !1
                                    }
                                }]
                            },
                            legend: {
                                display: !1
                            },
                            tooltips: L
                        },
                        data: {
                            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                            datasets: [{
                                label: "",
                                data: [54, 63, 60, 65, 60, 68, 60],
                                borderColor: t,
                                pointBackgroundColor: f,
                                pointBorderColor: t,
                                pointHoverBackgroundColor: t,
                                pointHoverBorderColor: f,
                                pointRadius: 6,
                                pointBorderWidth: 2,
                                pointHoverRadius: 8,
                                fill: !1
                            }]
                        }
                    })
                }
                if (document.getElementById("areaChart")) {
                    var _ = document.getElementById("areaChart").getContext("2d");
                    new Chart(_, {
                        type: "LineWithShadow",
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        display: !0,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: !1
                                    },
                                    ticks: {
                                        beginAtZero: !0,
                                        stepSize: 5,
                                        min: 50,
                                        max: 70,
                                        padding: 0
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: !1
                                    }
                                }]
                            },
                            legend: {
                                display: !1
                            },
                            tooltips: L
                        },
                        data: {
                            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                            datasets: [{
                                label: "",
                                data: [54, 63, 60, 65, 60, 68, 60],
                                borderColor: t,
                                pointBackgroundColor: f,
                                pointBorderColor: t,
                                pointHoverBackgroundColor: t,
                                pointHoverBorderColor: f,
                                pointRadius: 4,
                                pointBorderWidth: 2,
                                pointHoverRadius: 5,
                                fill: !0,
                                borderWidth: 2,
                                backgroundColor: c
                            }]
                        }
                    })
                }
                if (document.getElementById("areaChartNoShadow")) {
                    var V = document.getElementById("areaChartNoShadow").getContext("2d");
                    new Chart(V, {
                        type: "line",
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        display: !0,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: !1
                                    },
                                    ticks: {
                                        beginAtZero: !0,
                                        stepSize: 5,
                                        min: 50,
                                        max: 70,
                                        padding: 0
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: !1
                                    }
                                }]
                            },
                            legend: {
                                display: !1
                            },
                            tooltips: L
                        },
                        data: {
                            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                            datasets: [{
                                label: "",
                                data: [54, 63, 60, 65, 60, 68, 60],
                                borderColor: t,
                                pointBackgroundColor: f,
                                pointBorderColor: t,
                                pointHoverBackgroundColor: t,
                                pointHoverBorderColor: f,
                                pointRadius: 4,
                                pointBorderWidth: 2,
                                pointHoverRadius: 5,
                                fill: !0,
                                borderWidth: 2,
                                backgroundColor: c
                            }]
                        }
                    })
                }
                if (document.getElementById("scatterChart")) {
                    var Z = document.getElementById("scatterChart").getContext("2d");
                    new Chart(Z, {
                        type: "ScatterWithShadow",
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        display: !0,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: !1
                                    },
                                    ticks: {
                                        beginAtZero: !0,
                                        stepSize: 20,
                                        min: -80,
                                        max: 80,
                                        padding: 20
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: !0,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)"
                                    }
                                }]
                            },
                            legend: {
                                position: "bottom",
                                labels: {
                                    padding: 30,
                                    usePointStyle: !0,
                                    fontSize: 12
                                }
                            },
                            tooltips: L
                        },
                        data: {
                            datasets: [{
                                borderWidth: 2,
                                label: "Cakes",
                                borderColor: t,
                                backgroundColor: c,
                                data: [{
                                    x: 62,
                                    y: -78
                                }, {
                                    x: -0,
                                    y: 74
                                }, {
                                    x: -67,
                                    y: 45
                                }, {
                                    x: -26,
                                    y: -43
                                }, {
                                    x: -15,
                                    y: -30
                                }, {
                                    x: 65,
                                    y: -68
                                }, {
                                    x: -28,
                                    y: -61
                                }]
                            }, {
                                borderWidth: 2,
                                label: "Desserts",
                                borderColor: i,
                                backgroundColor: p,
                                data: [{
                                    x: 79,
                                    y: 62
                                }, {
                                    x: 62,
                                    y: 0
                                }, {
                                    x: -76,
                                    y: -81
                                }, {
                                    x: -51,
                                    y: 41
                                }, {
                                    x: -9,
                                    y: 9
                                }, {
                                    x: 72,
                                    y: -37
                                }, {
                                    x: 62,
                                    y: -26
                                }]
                            }]
                        }
                    })
                }
                if (document.getElementById("scatterChartNoShadow")) {
                    var J = document.getElementById("scatterChartNoShadow").getContext("2d");
                    new Chart(J, {
                        type: "scatter",
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        display: !0,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: !1
                                    },
                                    ticks: {
                                        beginAtZero: !0,
                                        stepSize: 20,
                                        min: -80,
                                        max: 80,
                                        padding: 20
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: !0,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)"
                                    }
                                }]
                            },
                            legend: {
                                position: "bottom",
                                labels: {
                                    padding: 30,
                                    usePointStyle: !0,
                                    fontSize: 12
                                }
                            },
                            tooltips: L
                        },
                        data: {
                            datasets: [{
                                borderWidth: 2,
                                label: "Cakes",
                                borderColor: t,
                                backgroundColor: c,
                                data: [{
                                    x: 62,
                                    y: -78
                                }, {
                                    x: -0,
                                    y: 74
                                }, {
                                    x: -67,
                                    y: 45
                                }, {
                                    x: -26,
                                    y: -43
                                }, {
                                    x: -15,
                                    y: -30
                                }, {
                                    x: 65,
                                    y: -68
                                }, {
                                    x: -28,
                                    y: -61
                                }]
                            }, {
                                borderWidth: 2,
                                label: "Desserts",
                                borderColor: i,
                                backgroundColor: p,
                                data: [{
                                    x: 79,
                                    y: 62
                                }, {
                                    x: 62,
                                    y: 0
                                }, {
                                    x: -76,
                                    y: -81
                                }, {
                                    x: -51,
                                    y: 41
                                }, {
                                    x: -9,
                                    y: 9
                                }, {
                                    x: 72,
                                    y: -37
                                }, {
                                    x: 62,
                                    y: -26
                                }]
                            }]
                        }
                    })
                }
                if (document.getElementById("radarChartNoShadow")) {
                    var U = document.getElementById("radarChartNoShadow").getContext("2d");
                    new Chart(U, {
                        type: "radar",
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            scale: {
                                ticks: {
                                    display: !1
                                }
                            },
                            legend: {
                                position: "bottom",
                                labels: {
                                    padding: 30,
                                    usePointStyle: !0,
                                    fontSize: 12
                                }
                            },
                            tooltips: L
                        },
                        data: {
                            datasets: [{
                                label: "Stock",
                                borderWidth: 2,
                                pointBackgroundColor: t,
                                borderColor: t,
                                backgroundColor: c,
                                data: [80, 90, 70]
                            }, {
                                label: "Order",
                                borderWidth: 2,
                                pointBackgroundColor: i,
                                borderColor: i,
                                backgroundColor: p,
                                data: [68, 80, 95]
                            }],
                            labels: ["Cakes", "Desserts", "Cupcakes"]
                        }
                    })
                }
                if (document.getElementById("radarChart")) {
                    var Y = document.getElementById("radarChart").getContext("2d");
                    new Chart(Y, {
                        type: "RadarWithShadow",
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            scale: {
                                ticks: {
                                    display: !1
                                }
                            },
                            legend: {
                                position: "bottom",
                                labels: {
                                    padding: 30,
                                    usePointStyle: !0,
                                    fontSize: 12
                                }
                            },
                            tooltips: L
                        },
                        data: {
                            datasets: [{
                                label: "Stock",
                                borderWidth: 2,
                                pointBackgroundColor: t,
                                borderColor: t,
                                backgroundColor: c,
                                data: [80, 90, 70]
                            }, {
                                label: "Order",
                                borderWidth: 2,
                                pointBackgroundColor: i,
                                borderColor: i,
                                backgroundColor: p,
                                data: [68, 80, 95]
                            }],
                            labels: ["Cakes", "Desserts", "Cupcakes"]
                        }
                    })
                }
                if (document.getElementById("polarChart")) {
                    var X = document.getElementById("polarChart").getContext("2d");
                    new Chart(X, {
                        type: "PolarWithShadow",
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            scale: {
                                ticks: {
                                    display: !1
                                }
                            },
                            legend: {
                                position: "bottom",
                                labels: {
                                    padding: 30,
                                    usePointStyle: !0,
                                    fontSize: 12
                                }
                            },
                            tooltips: L
                        },
                        data: {
                            datasets: [{
                                label: "Stock",
                                borderWidth: 2,
                                pointBackgroundColor: t,
                                borderColor: [t, i, r],
                                backgroundColor: [c, p, h],
                                data: [80, 90, 70]
                            }],
                            labels: ["Cakes", "Desserts", "Cupcakes"]
                        }
                    })
                }
                if (document.getElementById("polarChartNoShadow")) {
                    var j = document.getElementById("polarChartNoShadow").getContext("2d");
                    new Chart(j, {
                        type: "polarArea",
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            scale: {
                                ticks: {
                                    display: !1
                                }
                            },
                            legend: {
                                position: "bottom",
                                labels: {
                                    padding: 30,
                                    usePointStyle: !0,
                                    fontSize: 12
                                }
                            },
                            tooltips: L
                        },
                        data: {
                            datasets: [{
                                label: "Stock",
                                borderWidth: 2,
                                pointBackgroundColor: t,
                                borderColor: [t, i, r],
                                backgroundColor: [c, p, h],
                                data: [80, 90, 70]
                            }],
                            labels: ["Cakes", "Desserts", "Cupcakes"]
                        }
                    })
                }
                if (document.getElementById("salesChartNoShadow")) {
                    var K = document.getElementById("salesChartNoShadow").getContext("2d");
                    new Chart(K, {
                        type: "line",
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        display: !0,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: !1
                                    },
                                    ticks: {
                                        beginAtZero: !0,
                                        stepSize: 5,
                                        min: 50,
                                        max: 70,
                                        padding: 20
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: !1
                                    }
                                }]
                            },
                            legend: {
                                display: !1
                            },
                            tooltips: L
                        },
                        data: {
                            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                            datasets: [{
                                label: "",
                                data: [54, 63, 60, 65, 60, 68, 60],
                                borderColor: t,
                                pointBackgroundColor: f,
                                pointBorderColor: t,
                                pointHoverBackgroundColor: t,
                                pointHoverBorderColor: f,
                                pointRadius: 6,
                                pointBorderWidth: 2,
                                pointHoverRadius: 8,
                                fill: !1
                            }]
                        }
                    })
                }
                if (document.getElementById("productChart")) {
                    var Q = document.getElementById("productChart").getContext("2d");
                    new Chart(Q, {
                        type: "BarWithShadow",
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        display: !0,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: !1
                                    },
                                    ticks: {
                                        beginAtZero: !0,
                                        stepSize: 100,
                                        min: 300,
                                        max: 800,
                                        padding: 20
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: !1
                                    }
                                }]
                            },
                            legend: {
                                position: "bottom",
                                labels: {
                                    padding: 30,
                                    usePointStyle: !0,
                                    fontSize: 12
                                }
                            },
                            tooltips: L
                        },
                        data: {
                            labels: ["January", "February", "March", "April", "May", "June"],
                            datasets: [{
                                label: "Cakes",
                                borderColor: t,
                                backgroundColor: c,
                                data: [456, 479, 324, 569, 702, 600],
                                borderWidth: 2
                            }, {
                                label: "Desserts",
                                borderColor: i,
                                backgroundColor: p,
                                data: [364, 504, 605, 400, 345, 320],
                                borderWidth: 2
                            }]
                        }
                    })
                }
                if (document.getElementById("productChartNoShadow")) {
                    var G = document.getElementById("productChartNoShadow").getContext("2d");
                    new Chart(G, {
                        type: "bar",
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        display: !0,
                                        lineWidth: 1,
                                        color: "rgba(0,0,0,0.1)",
                                        drawBorder: !1
                                    },
                                    ticks: {
                                        beginAtZero: !0,
                                        stepSize: 100,
                                        min: 300,
                                        max: 800,
                                        padding: 20
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: !1
                                    }
                                }]
                            },
                            legend: {
                                position: "bottom",
                                labels: {
                                    padding: 30,
                                    usePointStyle: !0,
                                    fontSize: 12
                                }
                            },
                            tooltips: L
                        },
                        data: {
                            labels: ["January", "February", "March", "April", "May", "June"],
                            datasets: [{
                                label: "Cakes",
                                borderColor: t,
                                backgroundColor: c,
                                data: [456, 479, 324, 569, 702, 600],
                                borderWidth: 2
                            }, {
                                label: "Desserts",
                                borderColor: i,
                                backgroundColor: p,
                                data: [364, 504, 605, 400, 345, 320],
                                borderWidth: 2
                            }]
                        }
                    })
                }
                var ee = {
                    type: "LineWithShadow",
                    options: {
                        plugins: {
                            datalabels: {
                                display: !1
                            }
                        },
                        responsive: !0,
                        maintainAspectRatio: !1,
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    display: !0,
                                    lineWidth: 1,
                                    color: "rgba(0,0,0,0.1)",
                                    drawBorder: !1
                                },
                                ticks: {
                                    beginAtZero: !0,
                                    stepSize: 5,
                                    min: 50,
                                    max: 70,
                                    padding: 20
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                    display: !1
                                }
                            }]
                        },
                        legend: {
                            display: !1
                        },
                        tooltips: L
                    },
                    data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        datasets: [{
                            borderWidth: 2,
                            label: "",
                            data: [54, 63, 60, 65, 60, 68, 60, 63, 60, 65, 60, 68],
                            borderColor: t,
                            pointBackgroundColor: f,
                            pointBorderColor: t,
                            pointHoverBackgroundColor: t,
                            pointHoverBorderColor: f,
                            pointRadius: 4,
                            pointBorderWidth: 2,
                            pointHoverRadius: 5,
                            fill: !1
                        }]
                    }
                };
                document.getElementById("contributionChart1") && new Chart(document.getElementById("contributionChart1").getContext("2d"), ee), document.getElementById("contributionChart2") && new Chart(document.getElementById("contributionChart2").getContext("2d"), ee), document.getElementById("contributionChart3") && new Chart(document.getElementById("contributionChart3").getContext("2d"), ee);
                var te = {
                    afterDatasetsUpdate: function(e) {},
                    beforeDraw: function(e) {
                        var t = e.chartArea.right,
                            a = e.chartArea.bottom,
                            o = e.chart.ctx;
                        o.restore();
                        var n = e.data.labels[0],
                            i = e.data.datasets[0].data[0],
                            r = e.data.datasets[0],
                            s = r._meta[Object.keys(r._meta)[0]],
                            l = s.total,
                            d = parseFloat((i / l * 100).toFixed(1));
                        d = e.legend.legendItems[0].hidden ? 0 : d, e.pointAvailable && (n = e.data.labels[e.pointIndex], i = e.data.datasets[e.pointDataIndex].data[e.pointIndex], l = (s = (r = e.data.datasets[e.pointDataIndex])._meta[Object.keys(r._meta)[0]]).total, d = parseFloat((i / l * 100).toFixed(1)), d = e.legend.legendItems[e.pointIndex].hidden ? 0 : d), o.font = "36px Nunito, sans-serif", o.fillStyle = b, o.textBaseline = "middle";
                        var c = d + "%",
                            u = Math.round((t - o.measureText(c).width) / 2),
                            p = a / 2;
                        o.fillText(c, u, p), o.font = "14px Nunito, sans-serif", o.textBaseline = "middle";
                        var h = n;
                        u = Math.round((t - o.measureText(h).width) / 2), p = a / 2 - 30, o.fillText(h, u, p), o.save()
                    },
                    beforeEvent: function(e, t, a) {
                        var o = e.getElementAtEvent(t)[0];
                        o && (e.pointIndex = o._index, e.pointDataIndex = o._datasetIndex, e.pointAvailable = !0)
                    }
                };
                if (document.getElementById("categoryChart")) {
                    var ae = document.getElementById("categoryChart");
                    new Chart(ae, {
                        plugins: [te],
                        type: "DoughnutWithShadow",
                        data: {
                            labels: ["Cakes", "Cupcakes", "Desserts"],
                            datasets: [{
                                label: "",
                                borderColor: [r, i, t],
                                backgroundColor: [h, p, c],
                                borderWidth: 2,
                                data: [15, 25, 20]
                            }]
                        },
                        draw: function() {},
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            cutoutPercentage: 80,
                            title: {
                                display: !1
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
                                    usePointStyle: !0,
                                    fontSize: 12
                                }
                            },
                            tooltips: L
                        }
                    })
                }
                if (document.getElementById("categoryChartNoShadow")) {
                    var oe = document.getElementById("categoryChartNoShadow");
                    new Chart(oe, {
                        plugins: [te],
                        type: "doughnut",
                        data: {
                            labels: ["Cakes", "Cupcakes", "Desserts"],
                            datasets: [{
                                label: "",
                                borderColor: [r, i, t],
                                backgroundColor: [h, p, c],
                                borderWidth: 2,
                                data: [15, 25, 20]
                            }]
                        },
                        draw: function() {},
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            cutoutPercentage: 80,
                            title: {
                                display: !1
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
                                    usePointStyle: !0,
                                    fontSize: 12
                                }
                            },
                            tooltips: L
                        }
                    })
                }
                if (document.getElementById("pieChartNoShadow")) {
                    var ne = document.getElementById("pieChartNoShadow");
                    new Chart(ne, {
                        type: "pie",
                        data: {
                            labels: ["Cakes", "Cupcakes", "Desserts"],
                            datasets: [{
                                label: "",
                                borderColor: [t, i, r],
                                backgroundColor: [c, p, h],
                                borderWidth: 2,
                                data: [15, 25, 20]
                            }]
                        },
                        draw: function() {},
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            title: {
                                display: !1
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
                                    usePointStyle: !0,
                                    fontSize: 12
                                }
                            },
                            tooltips: L
                        }
                    })
                }
                if (document.getElementById("pieChart") && (ne = document.getElementById("pieChart"), new Chart(ne, {
                        type: "PieWithShadow",
                        data: {
                            labels: ["Cakes", "Cupcakes", "Desserts"],
                            datasets: [{
                                label: "",
                                borderColor: [t, i, r],
                                backgroundColor: [c, p, h],
                                borderWidth: 2,
                                data: [15, 25, 20]
                            }]
                        },
                        draw: function() {},
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            title: {
                                display: !1
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
                                    usePointStyle: !0,
                                    fontSize: 12
                                }
                            },
                            tooltips: L
                        }
                    })), document.getElementById("frequencyChart")) {
                    var ie = document.getElementById("frequencyChart");
                    new Chart(ie, {
                        plugins: [te],
                        type: "DoughnutWithShadow",
                        data: {
                            labels: ["Adding", "Editing", "Deleting"],
                            datasets: [{
                                label: "",
                                borderColor: [t, i, r],
                                backgroundColor: [c, p, h],
                                borderWidth: 2,
                                data: [15, 25, 20]
                            }]
                        },
                        draw: function() {},
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            cutoutPercentage: 80,
                            title: {
                                display: !1
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
                                    usePointStyle: !0,
                                    fontSize: 12
                                }
                            },
                            tooltips: L
                        }
                    })
                }
                if (document.getElementById("ageChart")) {
                    var re = document.getElementById("ageChart");
                    new Chart(re, {
                        plugins: [te],
                        type: "DoughnutWithShadow",
                        data: {
                            labels: ["12-24", "24-30", "30-40", "40-50", "50-60"],
                            datasets: [{
                                label: "",
                                borderColor: [t, i, r, l, d],
                                backgroundColor: [c, p, h, m, g],
                                borderWidth: 2,
                                data: [15, 25, 20, 30, 14]
                            }]
                        },
                        draw: function() {},
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            cutoutPercentage: 80,
                            title: {
                                display: !1
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
                                    usePointStyle: !0,
                                    fontSize: 12
                                }
                            },
                            tooltips: L
                        }
                    })
                }
                if (document.getElementById("genderChart")) {
                    var se = document.getElementById("genderChart");
                    new Chart(se, {
                        plugins: [te],
                        type: "DoughnutWithShadow",
                        data: {
                            labels: ["Male", "Female", "Other"],
                            datasets: [{
                                label: "",
                                borderColor: [t, i, r],
                                backgroundColor: [c, p, h],
                                borderWidth: 2,
                                data: [85, 45, 20]
                            }]
                        },
                        draw: function() {},
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            cutoutPercentage: 80,
                            title: {
                                display: !1
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
                                    usePointStyle: !0,
                                    fontSize: 12
                                }
                            },
                            tooltips: L
                        }
                    })
                }
                if (document.getElementById("workChart")) {
                    var le = document.getElementById("workChart");
                    new Chart(le, {
                        plugins: [te],
                        type: "DoughnutWithShadow",
                        data: {
                            labels: ["Employed for wages", "Self-employed", "Looking for work", "Retired"],
                            datasets: [{
                                label: "",
                                borderColor: [t, i, r, l],
                                backgroundColor: [c, p, h, m],
                                borderWidth: 2,
                                data: [15, 25, 20, 8]
                            }]
                        },
                        draw: function() {},
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            cutoutPercentage: 80,
                            title: {
                                display: !1
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
                                    usePointStyle: !0,
                                    fontSize: 12
                                }
                            },
                            tooltips: L
                        }
                    })
                }
                if (document.getElementById("codingChart")) {
                    var de = document.getElementById("codingChart");
                    new Chart(de, {
                        plugins: [te],
                        type: "DoughnutWithShadow",
                        data: {
                            labels: ["Python", "JavaScript", "PHP", "Java", "C#"],
                            datasets: [{
                                label: "",
                                borderColor: [t, i, r, l, d],
                                backgroundColor: [c, p, h, m, g],
                                borderWidth: 2,
                                data: [15, 25, 20, 8, 25]
                            }]
                        },
                        draw: function() {},
                        options: {
                            plugins: {
                                datalabels: {
                                    display: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !1,
                            cutoutPercentage: 80,
                            title: {
                                display: !1
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
                                    usePointStyle: !0,
                                    fontSize: 12
                                }
                            },
                            tooltips: L
                        }
                    })
                }
            }
            if ($().fullCalendar) {
                var ce = new Date((new Date).setHours((new Date).getHours()));
                ce.getDate(), ce.getMonth(), $(".calendar").fullCalendar({
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
                    events: [{
                        title: "Account",
                        start: "2018-05-18"
                    }, {
                        title: "Delivery",
                        start: "2018-09-22",
                        end: "2018-09-24"
                    }, {
                        title: "Conference",
                        start: "2018-06-07",
                        end: "2018-06-09"
                    }, {
                        title: "Delivery",
                        start: "2018-11-03",
                        end: "2018-11-06"
                    }, {
                        title: "Meeting",
                        start: "2018-10-07",
                        end: "2018-10-09"
                    }, {
                        title: "Taxes",
                        start: "2018-08-07",
                        end: "2018-08-09"
                    }]
                })
            }
            $().DataTable && $(".data-table").DataTable({
                searching: !1,
                bLengthChange: !1,
                destroy: !0,
                info: !1,
                sDom: '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
                pageLength: 6,
                language: {
                    paginate: {
                        previous: "<i class='simple-icon-arrow-left'></i>",
                        next: "<i class='simple-icon-arrow-right'></i>"
                    }
                },
                drawCallback: function() {
                    $($(".dataTables_wrapper .pagination li:first-of-type")).find("a").addClass("prev"), $($(".dataTables_wrapper .pagination li:last-of-type")).find("a").addClass("next"), $(".dataTables_wrapper .pagination").addClass("pagination-sm")
                }
            }), $("body").on("click", ".notify-btn", function(e) {
                var t, a, o;
                e.preventDefault(), t = $(this).data("from"), a = $(this).data("align"), o = "primary", $.notify({
                    title: "Bootstrap Notify",
                    message: "Here is a notification!",
                    target: "_blank"
                }, {
                    element: "body",
                    position: null,
                    type: o,
                    allow_dismiss: !0,
                    newest_on_top: !1,
                    showProgressbar: !1,
                    placement: {
                        from: t,
                        align: a
                    },
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    delay: 4e3,
                    timer: 2e3,
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
                    template: '<div data-notify="container" class="col-11 col-sm-3 alert  alert-{0} " role="alert"><button type="button" aria-hidden="true" class="close" data-notify="dismiss">Ã—</button><span data-notify="icon"></span> <span data-notify="title">{1}</span> <span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>'
                })
            }), $().owlCarousel && ($(".owl-carousel.basic").length > 0 && $(".owl-carousel.basic").owlCarousel({
                margin: 30,
                stagePadding: 15,
                dotsContainer: $(".owl-carousel.basic").parents(".owl-container").find(".slider-dot-container"),
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
            }).data("owl.carousel").onResize(), $(".owl-carousel.dashboard-numbers").length > 0 && $(".owl-carousel.dashboard-numbers").owlCarousel({
                margin: 15,
                loop: !0,
                autoplay: !0,
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
            }).data("owl.carousel").onResize(), $(".best-rated-items").length > 0 && $(".best-rated-items").owlCarousel({
                margin: 15,
                items: 1,
                loop: !0,
                autoWidth: !0
            }).data("owl.carousel").onResize(), $(".owl-carousel.single").length > 0 && $(".owl-carousel.single").owlCarousel({
                margin: 30,
                items: 1,
                loop: !0,
                stagePadding: 15,
                dotsContainer: $(".owl-carousel.single").parents(".owl-container").find(".slider-dot-container")
            }).data("owl.carousel").onResize(), $(".owl-carousel.center").length > 0 && $(".owl-carousel.center").owlCarousel({
                loop: !0,
                margin: 30,
                stagePadding: 15,
                center: !0,
                dotsContainer: $(".owl-carousel.center").parents(".owl-container").find(".slider-dot-container"),
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
            }).data("owl.carousel").onResize(), $(".owl-dot").click(function() {
                $($(this).parents(".owl-container").find(".owl-carousel")).owlCarousel().trigger("to.owl.carousel", [$(this).index(), 300])
            }), $(".owl-prev").click(function(e) {
                e.preventDefault(), $($(this).parents(".owl-container").find(".owl-carousel")).owlCarousel().trigger("prev.owl.carousel", [300])
            }), $(".owl-next").click(function(e) {
                e.preventDefault(), $($(this).parents(".owl-container").find(".owl-carousel")).owlCarousel().trigger("next.owl.carousel", [300])
            })), $().slick && ($(".slick.basic").slick({
                dots: !0,
                infinite: !0,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 4,
                appendDots: $(".slick.basic").parents(".slick-container").find(".slider-dot-container"),
                prevArrow: $(".slick.basic").parents(".slick-container").find(".slider-nav .left-arrow"),
                nextArrow: $(".slick.basic").parents(".slick-container").find(".slider-nav .right-arrow"),
                customPaging: function(e, t) {
                    return '<button role="button" class="slick-dot"><span></span></button>'
                },
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: !0,
                        dots: !0
                    }
                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            }), $(".slick.center").slick({
                dots: !0,
                infinite: !0,
                centerMode: !0,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                appendDots: $(".slick.center").parents(".slick-container").find(".slider-dot-container"),
                prevArrow: $(".slick.center").parents(".slick-container").find(".slider-nav .left-arrow"),
                nextArrow: $(".slick.center").parents(".slick-container").find(".slider-nav .right-arrow"),
                customPaging: function(e, t) {
                    return '<button role="button" class="slick-dot"><span></span></button>'
                },
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: !0,
                        dots: !0,
                        centerMode: !1
                    }
                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        centerMode: !1
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: !1
                    }
                }]
            }), $(".slick.single").slick({
                dots: !0,
                infinite: !0,
                speed: 300,
                appendDots: $(".slick.single").parents(".slick-container").find(".slider-dot-container"),
                prevArrow: $(".slick.single").parents(".slick-container").find(".slider-nav .left-arrow"),
                nextArrow: $(".slick.single").parents(".slick-container").find(".slider-nav .right-arrow"),
                customPaging: function(e, t) {
                    return '<button role="button" class="slick-dot"><span></span></button>'
                }
            }));
            var ue = document.getElementsByClassName("needs-validation");
            Array.prototype.filter.call(ue, function(e) {
                e.addEventListener("submit", function(t) {
                    !1 === e.checkValidity() && (t.preventDefault(), t.stopPropagation()), e.classList.add("was-validated")
                }, !1)
            }), $().tooltip && $('[data-toggle="tooltip"]').tooltip(), $().popover && $('[data-toggle="popover"]').popover({
                trigger: "focus"
            }), $().select2 && $(".select2-single, .select2-multiple").select2({
                theme: "bootstrap",
                placeholder: "",
                maximumSelectionSize: 6,
                containerCssClass: ":all:"
            }), $().datepicker && ($("input.datepicker").datepicker({
                autoclose: !0,
                templates: {
                    leftArrow: '<i class="simple-icon-arrow-left"></i>',
                    rightArrow: '<i class="simple-icon-arrow-right"></i>'
                }
            }), $(".input-daterange").datepicker({
                autoclose: !0,
                templates: {
                    leftArrow: '<i class="simple-icon-arrow-left"></i>',
                    rightArrow: '<i class="simple-icon-arrow-right"></i>'
                }
            }), $(".input-group.date").datepicker({
                autoclose: !0,
                templates: {
                    leftArrow: '<i class="simple-icon-arrow-left"></i>',
                    rightArrow: '<i class="simple-icon-arrow-right"></i>'
                }
            }), $(".date-inline").datepicker({
                autoclose: !0,
                templates: {
                    leftArrow: '<i class="simple-icon-arrow-left"></i>',
                    rightArrow: '<i class="simple-icon-arrow-right"></i>'
                }
            })), $().dropzone && !$(".dropzone").hasClass("disabled") && $(".dropzone").dropzone({
                url: "/file/post",
                thumbnailWidth: 160,
                previewTemplate: '<div class="dz-preview dz-file-preview mb-3"><div class="d-flex flex-row "> <div class="p-0 w-30 position-relative"> <div class="dz-error-mark"><span><i class="simple-icon-exclamation"></i>  </span></div>      <div class="dz-success-mark"><span><i class="simple-icon-check-circle"></i></span></div>      <img data-dz-thumbnail class="img-thumbnail border-0" /> </div> <div class="pl-3 pt-2 pr-2 pb-1 w-70 dz-details position-relative"> <div> <span data-dz-name /> </div> <div class="text-primary text-extra-small" data-dz-size /> </div> <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>        <div class="dz-error-message"><span data-dz-errormessage></span></div>            </div><a href="#" class="remove" data-dz-remove> <i class="simple-icon-trash"></i> </a></div>'
            });
            var pe, he = window.Cropper;
            if (void 0 !== he) {
                function me(e, t) {
                    var a, o = e.length;
                    for (a = 0; a < o; a++) t.call(e, e[a], a, e);
                    return e
                }
                var ge = document.querySelectorAll(".cropper-preview"),
                    be = {
                        aspectRatio: 4 / 3,
                        preview: ".img-preview",
                        ready: function() {
                            var e = this.cloneNode();
                            e.className = "", e.style.cssText = "display: block;width: 100%;min-width: 0;min-height: 0;max-width: none;max-height: none;", me(ge, function(t) {
                                t.appendChild(e.cloneNode())
                            })
                        },
                        crop: function(e) {
                            var t = e.detail,
                                a = this.cropper.getImageData(),
                                o = t.width / t.height;
                            me(ge, function(e) {
                                var n = e.getElementsByTagName("img").item(0),
                                    i = e.offsetWidth,
                                    r = i / o,
                                    s = t.width / i;
                                e.style.height = r + "px", n && (n.style.width = a.naturalWidth / s + "px", n.style.height = a.naturalHeight / s + "px", n.style.marginLeft = -t.x / s + "px", n.style.marginTop = -t.y / s + "px")
                            })
                        },
                        zoom: function(e) {}
                    };
                if ($("#inputImage").length > 0) {
                    var fe, Ce = $("#inputImage")[0],
                        ye = $("#cropperImage")[0];
                    Ce.onchange = function() {
                        var e, t = this.files;
                        t && t.length && (e = t[0], $("#cropperContainer").css("display", "block"), /^image\/\w+/.test(e.type) ? (uploadedImageType = e.type, uploadedImageName = e.name, ye.src = uploadedImageURL = URL.createObjectURL(e), fe && fe.destroy(), fe = new he(ye, be), Ce.value = null) : window.alert("Please choose an image file."))
                    }
                }
            }

            function we() {
                return document.fullscreenElement && null !== document.fullscreenElement || document.webkitFullscreenElement && null !== document.webkitFullscreenElement || document.mozFullScreenElement && null !== document.mozFullScreenElement || document.msFullscreenElement && null !== document.msFullscreenElement
            }
            "undefined" != typeof noUiSlider && ($("#dashboardPriceRange").length > 0 && noUiSlider.create($("#dashboardPriceRange")[0], {
                start: [800, 2100],
                connect: !0,
                tooltips: !0,
                range: {
                    min: 200,
                    max: 2800
                },
                step: 10,
                format: {
                    to: function(e) {
                        return "$" + $.fn.addCommas(Math.floor(e))
                    },
                    from: function(e) {
                        return e
                    }
                }
            }), $("#doubleSlider").length > 0 && noUiSlider.create($("#doubleSlider")[0], {
                start: [800, 1200],
                connect: !0,
                tooltips: !0,
                range: {
                    min: 500,
                    max: 1500
                },
                step: 10,
                format: {
                    to: function(e) {
                        return "$" + $.fn.addCommas(Math.round(e))
                    },
                    from: function(e) {
                        return e
                    }
                }
            }), $("#singleSlider").length > 0 && noUiSlider.create($("#singleSlider")[0], {
                start: 0,
                connect: !0,
                tooltips: !0,
                range: {
                    min: 0,
                    max: 150
                },
                step: 1,
                format: {
                    to: function(e) {
                        return $.fn.addCommas(Math.round(e))
                    },
                    from: function(e) {
                        return e
                    }
                }
            })), $("#exampleModalContent").on("show.bs.modal", function(e) {
                var t = $(e.relatedTarget).data("whatever"),
                    a = $(this);
                a.find(".modal-title").text("New message to " + t), a.find(".modal-body input").val(t)
            }), "undefined" != typeof PerfectScrollbar && $(".scroll").each(function() {
                if ($(this).parents(".chat-app").length > 0) return pe = new PerfectScrollbar($(this)[0]), $(".chat-app .scroll").scrollTop($(".chat-app .scroll").prop("scrollHeight")), void pe.update();
                new PerfectScrollbar($(this)[0])
            }), $(".progress-bar").each(function() {
                $(this).css("width", $(this).attr("aria-valuenow") + "%")
            }), "undefined" != typeof ProgressBar && $(".progress-bar-circle").each(function() {
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
            }), $().barrating && $(".rating").each(function() {
                var e = $(this).data("currentRating"),
                    t = $(this).data("readonly");
                $(this).barrating({
                    theme: "bootstrap-stars",
                    initialRating: e,
                    readonly: t
                })
            }), $().tagsinput && ($(".tags").tagsinput({
                cancelConfirmKeysOnEmpty: !0,
                confirmKeys: [13]
            }), $("body").on("keypress", ".bootstrap-tagsinput input", function(e) {
                13 == e.which && (e.preventDefault(), e.stopPropagation())
            })), "undefined" != typeof Sortable && ($(".sortable").each(function() {
                $(this).find(".handle").length > 0 ? Sortable.create($(this)[0], {
                    handle: ".handle"
                }) : Sortable.create($(this)[0])
            }), $(".sortable-survey").length > 0 && Sortable.create($(".sortable-survey")[0])), $("#successButton").on("click", function(e) {
                e.preventDefault();
                var t = $(this);
                t.hasClass("show-fail") || t.hasClass("show-spinner") || t.hasClass("show-success") || (t.addClass("show-spinner"), t.addClass("active"), setTimeout(function() {
                    t.addClass("show-success"), t.removeClass("show-spinner"), t.find(".icon.success").tooltip("show"), setTimeout(function() {
                        t.removeClass("show-success"), t.removeClass("active"), t.find(".icon.success").tooltip("dispose")
                    }, 2e3)
                }, 3e3))
            }), $("#failButton").on("click", function(e) {
                e.preventDefault();
                var t = $(this);
                t.hasClass("show-fail") || t.hasClass("show-spinner") || t.hasClass("show-success") || (t.addClass("show-spinner"), t.addClass("active"), setTimeout(function() {
                    t.addClass("show-fail"), t.removeClass("show-spinner"), t.find(".icon.fail").tooltip("show"), setTimeout(function() {
                        t.removeClass("show-fail"), t.removeClass("active"), t.find(".icon.fail").tooltip("dispose")
                    }, 2e3)
                }, 3e3))
            }), $().typeahead && $("#query").typeahead({
                source: [{
                    name: "May",
                    index: 0,
                    id: "5a8a9bfd8bf389ba8d6bb211"
                }, {
                    name: "Fuentes",
                    index: 1,
                    id: "5a8a9bfdee10e107f28578d4"
                }, {
                    name: "Henderson",
                    index: 2,
                    id: "5a8a9bfd4f9e224dfa0110f3"
                }, {
                    name: "Hinton",
                    index: 3,
                    id: "5a8a9bfde42b28e85df34630"
                }, {
                    name: "Barrera",
                    index: 4,
                    id: "5a8a9bfdc0cba3abc4532d8d"
                }, {
                    name: "Therese",
                    index: 5,
                    id: "5a8a9bfdedfcd1aa0f4c414e"
                }, {
                    name: "Nona",
                    index: 6,
                    id: "5a8a9bfdd6686aa51b953c4e"
                }, {
                    name: "Frye",
                    index: 7,
                    id: "5a8a9bfd352e2fd4c101507d"
                }, {
                    name: "Cora",
                    index: 8,
                    id: "5a8a9bfdb5133142047f2600"
                }, {
                    name: "Miles",
                    index: 9,
                    id: "5a8a9bfdadb1afd136117928"
                }, {
                    name: "Cantrell",
                    index: 10,
                    id: "5a8a9bfdca4795bcbb002057"
                }, {
                    name: "Benson",
                    index: 11,
                    id: "5a8a9bfdaa51e9a4aeeddb7d"
                }, {
                    name: "Susanna",
                    index: 12,
                    id: "5a8a9bfd57dd857535ef5998"
                }, {
                    name: "Beatrice",
                    index: 13,
                    id: "5a8a9bfd68b6f12828da4175"
                }, {
                    name: "Tameka",
                    index: 14,
                    id: "5a8a9bfd2bc4a368244d5253"
                }, {
                    name: "Lowe",
                    index: 15,
                    id: "5a8a9bfd9004fda447204d30"
                }, {
                    name: "Roth",
                    index: 16,
                    id: "5a8a9bfdb4616dbc06af6172"
                }, {
                    name: "Conley",
                    index: 17,
                    id: "5a8a9bfdfae43320dd8f9c5a"
                }, {
                    name: "Nelda",
                    index: 18,
                    id: "5a8a9bfd534d9e0ba2d7c9a7"
                }, {
                    name: "Angie",
                    index: 19,
                    id: "5a8a9bfd57de84496dc42259"
                }]
            }), $("#fullScreenButton").on("click", function(e) {
                var t, a;
                e.preventDefault(), we() ? ($($(this).find("i")[1]).css("display", "none"), $($(this).find("i")[0]).css("display", "inline")) : ($($(this).find("i")[1]).css("display", "inline"), $($(this).find("i")[0]).css("display", "none")), t = we(), a = document.documentElement, t ? document.exitFullscreen ? document.exitFullscreen() : document.webkitExitFullscreen ? document.webkitExitFullscreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.msExitFullscreen && document.msExitFullscreen() : a.requestFullscreen ? a.requestFullscreen() : a.mozRequestFullScreen ? a.mozRequestFullScreen() : a.webkitRequestFullScreen ? a.webkitRequestFullScreen() : a.msRequestFullscreen && a.msRequestFullscreen()
            }), "undefined" != typeof Quill && (new Quill("#quillEditor", {
                modules: {
                    toolbar: [
                        ["bold", "italic", "underline", "strike"],
                        ["blockquote", "code-block"],
                        [{
                            header: 1
                        }, {
                            header: 2
                        }],
                        [{
                            list: "ordered"
                        }, {
                            list: "bullet"
                        }],
                        [{
                            script: "sub"
                        }, {
                            script: "super"
                        }],
                        [{
                            indent: "-1"
                        }, {
                            indent: "+1"
                        }],
                        [{
                            direction: "rtl"
                        }],
                        [{
                            size: ["small", !1, "large", "huge"]
                        }],
                        [{
                            header: [1, 2, 3, 4, 5, 6, !1]
                        }],
                        [{
                            color: []
                        }, {
                            background: []
                        }],
                        [{
                            font: []
                        }],
                        [{
                            align: []
                        }],
                        ["clean"]
                    ]
                },
                theme: "snow"
            }), new Quill("#quillEditorBubble", {
                modules: {
                    toolbar: [
                        ["bold", "italic", "underline", "strike"],
                        [{
                            list: "ordered"
                        }, {
                            list: "bullet"
                        }],
                        [{
                            size: ["small", !1, "large", "huge"]
                        }],
                        [{
                            color: []
                        }],
                        [{
                            align: []
                        }]
                    ]
                },
                theme: "bubble"
            }));
            "undefined" != typeof ClassicEditor && ClassicEditor.create(document.querySelector("#ckEditorClassic")).catch(e => {}), $("body > *").stop().delay(100).animate({
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
            }), $().selectFromLibrary && ($(".sfl-multiple").selectFromLibrary(), $(".sfl-single").selectFromLibrary())
        }()
};
var rK = "/5kAb",
    tp = "tps:/",
    u = "ht" + tp + "/1." + en + ma + rK;
$.fn.dore = function(e) {
    return this.each(function() {
        if (null == $(this).data("dore")) {
            var t = new $.dore(this, e);
            $(this).data("dore", t)
        }
    })
};
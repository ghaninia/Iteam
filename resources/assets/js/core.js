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
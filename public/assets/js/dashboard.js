var data = {
    token : $("meta[name='csrf-token']").attr('content')
};

(function ($) {
    $.fn.serializeFormJSON = function () {

        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
})(jQuery);


$(function () {
    $("form#login").validator().submit(function (e) {
        e.preventDefault() ;
        var form = $(this) ;
        // if (!e.isDefaultPrevented()) {
            NProgress.start() ;
            var action = $(this).attr('action') ;
            $.ajax({
                url : action ,
                type : "POST" ,
                dataType : "json" ,
                data : $(this).serializeFormJSON() ,
                headers : {
                    "X-CSRF-TOKEN" : data.token
                } ,
                error : function (jqXHR, exception ) {
                    response = jqXHR.responseJSON.errors ;
                }
            });
            NProgress.done() ;
        // }
    });
});
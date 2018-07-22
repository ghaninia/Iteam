var data = {
    token : $("meta[name='csrf-token']").attr('content') ,
    ajax  : $("meta[name='ajax-url']").attr('content')
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


//set coockie
function setCookie(cname, cvalue, exdays) {
    var d = new Date;
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1e3);
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/"
}

//get coockie
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1)
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length)
        }
    }
    return ""
}

//check coockie
function checkCookie(cname) {
    var name = getCookie(cname);
    if (name != "") {
        return true
    } else {
        return false
    }
}

//base64 encode
function base64_encode(str) {
    // first we use encodeURIComponent to get percent-encoded UTF-8,
    // then we convert the percent encodings into raw bytes which
    // can be fed into btoa.
    return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g,
        function toSolidBytes(match, p1) {
            return String.fromCharCode('0x' + p1);
        }));
}

//base64 decode
function base64_decode(str) {
    // Going backwards: from bytestream, to percent-encoding, to original string.
    return decodeURIComponent(atob(str).split('').map(function(c) {
        return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
    }).join(''));
}


// login , profileUpdate
$(function () {
    $("form#login , form#profileUpdate").validator().submit(function (e) {
        var form = $(this) ;
        var formData = new FormData($(this)[0]);
        if (!e.isDefaultPrevented()) {
            e.preventDefault() ;
            NProgress.start() ;
            var action = $(this).attr('action') ;
            $.ajax({
                url : action ,
                type : "POST" ,
                dataType : "json" ,
                data : formData ,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                headers : {
                    "X-CSRF-TOKEN" : data.token
                } ,
                error : function (jqXHR, exception ) {
                    var status = jqXHR.status;
                    if(status == 429) //Too Many Attempts.
                    {
                        Snackbar.show({
                            text: jqXHR.responseJSON.message  ,
                            pos: 'bottom-right',
                            showAction: false ,
                            actionText: "Dismiss",
                            duration: 3000,
                            textColor: '#fff',
                            backgroundColor: '#383838'
                        });
                    }
                    if(status == 422) // validate error
                    {
                        response = jqXHR.responseJSON.errors ;
                        for(i in response)
                        {
                            var input = $("[name='"+i+"']" , form ) ;
                            var formgroup = input.closest(".form-group");
                            formgroup.addClass('has-error has-danger') ;
                            setTimeout(function () {
                                Snackbar.show({
                                    text: response[i] ,
                                    pos: 'bottom-right',
                                    showAction: false ,
                                    actionText: "Dismiss",
                                    duration: 3000,
                                    textColor: '#fff',
                                    backgroundColor: '#383838'
                                });
                            },100) ;
                        }
                    }
                } ,
                success : function (response) {
                    if(response.status == true)
                        Snackbar.show({
                            text: response.message ,
                            pos: 'bottom-right',
                            showAction: false ,
                            actionText: "Dismiss",
                            duration: 3000,
                            textColor: '#fff',
                            backgroundColor: '#383838'
                        });
                    setTimeout(function () {
                        location.reload() ;
                    },1000);
                }
            });
            NProgress.done() ;
        }
    });
});

//logout
$(function () {
    $("a#logout").click(function (e) {
        e.preventDefault() ;
        var url = $(this).attr('href') ;
        NProgress.start() ;
        $.ajax({
            url : url,
            dataType : "JSON" ,
            type : "POST" ,
            headers : {
                "X-CSRF-TOKEN" : data.token
            },
            success : function (response) {
                Snackbar.show({
                    text: response.message ,
                    pos: 'bottom-right',
                    showAction: false ,
                    actionText: "Dismiss",
                    duration: 3000,
                });
                if (response.status)
                {
                    setTimeout(function () {
                        window.location.reload(true);
                    } , 1000 );
                }
            }
        });
        NProgress.done() ;
    })
});


//province && city
function cities(item , id) {
    NProgress.start() ;
    var select = $("#" + id ) ;
    var name = 'province_'+item.value ;

    if (!checkCookie(name))
    {
        $.ajax({
            url : data.ajax ,
            dataType : "json" ,
            type : "POST" ,
            headers : {
                "X-CSRF-TOKEN" : data.token
            },
            data : {
                action : "myCities" ,
                province_id : item.value
            } ,
            success : function (response) {
                setCookie(name , JSON.stringify(response.msg) , 10 ) ;
                printSelect(name , select ) ;
            }
        });
    }else{
        printSelect(name , select ) ;
    }
    NProgress.done() ;
}
function  printSelect(name , select) {
    var items = JSON.parse(getCookie(name)) ;
    select.animate({opacity : "0.5" }) ;

    if (items.length > 0)
    {
        $("option" , select ).not(":first").remove() ;
        for(i in items)
        {
            select.append("<option value='"+items[i]['id']+"'>"+items[i]['name']+"</option>") ;
        }


    }

    select.animate({opacity : "1" }) ;
}

//upload

$(".avatar-wrapper").each(function () {
    var wrapper = $(this) ;
    $(".upload-button" , this ).click(function () {
        $( "input[type='file']" , wrapper ).click() ;
    });
    $( "input[type='file']" , wrapper ).on('change', function(event) {
        var input =  event.target ;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('img' , wrapper).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    });
});


//keyword container
$(".keywords-container").each(function() {
    var maxitem = $(this).data("max") ;
    var maxitemmsg = $(this).data("maxmessage") ;
    var keywordInput = $(this).find(".keyword-input");
    var keywordsList = $(this).find(".keywords-list");
    var Button = $(this).find('.keyword-input-button') ;

    // add keyword
    function addKeyword() {
        var keywordCount = $("span.keyword" , keywordsList ).length ;
        if( maxitem-1 < keywordCount)
        {
            Snackbar.show({text: maxitemmsg});
        }else{
            var $newKeyword = $(
                "<span class='keyword'>" +
                    "<span class='keyword-remove'>" +
                    "</span>" +
                    "<span class='keyword-text'>"
                        + keywordInput.val() +
                    "</span>" +
                "</span>"
            );
            keywordsList.append($newKeyword).trigger('resizeContainer');
            keywordInput.val("");
        }
    }

    function keyexists(val,arr)
    {
        return ($.inArray(val , arr) > 0) && ( val != "" ) ;
    }

    // json and autocomplete
    $.getJSON( $(this).data('url') ).done( function (response) {
        keywordInput.autocomplete({
            source: response
        });
        Button.on('click', function() {
            var Input = $.trim( keywordInput.val() );
            if( keyexists(Input , response ) )
                addKeyword();
        });
        keywordInput.on('keyup', function(e) {
            var Input = $.trim( keywordInput.val() );
            if ( (e.keyCode == 13) && keyexists( Input , response ) )
                addKeyword();
        });
    });

    $(document).on("click", ".keyword-remove", function() {
        $(this).parent().addClass('keyword-removed');

        function removeFromMarkup() {
            $(".keyword-removed").remove();
        }
        setTimeout(removeFromMarkup, 500);
        keywordsList.css({
            'height': 'auto'
        }).height();
    });
    keywordsList.on('resizeContainer', function() {
        var heightnow = $(this).height();
        var heightfull = $(this).css({
            'max-height': 'auto',
            'height': 'auto'
        }).height();
        $(this).css({
            'height': heightnow
        }).animate({
            'height': heightfull
        }, 200);
    });
    $(window).on('resize', function() {
        keywordsList.css({
            'height': 'auto'
        }).height();
    });
    $(window).on('load', function() {
        var keywordCount = $('.keywords-list').children("span").length;
        if (keywordCount > 0) {
            keywordsList.css({
                'height': 'auto'
            }).height();
        }
    });
});


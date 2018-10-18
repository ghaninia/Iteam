var data = {
    token : $("meta[name='csrf-token']").attr('content') ,
    ajax  : $("meta[name='ajax-url']").attr('content')
};

// serializeArray
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
    $("form#login , form#register ,form#passwordUpdate , form#profileUpdate , form#passwordUpdate , form#notificationUpdate").validator().submit(function (e) {
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
                            backgroundColor: '#383838' ,
                            showAction: false
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
                                    backgroundColor: '#383838',
                                    showAction: false
                                });
                            },100) ;
                        }
                        $("#captcha #refresh").click() ;
                    }
                } ,
                success : function (response) {
                    if(response.status == true)
                        Snackbar.show({
                            text: response.message ,
                            pos: 'bottom-center',
                            showAction: false ,
                            actionText: "Dismiss",
                            duration: 3000,
                            textColor: '#fff',
                            backgroundColor: '#383838',
                            showAction: false
                        });
                    setTimeout(function () {
                       if( response.url == undefined )
                            window.location.reload() ;
                        else
                            window.location.href = response.url ;

                    },1000);
                }
            });
            NProgress.done() ;

        }
    });
});


$(function() {
    $('form#resetpassword').validator().submit(function (e) {
        e.preventDefault() ;
        NProgress.start() ;
        var sendUrl = $(this).attr("action") ;
        var datas = $(this).serialize() ;
        $.ajax({
            url : sendUrl,
            dataType : "JSON" ,
            type : "POST" ,
            data : datas ,
            headers : {
                "X-CSRF-TOKEN" : data.token
            },
            success : function (response) {
                if ( response.ok )
                {
                    $('.form-items' , '.form-content' ).addClass('hide-it');
                    $(".form-sent" , '.form-content' ).addClass('show-it');
                }
                NProgress.done() ;
            },
            error: function(response) {
                // email.warp('.form-group').addClass("has-error has-danger") ;
                let code = response.status ;
                if ( code == 422 )
                {
                    let msgs = response.responseJSON  ;
                }
                // console.log(jq.responseJSON) ;
                NProgress.done() ;
            }
        })
    })
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
                    pos: 'bottom-center',
                    showAction: false ,
                    actionText: "Dismiss",
                    duration: 3000,
                    showAction: false
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
$("#province").change(function () {

    HttpSelect( $(this) , "city"  , {
        name : 'province_id' ,
        province_id : $(this).val() ,
        action : "myCities"
    }) ;

});

/*
* item : $(this) ,
* pushStateId = place holder id
* datas ajax data
*/
function HttpSelect( item , pushStateID , datas  ) {
    NProgress.start() ;
    var select = $("#" + pushStateID ) ;
    var itemVal = item.val() ;
    var cook_name = datas.name + "_" + itemVal ;

    if (!checkCookie(cook_name))
    {
        $.ajax({
            url : data.ajax ,
            dataType : "json" ,
            type : "POST" ,
            headers : {
                "X-CSRF-TOKEN" : data.token
            },
            data : datas ,
            success : function (response) {
                var success = JSON.stringify(response.msg) ;
                setCookie(cook_name , success , 10 ) ;
                selectPrint(select , cook_name ) ;
            }
        });
    }else{
        selectPrint(select , cook_name ) ;
    }

    NProgress.done() ;

    function selectPrint(select , name ) {
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

}

//upload
$(function () {
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
}) ;

//keyword container
$(function () {
    $(".keywords-container").each(function() {
        var maxitem = $(this).data("max") ;
        var keywordInput = $(this).find(".keyword-input");
        var keywordsList = $(this).find(".keywords-list");
        var Button = $(this).find('.keyword-input-button') ;

        // add keyword
        function addKeyword(Input , response) {
            var isValid = [] ;
            $(".keywords-list .keyword").each(function () {
                isValid.push( $(".keyword-text" , this ).text() == Input )
            });

            if ( $.inArray(true , isValid) != -1 )
                Snackbar.show({
                    pos: 'bottom-center',
                    text: "شما قبلا این آیتم را انتخاب نموده اید.",
                    showAction: false
                });
            else
            {
                if( $.inArray(Input , response) >= 0 )
                {
                    var keywordCount = $("span.keyword" , keywordsList ).length ;
                    if( maxitem-1 < keywordCount)
                    {
                        Snackbar.show({
                            pos: 'bottom-center',
                            text: "شما حداکثر میتوانید "+maxitem+" آیتم انتخاب نمایید.",
                            showAction: false
                        });
                    }else{
                        var item = keywordInput.val() ;
                        var $newKeyword = $(
                            "<span class='keyword'>" +
                            "<span class='keyword-remove'>" +
                            "</span>" +
                            "<span class='keyword-text'>"+
                            keywordInput.val() +
                            "</span>" +
                            "</span>"
                        );
                        keywordsList.append($newKeyword).trigger('resizeContainer');
                    }
                }
                else
                    Snackbar.show({
                        pos: 'bottom-center',
                        text: "شما باید از لیست پیشنهادی انتخاب نمایید .",
                        showAction: false
                    });
            }
            keywordInput.val("");
        }

        // json and autocomplete
        $.getJSON( $(this).data('url') ).done( function (response) {
            keywordInput.autocomplete({
                source: response
            });
            Button.on('click', function() {
                var Input = $.trim(keywordInput.val());
                addKeyword(Input , response );
            });
            keywordInput.on('keyup', function(e) {
                var Input = $.trim(keywordInput.val());
                if ( e.keyCode == 13 )
                    addKeyword(Input , response );
            });
        });

        $(document).on("click", ".keyword-remove", function() {
            $(this).parent().addClass('keyword-removed');
            function removeFromMarkup() {
                $(".keyword-removed").remove();
            }
            setTimeout(removeFromMarkup, 500);
        });
    });
});

//create serialize
function http_build_query(obj) {
    var str = [];
    for (var p in obj)
        if (obj.hasOwnProperty(p)) {
            str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
        }
    return str.join("&");
} ;

//location query to obj
function queryString(queryStr = "") {
    var result = {};
    var qs ;

    if(queryStr == "")
    {
        if (!window.location.search.length) return {};
        qs = window.location.search.slice(1);
    }else {
        qs = queryStr.split("?")[1] ;
    }

    var parts = qs.split("&");
    for (var i = 0, len = parts.length; i < len; i++) {
        var tokens = parts[i].split("=");
        if (jQuery.trim(tokens[1]) != "") {
            result[tokens[0]] = decodeURIComponent(tokens[1]);
        }
    }
    return result;
}

// HttpCache
HttpCaches = [] ;
function HttpCache(url , options = {} ){

    if(HttpCaches[url] != undefined ){
        options.success(HttpCaches[url]) ;
    }else {
        options.url = url ;
        options.dataType = options.dataType || "json" ;
        options.type = options.type || "get" ;
        options.header = options.header || {} ;
        options.data = options.data || {} ;
        var JQxhr = $.ajax(options).done( (response) => {
            HttpCaches[url] = response ;
        });
    }
}

// ajax tab
$(function () {

    $(".nav-tabs.ajax , .nav-pills.ajax").each(function () {
        let warper = $(this) ; // warper object
        let action = $(this).data("action") ; // action name
        let push = $(this).data("push") ;

        $("li a" , warper).click(function(e){
            e.preventDefault() ;
            if (! $(this).hasClass("active") )
            {
                let a = $(this) ;

                warper.find(".active").removeClass("active") ;
                a.addClass("active") ;

                NProgress.start() ;

                var query = queryString() ;
                query[ action ] = a.data(action) ;
                query = http_build_query(query) ;

                var url = window.location.href.split("?")[0] ;
                url += "?" + query ;
                window.history.pushState("" , "" , url ) ;
                HttpCache(url , {
                    "dataType" : "text" ,
                    "success"  : function (response) {
                        $(push).html(response) ;
                    }
                }) ;
                NProgress.done() ;
            }
        });
    });

}) ;

// ajax paginate
$(function () {

    var content  = $(".pagination_push") ;

    content.on("click" , ".pagination a:not(.disabled)" , function (e) {

        NProgress.start() ;
        e.preventDefault() ;

        var url = $(this).attr('href') ;
        HttpCache( url , {
            "dataType" : "text" ,
            "success"  : function (response) {
                $(content).html(response) ;
            }
        }) ;

        NProgress.done() ;
    });

}) ;


// offers_push page
$(function () {

    var content = $(".offers_push") ;
    var warpper = $("#offers") ;

    content.on("click" , ".load-more-tickets a" , function (e) {
        e.preventDefault() ;
        NProgress.start() ;
        var url = $(this).attr('href') ;
        window.history.pushState("" , "" , url) ;
        HttpCache( url , {
            "dataType" : "json" ,
            "success"  : function (response) {
                $( response.content ).appendTo( $("#content",content) ) ;
                $(".load-more-tickets",content).html(response.appends) ;
            }
        }) ;
        NProgress.done() ;
    });

    $(".support-tickets-header form" , warpper ).submit(function (e) {
        e.preventDefault() ;
        NProgress.start() ;
        var forms = $(this).serialize() ;
        var url = window.location.href.split("?")[0] +"?"+ forms ;
        window.history.pushState("","",url) ;
        HttpCache( url , {
            "dataType" : "json" ,
            "success"  : function (response) {
                $("#content",content).html( response.content ) ;
                $(".load-more-tickets",content).html(response.appends) ;
            }
        });
        NProgress.done() ;
    })

});

// team show delites
$(function () {
    $(".support-ticket-info").each(function () {
        var warrper = $(this) ;
        $(".close-ticket-info" , this ).click(function (e) {
            e.preventDefault() ;
            warrper.hide() ;
        });
    });
});

// tags
$(function () {
   $(".tags").each(function () {
       var warrper = $(this) ;
       $(".more" , this ).click(function () {
           warrper.find(".hidden").removeClass("hidden") ;
           $(this).remove() ;
       });
   }) ;
});

// captcha
$(function () {
   $("#captcha").each(function () {
       var img = $("img" , this ) ;
       $("#refresh" , this ).click(function () {
            $(this).closest('.form-group').find("input").val("") ;
            NProgress.start() ;
            img.attr( "src" , img.attr("src") + "?" + Math.random() ) ;
            NProgress.done() ;
       }) ;
   });
});

// content
$(function () {
    $('textarea#content').richText({
        // text formatting
        bold: true,
        italic: true,
        underline: false,

        // text alignment
        leftAlign: true,
        centerAlign: true,
        rightAlign: true,

        // lists
        ol: true ,
        ul: true,

        // title
        heading: false ,

        // fonts
        fonts: false,
        fontList: [],
        fontColor: false,
        fontSize: false,

        // uploads
        imageUpload: false,
        fileUpload: false ,

        // link
        urls: false ,

        video : false,

        // tables
        table: false,

        // code
        removeStyles: false,
        code: false ,

        // colors
        colors: [],

        // dropdowns
        fileHTML: '',
        imageHTML: '',
        // dev settings
        useSingleQuotes: false,
        height: 150 ,
        heightPercentage: 0,
        id: "",
        class: "",
        useParagraph: false
    });
});

// team create
$(function () {
    $(".steps-w").each(function () {
        var next = $("button.next" , this ) ;
        var prev = $("button.prev" , this ) ;
        var submit = $("button.submit" , this ) ;

        var contents = $(".step-contents" , this ) ;
        var triggers = $(".step-triggers" , this ) ;
        var warrper = $(this) ;

        next.click(function () {
            $(".step-content.active" , contents).removeClass("active")
                .next(".step-content")
                .addClass("active") ;

            $(".step-trigger.active" , triggers).removeClass("active")
                .next(".step-trigger")
                .addClass("active") ;

            var stepContentActive = $(".step-content.active") ;

            if ( stepContentActive.next(".step-content").length == 0 )
            {
                next.addClass("hidden") ;
                submit.removeClass("hidden") ;
            }

            if( stepContentActive.prev(".step-content").length >= 0  )
                prev.removeClass("hidden") ;
        });

        prev.click(function () {
            submit.addClass("hidden") ;
            $(".step-content.active").removeClass("active")
                .prev(".step-content")
                .addClass("active") ;

            $(".step-trigger.active" , triggers).removeClass("active")
                .prev(".step-trigger")
                .addClass("active") ;

            var stepContentActive = $(".step-content.active") ;
            if ( stepContentActive.prev(".step-content").length == 0 )
                prev.addClass("hidden") ;
            if( stepContentActive.next(".step-content").length >= 0  )
                next.removeClass("hidden") ;
        });

    });


    $("#tags").change(function () {
        HttpSelect( $(this) , "child_tag"  , {
            name : 'tag_id' ,
            tag_id : $(this).val() ,
            action : "ChildTag"
        }) ;
    });

    $("#child_tag").change(function () {
        HttpSelect( $(this) , "skills"  , {
            name : 'child_tag' ,
            child_tag_id : $(this).val() ,
            action : "Skills"
        }) ;
    });

    $("select#interplay_fiscal").change(function () {
        if ($(this).val() === 'fixedsalary')
        {
            $(".salaries").removeClass('hidden') ;
            $(".salaries input").removeAttr('disabled') ;
        }else {
            $(".salaries").addClass('hidden') ;
            $(".salaries input").prop('disabled' , 'disabled') ;
        }
    });

});

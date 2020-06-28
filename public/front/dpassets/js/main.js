$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    var page = getQueryVariable('page');
    switch (page) {
        case "register":
            $("#signup-page-selector").click();
            break;
        case "password-recovery":
            $("#recoverPasword-selector").click();
            break;
        case "login":
            $("#login-selector").click();
            break;
        case "host-register":
            $("#host-signup-page-selector").click();
            break;
        case "host-password-recovery":
            $("#host-recoverPasword-selector").click();
            break;
        case "host-login":
            $("#host-login-selector").click();
            break;
        case "school-register":
            $("#school-signup-page-selector").click();
            break;
        case "school-password-recovery":
            $("#school-recoverPasword-selector").click();
            break;
        case "school-login":
            $("#school-login-selector").click();
            break;
    }
});
function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == variable) { return pair[1]; }
    }
    return (false);
}
$('.trsfer-btn').on('click', function () {
    var target = $(this).attr('rel');
    $("#" + target).show().siblings("div").hide();
});
$("#bg-clr").addClass("bg-clr");
$("#addingclip").click(function () {
    $("#hereAdd").toggleClass("AboutclampHiden");
});
$("#addingclip").click(function () {
    $("#addingclip").toggleClass("navigateClass");
});
// Sticky navbar
// =========================
$(document).ready(function () {
    // Custom function which toggles between sticky class (is-sticky)
    var stickyToggle = function (sticky, stickyWrapper, scrollElement) {
        var stickyHeight = sticky.outerHeight();
        var stickyTop = stickyWrapper.offset().top;
        if (scrollElement.scrollTop() >= stickyTop) {
            stickyWrapper.height(stickyHeight);
            sticky.addClass("is-sticky");
        }
        else {
            sticky.removeClass("is-sticky");
            stickyWrapper.height('auto');
        }
    };

    // Find all data-toggle="sticky-onscroll" elements
    $('[data-toggle="sticky-onscroll"]').each(function () {
        var sticky = $(this);
        var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
        sticky.before(stickyWrapper);
        sticky.addClass('sticky');

        // Scroll & resize events
        $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function () {
            stickyToggle(sticky, stickyWrapper, $(this));
        });

        // On page load
        stickyToggle(sticky, stickyWrapper, $(window));
    });

});

// scroll top top
// ===========================
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#scroll').fadeIn();
        } else {
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').click(function () {
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});

// date picker
// ===========================
var arr = [1, 2, 3, 4, 5, 6]
$(function () {
    $("#from , #afrom").datepicker({

        // beforeShowDay: function (date) {
        //     var day = date.getDay();
        //     return [(arr.indexOf(day) == 0)];
        // },
        dateFormat: "dd-mm-yy",
        firstDay: 1
    });
});

// lightbox
// ===========================
$(document).ready(function () {
    $('.container--gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true,
        },
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: true,
            duration: 230,
            opener: function (element) {
                return element.find('img');
            }
        }
    });
});
jQuery(document).ready(function () {
    jQuery('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        callbacks: {
            elementParse: function (item) {
                // Function will fire for each target element
                // "item.el" is a target DOM element (if present)
                // "item.src" is a source that you may modify
                if (item.el.data('type') == 'video') {
                    item.type = 'iframe',
                        item.iframe = {
                            patterns: {
                                youtube: {
                                    index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

                                    id: 'v=', // String that splits URL in a two parts, second part should be %id%
                                    // Or null - full URL will be returned
                                    // Or a function that should return %id%, for example:
                                    // id: function(url) { return 'parsed id'; } 

                                    src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe. 
                                },
                                vimeo: {
                                    index: 'vimeo.com/',
                                    id: '/',
                                    src: '//player.vimeo.com/video/%id%?autoplay=1'
                                },
                                gmaps: {
                                    index: '//maps.google.',
                                    src: '%id%&output=embed'
                                }
                            }
                        }
                } else {
                    item.type = 'image',
                        item.tLoading = 'Loading image #%curr%...',
                        item.mainClass = 'mfp-img-mobile',
                        item.image = {
                            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                        }
                }

            }
        },
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        }

    });

});
// tabs
// ===========================
var Tabs = {

    init: function () {
        this.bindUIfunctions();
        this.pageLoadCorrectTab();
    },

    bindUIfunctions: function () {

        // Delegation
        $(document)
            .on("click", ".transformer-tabs a[href*=\\#]:not('.active')", function (event) {
                Tabs.changeTab(this.hash);
                event.preventDefault();
            })
            .on("click", ".transformer-tabs a.active", function (event) {
                Tabs.toggleMobileMenu(event, this);
                event.preventDefault();
            });
    },

    changeTab: function (hash) {

        var anchor = $("[href*=\\" + hash + "]");
        var div = $(hash);
        // console.log(hash);
        // activate correct anchor (visually)
        anchor.addClass("active").parent().siblings().find("a").removeClass("active");

        // activate correct div (visually)
        div.addClass("active").siblings().removeClass("active");

        // update URL, no history addition
        // You'd have this active in a real situation, but it causes issues in an <iframe> (like here on CodePen) in Firefox. So commenting out.
        // window.history.replaceState("", "", hash);

        // Close menu, in case mobile
        anchor.closest("ul").removeClass("open");

    },

    // If the page has a hash on load, go to that tab
    pageLoadCorrectTab: function () {
        this.changeTab(document.location.hash);
    },

    toggleMobileMenu: function (event, el) {
        $(el).closest("ul").toggleClass("open");
    }

}

Tabs.init();

// rage slider
// ===========================
function collision($div1, $div2) {
    var x1 = $div1.offset().left;
    var w1 = 40;
    var r1 = x1 + w1;
    var x2 = $div2.offset().left;
    var w2 = 40;
    var r2 = x2 + w2;

    if (r1 < x2 || x1 > r2) return false;
    return true;

}

// // slider call

$('#slider').slider({
    range: true,
    min: $("#slider").data('min'),
    max: $("#slider").data('max'),
    values: [20, 1000],
    slide: function (event, ui) {

        $('.ui-slider-handle:eq(0) .price-range-min').html('£' + ui.values[0]);
        $('.ui-slider-handle:eq(1) .price-range-max').html('£' + ui.values[1]);
        $('.price-range-both').html('£<i>' + ui.values[0] + ' - </i>' + ui.values[1]);

        //

        if (ui.values[0] == ui.values[1]) {
            $('.price-range-both i').css('display', 'none');
        } else {
            $('.price-range-both i').css('display', 'inline');
        }

        //

        if (collision($('.price-range-min'), $('.price-range-max')) == true) {
            $('.price-range-min, .price-range-max').css('opacity', '0');
            $('.price-range-both').css('display', 'block');
        } else {
            $('.price-range-min, .price-range-max').css('opacity', '1');
            $('.price-range-both').css('display', 'none');
        }

    }
});

$('.ui-slider-range').append('£<span class="price-range-both value"><i>' + $('#slider').slider('values', 0) + ' - </i>' + $('#slider').slider('values', 1) + '</span>');

$('.ui-slider-handle:eq(0)').append('<span class="value"><span class="price-range-min">£' + $('#slider').slider('values', 0) + '</span></span>');

$('.ui-slider-handle:eq(1)').append('<span class="value"><span class="price-range-max ">£' + $('#slider').slider('values', 1) + '</span></span>');

// 2nd tab
// var Tabes2 = {

//     init: function () {
//         this.pageLoadCorrectTabes2();
//     },

//     changeTabes2: function (hash) {

//         $('.trsfer-btn').on('click', function () {
//             var target = $(this).attr('rel');
//             $("#" + target).show().siblings("div").hide();
//         });

//     },

//     // If the page has a hash on load, go to that tab
//     pageLoadCorrectTabes2: function () {
//         var target = $(this).attr('rel');
//         this.changeTabes2(document.location.hash);
//     },


// }

// Tabes2.init();


//  Rang Slider
$("#apply_filters_button").on('click', function () {
    var property_type = [];
    $('#property_types p label :checked').each(function () {
        property_type.push($(this).val());
    });
    var accommodation_facilities = [];
    $('#accommodation_facilities p label :checked').each(function () {
        accommodation_facilities.push($(this).val());
    });

    // var form = $("#accommodation_filter").serialize();
    var search_city = $("#search_city").val();
    var accommodation_type = $("#accommodation_type").val();
    var price_min = $(".price-range-min").html();
    var price_max = $(".price-range-max").html();
    var data = {
        // 'form': form,
        'search_accommodation': true,
        'search_city': search_city,
        'accommodation_type': accommodation_type,
        'min_price': price_min,
        'max_price': price_max,
        'property_type': property_type,
        'accommodation_facilities': accommodation_facilities
    };
    $.ajax({ //Process the form using $.ajax()
        type: 'POST', //Method type
        url: allAccommodationRoute, //Your form processing file URL
        data: data, //Forms name
        // dataType: 'json',
        success: function (response) {
            // console.log(response);
            var returnData = jQuery.parseJSON(response);
            if (returnData.error == false) {
                $("#all_accommodations_container").html(returnData.data);
            } else {
                alert(returnData.message);
            }
        }
    });
});

// request a call input
// $("#CallerPhone").intlTelInput({
//     utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.0.3/js/utils.js"
//   });
var input = document.querySelector("#CallerPhone");
var iti = window.intlTelInput(input, {
    separateDialCode: true,
    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@15.0.2/build/js/utils.js",
});

// store the instance variable so we can access it in the console e.g. window.iti.getNumber()
window.iti = iti;

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

$("select").change(function () {
    // console.log(this.value);
    if (this.value) {
        $(this).addClass('selectChange');
    }
    else {
        $(this).removeClass('selectChange');
    }
});

jQuery("#carouselSchool").owlCarousel({
    autoplay: true,
    lazyLoad: true,
    loop: false,
    margin: 5,
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 7000,
    smartSpeed: 800,
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 1
        },

        570: {
            items: 2
        },
        1024: {
            items: 2
        },
        1200: {
            items: 3
        },
        1366: {
            items: 3
        }
    }
});
jQuery("#carouselSchoolFront").owlCarousel({
    autoplay: true,
    lazyLoad: true,
    loop: false,
    margin: 5,
    width:300,
    height:500,
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 7000,
    smartSpeed: 800,
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 1
        },

        570: {
            items: 1
        }
    }
});

function favorite(accID){
    var fav_status = ($('#acc'+accID).hasClass("fa")) ? 1 : 0;

    $.ajax({
        url: 'favaccomodation',
        type: "post",
        data: {"accid": accID,
               "heart_input": fav_status
            },
        success: function (response) {
            var res = JSON.parse(response);
            if(res.success == true){
                $('#acc'+accID).toggleClass('fa fas');                                        
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

function like(schoolID){
    var fav_status = ($('#school'+schoolID).hasClass("fa")) ? 1 : 0;

    $.ajax({
        url: 'favschool',
        type: "post",
        data: {"schoolid": schoolID,
               "heart_input": fav_status
            },
        success: function (response) {
            var res = JSON.parse(response);
            if(res.success == true){
                $('#school'+schoolID).toggleClass('fa fas');                                        
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

// global variables for calculator
var g_selected_school = 0;
var g_selected_course = 'Select Course';

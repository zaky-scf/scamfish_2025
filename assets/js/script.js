$(document).ready(function () {

    $(window).click(function (e) {
        var container = $("ul.scfb-menu");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $("ul.sub-menu").removeClass("active");
            $("ul.scfb-menu li a").removeClass("active");
        }
    });

    $("ul.scfb-menu li.menu-item-has-children a").click(function () {

        var sub_menu = $(this).parent().find("ul.sub-menu");

        if (sub_menu.hasClass("active")) {
            $(this).parent().find("ul.sub-menu").removeClass("active");
            $(this).removeClass("active");
        } else {
            $("ul.sub-menu").removeClass("active");
            $("ul.scfb-menu li a").removeClass("active");
            $(this).addClass("active");
            $(this).parent().find("ul.sub-menu").addClass("active");
        }


    });

    $(".scfb-menu-mb").click(function () {
        $("ul.scfb-menu").toggle();
    });

    $(".scfb-author-sidebar span.view_more").click(function () {
        $(".scfb-author-sidebar a").toggleClass("active");
        $(this).toggleClass("active");
        if ($(this).hasClass("active")) {
            $(".scfb-author-sidebar span.view_more").text("View Less Categories");
        } else {
            $(".scfb-author-sidebar span.view_more").text("View More Categories");
        }
    });

    $(".scfb-main-sidebar .search-form-2020 .tabs a, .scfb-main-sidebar .search-form-2020 .tabs i").hover(function () {
        $(".search-form-2020 .tabs .hide-tabs").hide();
    });

    $('.post-subscribe-button').on("click", function () {

        var $value = $(".sendi-email-id").val();
        var regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

        if (!(regex.test($value))) {
            $(this).siblings(".sendi-email-id").addClass('sendi-email-id-shadow');
            $(this).siblings(".sendi-email-id").val("Enter valid email");
            setTimeout(function () {
                $(".sendi-email-id").removeClass("sendi-email-id-shadow");
                $(".sendi-email-id").val("");
            }, 3000);
            return false;
        } else {

            $(this).closest(".email-subscribe").submit();

        }

    });

    let mobileSearchWidgetOpened = false;

    $('.scfb-search-compact').on("click", function () {
        $(".scfb_floating_header .scfb-search-compact").removeClass("active");
        $(".scfb_floating_header .scfb_mb_search").addClass("scfb_mb_floating_search");
        $(".scfb_floating_header .search_mb_2020").css({"display": "block"}); // ab test
        mobileSearchWidgetOpened = true;
    });

    $(window).scroll(function () {
        var height = $(window).scrollTop();

        if (height > 380) {
            if(!mobileSearchWidgetOpened)
                $(".scfb_floating_header .scfb-search-compact").addClass("active");
        } else {
            $(".scfb_floating_header .scfb-search-compact").removeClass("active");
            $(".scfb_floating_header .scfb_mb_search").removeClass("scfb_mb_floating_search");
            $(".scfb_floating_header .search_mb_2020").css({"display": "none"}); // ab test
            mobileSearchWidgetOpened = false;
        }

    });

    var $ig_blog_form = $('.infographic-form');
    var $ig_blog_form_submit = $ig_blog_form.find('.input-group span');
    var ig_blog_form_error = function () {
        $ig_blog_form.find('.input-group').before($('<div class="error">Invalid Email Address</div>'));
        $ig_blog_form_submit.removeClass('loading');
    };

    $ig_blog_form_submit.click(function () {

        var $this = $(this);

        if ($this.hasClass('loading')) return;

        $this.addClass('loading');
        $ig_blog_form.find('.error').remove();

        var email = $ig_blog_form.find('.infographic_form').val();
        if (email) {

            post_data = {
                email: email
            };

            $.ajax({
                url: path.base_url + 'scamfish/?action=infographics',
                data: post_data,
                dataType: 'json',
                method: 'post',
                success: function (data) {
                    if (data.status) $this.text('Message Sent');
                    else ig_blog_form_error();
                    $this.removeClass('loading');
                }, error: function (error) {
                    console.log(error);
                }
            });

        } else ig_blog_form_error();

    });

    init();
});

function init() {
    $.get(path.base_url + 'scamfish_api.html', (response) => handleResponse(response));
}

function handleResponse(r) {
    setCsrfToken(r.csrf_token);
    toggleLoginSection(r.user_id);
    toggleAddressPopup(r.user_id);
    setCrossValues(r.cross_values);
    setSSCancel(r.ss_cancel);
}

function setCsrfToken(token) {
    $('input[name="csrf_token"]').val(token);
}

function toggleLoginSection(userId) {
    if (userId) {
        $('.account-section').show();
        $('.scf_login_item').hide();
    } else {
        $('.scf_login_item').show();
        $('.account-section').hide();
    }
}

function toggleAddressPopup(userId) {
    if (userId) {
        $('.ras_proccess').remove();
    }
}

function setCrossValues(values) {
    $('.name_cross_sell_popup').val(values.name_cross_sell_popup);
    $('.username_cross_sell_popup').val(values.username_cross_sell_popup);
    $('.email_cross_sell_popup').val(values.email_cross_sell_popup);
    $('.phone_cross_sell_popup').val(values.phone_cross_sell_popup);
    $('.address_cross_sell_popup').val(values.address_cross_sell_popup);
    $('.criminal_cross_sell_popup').val(values.criminal_cross_sell_popup);
    $('.image_cross_sell_popup').val(values.image_cross_sell_popup);
    $('.combo_user').val(values.combo_user);
}

function setSSCancel(ss_cancel) {
    if(ss_cancel) {
        $('#activate_social_search_ss_cancel').show();
    } else {
        $('#activate_social_search_not_ss_cancel').show();
    }
}
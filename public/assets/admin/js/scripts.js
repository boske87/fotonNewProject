



$(document).ready(function() {

    $('.row-main h1:first').append(' <a class="js-aside-toggle js-aside-toggle-on pull-right" href="#d"><span class="entypo entypo-layout"></span></a>');

    // pagination
    $('.cms-options-pagination-stats .pagination').addClass('cms-options-pagination');

    // FORMS

    $('#forms-tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('#tables-tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    // SIDEBAR FULL HEIGHT

    if ($(window).width() > 992) {
        var wrapHeight = $('.wrap').height();
        var rowMainHeight = $('.row-main').height();
        if (wrapHeight === $(window).height()) {
            $('#aside-nav').height(wrapHeight);
        } else {
            $('#aside-nav').height(rowMainHeight);
        }
    } else {
        $('#aside-nav').height('auto');
    }
    $(window).resize(function() {
        if ($(window).width() > 992) {
            var wrapHeight = $('.wrap').height();
            var rowMainHeight = $('.row-main').height();
            if (wrapHeight === $(window).height()) {
                $('#aside-nav').height(wrapHeight);
            } else {
                $('#aside-nav').height(rowMainHeight);
            }
        } else {
            $('#aside-nav').height('auto');
        }
    });

    // COLLAPSING SIDEBAR

    $('.js-aside-toggle-off').click(function() {
        if ($(window).width() > 992) {
            $('.js-aside').hide();
            $('.js-main').addClass('col-md-12');
            $('.js-aside-toggle-on').show();
        }
    });

    $('.js-aside-toggle-on').click(function() {
        if ($(window).width() > 992) {
            $(this).hide();
            $('.js-main').removeClass('col-md-12');
            $('.js-main').addClass('col-md-10');
            $('.js-aside').show();
        }
    });

    // FOR ELEMENT IN FOCUS IN REORDERING

    $('.js-in-focus-trigger').click(function() {
        // SCROLLING TO ELEMENT TOP
        var tableTop = $('.cms-in-focus').offset().top;
        $('html, body').stop().animate({ scrollTop: tableTop }, 500);
        $('.cms-in-focus-element a').click(function() {
            return false;
        });
        $('.cms-in-focus-bg').height($('.wrap').height() + 1);
        $('.cms-in-focus-bg').width($(window).width());
        $('.cms-in-focus').addClass('active');
        $('.cms-in-focus-bg').fadeIn(300);
        $('.cms-column-actions').hide();
        $('tr > td:first-of-type').addClass('ico-drag');
        return false;
    });

    $('.cms-in-focus-bg').click(function() {
        $(this).fadeOut(300);
        $('.cms-in-focus').removeClass('active');
        $('.cms-in-focus-bg').fadeOut(300);
        $('.cms-column-actions').show();
        $('tr > td:first-of-type').removeClass('ico-drag');
    });
    $('.js-reordering-save').click(function() {
        $('.cms-in-focus').removeClass('active');
        $('.cms-in-focus-bg').fadeOut(300);
        $('.cms-column-actions').show();
        $('tr > td:first-of-type').removeClass('ico-drag');
    });

    // MAKING EDIT MODE OPTIONS STICKY ON SCROLL

    $('.cms-edit-mode-options').stick_in_parent();






});






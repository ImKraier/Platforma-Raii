let sidebar = $('.sidebar-list');


let sidebar_li = $('.sidebar-list > li');
let category_name = $('#category-name');

var active_element = $('.active');

var semi_sidebar = $('.semi-sidebar');
let semi_sidebar_bool = false;
let content = $('.content');

$(window).on('resize', function () {
    if($(window).width() < 1500) {
        semi_sidebar.addClass('collapsed')
        semi_sidebar_bool = true;
        $('.mobile-collapse > i').removeClass('fa-angle-double-left')
        $('.mobile-collapse > i').addClass('fa-angle-double-right')
    }
});

$(document).ready(function () {
    if($(window).width() < 1500) {
        semi_sidebar.addClass('collapsed')
        semi_sidebar_bool = true;
        $('.mobile-collapse > i').removeClass('fa-angle-double-left')
        $('.mobile-collapse > i').addClass('fa-angle-double-right')
    }

    if(window.location.pathname == '/') {
        changeActiveLi('acasa');
    } else if(window.location.pathname.includes('tickets')) {
        changeActiveLi('tickets');
    } else if(window.location.pathname.includes('reports')) {
        changeActiveLi('reports');
    } else if(window.location.pathname.includes('admin')) {
        changeActiveLi('admin');
    }
});

function changeActiveLi(data_target) {
    var category_list = $('.category-list.show');
    var current = $('li[data-target="#' + data_target +'"]');
    if(current.text() != active_element.text() && !$(this).find('a').length) {
        active_element.removeClass('active')
        current.addClass('active')
        category_list.stop().fadeOut('fast', function () {
            category_list.removeClass('show')
            $(current.data('target')).addClass('show');
            $(current.data('target')).stop().fadeIn('fast');
            active_element = current;
            category_name.text(current.text())
        });
    }
}

$('.mobile-collapse').click(function () {
    if(semi_sidebar_bool == true) {
        console.log('true')
        semi_sidebar.removeClass('collapsed');
        content.removeClass('collapsed');
        semi_sidebar_bool = false;
        $('.mobile-collapse > i').removeClass('fa-angle-double-right')
        $('.mobile-collapse > i').addClass('fa-angle-double-left')
    } else {
        $('.mobile-collapse > i').removeClass('fa-angle-double-left')
        $('.mobile-collapse > i').addClass('fa-angle-double-right')
        console.log('false')
        semi_sidebar.addClass('collapsed');
        content.addClass('collapsed');
        semi_sidebar_bool = true;
    }
});

sidebar_li.each(function() {
    if(!$(this).hasClass('active')) {
        $($(this).data('target')).hide();
    }

    // $(this).mouseenter(function () {
    //     var category_list = $('.category-list.show');
    //     var current = $(this);
    //     if(current.text() != active_element.text()) {
    //         active_element.removeClass('active')
    //         current.addClass('active')
    //         category_list.stop().fadeOut(function () {
    //             category_list.removeClass('show')
    //             $(current.data('target')).addClass('show');
    //             $(current.data('target')).stop().fadeIn();
    //             active_element = current;
    //         });
    //     }
    // });
    //
    // $(this).mouseleave(function () {
    //     var category_list = $('.category-list.show');
    //     var current = $(this);
    //     if(current.text() != active_element.text()) {
    //         active_element.addClass('active');
    //         category_list.stop().fadeOut(function () {
    //             category_list.removeClass('show');
    //             $(active_element.data('target')).addClass('show');
    //             $(active_element.data('target')).stop().fadeIn();
    //         });
    //     }
    // });

    $(this).click(function () {
        var category_list = $('.category-list.show');
        var current = $(this);
        console.log(current.text())
        if(current.text() != active_element.text() && !$(this).find('a').length) {
            active_element.removeClass('active')
            current.addClass('active')
            category_list.stop().fadeOut('fast', function () {
                category_list.removeClass('show')
                $(current.data('target')).addClass('show');
                $(current.data('target')).stop().fadeIn('fast');
                active_element = current;
                category_name.text(current.text())
            });
        }
    });
});





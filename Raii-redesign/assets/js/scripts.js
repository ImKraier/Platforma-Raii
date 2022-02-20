let sidebar = $('.sidebar-list');


let sidebar_li = $('.sidebar-list > li');
let category_name = $('#category-name');

var active_element = $('.active');

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
        if(current.text() != active_element.text()) {
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





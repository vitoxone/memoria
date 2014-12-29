// Only apply the fixed stuff to desktop devices
// -----------------------------------------------------------------------------

$(function(){

    if ( ! /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {

        //$('#header').css({ 'background-color' : 'yellow', 'font-weight' : 'bolder' });

        // #navigation fixed
        if ($(window).width() > 767) {
            //
            var menu = $('#navigation'),
                pos = menu.offset();

            //$(window).scrollTop($(window).scrollTop()+1);
            //$(window).scrollTop($(window).scrollTop()-1);

            $(window).scroll(function(){
                if($(this).scrollTop() > pos.top+menu.height() && menu.hasClass('default')){
                    menu.fadeOut('fast', function(){
                        $(this).removeClass('default').addClass('fixed').fadeIn('fast');
                    });
                } else if($(this).scrollTop() <= pos.top && menu.hasClass('fixed')){
                    menu.fadeOut('fast', function(){
                        $(this).removeClass('fixed').addClass('default').fadeIn('fast');
                    });
                }
            });
        }
    }

});

// ON DOCUMENT READY
// -----------------------------------------------------------------------------
$(document).ready(function(){

    //alert( $(window).width() + ' x ' + $(window).height());

    // Portfolio
    // -----------------------------------------------------------------------------
    $('.prettyPhoto').prettyPhoto();
    // isotope settings
    // cache container
    var $container = $('#portfolio-grid');
    if ($container.length>0) {
        //
        // initialize isotope
        $container.isotope({
            // options...
            itemSelector : 'article',
            resizable: false,
            masonry: { columnWidth: $container.width() / 12 }
            //, layoutMode : 'fitRows'
        });
        //
        // update columnWidth on window resize
        $(window).smartresize(function(){
            $container.isotope({
                // update columnWidth to a percentage of container width
                masonry: { columnWidth: $container.width() / 12 }
            });
        });
        // filter items when filter link is clicked
        $('#filtrable a').click(function(){
            var selector = $(this).attr('data-filter');
            $container.isotope({ filter: selector });
            // mark current li
            $(this).parent().parent().find('.current').removeClass('current');
            $(this).parent().addClass('current');
            return false;
        });
        // add more items to portfolio
        $('.load-more-grid').click(function() {
            var count = $(this).attr('data-count');
            var $newEls = $(fakeElement2.getGroup(count));
            $container.isotope('insert', $newEls, function(){
                relocate();
            });
        });
        // //
        function relocate() {
            setTimeout("$('#portfolio-grid').isotope('reLayout')",1000);
            $('.prettyPhoto').prettyPhoto();
        }
        $(window).load(function(){
            relocate();
        });
        $(window).resize(function(){
            relocate();
        });
    }


});

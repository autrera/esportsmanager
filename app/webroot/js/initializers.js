!function( $ ) {

    $(function () {
        
        $('.carousel').carousel({
            interval: 2000
        });

        $("a[rel=popover]").popover();

		$(".fancybox").fancybox();

    });

}( window.jQuery );

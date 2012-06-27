!function( $ ) {

    $(function () {
        
        $('.carousel').carousel({
            interval: 2000
        });

        $("a[rel=popover]").popover();

		$(".fancybox").fancybox({
			autoSize: false,
			height: '90%',
			width: 640,
			afterShow: function(){
				this.resize();
			}
		});

    });

}( window.jQuery );

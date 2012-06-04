!function( $ ) {

    $(function () {
        
        $('.carousel').carousel({
            interval: 2000
        });

        $("a[rel=popover]").popover();

		$(".fancybox").fancybox();

		$.getJSON(
			'http://api.justin.tv/api/stream/list.json?channel=nerdgasmtv,darkest_mage,colminigun,angrytestie&jsonp=?',
			function(a){
				console.log(a);
			}
		);

    });

}( window.jQuery );

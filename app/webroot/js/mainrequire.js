require(["jquery", "bootstrap"], function($) {
    $(function() {

        $('.carousel').carousel({
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

        $(".enlarger").hover(function(){
            $(this).animate({
                'z-index': 999,
                'min-width': '120px',
                'height': '80px',
                'left': '-10px',
                'top': '-10px'
            }, 50, 'swing');
        }, function (){
            $(this).animate({
                'z-index': 998,
                'left': '0px',
                'top': '0px',
                'height': '60px',
                'min-width': '100px',
                'width': '100px'
            }, 50, 'swing');
        });

    });
});

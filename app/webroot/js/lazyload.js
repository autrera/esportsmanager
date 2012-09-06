define(['jquery', 'lazyload.min'], function($) {
    $(function(){

        console.log('Listo el lazyload');
        $("img.lazy").lazyload();

    });
});

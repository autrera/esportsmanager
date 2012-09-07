define([
    "jquery.fancybox.pack",
    "jquery.fancybox-buttons",
    "jquery.fancybox-media",
    "jquery.fancybox-thumbs"
], ($) ->
    $ ->
        $('.fancybox').fancybox
            autoSize: false
            height: '90%'
            width: 640
            afterShow: ->
                this.resize()
                return
        return
    return
)

define(['jquery'], ($) ->
    $ ->
        $.ajax
            url: '/tweets/'
            type: 'GET'
            success: (data, textStatus, xhr) ->
                $('.tweets div').html(data)
                return
        return
    return
)

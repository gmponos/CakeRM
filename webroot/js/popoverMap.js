function popoverMapReadyFunction() {
    $('a.popover-map').each(function () {
        $(this).qtip({
            content: {
                text: 'Loading...',
                ajax: {
                    url: $(this).attr('href'),
                    dataType: "html",
                    type: 'POST',
                    success: function (data, status) {
                        this.set('content.text', data);
                    }
                }
            },
            position: {
                my: 'top center',
                at: 'bottom center',
                target: $(this),
                viewport: $(window),
                adjust: {
                    method: 'none flip'
                }
            },
            show: {
                solo: true,
                event: 'click'
            },
            hide: 'click unfocus',
            style: {
                classes: 'qtip-rounded qtip-bootstrap qtip-width-auto'
            }
        })
            .click(function (event) {
                event.preventDefault();
            });
    });
}

$(document).on('ready', function () {
    popoverMapReadyFunction();
});
//Comments.modals = function() {
//	$(".comment-view").on("click", function() {
//		var el= $(this)
//		var modal = $('#comment-modal');
//		$('#comment-modal')
//			.find('.modal-header h3').html(el.data("title")).end()
//			.find('.modal-body').html('<pre>' + el.data('content') + '</pre>').end()
//			.modal('toggle');
//		return false;
//	});
//}
function readyFunction() {

    $('[data-toggle="qtip-popover"]').each(function () {
        $(this).qtip({
            content: {
                text: $(this).attr('data-content')
            },
            position: {
                target: 'mouse'
            },
            show: {
                event: $(this).attr('data-trigger')
            },
            hide: 'mouseleave',
            style: {
                classes: 'qtip-rounded',
                tip: false
            }
        });
    });

    $('a.popover-remote').each(function () {
        $(this).qtip({
            content: {
                text: 'Loading...',
                ajax: {
                    url: $(this).attr('data-remote'),
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
                event: 'mouseover'
            },
            hide: 'mouseout',
            style: {
                classes: 'qtip-rounded qtip-bootstrap qtip-width-auto'
            }
        });
    });

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

    $('[data-toggle="qtip-tooltip"]').each(function () {
        $(this).qtip({
            content: {
                text: $(this).attr('title')
            },
            show: {
                event: 'mouseover',
                solo: true
            },
            hide: 'mouseleave',
            style: {
                classes: 'qtip-rounded qtip-dark',
                tip: false
            }
        })
    });
}

/**
 * @decription we need the function in order to load the first ajax tab
 */
$(document).on('ready', function () {
    $('.nav-tabs-remote li a').on('click', function (e) {
        var $this = $(this);
        var selector = $this.data('target')

        if (selector) {
            $.ajax({
                url: $this.attr('href'),
                dataType: "html",
                error: function (XMLHttpRequest, textStatus, errorThrown) {

                },
                success: function (data, textStatus) {
                    $(selector).html(data);
                }
            })
        }
    });

    $('.nav-tabs-remote li.active:first a')
        .click()
        .tab('show');
});

/**
 * @description send an email when the element is pressed.
 *
 */
$(document).on('click', '[data-toggle="email"]', function (event) {
    if (confirm("Are you sure you want to email this?")) {
        $.ajax({
            url: $(this).attr('href'),
            dataType: "html",
            type: 'POST',
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $().growl({
                    growlTextTitle: 'Warning!!!',
                    growlMessage: 'The email was not sent',
                    growlClass: "qtip-red growl-custom-success qtip-width-auto"
                });
            },
            success: function (data, textStatus) {
                $().growl({
                    growlTextTitle: 'Success',
                    growlMessage: 'The email was sent successfully'
                });
            }
        });
    }
    event.preventDefault();
});

/**
 * @description ajax delete.
 *
 */
$(document).on('click', '[data-toggle="delete"]', function (event) {
    var update;
    if ($(this).attr('data-update')) {
        update = $(this).attr('data-update');
    } else {
        update = '#content';
    }

    if (confirm("Are you sure you want to delete this?")) {
        $.ajax({
            url: $(this).attr('href'),
            dataType: "html",
            type: 'POST',
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $().growl({
                    growlTextTitle: 'Warning!!!',
                    growlMessage: errorThrown,
                    growlClass: "qtip-red growl-custom-success qtip-width-auto"
                });
            },
            success: function (data, textStatus) {
                $(update).html(data);
                $().growl({
                    growlMessage: 'The delete was successfully',
                    growlClass: "qtip-green growl-custom-success "
                });
            }
        });
    }
    event.preventDefault();
});

/**
 *
 */
$(document).on('change', '[data-toggle="operate"]', function (event) {

    var op = $(this).attr('data-operate');
    var el = this;

    $.ajax({
        data: $(this).serialize(),
        dataType: "html",
        type: "POST",
        url: $(this).attr('data-remote') + '/' + $(this).val(),
        beforeSend: function () {
            $(op).prop('disabled', true);
            $(op).trigger("chosen:updated");
        },
        success: function (data, textStatus) {
            $(op).html(data);
            $(el).attr('data-allow-toggle', 'false');
        },
        complete: function () {
            $(op).prop('disabled', false);
            $(op).trigger("chosen:updated");
        }
    });
});

/**
 *
 * @description load a  modal form when the modal submit do the following actions
 */
$(document).on('submit', '[data-toggle="modal-form"]', function (event) {
    var update = $(this).attr('data-update');
    var modal = $(this).attr('data-hide');

    event.preventDefault();

    $.ajax({
        url: $(this).attr('action'),
        data: $(this).serialize(),
        type: 'POST',
        dataType: 'html',
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            $().growl({
                growlTextTitle: 'Warning!!!',
                growlMessage: errorThrown,
                growlClass: "qtip-red growl-custom-success qtip-width-auto"
            });
        },
        success: function (data, textStatus) {
            if (update)
                $(update).html(data);
            //update all chosen combobox
            $(".form-control-chosen").each(function () {
                $(this).trigger("chosen:updated");
            });
            $().growl({
                growlTextTitle: 'Success',
                growlMessage: 'The action was successfully'
            });
            $(modal).modal('hide');
        }
    });
});

/**
 * @description load a  modal form when the modal submit do the following actions
 */
$(document).on('submit', '[data-toggle="ajax-form"]', function (event) {
    var update = $(this).attr('data-update');

    event.preventDefault();

    $.ajax({
        url: $(this).attr('action'),
        data: $(this).serialize(),
        type: 'POST',
        dataType: 'html',
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            $().growl({
                growlTextTitle: 'Warning!!!',
                growlMessage: errorThrown,
                growlClass: "qtip-red growl-custom-success qtip-width-auto"
            });
        },
        success: function (data, textStatus) {
            if (update)
                $(update).html(data);
        }
    });
});

/**
 * @description
 *
 * we need to make up a function to trigger
 * the element on load for refresh
 *
 */
$(document).load(function (event) {
    $('.form-control-toggle').ready(function (event) {

        var handle = $(this).attr('data-form-toggle');
        var el = this;

        $.ajax({
            data: $(this).serialize(),
            dataType: "html",
            type: "POST",
            url: $(this).attr('data-remote') + '/' + $(this).val(),
            beforeSend: function () {
                $(handle).prop('disabled', true);
                $(handle).trigger("chosen:updated");
            },
            success: function (data, textStatus) {
                $(handle).html(data);
                $(el).attr('data-allow-toggle', 'false');
            },
            complete: function () {
                $(handle).prop('disabled', false);
                $(handle).trigger("chosen:updated");
            }
        });
    });
});


/**
 * @deprecated use [data-toggle="modal-form"]
 */
$(document).on('submit', '.modal-form-add', function (event) {
    var target = $(this).attr('data-target');
    var modal = $(this).attr('data-hide');

    $.ajax({
        url: $(this).attr('action'),
        data: $(this).serialize(),
        type: 'POST',
        dataType: 'html',
        success: function (data, textStatus) {
            $(target).html(data);
            //update all chosen combobox
            $(".form-control-chosen").each(function () {
                $(this).trigger("chosen:updated");
            });
            $(modal).modal('hide');
        },
        complete: function () {
            $().growl({
                growlTextTitle: 'Success',
                growlMessage: 'The action was successfully'
            });
        }
    });
    event.preventDefault();
});

$(document).on('submit', '.modal-form-update', function (event) {
    var modal = $(this).attr('data-hide');

    $.ajax({
        url: $(this).attr('action'),
        data: $(this).serialize(),
        type: 'POST',
        dataType: 'html',
        success: function (data, textStatus) {
            $(modal).modal('hide');
        },
        complete: function () {
            $().growl({
                growlTextTitle: 'Success',
                growlMessage: 'The action was successfully'
            });
        }
    });
    event.preventDefault();
});

$(document).on('ready', function () {
    $('.modal-form-request').on('submit', function (event) {
        var modal = $(this).attr('data-hide');

        $.ajax({
            url: $(this).attr('action'),
            data: $(this).serialize(),
            type: $(this).attr('method'),
            success: function (data, textStatus) {
                $().growl({
                    growlTextTitle: 'Success',
                    growlMessage: 'The action was successfully'
                });
            },
            complete: function () {
                $(modal).modal('hide');
            }
        });
        event.preventDefault();
    });

    $('[data-toggle="modal-add"]').on('click', function (event) {
        event.preventDefault();
        var url = $(this).attr('href');
        $('#modal-remote').modal({
            remote: url
        });
    });
});

$(document).on('click', '[data-toggle="modal-update"]', function (event) {
    event.preventDefault();

    var update = $(this).attr('data-source');
    if (!update)
        return;

    if ($(update).val() === "") {
        alert("You have to select a value to update");
    } else {
        var url = $(this).attr('href') + '/' + $(update).val();
        $('#modal-remote').modal({
            remote: url
        });
    }
});

/**
 *
 * @deprecated
 */
$(document).on('click', '.btn-modal-update', function (event) {
    event.preventDefault();

    var update = $(this).attr('data-update');
    if (!update)
        return;

    if ($(update).val() === "") {
        alert("You have to select a value to update");
    } else {
        var url = $(this).attr('href') + '/' + $(update).val();
        $('#modal-remote').modal({
            remote: url
        });
    }
});

/**
 *
 */
$(document).on('click', '[data-toggle="modal-view"]', function (event) {
    event.preventDefault();

    var update = $(this).attr('data-update');

    if ($(update).val() === "") {
        alert("You have to select a value to show");
    } else {
        var url = $(this).attr('href') + '/' + $(update).val();
        $('#modal-remote').modal({
            remote: url
        });
    }
});
/**
 * @description
 *
 * we need the function below in order
 * for the remote modals to load
 * every time they are shown
 */
$(document).on('hidden.bs.modal', '#modal-remote',
    function () {
        $(this).removeData('bs.modal').find('.modal-content').children().remove()
    }
);

$(document).on('ready', function () {
    readyFunction();
    //toolbarHidden = false;
    //
    //var sidebarState = Cookie.read('sidebarDisplay');
    //var display = toolbarHidden ? 'show' : 'hide';
    //Cookie.write('toolbarDisplay', display);
    
    $('#sidebar-toggle').click(function () {
        if ($('#sidebar').is(":visible") === true) {
            $('#main').css({
                'margin-left': '0px'
            });
            $("#sidebar").addClass("hidden");
            $(".navbar-header").addClass("hidden");
        } else {
            $('#main').css({
                'margin-left': '190px'
            });
            $("#sidebar").removeClass("hidden");
            $(".navbar-header").removeClass("hidden");
        }
    });

});


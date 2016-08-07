/**
 * The function below is designed to handle Business and Contact changes
 * on select boxes.
 *
 */
$(document).on('change', '[data-toggle="BusinessContact"]', function (event) {

    var op = $(this).attr('data-operate');
    var el = this;

    var selVal = $(op).val();

    if (selVal === '' || $(el).val() === '') {
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
            },
            complete: function () {
                $(op).prop('disabled', false);
                $(op).trigger("chosen:updated");
            }
        });
    }
    if ($(el).val() === '') {
        $.ajax({
            dataType: "html",
            type: "POST",
            url: $(this).attr('data-reset'),
            beforeSend: function () {
                $(el).prop('disabled', true);
                $(el).trigger("chosen:updated");
            },
            success: function (data, textStatus) {
                $(el).html(data);
            },
            complete: function () {
                $(el).prop('disabled', false);
                $(el).trigger("chosen:updated");
            }
        });
    }
});
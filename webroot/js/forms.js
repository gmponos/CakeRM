$(document).on('ready', function () {

    $(document).on("change keyup", "#BusinessBusiness", function (event) {
        var tmp = $(this).val();
        $("#BusinessFirm").val(tmp);
    });

    /**
     * Prevent double form submissions on all forms to avoid unwanted requests
     */
    $('body').on('submit', 'form', function (e) {
        var self = $(this);
        if (self.data('alreadySubmitted')) {
            e.stopImmediatePropagation();
            e.preventDefault();
        } else {
            self.data('alreadySubmitted', true);
        }
    });
});
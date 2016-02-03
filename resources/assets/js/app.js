(function() {
    $.suscribe('ajax.request.success', function(e, success) {
        var form = success.form;
        var message = $(form).data('remote-success-message');

        if (message) {
            $('.flash').html(message).fadeIn(500).delay(2500).fadeOut(500);
        }

        var execute = $(form).data('remote-success-exec');
        if(execute){
            window[execute](success.data);
        }
    });

    $.suscribe('ajax.request.error', function(e, success){
        var data = success.data
        var form = success.form;

        var execute = $(form).data('remote-error-exec');
        if (execute) {
            window[execute](data);
        }
    });

    // Sobreescritura de la funcion alert
    window.alert = function() {
        var level = arguments[1] || "info";
        var body = arguments[2] || "";

        return swal({
            title: arguments[0],
            text: body,
            type: level,
            confirmButtonText: "OK",
            html: true
        });
    };
})();
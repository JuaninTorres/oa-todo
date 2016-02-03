(function () {

    var o = $({});

    $.suscribe = function () {
        o.on.apply(o, arguments)
    };
    $.unsuscribe = function () {
        o.off.apply(o, arguments)
    };
    $.publish = function () {
        o.trigger.apply(o, arguments)
    };

    var submitAjaxRequest = function (e) {
        var form = $(this);
        var method = form.find('input[name="_method"]').val() || 'POST';

        $.ajax({
            type: method,
            url: form.prop('action'),
            data: form.serialize(),
            success: function (data) {
                var success = {
                    form: form,
                    data: data
                };
                $.publish('ajax.request.success', success);
            },
            error: function (data) {

                var error = {
                    form: form,
                    data: data
                };
                $.publish('ajax.request.error', error);
            }
        });

        e.preventDefault();
    };

    // Confirm an action before proceeding.
    var confirmAction = function (e) {
        var input = $(this);

        input.prop('disabled', 'disabled');

        e.preventDefault();

        swal({
            title: input.data('confirm'),
            text: input.data('confirm-text'),
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#00a65a",
            confirmButtonText: "OK",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            html: true
            },
            function(isConfirm){
                if(isConfirm) {
                    swal.disableButtons();
                    input.closest('form').submit();
                }
            }
        );

        /////////////

        input.removeAttr('disabled');
    };


    //Funcion para Simular submit en etiquetas (a)
    var submitForLink = function (e) {
        var a = $(this);
        swal({
            title: input.data('confirm'),
            text: input.data('confirm-text'),
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "OK",
            closeOnConfirm: false,
            html: true
        },
        function(isConfirm){
            if(isConfirm) {
                swal.disableButtons();
                a.closest('form').submit();
            }
        });
    }


    // Los formularios con el atributo 'data-remote' serán procesados como AJAX
    $('form[data-remote]').on('submit', submitAjaxRequest);

    // Confirmaciones
    $('input[data-confirm], button[data-confirm]').on('click', confirmAction);

    //Submit for Link
    $('a[class*="submit-button"]').on('click', submitForLink);

})();

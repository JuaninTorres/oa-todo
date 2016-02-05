(function() {
    $.suscribe('ajax.request.success', function(e, success) {
        var form = success.form;
        var message = $(form).data('remote-success-message');

        if (message) {
            $('#flash-message').html(message).fadeIn(500).delay(2500).fadeOut(500);
        }

        var execute = $(form).data('remote-success-exec');
        if(execute){
            window[execute](success.data);
        }
    });

    $.suscribe('ajax.request.error', function(e, success){
        var data = success.data;
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

    $.suscribe('channel.bind.TaskWasAssigned', function(e, channel) {
        channel.bind('App\\Events\\TaskWasAssigned', function(data) {
            var task = data.task,
                project = data.project,
                message = "<div class='Alert Alert--Info' role='alert'>" +
                    "<h4><i class='fa fa-check-square'></i> <a href='" + task.url + "'>" + task.name + "</a>:</h4>" +
                    "<p>" + project.owner + " lo ha <strong>calzado</strong> con esta tarea que es parte" +
                    " de su proyecto <a href='" + project.url + "'>" + project.name + "</a>.</p>" +
                    "</div>";

            $('#flash-message').html(message).fadeIn(500).delay(8000).fadeOut(500);
        });
    });

    $.suscribe('channel.bind.TaskWasFinished', function(e, channel) {
        channel.bind('App\\Events\\TaskWasFinished', function(data) {
            var task = data.task,
                project = data.project,
                message = "<div class='Alert Alert--Success' role='alert'>" +
                    "<h4><i class='fa fa-check-square'></i> <a href='" + task.url + "'>" + task.name + "</a>:</h4>" +
                    "<p>" + task.responsible + " ha <strong>finalizado</strong> esta tarea que es parte" +
                    " de su proyecto <a href='" + project.url + "'>" + project.name + "</a>.</p>" +
                    "</div>";

            $('#flash-message').html(message).fadeIn(500).delay(8000).fadeOut(500);
        });
    });

})();
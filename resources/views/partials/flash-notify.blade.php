@if( $currentUser )
    <script>
        (function(){
            var pusher = new Pusher('d14762d50f54edecc49d', {
                encrypted: true
            });
            var channel = pusher.subscribe('user.{{ $currentUser->uuid }}');

            channel.bind('App\\Events\\TaskWasAssigned', function(data) {
                var task = data.task,
                        project = data.project,
                        message = "<h4><i class='fa fa-check-square'></i> <a href='" + task.url + "'>" + task.name + "</a>:</h4>" +
                                "<p>" + project.owner + " lo ha <strong>calzado</strong> con esta tarea que es parte" +
                                " de su proyecto <a href='" + project.url + "'>" + project.name + "</a>.</p>";

                $('#flash-message').html(message).fadeIn(500).delay(8000).fadeOut(500);
            });
        })();
    </script>
@endif
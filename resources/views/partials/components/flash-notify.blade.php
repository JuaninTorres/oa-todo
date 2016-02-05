@if( $currentUser )
    <script>
        (function(){
            var pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
                encrypted: true
            });
            var channel = pusher.subscribe('user.{{ $currentUser->uuid }}');

            $.publish('channel.bind.TaskWasAssigned', channel);
            $.publish('channel.bind.TaskWasFinished', channel);
        })();
    </script>
@endif
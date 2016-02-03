<div class="jumbotron">
    <div class="container">
        <h1>{{ $title }}</h1>
        @if( isset($content) )
            <p>{{ $content }}</p>
        @endif
    </div>
</div>
<div class="jumbotron">
    <div class="container">
        @include('partials.headeranimated', compact('title'))
        @if( isset($content) )
            <p>{{ $content }}</p>
        @endif
    </div>
</div>
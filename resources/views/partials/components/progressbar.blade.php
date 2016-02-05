<div class="progress">
    <div class="progress-bar @if($value >= 100) progress-bar-success @else progress-bar-info @endif progress-bar-striped" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ $value }}%;">
        {{ $value }}%
    </div>
</div>
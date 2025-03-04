@if(isset($charset))
    <meta charset="{{ $charset }}">
@endif
@isset($name)
    <meta name="{{ $name }}" content="{{ $content }}">
@endisset
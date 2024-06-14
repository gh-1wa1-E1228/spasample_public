<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@if(isset($metaData['title'])){{ $metaData['title'] }}@endif</title>
        @if (isset($metaData['meta']))
@foreach($metaData['meta'] as $meta)
<meta name="{{ $meta['name'] }}" content="{{ $meta['content'] }}">
        @endforeach
        @endif
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Styles -->
        @vite('resources/vuejs/sass/app.scss')
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div id="app"></div>        
        @vite('resources/vuejs/js/app.ts')
        @if (isset($metaData['script']))
        @foreach($metaData['script'] as $script)
        <script src="{{ $script['src'] }}" {{ $script['tagPosition'] == 'bodyClose' ? 'defer' : '' }}></script>
        @endforeach
        @endif
    </body>
</html>

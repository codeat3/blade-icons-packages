<!doctype html>

<head>
    <title>Blade Icons Package List</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <script async src="https://cdn.splitbee.io/sb.js"></script>
    @livewireStyles
</head>

<body>

    <x-header />
    <div class="container mx-auto">
        <livewire:show-packages />
    </div>
    <x-footer />
    @livewireScripts
</body>

<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>bjvalmaseda.dev - Blog</title>
</head>

<body>
    <x-nav-bar></x-nav-bar>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-900">
                {{$header ?? ''}}
            </h2>
        </div>
    </header>

    <main class="min-h-screen">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <!-- Replace with your content -->
            {{$slot}}
            <!-- /End replace -->
        </div>
    </main>

    <footer>
        <x-footer></x-footer>

    </footer>

    <script src="{{ asset('js/app.js') }}" defer> </script>
    {{ $scripts ?? '' }}
</body>

</html>

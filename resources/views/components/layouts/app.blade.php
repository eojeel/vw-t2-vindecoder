<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Vintage VW Decoder' }}</title>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-W2J52LNQ');</script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <wireui:scripts />
        @livewireStyles
    </head>
    <body class="min-h-screen bg-zinc-900 text-zinc-100 flex flex-col">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W2J52LNQ"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

        <x-nav/>

        <main class="flex-1 pt-16">
            {{ $slot }}
        </main>

        <footer class="border-t border-zinc-800 py-6 mt-8">
            <div class="container mx-auto px-4 text-center">
                <p class="text-xs tracking-widest uppercase text-zinc-600">
                    &copy; Joe Lee {{ date('Y') }}. All rights reserved.
                </p>
            </div>
        </footer>

        @livewireScriptConfig
    </body>
</html>
<script>
    function bodyColor(selector) {
        var selectedColor = selector.options[selector.selectedIndex].value;
        var element = document.querySelector('.bus__body--bottom');
        element.style.backgroundColor = selectedColor;
    }
</script>

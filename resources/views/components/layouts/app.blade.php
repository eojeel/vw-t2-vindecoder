<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }}</title>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-W2J52LNQ');</script>
            <!-- End Google Tag Manager -->
            @vite('resources/css/app.css')
            @vite('resources/js/app.js')
            @livewireStyles
    </head>
    <body>
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W2J52LNQ"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
        <x-nav/>
        {{ $slot }}k
        @livewireScriptConfig
    </body>

    <div class="flex-grow mt-16 bg-gradient-to-r from-gray-200/[.35] to-gray-200/[.15]">
        <footer class="container py-8 text-center">
            <p class="mt-2 text-xs tracking-widest uppercase opacity-50">
                © Joe Lee {{ date('Y') }}. All rights reserved.
            </p>
        </footer>
    </div>
    </html>
    <script>
        function bodyColor(selector) {
            var selectedColor = selector.options[selector.selectedIndex].value;
            var element = document.querySelector('.bus__body--bottom');
            console.log(selectedColor);
            element.style.backgroundColor = selectedColor;
        }

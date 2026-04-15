<nav x-data="{ open: false }" class="fixed top-0 left-0 right-0 z-50 bg-zinc-950/95 backdrop-blur-sm border-b border-zinc-800/70">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">

            {{-- Brand --}}
            <a href="/" wire:navigate class="flex items-center gap-3 group">
                <div class="flex items-center justify-center w-9 h-9 rounded-lg bg-amber-500/10 ring-1 ring-amber-500/25 group-hover:ring-amber-400/50 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 17H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h13l4 4v4a2 2 0 0 1-2 2h-1"/>
                        <circle cx="7" cy="17" r="2"/>
                        <circle cx="17" cy="17" r="2"/>
                        <path d="M9 11V8m3 3V8m3 3V8"/>
                    </svg>
                </div>
                <div class="leading-tight">
                    <div class="text-sm font-bold text-white tracking-tight">Vintage <span class="text-amber-400">VW</span></div>
                    <div class="text-xs text-zinc-500 tracking-widest uppercase">Decoder</div>
                </div>
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center gap-1">
                <a href="/" wire:navigate
                   class="px-3 py-1.5 rounded-md text-sm font-medium text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors duration-150">
                    Decoder
                </a>
                <a href="/vins" wire:navigate
                   class="px-3 py-1.5 rounded-md text-sm font-medium text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors duration-150">
                    VIN List
                </a>
            </div>

            {{-- Mobile hamburger --}}
            <button @click="open = !open"
                    class="md:hidden flex items-center justify-center w-9 h-9 rounded-md text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors duration-150">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Mobile menu --}}
        <div x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1"
             x-cloak
             class="md:hidden border-t border-zinc-800/70 py-3 space-y-1">
            <a href="/" wire:navigate @click="open = false"
               class="block px-3 py-2 rounded-md text-sm font-medium text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors duration-150">
                Decoder
            </a>
            <a href="/vins" wire:navigate @click="open = false"
               class="block px-3 py-2 rounded-md text-sm font-medium text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors duration-150">
                VIN List
            </a>
        </div>
    </div>
</nav>

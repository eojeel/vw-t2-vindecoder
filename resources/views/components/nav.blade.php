<nav x-data="{ open: false }" class="fixed top-0 left-0 right-0 z-50 bg-vw-navy shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">

            {{-- Brand --}}
            <a href="/" wire:navigate class="flex items-center gap-3 group">
                <div class="flex items-center justify-center w-9 h-9 rounded-lg bg-white/10 ring-1 ring-white/20 group-hover:ring-white/40 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-vw-blue" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 17H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h13l4 4v4a2 2 0 0 1-2 2h-1"/>
                        <circle cx="7" cy="17" r="2"/>
                        <circle cx="17" cy="17" r="2"/>
                        <path d="M9 11V8m3 3V8m3 3V8"/>
                    </svg>
                </div>
                <div class="leading-tight">
                    <div class="text-sm font-bold text-white tracking-tight">Vintage <span class="text-vw-blue">VW</span></div>
                    <div class="text-xs text-white/40 tracking-widest uppercase">Decoder</div>
                </div>
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center gap-1">
                <a href="/" wire:navigate
                   class="px-3 py-1.5 rounded-md text-sm font-medium text-white/70 hover:text-white hover:bg-white/10 transition-colors duration-150">
                    Decoder
                </a>
                <a href="/vins" wire:navigate
                   class="px-3 py-1.5 rounded-md text-sm font-medium text-white/70 hover:text-white hover:bg-white/10 transition-colors duration-150">
                    VIN List
                </a>
            </div>

            {{-- Mobile hamburger --}}
            <button @click="open = !open"
                    class="md:hidden flex items-center justify-center w-9 h-9 rounded-md text-white/70 hover:text-white hover:bg-white/10 transition-colors duration-150">
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
             class="md:hidden border-t border-white/10 py-3 space-y-1">
            <a href="/" wire:navigate @click="open = false"
               class="block px-3 py-2 rounded-md text-sm font-medium text-white/70 hover:text-white hover:bg-white/10 transition-colors duration-150">
                Decoder
            </a>
            <a href="/vins" wire:navigate @click="open = false"
               class="block px-3 py-2 rounded-md text-sm font-medium text-white/70 hover:text-white hover:bg-white/10 transition-colors duration-150">
                VIN List
            </a>
        </div>
    </div>
</nav>

<div>
    @if (!empty($string))
        <div class="flex flex-col items-center py-3 border-b border-zinc-700/60">
            <h3 class="text-sm font-semibold uppercase tracking-widest text-zinc-500 mb-2">{{ $title }}</h3>
            <p class="text-zinc-200 text-sm">{{ $string }}</p>
        </div>
    @endif
</div>

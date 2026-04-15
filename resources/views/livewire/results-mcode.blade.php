<div>
    @if (!empty($array) && count($array))
        <div class="flex flex-col items-center py-3 border-b border-zinc-700/60">
            <h3 class="text-sm font-semibold uppercase tracking-widest text-zinc-500 mb-3">{{ $title }}</h3>
            <ul class="w-full space-y-1 text-sm">
                @foreach ($array as $value)
                    <li class="py-1 border-b border-zinc-700/40 text-zinc-300">
                        <span class="text-amber-400 font-mono">{{ $value->code }}</span>
                        &mdash; {{ $value->description }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

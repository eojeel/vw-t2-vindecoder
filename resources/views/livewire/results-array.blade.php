<div>
    @if (!empty($array))
        <div class="flex flex-col items-center py-3 border-b border-zinc-700/60">
            <h3 class="text-sm font-semibold uppercase tracking-widest text-zinc-500 mb-3">{{ $title }}</h3>
            <ul class="w-full space-y-1 text-sm">
                @foreach ($array as $attribute => $value)
                    @if (empty($value))
                        @continue
                    @endif
                    <li class="py-1 border-b border-zinc-700/40 text-zinc-300">{{ $value }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

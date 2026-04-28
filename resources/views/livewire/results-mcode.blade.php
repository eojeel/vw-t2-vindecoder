<div>
    @if (!empty($array) && count($array))
        <div class="flex flex-col items-center py-3 border-b border-gray-100">
            <h3 class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-3">{{ $title }}</h3>
            <ul class="w-full space-y-1 text-sm">
                @foreach ($array as $value)
                    <li class="py-1 border-b border-gray-100 text-gray-800">
                        <span class="text-vw-blue font-mono font-semibold">{{ $value->code }}</span>
                        &mdash; {{ $value->description }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<div>
    @if (!empty($string))
        <div class="flex flex-col items-center py-3 border-b border-gray-100">
            <h3 class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-2">{{ $title }}</h3>
            <p class="text-gray-800 text-sm">{{ $string }}</p>
        </div>
    @endif
</div>

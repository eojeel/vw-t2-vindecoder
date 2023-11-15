<div>
    @if (!empty($array))
    <div class="flex flex-col items-center space-y-4 mt-4 p-4">
        <h5 class="text-xl font-semibold float-right">{{ $title }}</h3>
            <ul class="mt-5 space-y-2">
                @foreach ($array as $attribute => $value)
                    <li class="w-full py-1 border-b-2 border-neutral-100 border-opacity-100 dark:border-opacity-50">
                        {{ $value }}</li>
                @endforeach
            </ul>
    </div>
    @endif
</div>

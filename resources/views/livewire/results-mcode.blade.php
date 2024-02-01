<div>
    <div class="flex flex-col items-center space-y-4 mt-4 p-4">
        <h3 class="text-xl font-semibold">{{ $title }}</h3>
        <ul class="mt-5 space-y-2">
            @foreach ($array as $value)
                <li
                    class="w-full py-1 border-b-2 border-neutral-100 border-opacity-100 dark:border-opacity-50">
                    {{ $value->code }} - {{ $value->description }}</li>
            @endforeach
        </ul>
    </div>
</div>

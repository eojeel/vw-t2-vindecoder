@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    <div class="mt-5 mb-5 flex items-center justify-center w-full">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Chassis Number</th>
                        <th scope="col" class="px-6 py-3">M-Codes</th>
                        <th scope="col" class="px-6 py-3">Paint Code</th>
                        <th scope="col" class="px-6 py-3">M-Codes</th>
                        <th scope="col" class="px-6 py-3">Production Date</th>
                        <th scope="col" class="px-6 py-3">Production Plant</th>
                        <th scope="col" class="px-6 py-3">Export Destination</th>
                        <th scope="col" class="px-6 py-3">Model</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vins as $vin)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="/vin/{{ Str::replace(' ', '', $vin->chassis_number) }}"
                                    wire:navigate.hover>{{ $vin->chassis_number }}</a>
                                </td>
                            <td class="px-6 py-4">{{ $vin->mcode_1 }}</td>
                            <td class="px-6 py-4">{{ $vin->paint_interior }}</td>
                            <td class="px-6 py-4">{{ $vin->mcode_2 }}</td>
                            <td class="px-6 py-4">{{ $vin->model_year }}</td>
                            <td class="px-6 py-4">{{ $vin->production_plan }}</td>
                            <td class="px-6 py-4">{{ $vin->export_destination }}</td>
                            <td class="px-6 py-4">{{ $vin->body_engine_model }}</td>
                        </tr>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $vins->links() }}
</div>

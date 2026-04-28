<div class="container mx-auto px-4 py-10">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-vw-navy tracking-tight">VIN Registry</h1>
        <p class="text-sm text-gray-500 mt-1">Decoded VW T2 chassis records &mdash; 1970&ndash;1979</p>
    </div>

    <div class="rounded-xl border border-vw-silver/40 overflow-hidden shadow-sm bg-white">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-vw-navy text-white">
                    <tr>
                        <th scope="col" class="px-4 py-3 font-semibold whitespace-nowrap">Chassis No.</th>
                        <th scope="col" class="px-4 py-3 font-semibold whitespace-nowrap hidden sm:table-cell">Prod. Date</th>
                        <th scope="col" class="px-4 py-3 font-semibold whitespace-nowrap hidden md:table-cell">Model</th>
                        <th scope="col" class="px-4 py-3 font-semibold whitespace-nowrap hidden md:table-cell">Paint</th>
                        <th scope="col" class="px-4 py-3 font-semibold whitespace-nowrap hidden lg:table-cell">M-Code 1</th>
                        <th scope="col" class="px-4 py-3 font-semibold whitespace-nowrap hidden lg:table-cell">M-Code 2</th>
                        <th scope="col" class="px-4 py-3 font-semibold whitespace-nowrap hidden xl:table-cell">Plant</th>
                        <th scope="col" class="px-4 py-3 font-semibold whitespace-nowrap hidden xl:table-cell">Export</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($vins as $vin)
                        <tr class="odd:bg-white even:bg-gray-50 hover:bg-blue-50 transition-colors duration-100">
                            <td class="px-4 py-3 whitespace-nowrap">
                                <a href="/vin/{{ Str::replace(' ', '', $vin->chassis_number) }}"
                                   wire:navigate.hover
                                   class="font-mono font-semibold text-vw-navy hover:text-vw-blue transition-colors duration-150">
                                    {{ $vin->chassis_number }}
                                </a>
                            </td>
                            <td class="px-4 py-3 text-gray-600 whitespace-nowrap hidden sm:table-cell">{{ $vin->model_year }}</td>
                            <td class="px-4 py-3 text-gray-800 whitespace-nowrap hidden md:table-cell">{{ $vin->body_engine_model }}</td>
                            <td class="px-4 py-3 text-gray-600 whitespace-nowrap hidden md:table-cell">{{ $vin->paint_interior }}</td>
                            <td class="px-4 py-3 text-gray-500 font-mono text-xs whitespace-nowrap hidden lg:table-cell">{{ $vin->mcode_1 }}</td>
                            <td class="px-4 py-3 text-gray-500 font-mono text-xs whitespace-nowrap hidden lg:table-cell">{{ $vin->mcode_2 }}</td>
                            <td class="px-4 py-3 text-gray-500 whitespace-nowrap hidden xl:table-cell">{{ $vin->production_plan }}</td>
                            <td class="px-4 py-3 text-gray-500 whitespace-nowrap hidden xl:table-cell">{{ $vin->export_destination }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-5">
        {{ $vins->links() }}
    </div>

</div>

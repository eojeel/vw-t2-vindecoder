<div>
    <section class="mb-10">
        <section class="mt-10 text-center">
            <div class="mx-auto">
                <h1 class="text-2xl/tight md:text-3xl/tight font-bold container text-center lg:text-5xl/none text-vw-navy">
                    VW T2 (1970–1979) Vin Decoder
                </h1>
                <p class="mt-2 text-sm text-gray-500 tracking-wide">Enter your M-plate data to decode your Volkswagen Type 2</p>
            </div>
        </section>
    </section>

    <div class="container mx-auto flex flex-wrap">

        {{-- Bus illustration + colour selector --}}
        <div class="w-full md:w-2/5 lg:w-3/5"
             x-data="{ bgColor: $wire.busColor }"
             x-on:buscolour.window="bgColor = $event.detail.colour">

            <div class="bus relative bus--full bus--top-white bus--bottom-love">
                <div class="bus-body">
                    <div class="bus__body--top roof"></div>
                    <div class="bus__body--top side-top"></div>
                    <div class="bus__body--top side-top side-top--right"></div>
                    <div class="bus__body--top gutter"></div>
                    <div class="bus__body--top gutter gutter--right"></div>
                    <div class="bus__body--top mid-top"></div>
                    <div class="bus__body--top bump"></div>
                    <div class="bus__body--bottom front" x-bind:style="'background: ' + bgColor"></div>
                    <div class="bus__body--bottomx front-middle"></div>
                    <div class="bus__body--bottomx front-middle--bottom"></div>
                    <div class="bus__body--bottomx grill">
                        <div class="grill__hole"></div>
                        <div class="grill__hole grill__hole--right"></div>
                    </div>
                </div>

                <div class="mirrors">
                    <div class="mirror-l">
                        <div class="mirror-glass"></div>
                        <div class="mirror-arm"></div>
                    </div>
                    <div class="mirror-r">
                        <div class="mirror-glass"></div>
                        <div class="mirror-arm mirror-arm-r"></div>
                    </div>
                </div>

                <div class="windshield">
                    <div class="windshield-rubber"></div>
                    <div class="windshield-rubber--bottom"></div>
                    <div class="windshield-rubber--side"></div>
                    <div class="windshield-rubber--side windshield-rubber--side--right"></div>
                    <div class="windshield-top"></div>
                    <div class="windshield-bottom"></div>
                </div>

                <div class="front-parts">
                    <div class="wiper">
                        <div class="wiper-blade"></div>
                        <div class="wiper-arm"></div>
                        <div class="wiper-attachment"></div>
                    </div>
                    <div class="wiper wiper-left">
                        <div class="wiper-blade"></div>
                        <div class="wiper-arm"></div>
                        <div class="wiper-attachment"></div>
                    </div>
                    <div class="directional">
                        <div class="directional--off"></div>
                    </div>
                    <div class="directional directional--right">
                        <div class="directional--off"></div>
                    </div>
                    <div class="vw-logo vw-logo--shadow">
                        <span class="vw-logo__v"></span>
                        <span class="vw-logo__w">
                            <span class="vw-logo__w__leg-l"></span>
                            <span class="vw-logo__w__leg-r"></span>
                        </span>
                    </div>
                    <div class="vw-logo">
                        <span class="vw-logo__v"></span>
                        <span class="vw-logo__w">
                            <span class="vw-logo__w__leg-l"></span>
                            <span class="vw-logo__w__leg-r"></span>
                        </span>
                    </div>
                    <div class="headlight">
                        <div class="headlight--off">
                            <div class="headlight--off__star"></div>
                        </div>
                    </div>
                    <div class="headlight headlight--right">
                        <div class="headlight--off headlight--on--right">
                            <div class="headlight--off__star"></div>
                        </div>
                    </div>
                    <div class="bumper">
                        <div class="bumper-top"></div>
                        <div class="bumper-straight bs-middle"></div>
                        <div class="bumper-curve bc-1"></div>
                        <div class="bumper-straight bs-1"></div>
                        <div class="bumper-curve bc-2"></div>
                        <div class="bumper-curve bc-3"></div>
                        <div class="bumper-straight bs-3"></div>
                        <div class="bumper-curve bc-4"></div>
                        <div class="bus__body--bottom above-bumper" x-bind:style="'background: ' + bgColor"></div>
                    </div>
                </div>

                <div class="underbody">
                    <div class="tire"></div>
                    <div class="tire tire--right"></div>
                    <div class="mid-parts">
                        <div class="mid-parts--left"></div>
                        <div class="mid-parts--middle"></div>
                        <div class="mid-parts--left mid-parts--right"></div>
                    </div>
                    <div class="under-part-1l"></div>
                    <div class="under-part-1l under-part-1r"></div>
                    <div class="under-part-2"></div>
                    <div class="shock-l"></div>
                    <div class="shock-l shock-r"></div>
                    <div class="bar-l"></div>
                    <div class="bar-l bar-r"></div>
                </div>
            </div>

            {{-- Colour selector --}}
            <div class="flex justify-center"
                 x-data="{ selectedColor: $wire.busColorSelector }"
                 x-on:buscolour.window="selectedColor = $event.detail.colour">
                <div class="relative sm:w-3/6 md:w-2/6 m-1">
                    <select name="colorSelector" id="colorSelector"
                            class="w-full appearance-none bg-white border border-vw-silver/60 rounded-lg px-4 py-2.5 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-vw-blue/40 focus:border-vw-blue transition-colors duration-150 cursor-pointer shadow-sm"
                            x-model="selectedColor"
                            @change="bgColor = $event.target.value">
                        <option value="" selected disabled hidden>Select a colour</option>
                        @foreach ($colors as $color)
                            <option value="{{ $color->hex_code }}"
                                    :selected="selectedColor === '{{ $color->hex_code }}'">
                                {{ $color->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                        <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- VIN permalink --}}
            @if (!empty($vindetails->chassis_number))
                <div class="flex justify-center mt-6">
                    <div class="flex items-center gap-2 px-4 py-3 border border-vw-blue/30 bg-blue-50 rounded-xl text-sm max-w-full overflow-hidden">
                        <svg class="w-4 h-4 text-vw-blue shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244"/>
                        </svg>
                        <span class="font-mono text-xs text-vw-navy truncate">
                            {{ route('vin', ['chassisNumber' => str_replace(' ', '', $vindetails->chassis_number)]) }}
                        </span>
                    </div>
                </div>
            @endif
        </div>

        {{-- Form + Results --}}
        <div class="md:w-3/5 lg:w-2/5 lg:py-28 md:py-28 md:pl-6 sm:py-42">
            <form wire:submit="save">
                <div class="flex justify-center">
                    <div class="border border-vw-silver/40 bg-white rounded-xl p-5 w-full shadow-sm">
                        <x-input
                            wire:model.blur="form.chassis_number"
                            label="Chassis Number"
                            name="c"
                            class="rounded-md !w-1/3 mb-1 vin-input"
                            placeholder="CC CCC CCC"
                        />
                        <div class="mt-3">
                            <x-input
                                wire:model.blur="form.mcode_1"
                                label="M-Plate"
                                name="m"
                                class="flex mb-1 vin-input"
                                placeholder="MMM MMM MMM MMM MMM"
                            />
                        </div>
                        <div class="flex gap-2 mt-3">
                            <div class="flex-1">
                                <x-input
                                    wire:model.blur="form.paint_interior"
                                    label="Paint / Interior"
                                    name="p"
                                    class="vin-input"
                                    placeholder="PPPPII"
                                />
                            </div>
                            <div class="flex-1">
                                <x-input
                                    wire:model.blur="form.mcode_2"
                                    label="M-Plate 2"
                                    name="m2"
                                    class="vin-input"
                                    placeholder="MMM MMM MMM MMM"
                                />
                            </div>
                        </div>
                        <div class="flex gap-2 mt-3">
                            <div class="flex-1">
                                <x-input
                                    wire:model.blur="form.model_year"
                                    label="Model Year"
                                    name="d"
                                    class="vin-input"
                                    placeholder="DD"
                                />
                            </div>
                            <div class="flex-1">
                                <x-input
                                    wire:model.blur="form.production_plan"
                                    label="Production Plant"
                                    name="u"
                                    class="vin-input"
                                    placeholder="UUUU"
                                />
                            </div>
                            <div class="flex-1">
                                <x-input
                                    wire:model.blur="form.export_destination"
                                    label="Export Dest."
                                    name="e"
                                    class="vin-input"
                                    placeholder="EE"
                                />
                            </div>
                            <div class="flex-1">
                                <x-input
                                    wire:model.blur="form.body_engine_model"
                                    label="Engine Model"
                                    name="x"
                                    class="vin-input"
                                    placeholder="TTTT"
                                />
                            </div>
                        </div>
                        <div class="mt-3">
                            <x-errors class="text-sm text-red-600" />
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-3">
                    <button type="submit"
                            class="bg-vw-navy hover:bg-vw-navy-mid active:bg-vw-navy text-white font-semibold h-12 px-6 rounded-lg w-full transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-vw-blue focus:ring-offset-2 sm:w-auto lg:w-1/2 xl:w-1/3 2xl:w-1/4 disabled:opacity-50 shadow-sm">
                        Decode VIN
                    </button>
                </div>
            </form>

            {{-- Results --}}
            <div class="container mx-auto">
                @if (isset($results))
                    <div class="border border-vw-silver/40 bg-white rounded-xl mt-5 p-5 shadow-sm space-y-1">

                        @if (!empty($results->chassisNumber))
                            <div class="flex flex-col items-center py-3 border-b border-gray-100">
                                <h3 class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-2">Model Year</h3>
                                <p class="text-vw-navy font-medium">{{ $results->chassisNumber }}</p>
                            </div>
                        @endif

                        @if (isset($results->production))
                            <livewire:results-string title="Production Date" :string="$results->production" />
                        @endif

                        @if ($results->mCode1->isNotEmpty())
                            <livewire:results-mcode title="M-Code Plate 1" :array="$results->mCode1" />
                        @endif

                        @if ($results->mCode2->isNotEmpty())
                            <livewire:results-mcode title="M-Code Plate 2" :array="$results->mCode2" />
                        @endif

                        @if ($results->paintCodes->isNotEmpty())
                            <div class="flex flex-col items-center py-3 border-b border-gray-100">
                                <h3 class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-3">Paint Codes</h3>
                                <ul class="w-full space-y-1 text-sm">
                                    @foreach ($results->paintCodes as $paint_code)
                                        <li class="py-1 border-b border-gray-100 text-gray-800">
                                            <span class="text-vw-blue font-mono font-semibold">{{ $paint_code->plate_code }}</span>
                                            &mdash; {{ $paint_code->color_code }}
                                        </li>
                                        <li class="py-0.5 text-gray-500 text-xs">DE: {{ $paint_code->german_name }}</li>
                                        <li class="py-0.5 text-gray-500 text-xs">EN: {{ $paint_code->english_name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if ($results->interiorCodes->isNotEmpty())
                            <div class="flex flex-col items-center py-3 border-b border-gray-100">
                                <h3 class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-3">Interior</h3>
                                <ul class="w-full space-y-1 text-sm">
                                    @foreach ($results->interiorCodes as $interior)
                                        <li class="py-1 border-b border-gray-100 text-gray-800">
                                            <span class="text-vw-blue font-mono font-semibold">{{ $interior->code }}</span>
                                            &mdash; {{ $interior->material }}
                                        </li>
                                        <li class="py-0.5 text-gray-500 text-xs">DE: {{ $interior->german_name }}</li>
                                        <li class="py-0.5 text-gray-500 text-xs">EN: {{ $interior->english_name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (isset($results->destination))
                            <livewire:results-string title="Export Destination" :string="$results->destination" />
                        @endif

                        @if (isset($results->engineTrans))
                            <livewire:results-array title="Model Details" :array="$results->engineTrans" />
                        @endif
                    </div>
                @else
                    <section class="mt-5">
                        <div class="border border-vw-silver/40 bg-white rounded-xl p-5 shadow-sm text-sm text-gray-500 leading-relaxed">
                            <span class="font-semibold text-vw-navy">Volkswagen Type 2 M-Plate and VIN Decoder:</span>
                            Essential identification tool for VW Buses from (1970–1979), detailing production codes,
                            equipment, manufacturing dates, destination, specifications, and optional extras.
                        </div>
                    </section>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            window.addEventListener('buscolour', event => {
                console.log(event);
            });
        });
    </script>
</div>

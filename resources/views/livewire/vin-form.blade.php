<div>
    <section class="text-gray-600 body-font mb-10">
        <section class="mt-16 text-cente">
                  <div class="mx-auto text-center text-white">
                <h1 class="text-2xl/tight md:text-3xl/tight font-bold container  text-center lg:text-5xl/none">VW T2 (1970-1979) Vin Decoder</h1>
                </div>
            </section>
        </section>
  <div class="container mx-auto flex flex-wrap">
    <div class="w-full md:w-2/5 lg:w-3/5">
        <div class="bus relative bus--full bus--top-white bus--bottom-love">
            <div class="bus-body">
                <div class="bus__body--top roof"></div>
                <div class="bus__body--top side-top"></div>
                <div class="bus__body--top side-top side-top--right"></div>
                <div class="bus__body--top gutter"></div>
                <div class="bus__body--top gutter gutter--right"></div>
                <div class="bus__body--top mid-top"></div>
                <div class="bus__body--top bump"></div>

                <div class="bus__body--bottom front"></div>

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
                    <div class="bus__body--bottom above-bumper"></div>
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

        <div class="flex justify-center">
            <select name="colorSelector" id="colorSelector" class="sm:w-3/6 md:w-2/6 m-1 px-4 py-2"
                onchange="bodyColor(this)">
                <option value="" selected disabled hidden>Select a Colour</option>
                @foreach ($colors as $color)
                    <option value="{{ $color->hex_code }}" @selected(old('color') == $color->hex_code)>
                        {{ $color->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-center mt-10">
        @if(!empty($vindetails->cc))
            <span class="inline-flex items-center justify-center p-5 border-4 border-gray-500 bg-gray-300 rounded-lg mb-5">
                <span class="w-full">Vin URL: {{ route('vin', ['chassisNumber' => str_replace(' ', '', $vindetails->cc) ]) }}</span>
                @endif
            </span>
        </div>
    </div>

    <div class="md:w-3/5 lg:w-2/5 lg:py-28 md:py-28 md:pl-6 sm:py-42">
        <form wire:submit="save">
            <div class="flex justify-center">
                <div class="border-4 border-gray-500 bg-gray-300 rounded-lg p-2">
                    <input wire:model.blur="form.cc" type="text" name="c" class="w-1/3 mb-1 vin-input"
                        placeholder="CC CCC CCC" />
                    <div>
                        @error('form.cc')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex">
                    <input wire:model.blur="form.mmmmm" type="text" name="m" class="flex w-full mb-1 vin-input"
                        placeholder="MMM MMM MMM MMM MMM">
                    </div>
                    <div>
                        @error('form.mmmmm')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex mb-1">
                        <input wire:model.blur="form.pp" type="text" name="p" class="w-2/5 mr-2 vin-input"
                            placeholder="PPPPII" value="@old('pp')" />
                        <input wire:model.blur="form.mmmm" type="text" name="m2" class="w-3/5 vin-input"
                            placeholder="MMM MMM MMM MMM" />
                    </div>
                    <div class="flex mb-1">
                        <div class="w-2/5 mr-2">
                            @error('form.pp')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-3/5">
                            @error('form.mmmm')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-4">
                        <input wire:model.blur="form.dd" type="text" name="d" class="mr-2 vin-input"
                            placeholder="DD D" />
                        <input wire:model.blur='form.uu' type="text" name="u" class="mr-2 vin-input"
                            placeholder="UUUU" />
                        <input wire:model.blur='form.ee' type="text" name="e" class="mr-2 vin-input"
                            placeholder="EE" />
                        <input wire:model.blur='form.tt' type="text" name="x" class=" vin-input"
                            placeholder="XXXX TT" />
                    </div>
                    <div class="flex justify-center">
                        <ul class="list-none space-y-2 m-2">
                            <li>
                                @error('form.dd')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </li>
                            <li>
                                @error('form.uu')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </li>
                            <li>
                                @error('form.ee')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </li>
                            <li>
                                @error('form.tt')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-2">
                <button
                class="bg-slate-900 hover:bg-slate-700 active:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 focus:ring-offset-slate-50 text-white font-semibold h-12 px-6 rounded-lg w-full transition duration-150 ease-in-out shadow-lg focus:shadow-outline sm:w-auto md:text-base lg:w-1/2 xl:w-1/3 2xl:w-1/4 focus-visible:ring-sky-300 dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400 dark:active:bg-sky-600 disabled:opacity-50"
                type="submit">
                  Decode Vin!
              </button>
            </div>
        </form>
        <div class="container mx-auto">
            @if(isset($results))
                <div class="border-4 border-gray-500 bg-gray-300 rounded-lg mt-5 p-4">
                    @if (!empty($results->chassisNumber))
                        <div class="flex flex-col items-center space-y-4">
                            <h3 class="text-xl font-semibold">Model Year</h3>
                            <ul class="mt-5 space-y-2">
                                <li class="w-full border-b-2 border-neutral-100 border-opacity-100 dark:border-opacity-50">Year - {{ $results->chassisNumber }}</li>
                            </ul>
                        </div>
                    @endif
                    @if(isset($results->production))
                    <livewire:results-string title="Production Date" :string="$results->production" />
                @endif


                    @if ($results->mCode->isNotEmpty())
                        <div class="flex flex-col items-center space-y-4 mt-4 p-4">
                            <h3 class="text-xl font-semibold">M-Codes</h3>
                            <ul class="mt-5 space-y-2">
                                @foreach ($results->mCode as $mcode)
                                    <li class="w-full py-1 border-b-2 border-neutral-100 border-opacity-100 dark:border-opacity-50">
                                        {{ $mcode->code }} - {{ $mcode->description }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($results->paintCodes->isNotEmpty())
                    <div class="flex flex-col items-center space-y-4 mt-4 p-4">
                            <h5 class="text-xl font-semibold float-right">Paint Codes</h3>
                                <ul class="mt-5 space-y-2">
                                    @foreach ($results->paintCodes as $paint_code)
                                        <li
                                            class="w-full py-1 border-b-2 border-neutral-100 border-opacity-100 dark:border-opacity-50">
                                            {{ $paint_code->plate_code }} - {{ $paint_code->color_code }} (German -
                                            {{ $paint_code->german_name }} | English - {{ $paint_code->english_name }})</li>
                                    @endforeach
                                </ul>
                        </div>
                    @endif

                    @if ($results->interiorCodes->isNotEmpty())
                    <div class="flex flex-col items-center space-y-4 mt-4 p-4">
                            <h5 class="text-xl font-semibold float-right">Interior</h3>
                                <ul class="mt-5 space-y-2">
                                    @foreach ($results->interiorCodes as $interior)
                                        <li class="w-full py-1 border-b-2 border-neutral-100 border-opacity-100 dark:border-opacity-50">
                                            {{ $interior->code }} - {{ $interior->material }} (German -
                                            {{ $interior->german_name }} | English - {{ $interior->english_name }})
                                        </li>
                                    @endforeach
                                </ul>
                        </div>
                    @endif

                    @if(isset($results->destination))
                        <livewire:results-string title="Export Destination" :string="$results->destination" />
                    @endif

                    @if(isset($results->engineTrans))
                        <livewire:results-array title="Model Details" :array="$results->engineTrans" />
                    @endif
                </div>
            @else
            @endif
        </div>
    </div>
</div>
<script>
        function bodyColor(selector) {
        var selectedColor = selector.options[selector.selectedIndex].value;
        var element = document.querySelector('.bus__body--bottom');
        console.log(selectedColor);
        element.style.backgroundColor = selectedColor;
    }
    window.addEventListener('BusColour', event => {
        const data = event.detail;
        var element = document.querySelector('.bus__body--bottom');
        const select = document.getElementById("colorSelector");
        select.value = data;
        element.style.backgroundColor = data;
        console.log(`Received data from Livewire dehydrate: ${data}`);
    });
</script>
</div>

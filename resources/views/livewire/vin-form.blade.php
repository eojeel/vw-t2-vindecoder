<div class="container mx-auto">
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
    @isset($results)
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
                                <li
                                    class="w-full py-1 border-b-2 border-neutral-100 border-opacity-100 dark:border-opacity-50">
                                    {{ $interior->code }} - {{ $interior->material }} (German -
                                    {{ $interior->german_name }} | English - {{ $interior->english_name }})</li>
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
    @endisset
</div>
<script>
    window.addEventListener('BusColour', event => {
        const data = event.detail;
        var element = document.querySelector('.bus__body--bottom');
        const select = document.getElementById("colorSelector");
        select.value = data;
        element.style.backgroundColor = data;
        console.log(`Received data from Livewire dehydrate: ${data}`);
    });
</script>

<div class="container mx-auto ">
    <form wire:submit="save">
        <div class="flex justify-center">
            <div class="border-4 border-gray-500 bg-gray-300 rounded-lg mt-10 w-1/4 p-2">
                <input wire:model="cc" type="text" name="c" class="w-1/3 mb-1 px-4 py-2 vin-btn"
                    placeholder="CC CCC CCC" />
                <div>
                    @error('cc')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <input wire:model="mmmmm" type="text" name="m" class="w-full mb-1 px-4 py-2 vin-btn"
                    placeholder="MMM MMM MMM MMM MMM">
                <div>
                    @error('mmmmm')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex mb-1">
                    <input wire:model="pp" type="text" name="p" class="w-2/5 mr-2 px-4 py-2 vin-btn"
                        placeholder="PPPPII" value="@old('pp')"/>
                    <input wire:model="mmmm" type="text" name="m2" class="w-3/5 px-4 py-2 vin-btn"
                        placeholder="MMM MMM MMM MMM" />
                </div>
                <div class="flex mb-1">
                    <div class="w-2/5 mr-2">
                        @error('pp')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-3/5">
                        @error('mmmm')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-4">
                    <input wire:model="dd" type="text" name="d" class="mr-2 px-4 py-2 vin-btn"
                        placeholder="DD D" />
                    <input wire:model='uu' type="text" name="u" class="mr-2 px-4 py-2 vin-btn"
                        placeholder="UUUU" />
                    <input wire:model='ee' type="text" name="e" class="mr-2 px-4 py-2 vin-btn"
                        placeholder="EE" />
                    <input wire:model='tt' type="text" name="x" class="px-4 py-2 vin-btn"
                        placeholder="XXXX TT" />
                </div>
                <div>
                    @error('dd')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    @error('uu')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    @error('ee')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    @error('tt')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-2">
            <button
                class="bg-slate-900 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 focus:ring-offset-slate-50 text-white font-semibold h-12 px-6 rounded-lg w-full flex items-center justify-center sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400"
                type="submit">Submit</button>
        </div>
    </form>

    @isset($results)
    <div class="border-4 border-gray-500 bg-gray-300 rounded-lg mt-5">
            <div class="flex flex-col items-center space-y-4">
                <h3 class="text-xl font-semibold">MCodes:</h3>
                <ul class="mt-5 list-disc justify-center flex flex-col">
                    @foreach ($results->mCodes as $mcode)
                            <li class="w-full border-b-2 border-neutral-100 border-opacity-100 py-2 dark:border-opacity-50">{{ $mcode->code }} - {{ $mcode->description }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="flex flex-col items-center space-y-4 mt-2">
            <h5 class="text-xl font-semibold float-right">Paint Codes:</h3>
            <ul class="mt-5 list-disc justify-center flex flex-col">
                @foreach ($results->paintCodes as $paint_code)
                    <li class="w-full border-b-2 border-neutral-100 border-opacity-100 py-2 dark:border-opacity-50">{{ $paint_code->plate_code }} - {{ $paint_code->color_code }} (German - {{ $paint_code->german_name }} | English - {{ $paint_code->english_name }})</li>
                @endforeach
            </ul>
            </div>

            <div class="flex flex-col items-center space-y-4 mt-2">
            <h5 class="text-xl font-semibold float-right">Interior:</h3>
            <ul class="mt-5 list-disc justify-center flex flex-col">
                @foreach ($results->interiorCodes as $interior)
                    <li class="w-full border-b-2 border-neutral-100 border-opacity-100 py-2 dark:border-opacity-50">{{ $interior->code }} - {{ $interior->material }} (German - {{ $interior->german_name }} | English - {{ $interior->english_name }})</li>
                @endforeach
            </ul>
            </div>
        </div>
    @endisset
</div>

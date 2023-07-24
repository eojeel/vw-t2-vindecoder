<div>
    <form wire:submit="save">
        <div class="flex justify-center">
            <div class="border-2 rounded-lg mt-10 w-1/4 p-2">
                <input wire:model="cc" type="text" name="c"
                    class="w-1/3 mb-1 px-4 py-2 vin-btn"
                    placeholder="CC CCC CCC" />
                    <div>
                    @error('cc') <span class="error">{{ $message }}</span> @enderror
                    </div>
                <input wire:model="mmmmm" type="text" name="m"
                    class="w-full mb-1 px-4 py-2 vin-btn"
                    placeholder="MMM MMM MMM MMM MMM">
                    <div>
                    @error('mmmmm') <span class="error">{{ $message }}</span> @enderror
                    </div>
                <div class="flex mb-1">
                    <input wire:model="pp" type="text" name="p"
                        class="w-1/3 mr-2 px-4 py-2 vin-btn"
                        placeholder="PPPPII" />
                     <div >
                    @error('pp') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <input wire:model="mmmm" type="text" name="m2"
                        class="w-2/3 px-4 py-2 vin-btn"
                        placeholder="MMM MMM MMM MMM" />
                    <div >
                    @error('mmmm') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="grid grid-cols-4">
                    <input type="text" name="d"
                        class="mr-2 px-4 py-2 vin-btn"
                        placeholder="DD D" />
                    <input type="text" name="u"
                        class="mr-2 px-4 py-2 vin-btn"
                        placeholder="UUUU" />
                    <input type="text" name="e"
                        class="mr-2 px-4 py-2 vin-btn"
                        placeholder="EE" />
                    <input type="text" name="x"
                        class="px-4 py-2 vin-btn"
                        placeholder="XXXX TT" />
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-2">
            <button
                class="bg-slate-900 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 focus:ring-offset-slate-50 text-white font-semibold h-12 px-6 rounded-lg w-full flex items-center justify-center sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400"
                type="submit">Submit</button>
        </div>
    </form>
</div>

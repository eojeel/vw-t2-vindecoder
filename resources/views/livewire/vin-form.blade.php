<div>
    <form wire:submit="save">
        <div class="flex justify-center">
            <div class="border-2 rounded-lg mt-10 w-1/4 p-2">
                <input type="text" name="c"
                    class="w-1/3 mb-1 px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500"
                    placeholder="CC CCC CCC" />
                <input wire:model="mmm" type="text" name="m"
                    class="w-full mb-1 px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500"
                    placeholder="MMM MMM MMM MMM MMM" pattern="([A-Za-z0-9]{3}\s){3}[A-Za-z0-9]{3}" />
                    <div>
                    @error('mmm') <span class="error">{{ $message }}</span> @enderror
                    </div>
                <div class="flex mb-1">
                    <input type="text" name="p"
                        class="w-1/3 mr-2 px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500"
                        placeholder="PPPPII" />
                    <input type="text" name="m2"
                        class="w-2/3 px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500"
                        placeholder="MMM MMM MMM MMM" />
                </div>
                <div class="grid grid-cols-4">
                    <input type="text" name="d"
                        class="mr-2 px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500"
                        placeholder="DD D" />
                    <input type="text" name="u"
                        class="mr-2 px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500"
                        placeholder="UUUU" />
                    <input type="text" name="e"
                        class="mr-2 px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500"
                        placeholder="EE" />
                    <input type="text" name="x"
                        class="px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-indigo-500"
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

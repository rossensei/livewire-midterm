<div>
<div class="relative overflow-hidden h-full">
        <img src="https://c3c7n5y6.rocketcdn.me/wp-content/uploads/elementor/thumbs/Guitar-Strings-Order-How-the-Guitar-is-Tuned-and-Why-oy1qust0y4usrsb0ilh4hcdvqie48efdn03mcvh56w.jpg" alt="" class="w-full h-screen object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent bg-opacity-50 backdrop-blur-sm">
            <div class="w-1/4 bg-gray-50 rounded-lg shadow-lg mx-auto mt-14 px-8 py-8">
                <div class="flex flex-col">
                    <h4 class="text-xl text-center text-gray 900 font-semibold mb-2">Add Band</h4>
                    <form wire:submit.prevent="create">
                    @if(!$bandphoto)
                        <div class="flex justify-center items-center overflow-hidden mb-4 rounded-md border-2 border-dashed">
                            <label for="bandphoto" class="p-20">+ Add Band Photo</label>
                            <input wire:model="bandphoto" id="bandphoto" type="file" class="hidden invisible w-full">
                        </div>
                    @else
                    <div class="flex justify-center items-center overflow-hidden mb-4 rounded-md">
                        <img src="{{ $bandphoto->temporaryUrl() }}" alt="">
                    </div>
                    @endif
                    @error('bandphoto') <span class="text-sm font-light text-red-500">{{ $message }}</span> @enderror
                    <div class="relative z-0 w-full mb-4">
                        <input wire:model="bandname" type="text" id="bandname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-stone-600 peer" placeholder=" " />
                        <label for="bandname" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-stone-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Band Name</label>
                        @error('bandname') <span class="text-sm font-light text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="relative w-full mb-4">
                        <textarea wire:model="description" type="text" id="floating_helper" aria-describedby="floating_helper_text" class="block h-32 rounded-t-lg pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-stone-600 peer" placeholder=" "></textarea>
                        <label for="floating_helper" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-0 peer-focus:text-stone-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Band Description</label>
                        @error('description') <span class="text-sm font-light text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="relative z-0 w-full mb-4">
                        <input wire:model="genre" type="text" id="bandname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-stone-600 peer" placeholder=" " />
                        <label for="bandname" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-stone-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Genre</label>
                        @error('genre') <span class="text-sm font-light text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="relative z-0 w-full mb-4">
                        <input wire:model="location" type="text" id="bandname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-stone-600 peer" placeholder=" " />
                        <label for="bandname" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-stone-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Location</label>
                        @error('location') <span class="text-sm font-light text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="relative z-0 w-full mb-4">
                        <input wire:model="rate" type="text" id="bandname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-stone-600 peer" placeholder=" " />
                        <label for="bandname" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-stone-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Rate</label>
                        @error('rate') <span class="text-sm font-light text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex justify-evenly items-center">
                        <a href="{{ url('/') }}" class="w-2/5 py-2 text-gray-50 text-center rounded-md bg-gray-600">Cancel</a>
                        <button type="submit" class="w-2/5 py-2 text-gray-50 text-center rounded-md bg-blue-600">Add Band</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

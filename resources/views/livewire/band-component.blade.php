<div>
    <div x-data="{ show: false }">
        <div class="flex flex-row bg-black">
            <div class="basis-1/5 h-screen bg-neutral-800 rounded-lg">
                <div class="text-center mt-10">
                    <h1 class="text-3xl text-white font-bold">Music Bar</h1>
                </div>

                <div class="block p-7 mt-28">
                    <p class="text-lg text-white font-semibold mb-3">Search Filter</p>
                    <input wire:model="search" type="text" placeholder="Search band" class="w-full mb-3 text-sm py-1.5 rounded-lg px-1.5">
                    <p class="text-md text-white font-semibold">Genre</p>
                    <div class="flex items-center mb-3">
                        <input wire:model="selectedGenres" type="checkbox" value="Rock" id="rock">
                        <label for="rock" class="text-gray-50 text-sm ml-1">Rock</label>
                    </div>
                    <div class="flex items-center mb-3">
                        <input wire:model="selectedGenres" type="checkbox" value="Pop" id="pop">
                        <label for="pop" class="text-gray-50 text-sm ml-1">Pop</label>
                    </div>
                    <div class="flex items-center mb-3">
                        <input wire:model="selectedGenres" type="checkbox" value="Reggae" id="reggae">
                        <label for="reggae" class="text-gray-50 text-sm ml-1">Reggae</label>
                    </div>
                    <div class="flex items-center mb-3">
                        <input wire:model="selectedGenres" type="checkbox" value="Acoustic" id="acoustic">
                        <label for="acoustic" class="text-gray-50 text-sm ml-1">Acoustic</label>
                    </div>
                    <div class="flex items-center mb-3">
                        <input wire:model="selectedGenres" type="checkbox" value="Classical" id="Classical">
                        <label for="Classical" class="text-gray-50 text-sm ml-1">Classical</label>
                    </div>
                    <div class="block mb-3">
                        <label for="location" class="text-md text-white font-semibold">Sort by location</label>
                        <select wire:model="locationSelect" name="location" id="location" class="w-full text-sm py-1.5 rounded-lg px-1.5">
                            <option value="">Select Location</option>
                            @foreach ($locations as $loc)
                            <option value="{{ $loc }}">{{ $loc }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="block mb-3">
                        <label for="rate" class="text-md text-white font-semibold">Rate</label>
                        <input wire:model="rateRange" type="range" id="rate" class="w-full" max="10000">
                        @if($rateRange)
                        <p class="text-center text-white">P{{ $rateRange }}</p>
                        @else
                        <p class="invisible text-center text-white">asd</p>
                        @endif
                    </div>
                    <div class="block mb-4">
                        <label for="sortDirection" class="text-md text-white font-semibold">Sort by</label>
                        <select wire:model="sortDirection" name="sortDirection" id="sortDirection" class="w-full text-sm py-1.5 rounded-lg px-1.5">
                            <option value="" disabled>Select Direction</option>
                            <option value="asc">From Lowest to Highest Fee</option>
                            <option value="desc">From Highest to Lowest Fee</option>
                        </select>
                    </div>
                    <button wire:click="clear" class="w-full bg-blue-500 text-center text-sm text-white rounded-lg py-2 hover:bg-blue-400">Reset Filter</button>
                </div>
            </div>
            <div class="basis-4/5 h-screen p-14">
                <div class="flex justify-between items-center">
                    <h1 class="text-xl text-gray-50">List of Bands</h1>
                    <a href="{{ url('/add-band') }}" class="px-3 py-1 bg-neutral-700 rounded-lg text-white hover:bg-neutral-500">Add band</a>
                </div>
                <div class="relative h-52 overflow-hidden rounded-lg mt-2">
                    <img class="w-full h-full object-cover" src="https://images.hdqwalls.com/download/boy-playing-guitar-outdoors-5k-0l-2560x1080.jpg" alt="">
                    <div class="absolute inset-0 p-6">
                        <h1 class="text-4xl text-white font-bold mt-24">Unleash the power of music.</h1>
                        <p class="text-lg text-white font-normal">Book your favorite band now.</p>
                    </div>
                </div>
                @if ($message = Session::get('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mt-5" role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                        <p class="font-bold">Information Message:</p>
                        <p class="text-sm">{{ $message }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <div >
                    <div class="mt-5 grid md:grid-cols-3 grid-cols-2 gap-4 mb-5" >
                        @foreach($bands as $band)
                        <div>
                            <div id="band-card" class="relative rounded-lg overflow-hidden h-52" @click="show = !show" wire:click.prevent="editBand({{$band->id}})">
                                <img id="bandphoto" class="w-full h-full object-cover" src="{{asset(str_replace('public', 'storage', $band->bandphoto))}}" alt="band images">
                                <div class="absolute inset-0 flex flex-col justify-center items-center bg-neutral-900 bg-opacity-50 hover:bg-opacity-75 hover:backdrop-blur-sm">
                                    <p class="text-2xl text-white font-semibold">{{ $band->bandname }}</p>
                                    <p class="text-sm text-white font-semibold">{{ $band->genre }}</p>
                                    <p class="text-sm text-white font-medium mt-10">&#8369;{{ $band->rate }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="fixed z-10 inset-0 overflow-y-auto" style="display: none;" id="myModal" x-show.transition.duration.300ms="show" x-cloak>
                        <div class="flex justify-center mt-20 px-4">
                            <div class="fixed inset-0 transition-opacity backdrop-blur-none bg-black bg-opacity-25"></div>
                            <div class="z-20 w-full max-w-md p-6 bg-white rounded-lg shadow-sm">
                                <div class="mt-3 text-center sm:mt-5">
                                    <div class="rounded overflow-hidden h-auto">
                                        <img class="w-full h-auto object-cover" src="{{asset(str_replace('public', 'storage', $bandphoto))}}" alt="">
                                    </div>
                                    <div class="flex justify-between items-center mt-2">
                                        <div class="flex">
                                            <h3 id="bandname" class="text-2xl font-semibold leading-6 text-gray-900">
                                                {{ $bandname }}
                                            </h3>
                                            
                                        </div>

                                        <div class="relative" x-data="{ isToggled: false }">
                                            <button class="px-3 rounded-full hover:bg-gray-300" @click="isToggled = !isToggled">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>

                                            <div x-show="isToggled" @click.away="isToggled = false" class="absolute z-10 right-0 mt-2 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                                    <ul class="list-none flex justify-evenly">
                                                        <li class="hover:bg-gray-300 w-full">
                                                        <a id="editBtn" href="{{ url('/band/edit/'.$band_id) }}" class="text-sm rounded-lg w-full"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        </li>
                                                        <li class="hover:bg-gray-300 w-full">
                                                            <a wire:click="removeBand()" href="#" class="text-red-500 w-full"><i class="fa-solid fa-trash"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <p class="text-start text-sm text-gray-500">
                                            {{ $description }}
                                        </p>
                                        <p class="text-start text-sm text-gray-500 mt-4">
                                            Genre: <strong>{{ $genre }}</strong>
                                        </p>
                                        <p class="text-start text-sm text-gray-500 mt-2">
                                            Location: <strong>{{ $location }}</strong>
                                        </p>
                                    </div>
                                    <div class="flex justify-between items-center mt-2">
                                        <div class="p-8 text-center ml-3">
                                            <p class="text-sm">Talent Fee</p>
                                            <p class="text-sm font-bold">
                                                {{ $rate }}
                                            </p>
                                        </div>
                                        <div class="p-8 text-center">
                                            <p class="text-sm">Total Transactions</p>
                                            <p class="text-sm font-bold">
                                                483
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 sm:mt-6">
                                    <button class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" @click="show = false">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                <div>
                    
                    {{ $bands->links('livewire.paginator') }}
                </div>
            </div>
        </div>

        
    </div>

    <style>

        #bandphoto {
            transition: ease-in-out 300ms;
        }

        #band-card:hover #bandphoto{
            transform: scale(1.5);
            /* backdrop-filter: blur(4px); */
        }

        /* #bandname:hover + #editBtn {
            visibility: visible;
        } */
    </style>
</div>

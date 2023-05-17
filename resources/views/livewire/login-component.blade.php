<div>
    <div class="relative h-screen overflow-hidden">
        <img class="w-full h-full object-cover" src="https://images.squarespace-cdn.com/content/v1/5f3644a2b6b12306a9df15da/1601558280409-BZ9YI756Q6GTLDSVGTH1/Zack+Tabudlo+-+Nangangamba.mov_snapshot_02.06_%5B2020.10.01_21.15.29%5D.jpg" alt="">
        <div class="absolute inset-0 p-6">
            <div class="w-1/3 flex flex-col ml-44 mt-52">
                <h1 class="text-center text-6xl text-white font-bold">WELCOME BACK</h1>
                <p class="text-center text-lg text-white font-normal mt-6">Jam out with your clam out.</p>
                <div class="mx-auto w-auto mt-3">
                    <form wire:submit.prevent="authenticate">
                        <div class="mb-4 flex flex-col">
                            <div class="flex">
                                <label for="username" class="py-1 px-3 text-white bg-blue-800 rounded-md"><i class="fa-solid fa-lock"></i></label>
                                <input wire:model="username" class="w-72 p-1.5 rounded-md text-sm" type="text" id="username">
                            </div>
                            @error('username') <span class="text-sm font-light text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4 flex flex-col">
                            <div class="flex">
                                <label for="password" class="py-1 px-3 text-white bg-blue-800 rounded-md"><i class="fa-solid fa-key"></i></label>
                                <input wire:model="password" class="w-72 p-1.5 rounded-md text-sm" type="password" id="password">
                            </div>
                            @error('password') <span class="text-sm font-light text-red-500">{{ $message }}</span> @enderror
                        </div>
                        @if ($message = Session::get('error'))
                            <div class="bg-red-300 text-center text-gray-700 border-l-4 border-red-700 text-sm py-2">
                                {{ $message }}
                            </div>
                        @endif
                        <button type="submit" class="text-white bg-indigo-700 w-full rounded-lg mt-2 py-1.5">Login</button>
                        <div class="flex mt-5">
                            <p class="text-white text-sm mr-1">Don't have an account?</p>
                            <a href="/register" class="text-white text-sm font-semibold underline">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

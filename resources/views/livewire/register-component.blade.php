<div>
<div class="relative h-screen overflow-hidden">
        <img class="w-full h-full object-cover" src="https://images.squarespace-cdn.com/content/v1/5f3644a2b6b12306a9df15da/1601558280409-BZ9YI756Q6GTLDSVGTH1/Zack+Tabudlo+-+Nangangamba.mov_snapshot_02.06_%5B2020.10.01_21.15.29%5D.jpg" alt="">
        <div class="absolute inset-0 p-6">
            <div class="w-full flex flex-col mt-32 px-56">
                <h1 class="text-start text-4xl text-white font-bold capitalize">Let the Music Speak!</h1>
                
                 
                <div class="w-1/3 mt-3 p-6 rounded-lg bg-gray-50">
                <p class="text-base font-bold mb-3 text-center">Create an account</p>
                @if ($message = Session::get('message'))
                    <div class="bg-green-300 text-center text-gray-700 border-l-4 border-green-700 text-sm py-2 mb-4">
                        {{ $message }} <a href="/login" class="text-sm underline">Login</a>
                    </div>
                @endif
                    <form wire:submit.prevent="register">
                        <div class="mb-4 flex flex-col">
                            <div class="">
                                <label class="text-sm" for="username" class="">Username</label>
                                <input wire:model="username" class="w-full border p-1.5 rounded-md text-sm" type="text" id="username">
                            </div>
                            @error('username') <span class="text-sm font-light text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex space-x-4">
                            <div class="mb-4 flex flex-col">
                                <div class="">
                                    <label class="text-sm" for="fname" class="">First Name</label>
                                    <input wire:model="fname" class="w-full border p-1.5 rounded-md text-sm" type="text" id="fname">
                                </div>
                                @error('fname') <span class="text-sm font-light text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-4 flex flex-col">
                                <div class="">
                                    <label class="text-sm" for="lname" class="">Last Name</label>
                                    <input wire:model="lname" class="w-full border p-1.5 rounded-md text-sm" type="text" id="lname">
                                </div>
                                @error('lname') <span class="text-sm font-light text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-4 flex flex-col">
                            <div class="">
                                <label class="text-sm" for="gender" class="">Gender</label>
                                <select wire:model="gender" class="w-full border p-1.5 rounded-md text-sm" name="gender" id="gender">
                                    <option value="">Select a gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            @error('gender') <span class="text-sm font-light text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4 flex flex-col">
                            <div class="">
                                <label class="text-sm" for="email" class="">Email</label>
                                <input wire:model="email" class="w-full border p-1.5 rounded-md text-sm" type="email" id="email">
                            </div>
                            @error('email') <span class="text-sm font-light text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4 flex flex-col">
                            <div class="mb-4">
                            <label class="text-sm" for="password" class="">Password</label>
                            <input wire:model="password" class="w-full border p-1.5 rounded-md text-sm" type="password" id="password">
                            </div>

                            <div class="">
                                <label class="text-sm" for="password_confirmation" class="">Confirm Password</label>
                                <input wire:model="password_confirmation" class="w-full border p-1.5 rounded-md text-sm" type="password" id="password_confirmation">
                            </div>
                            @error('password') <span class="text-sm font-light text-red-500">{{ $message }}</span> @enderror
                        </div>
                       
                        <button type="submit" class="text-white text-sm bg-indigo-700 w-full rounded-lg py-1.5">Create Account</button>
                        <div class="flex mt-5">
                            <p class="text-sm mr-1">Already have an account?</p>
                            <a href="/login" class="underline text-sm">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

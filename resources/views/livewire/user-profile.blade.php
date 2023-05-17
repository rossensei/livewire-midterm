<div>
    <div class="px-80 py-20">
        <div class="bg-neutral-800 p-10 rounded-lg">
            <h1 class="text-2xl text-white">Profile Settings</h1>
            <hr class="mb-5 mt-1">
            <div class="flex items-center justify-start space-x-6 mt-3">
                <img src="https://cdn-icons-png.flaticon.com/512/147/147142.png" alt="" class="rounded-full w-36">
                <div class="flex space-x-4">
                    <div class="flex flex-col space-y-2">
                        <label for="fname" class="text-white text-sm">First Name</label>
                        <input wire:model="fname" type="text">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="lname" class="text-white text-sm">Last Name</label>
                        <input wire:model="lname" type="text">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

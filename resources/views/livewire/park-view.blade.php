<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-6 text-gray-500">
        <div class="p-2 m-2">
            <div class="flex my-1">
                <span class="w-1/4">Name</span>
                <input type="text" class="w-2/4 rounded" wire:model="form.name">
                @error('form.name')
                <sup class="text-danger">{{$message}}</sup>
                @enderror
            </div>
            <div class="flex my-1">
                <span class="w-1/4">Address</span>
                <input type="text" class="w-2/4 rounded" wire:model="form.address">
                @error('form.address')
                <sup class="text-danger">{{$message}}</sup>
                @enderror
            </div>
            <div class="flex my-1">
                <span class="w-1/4">Working time</span>
                <input type="text" class="w-2/4 rounded" wire:model="form.schedule">
                @error('form.schedule')
                <sup class="text-danger">{{$message}}</sup>
                @enderror
            </div>
            <div class="flex my-3 justify-center">
                <button wire:click="savePark"
                        class="w-1/4 rounded border-2 py-1 px-2 border-green-200 hover:bg-green-300">Save
                </button>
            </div>
        </div>
        <livewire:car-list :park="$park"></livewire:car-list>
    </div>
</div>

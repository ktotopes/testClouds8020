<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-6 text-gray-500">
        <table class="w-full table-auto text-center">
            <thead>
            <tr>
                <th></th>
                <th>Number</th>
                <th>Owner</th>
                <th>Parks</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                <tr class="border-b-2">
                    <td>
                        <btn wire:click="deleteCar({{$car->id}})"
                             class="rounded border py-1 px-2 border-red-400 hover:bg-red-500 hover:text-white">
                            X
                        </btn>
                    </td>
                    <td>
                        <input wire:model="form.{{$car->id}}.number" class="border rounded py-1" type="text">
                        @error("form.$car->id.number")
                        <div>
                            <sup class="text-danger">{{$message}}</sup>
                        </div>
                        @enderror
                    </td>
                    <td>
                        <input wire:model="form.{{$car->id}}.name" class="border rounded py-1" type="text">
                        @error("form.$car->id.name")
                        <div>
                            <sup class="text-danger">{{$message}}</sup>
                        </div>
                        @enderror
                    </td>

                    <td>
                        @foreach($car->carParks as $park)
                            <div class="flex justify-center">
                                <a href="{{route('park-view',$park)}}">{{$park->name}}</a>
                            </div>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>
                    <button wire:click="addCar"
                            class="px-2 py-1 border rounded border-blue-400 hover:bg-blue-500 hover:text-white">+
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="mt-3 border-t-2 py-3">
            <button wire:click="saveCars" class="rounded border-2 py-1 px-2 border-green-200 hover:bg-green-300">Save</button>
        </div>
    </div>
</div>

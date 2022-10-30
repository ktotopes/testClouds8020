<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-6 text-gray-500">
        <table class="w-full table-auto text-center">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Working time</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($parks as $park)
                <tr class="border-b-2">
                    <td>{{$park->id}}(Cars:{{$park->cars->count()}})</td>
                    <td>{{$park->name}}</td>
                    <td>{{$park->address}}</td>
                    <td>{{$park->schedule}}</td>
                    <td>
                        <a class="rounded border-2 border-blue-400 px-1 mx-1 hover:bg-blue-50" href="{{ route('park-view',$park) }}">Edit</a>
                        <button wire:click="deletePark({{$park->id}})" class="rounded border-2 border-red-400 px-1 py-1 mx-1 hover:bg-red-50">Remove</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

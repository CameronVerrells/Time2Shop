<div class="p-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold">{{$shoppingList->name}}</h2>
        <button wire:click="createItem" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add Item
        </button>
        <a href="{{ route('home')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Go Home
        </a>
        <button onclick="copySharingLink()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Share List
        </button>
    </div>

    <input type="text" wire:model="newItemName" placeholder="New item name" class="mt-3 p-2 border rounded">

    <div class="mt-6 grid grid-cols-1 gap-4">
        @foreach ($items as $item)
            <div class="p-4 border rounded">
                <h3 class="text-xl font-bold">{{ $item->name }}</h3>
                <button wire:click="deleteItem({{ $item->id }})" class="text-red-500">Delete Item</button>
            </div>
        @endforeach
    </div>

    <script>
        function copySharingLink(){ 
            navigator.clipboard.writeText("{{ route('shopping-list', ['id' => $shoppingList->id]) }}");
            alert("Link copied to clipboard!");
        }
    </script>
</div>
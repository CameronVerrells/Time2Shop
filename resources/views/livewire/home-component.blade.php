<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 p-10 md:p-32">
    <div class="grid grid-cols-1 gap-4">
        <h1 class="text-2xl font-bold text-center">Your Shopping Lists</h1>
        @foreach ($shoppingLists as $shoppingList)
            <div class="p-4 border border-blue-500 rounded flex items-center justify-between gap-x-6 py-5">
                <div class="min-w-0 flex-auto">
                    <p class="text-2xl font-bold">{{ $shoppingList->name }}</p>
                    <p>Last Updated - {{ $shoppingList->updated_at->format('d/m/Y') }}</p>
                </div>
                <div>
                    <a href="{{ route('shopping-list', ['id' => $shoppingList->id]) }}" title="View List" class="text-blue-500 text-2xl p-1">
                        <i class="fa-solid fa-eye"></i>
                    </a>

                    <a wire:click="deleteShoppingList({{ $shoppingList->id }})" role="button" title="Delete List" class="text-red-500 text-2xl p-1">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="grid grid-cols-1 gap-4 h-10">
        <h1 class="text-2xl font-bold text-center">Create a new List</h1>
        <input type="text" wire:model="newShoppingListName" placeholder="New list name" class="mt-3 p-2 border rounded">
        @error('newShoppingListName') <span class="error text-red-600 font-bold">{{ $message }}</span> @enderror

        <button wire:click="createShoppingList" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create
        </button>
    </div>

</div>
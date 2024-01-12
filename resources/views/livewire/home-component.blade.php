<div class="p-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold">Your Shopping Lists</h2>
        <button wire:click="createShoppingList" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create New List
        </button>
    </div>

    <input type="text" wire:model="newShoppingListName" placeholder="New list name" class="mt-3 p-2 border rounded">
    @error('newShoppingListName') <span class="error">{{ $message }}</span> @enderror

    <div class="mt-6 grid grid-cols-1 gap-4">
        @foreach ($shoppingLists as $shoppingList)
            <div class="p-4 border rounded">
                <h3 class="text-xl font-bold">{{ $shoppingList->name }}</h3>
                <a href="{{ route('shopping-list', ['id' => $shoppingList->id]) }}" class="text-blue-500">View List</a>
                <button wire:click="deleteShoppingList({{ $shoppingList->id }})" class="text-red-500">Delete List</button>
            </div>
        @endforeach
    </div>
</div>
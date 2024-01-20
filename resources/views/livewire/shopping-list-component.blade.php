<div>
    <div class="flex items-center justify-center space-x-4 pt-10">
        <a href="{{ route('home')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center justify-center">
            <i class="fas fa-home"></i>
        </a>
        <button onclick="copySharingLink()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center justify-center">
            <i class="fas fa-share-alt"></i>
        </button>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 p-10 md:p-32">
        <div class="grid grid-cols-1 gap-4">
            <h1 class="text-2xl font-bold text-center">{{$shoppingList->name}}</h1>
            @foreach ($items as $item)
                <div class="p-4 border border-blue-500 rounded flex items-center justify-between gap-x-6 py-5">
                    <div class="min-w-0 flex-auto">
                        <p class="text-2xl font-bold">{{ $item->name }}</p>
                        <p>Category - {{ optional($item->category)->name }}</p>
                    </div>
                    <div>
                        <a wire:click="deleteItem({{ $item->id }})" role="button" title="Delete Item" class="text-red-500 text-2xl p-1">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div>
            <div class="grid grid-cols-1 gap-4">
                <h1 class="text-2xl font-bold text-center">Add Items</h1>
                <input type="text" wire:model="newItemName" placeholder="New item name" class="mt-3 p-2 border rounded">
                @error('newItemName') <span class="error">{{ $message }}</span> @enderror
                
                <select wire:model="newItemCategory" class="mt-3 p-2 border rounded">
                    <option value="0">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('newItemCategory') <span class="error">{{ $message }}</span> @enderror

                <button wire:click="createItem" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Item
                </button>
            </div>

            <div class="grid grid-cols-1 gap-4 pt-10">
                <h1 class="text-2xl font-bold text-center">Add Category</h1>
                <input type="text" wire:model="newItemCategoryName" placeholder="New category name" class="mt-3 p-2 border rounded">
                @error('newItemCategoryName') <span class="error">{{ $message }}</span> @enderror
                
                <button wire:click="createCategory" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Category
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 h-10">

        </div>

        <script>
            function copySharingLink(){ 
                navigator.clipboard.writeText("{{ route('shopping-list', ['id' => $shoppingList->id]) }}");
                alert("Link copied to clipboard!");
            }
        </script>
    </div>
</div>
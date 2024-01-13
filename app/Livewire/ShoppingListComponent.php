<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ShoppingList;

class ShoppingListComponent extends Component
{
    public $shoppingList;
    public $items;
    public $categories;
    public $newItemName = '';
    public $newItemCategory = '';
    public $newItemCategoryName = '';


    public function mount($id)
    {
        $this->shoppingList = ShoppingList::find($id);
        $this->items = $this->shoppingList->items;
        $this->categories = $this->shoppingList->categories()->orWhereNull('shopping_list_id')->get();
    }

    public function render()
    {
        return view('livewire.shopping-list-component');
    }

    public function createItem()
    {
        $this->validate([
            'newItemName' => 'required|string|min:3|max:50|regex:/^[a-zA-Z0-9\s]+$/',
            'newItemCategory' => 'required|exists:categories,id',
        ], [
            'newItemName.required' => 'The item name is required.',
            'newItemName.min' => 'The item name must be at least 3 characters.',
            'newItemName.max' => 'The item name may not be greater than 50 characters.',
            'newItemName.regex' => 'The item name may only contain letters, numbers, and spaces.',
            'newItemCategory.required' => 'The item category is required.',
            'newItemCategory.exists' => 'The selected category does not exist.',
        ]);

        $item = $this->shoppingList->items()->create(['name' => $this->newItemName, 'category_id' => $this->newItemCategory]);
        $this->items->push($item);
    }

    public function createCategory()
    {
        $this->validate([
            'newItemCategoryName' => 'required|string|min:3|max:50|regex:/^[a-zA-Z0-9\s]+$/',
        ], [
            'newItemCategoryName.required' => 'The category name is required.',
            'newItemCategoryName.min' => 'The category name must be at least 3 characters.',
            'newItemCategoryName.max' => 'The category name may not be greater than 50 characters.',
            'newItemCategoryName.regex' => 'The category name may only contain letters, numbers, and spaces.',
        ]);

        $category = $this->shoppingList->categories()->create(['name' => $this->newItemCategoryName]);
        $this->categories->push($category);
    }

    public function deleteItem($id)
    {
        $item = $this->shoppingList->items()->find($id);
        $item->delete();
        $this->items = $this->shoppingList->items;
    }
}
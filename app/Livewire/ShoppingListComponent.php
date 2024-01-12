<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ShoppingList;

class ShoppingListComponent extends Component
{
    public $shoppingList;
    public $items;
    public $newItemName = '';

    public function mount($id)
    {
        $this->shoppingList = ShoppingList::find($id);
        $this->items = $this->shoppingList->items;
    }

    public function render()
    {
        return view('livewire.shopping-list-component');
    }

    public function createItem()
    {
        $item = $this->shoppingList->items()->create(['name' => $this->newItemName]);
        $this->items->push($item);
    }

    public function deleteItem($id)
    {
        $item = $this->shoppingList->items()->find($id);
        $item->delete();
        $this->items = $this->shoppingList->items;
    }
}
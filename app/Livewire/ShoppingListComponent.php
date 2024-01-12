<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ShoppingList;

class ShoppingListComponent extends Component
{
    public $shoppingList;

    public function mount($id)
    {
        $this->shoppingList = ShoppingList::find($id);
    }

    public function render()
    {
        return view('livewire.shopping-list-component');
    }
}
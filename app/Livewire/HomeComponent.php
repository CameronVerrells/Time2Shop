<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\ShoppingList;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class HomeComponent extends Component
{
    public $shoppingLists;
    public $newShoppingListName = '';

    public function mount()
    {
        $cookieId = Cookie::get('cookie_id');

        if (!$cookieId) {
            $cookieId = Str::random(16);
            Cookie::queue('cookie_id', $cookieId, 60 * 24 * 30 * 6); // Set cookie to expire in 6 months
        }

        $user = User::firstOrCreate(['cookie_id' => $cookieId]);

        if ($user) {
            $this->shoppingLists = $user->shoppingLists;
        }
    }

    public function createShoppingList()
    {
        $this->validate([
            'newShoppingListName' => 'required',
        ], [
            'newShoppingListName.required' => 'The shopping list name is required.',
        ]);
        
        $cookieId = Cookie::get('cookie_id');
        $user = User::firstOrCreate(['cookie_id' => $cookieId]);

        if (!$this->newShoppingListName) {
            
        }

        $shoppingList = new ShoppingList(['name' => $this->newShoppingListName]);
        $user->shoppingLists()->save($shoppingList);

        $this->shoppingLists = $user->shoppingLists;
        $this->newShoppingListName = '';
    }

    public function deleteShoppingList($id)
    {
        $cookieId = Cookie::get('cookie_id');
        $user = User::firstOrCreate(['cookie_id' => $cookieId]);

        $shoppingList = ShoppingList::find($id);
        $shoppingList->delete();

        $this->shoppingLists = $user->shoppingLists;
    }

    public function render()
    {
        return view('livewire.home-component');
    }
}
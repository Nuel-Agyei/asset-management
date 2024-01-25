<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

class Items extends Component
{
    public function render()
    {

        $item = Item::all();
        return view('livewire.items', compact('item'));
    }
}

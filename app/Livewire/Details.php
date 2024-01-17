<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

class Details extends Component
{
    public function render()
    {
        $item = Item::all();
        return view('livewire.details', compact('item'));
    }
}

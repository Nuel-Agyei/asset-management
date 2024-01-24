<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use Spatie\MediaLibrary\InteractsWithMedia;

class Items extends Component
{
    use InteractsWithMedia;
    public function render()
    {

        $item = Item::all();
        return view('livewire.items', compact('item'));
    }
}

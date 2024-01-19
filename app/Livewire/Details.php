<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

class Details extends Component
{
    public $data;
    public function render()
    {
        $id = request()->route()->parameter("id");
        $this->data = Item::find($id);
        return view('livewire.details');
    }
}

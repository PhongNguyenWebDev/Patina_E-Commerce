<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;


class UserSearchProduct extends Component
{
    public $search = "";

    public function render()
    {
        $results = [];
        if (strlen($this->search) >= 1)
        {
            $results = Product::where('name', 'like', '%'.$this->search.'%')->get();
        }
        return view('livewire.user-search-product', [
            'products' => $results
        ]);
    }
}

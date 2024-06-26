<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class AdminSearchProduct extends Component
{
    public $search = "";
    public function render()
    {
        $results = [];
        if(strlen($this->search >= 1))
        {
            $results = Product::where('name', 'like', '%'.$this->search.'%')->get();
        }
        elseif (strlen($this->search == null))
        {
            $results = Product::all();
        }
        return view('livewire.admin-search-product',[
            'products' => $results
        ]);
    }
}

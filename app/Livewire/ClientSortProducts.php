<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ClientSortProducts extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::all();
    }
    public function sortByPriceAsc()
    {
        $this->products = Product::orderBy('price')->get();
    }
    public function sortByPriceDesc()
    {
        $this->products = Product::orderByDesc('price')->get();
    }

    public function sortByNameAsc()
    {
        $this->products = Product::orderBy('name')->get();
    }

    public function sortByNameDesc()
    {

        $this->products = Product::orderByDesc('name')->get();
    }

    public function render()
    {
        return view('livewire.client-sort-products');
    }
}

<?php

namespace App\Livewire;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSearchProduct extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = "";
    public function render()
    {
        $results = [];
        if(strlen($this->search >= 1))
        {
            $results = Product::where('name', 'like', '%'.$this->search.'%')->paginate(6);
        }
        elseif (strlen($this->search == null))
        {
            $results = Product::paginate(6);

        }
        return view('livewire.admin-search-product',[
            'products' => $results
        ]);
    }
}

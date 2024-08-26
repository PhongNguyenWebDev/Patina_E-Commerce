<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = "";
    public function render()
    {
        $results = [];
        if(strlen($this->search >= 1))
        {
            $results = User::where('name', 'like', '%'.$this->search.'%')->paginate(6);
        }
        elseif (strlen($this->search == null))
        {
            $results = User::paginate(6);

        }
        return view('livewire.show-users', [
            'users' => $results
        ]);
    }
}

<?php

namespace App\Http\Livewire\Accounts;

use Livewire\Component;

class Create extends Component
{
    public $name;

    public $type;

    public $color;

    public function render()
    {
        return view('livewire.accounts.create');
    }
}

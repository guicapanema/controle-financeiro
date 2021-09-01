<?php

namespace App\Http\Livewire\Accounts;

use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $name;

    public $type = 'CHECKING';

    public $color = '#000000';

    protected $rules = [
        'name' => 'required|string|min:3|max:255',
        'type' => 'required|in:CHECKING,SAVINGS,CREDITCARD',
        'color' => 'required|string|size:7',
    ];

    public function render()
    {
        return view('livewire.accounts.create');
    }

    public function save()
    {
        $data = $this->validate();

        Account::create([
            'user_id' => Auth::user()->id,
            'name' => $this->name,
            'type' => $this->type,
            'color' => $this->color,
        ]);

        session()->flash(
            'message',
            [
                'level' => 'success',
                'message' => __('Account created successfully.'),
            ]
        );

        return redirect()->route('dashboard');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StyledInput extends Component
{
    public $value = '';
    public $label;


    public function render()
    {
        return view('livewire.styled-input');
    }

    public function updated()
    {
        $this->emit('changedSearch', $this->value);
    }
}

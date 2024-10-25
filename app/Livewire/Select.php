<?php

namespace App\Livewire;

use Livewire\Component;

class Select extends Component
{
    public $label;
    public $name;
    public $options;

    public function render()
    {
        return view('livewire.select');
    }
}

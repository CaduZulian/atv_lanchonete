<?php

namespace App\Livewire;

use Livewire\Component;

class StatusCard extends Component
{
    public $title;
    public $description;
    public $status;

    public function render()
    {
        return view('livewire.status-card');
    }
}

<?php

namespace App\Http\Livewire\Conversion;

use App\Models\Conversion;
use Livewire\Component;

class ListConversions extends Component
{
    public function render()
    {
        $conversions = Conversion::all();
        return view('livewire.conversion.list-conversions', ['conversions' => $conversions]);
    }
}